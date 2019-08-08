<?php

namespace App\Http\Controllers\Admin;

use App\Contactus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Comment;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.comment');
    }

    public function getcomment()
    {
        return Contactus::orderBy('id', 'desc')->get();
    }
}
