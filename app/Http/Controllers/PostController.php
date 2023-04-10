<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view("index", ['posts'=>$posts]);
    }
    public function create(){
        return view("create");
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        Post::create([
            'title' => $request->input("title"),
            'description' => $request->input("description")
        ]);

        return redirect('posts')->with("status","Post has been created successfully");
    }

    public function show($id){
        $post = Post::find($id);
        return view('edit', ['post'=>$post]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        Post::find($id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);
        return redirect('posts')->with('status', 'Post Updated Successfully.');
    }

    public function delete($id){
        Post::destroy($id);
        return redirect('posts')->with('status', 'Post Deleted Successfully.');
    }
}
