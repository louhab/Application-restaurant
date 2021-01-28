<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        return view('management.categories.index')->with([
        "categories"=>Category::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           "title"=>"required | min :3"
       ]);
       $title=$request->title;
       Category::create([
        "title"=>$title,
        "slug"=>Str::slug($title)
       ]);
  
       return redirect()->route("categories.index")->with([
           'success'=>" la creation a ete faite !"
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('management.categories.edit')->with([
            "category"=>$category
        ]);}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            "title"=>"required | min :3"
        ]);
        $title=$request->title;
       $category->update([
         "title"=>$title,
         "slug"=>Str::slug($title)
        ]);
        return redirect()->route("categories.index")->with([
            'success'=>" la modefication  a ete faite !"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
           return redirect()->route("categories.index")->with([
               'success'=>" la suppression a ete faite !"
           ]);
    }
}
