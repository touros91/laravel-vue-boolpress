<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Category;

class PostController extends Controller
{

    protected $validationRules = [
        'title' => 'string|required|max:100',
        'content' => 'string|required',
        // 'category_id' => 'nullable|exists:categories,id',
    ];

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::all();

       return view('admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        $newPost = new Post();
        $newPost->fill($request->all());

        $newPost->slug = $this->getSlug($request->title);

        $newPost->save();

        return redirect()->route("admin.index", $newPost->id)->with('success', "New Post has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("admin.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view("admin.edit", compact("post", "categories", "tags"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //validations
        $request->validate($this->validationRules);

        if($post->title != $request->title) {
            $post->slug = $this->getSlug($request->title);
        }

        $post->fill($request->all());

        $post->save();

        $post->tags()->sync($request->tags);

        return redirect()->route("admin.index", $post->id)->with('success', "Post {$post->id} has been edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.index')->with('success', "Post {$post->id} has been deleted");
    }

    private function getSlug($title)
    {
        $slug = Str::of($title)->slug('-');

        $postExist = Post::where("slug", $slug)->first();

        $count = 2;

        while($postExist) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $postExist = Post::where("slug", $slug)->first();
            $count++;
        }

        return $slug;
    }
}
