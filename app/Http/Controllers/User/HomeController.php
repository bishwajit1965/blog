<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\category;
use App\Model\user\tag;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $posts = post::where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);
        return view('user.home', compact('posts'));
    }

    public function about()
    {
        return view('user.about');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function category(category $category)
    {
        $posts = $category->posts();
        return view('user.home', compact('posts'));
    }

    public function tag(tag $tag)
    {
        $posts =  $tag->posts();
        return view('user.home', compact('posts'));
    }
}
