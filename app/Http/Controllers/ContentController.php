<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
	// version 1
    public function index(){
    	$posts = Post::where('published_at', '<=', Carbon::now())
    			->where('status', true)
    			->orderBy('published_at', 'desc')
    			->paginate(config('blog.posts_per_page'));

    	return view ('index', compact('posts'));
    }

    public function showPost($slug){
    	$post = Post::whereSlug($slug)->firstOrFail();

    	return view ('post')->withPost($post);
    }
}
