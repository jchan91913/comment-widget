<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Comment Widget</title>
        <!-- Use Bootstrap for styling -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Use Font Awesome for icons -->
        <script src="https://kit.fontawesome.com/a290b25f84.js" crossorigin="anonymous"></script>
        <!-- JS needed for Bootstrap and jQuery loaded via CDN as well -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!--
        <link rel="stylesheet" href="{{ URL::asset('css/somestylesheet.css') }}" />
        -->
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1><i class="far fa-comments text-info mr-2"></i>Comment Widget</h1>
            </div>
            <div class="comments-container mt-5">
                <!-- Errors relating to the 30 second data refresh will appear here-->
                <div class="latest-comments-errors"></div>
                <h2><i class="fas fa-bullhorn text-warning fa-sm mr-2"></i>Latest comments</h2>
                <!-- Iterate through and display the five latest comments -->
                <div class="comments-list">
                @foreach ($comments as $comment)
                    <div class="card comment-card">
                        <div class="card-header">
                            Comment
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>{{ $comment->message }}</p>
                                <footer class="blockquote-footer">{{ $comment->author_name }}, {{ $comment->author_email }}</footer>
                            </blockquote>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="form-container mt-4 mb-4">
                <h2><i class="far fa-comment-alt text-success fa-sm mr-2"></i>Join the conversation</h2>
                <!-- Success message when creating a comment is initially hidden -->
                <div class="comment-success alert alert-success alert-dismissible fade show d-none" role="alert">
                    <strong>Comment posted!</strong> Your comment will appear above.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Any form validation errors will appear here -->
                <div class="validation-errors"></div>
                <!-- Form for creating a new comment -->
                <form class="new-comment-form" method="POST" action="javascript:void(0)">
                    @csrf
                    <div class="form-group">    
                        <label for="author_name">Author Name:</label>
                        <input type="text" class="form-control" id="author_name" required/>
                    </div>
                    <div class="form-group">    
                        <label for="author_email">Author Email:</label>
                        <input type="email" class="form-control" id="author_email" required/>
                    </div>
                    <div class="form-group">    
                        <label for="message">Comment:</label>
                        <textarea class="form-control" id="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary submit-btn">Post Comment</button>
                </form>
            </div>
        </div>
        <!-- Load custom js for core comments functionality -->
       <script src="{{ asset('js/comment-widget.js')}}"></script>
    </body>
</html>