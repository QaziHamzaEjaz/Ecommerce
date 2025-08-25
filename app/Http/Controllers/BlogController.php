<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return response()->json(Blog::all());
    }

    public function store(Request $request)
    {
        $blog = Blog::create($request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required|exists:users,id',
        ]));

        return response()->json($blog, 201);
    }

    public function show(Blog $blog)
    {
        return response()->json($blog);
    }

    public function update(Request $request, Blog $blog)
    {
        $blog->update($request->validate([
            'title' => 'required',
            'content' => 'required',
        ]));

        return response()->json($blog);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json(['message' => 'Blog deleted']);
    }
}

