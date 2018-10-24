<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SnippetController extends Controller
{
    // Get all Likes
    public function getLikes($id)
    {
        return Auth::user()->getAllLikes($id);
    }

    // Like Snippet
    public function likeSnippet($id)
    {
        return Auth::user()->likeSnippet($id);
    }

    // Unlike Snippet
    public function unlikeSnippet($id)
    {
        return Auth::user()->unlikeSnippet($id);
    }
}
