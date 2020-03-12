<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    // Clean the input coming from the client-side
    public function sanitizeInput($unclean)
    {
        return htmlspecialchars(trim($unclean));
    }

    // Find the last five by ordering by descending primary key
    public function getLastFive()
    {
        return Comment::select('author_name', 'author_email', 'message')->orderBy('id' ,'DESC')->limit(5)->get();    
    }

    // Home page view
    public function showHome()
    {
        return view('home')->with('comments', $this->getLastFive());
    }

    // Create and store a comment to the database
    public function store(Request $request)
    {
        // Validate inputs
        $validatedData = $request->validate([
            'inputName' => 'required|max:255',
            'inputEmail' => 'required|max:255|email:rfc,dns',
            'inputMessage' => 'required'
        ]);
        
        // Clean inputs
        $inputName = $this->sanitizeInput($request->inputName);
        $inputEmail = $this->sanitizeInput($request->inputEmail);
        $inputMessage = $this->sanitizeInput($request->inputMessage);

        // Create the new comment and attempt to save it to the database
        $newComment = new Comment;
        $newComment->author_name = $inputName;
        $newComment->author_email = $inputEmail;
        $newComment->message = $inputMessage;
        $saved = $newComment->save();

        // Respond depending if we were able to create the comment successfully or not
        if ($saved) {
            // Return the created comment so that we don't need to re-query for the latest comments
            return response()->json(['success' => 'Comment was successfully created.', 'createdComment' => $newComment->makeHidden('id')], 200);
        } else {
            return response()->json(['error' => 'Failed to create comment.'], 500);
        }
    }
}
