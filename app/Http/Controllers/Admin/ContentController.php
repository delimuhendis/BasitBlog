<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.post')->withPosts(Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->content = $request->content;
        if($request->status != '')
            $post->status = 1;
        else
            $post->status = 0;
        $post->created_at = Carbon::now();
        $post->published_at = Carbon::now();
        $post->updated_at = Carbon::now();
        $post->save();

        return redirect('/admin/post/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        
        /*$affected = Post::where('id', 3)
                ->first()
                ->update(['title' => 'içerik']);*/
        $post = Post::find($request->no);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = $request->slug;
        if($request->status != '')
            $post->status = 1;
        else
            $post->status = 0;
        $post->updated_at = Carbon::now();
        $post->save();

        return redirect('/admin/post/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
