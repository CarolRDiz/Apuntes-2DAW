<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;


class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard')->with([
            'images'=>Image::All(),
            'likes'=>Like::All(),
            'comments'=>Comment::All()
        ]);
    }
}
