// On submit handler for the comment form
$('.new-comment-form').on('submit', (event) => {
    // Prevent the default behavior of a full page refresh due to submit
    event.preventDefault();

    // Retrieve the three input values from the form
    const inputName = $('#author_name').val();
    const inputEmail = $('#author_email').val();
    const inputMessage = $('#message').val();

    $.ajax({
        // Laravel endpoint to create a new comment
        url: '/comment/create',
        type:'POST',
        data: {
            '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            inputName,
            inputEmail,
            inputMessage,
        },
        success: (response) => {
            // Clear previous errors if any
            $('.validation-errors').html('');

            // Reset the form
            $('.new-comment-form').trigger('reset');

            // Display success message
            $('.comment-success').removeClass('d-none');

            // Remove last (oldest of the five) comment element
            $('.comments-list .comment-card').last().remove();

            // Add the new comment to the beginning of the list
            // Note: This was done to prevent querying the database again for the latest five
            const newCommentElement = `
                <div class="card comment-card">
                    <div class="card-header">
                        Comment
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>${response.createdComment.message}</p>
                            <footer class="blockquote-footer">${response.createdComment.author_name}, ${response.createdComment.author_email}</footer>
                        </blockquote>
                    </div>
                </div>`;
            $('.comments-list').prepend(newCommentElement);

        },
        error: (xhr) => {
            // Clear any previous errors and display the new errors
            $('.validation-errors').html('');
            $.each(xhr.responseJSON.errors, (key, value) => {
                $('.validation-errors').append(`<div class="alert alert-danger">${value}</div>`);
            }); 
        }
    });
});

// Refresh the latest comments every 30 seconds
setInterval(() => {
    $.ajax({
        // Laravel endpoint get the last five comments
        url: '/comment/last-five',
        type:'GET',
        data:{
            "_token": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        success: (response) => {
            // Clear old comments from DOM
            $('.comments-list').html('');
            console.log(response);
            
            // Recreate the five comment elements using the most recent data
            response.forEach((comment) => {
                const newCommentElement = `
                <div class="card comment-card">
                    <div class="card-header">
                        Comment
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>${comment.message}</p>
                            <footer class="blockquote-footer">${comment.author_name}, ${comment.author_email}</footer>
                        </blockquote>
                    </div>
                </div>`;
                $('.comments-list').append(newCommentElement);
            });
            
          },
        error: (xhr) => {
            // Clear previous error if any and display new one
            $('.latest-comments-errors').html('');
            $('.latest-comments-errors').append(`<div class="alert alert-danger">(${xhr.status}) Status: ${xhr.statusText}. Failed to load latest comments.</div>`);
        }
    });
}, 30000);