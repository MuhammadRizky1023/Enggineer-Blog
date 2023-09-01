<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function filter(Request $request)
    {
        $posts = Post::all();
        $categories = $posts->pluck('category')->unique();

       return view('posts.filter', compact('posts', 'categories'));
    }

    public function custom()
{
    $posts = Post::select('title', 'content', 'category', 'image', 'slug', 'created_at')->get();
    return view('posts.custom', ['posts' => $posts]);
}



    public function index()
    {
        $posts = Post::select('title', 'content', 'category', 'image', 'slug', 'created_at')->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $image = 'storage/' . $imagePath;
        } else {
            $image = null;
        }

        $post = new Post([
            'title' => $validatedData['title'],
            'category' => $validatedData['category'],
            'content' => $validatedData['content'],
            'image' => $image,
        ]);

        $post->save();

        return redirect('post');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $comments = $post->comments()->limit(2)->get();
        $totalComments = $post->total_comments();

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
            'total_comments' => $totalComments,
        ]);
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $slug)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $image = 'storage/' . $imagePath;
        } else {
            $image = $post->image;
        }

        $post->title = $validatedData['title'];
        $post->category = $validatedData['category'];
        $post->content = $validatedData['content'];
        $post->image = $image;

        $post->save();

        return redirect('post');
    }

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->delete();

        return redirect('post');
    }

}
