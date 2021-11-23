<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    protected $validationRules = [
        'name' => 'string|required|max:50',
        // 'slug' => 'string|required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view("admin.categories.index", compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
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

        $newCategory = new Category();
        $newCategory->fill($request->all());
        $newCategory->slug = Str::of($newCategory['name'])->slug('-');
        $newCategory->save();

        return redirect()->route("admin.categories.index", $newCategory->id)->with('success', "New Category has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("admin.categories.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validation = $this->validationRules;
        $validation["name"] = $validation["name"] . ",{$category['id']}";
        $request->validate($validation);
        //validations
        $request->validate($this->validationRules);
    
        if($category->name != $request->name) {
            $category->slug = $this->getSlug($request->name);
        }

        $category->fill($request->all());

        $category->save();

        return redirect()->route("admin.categories.index", $category->id)->with('success', "Category {$category->id} has been edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', "Category {$category->id} has been deleted");
    }

    private function getSlug($title)
    {
        $slug = Str::of($title)->slug('-');

        $catgoryExist = Category::where("slug", $slug)->first();

        $count = 2;

        while($catgoryExist) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $catgoryExist = Category::where("slug", $slug)->first();
            $count++;
        }

        return $slug;
    }
}
