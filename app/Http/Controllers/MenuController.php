<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
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
       return view('management.menus.index')->with([
           'menus'=>Menu::all(),
           "categories"=>Category::all()
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.menus.create')->with([
            "categories"=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $title=$request->title;
        $slug=Str::slug($title);
        $description=$request->description;
        $price=$request->price;
        $image=$request->title;
        $category_id=$request->category_id;
        if($request->hasFile("image")){
            $file=$request->image;
            $imageName=time()."-".$file->getClientOriginalName();
            $file->move(public_path('images/menu'),$imageName);
        }
        $menu=new Menu ;
        $menu->title=$title;
        $menu->slug=$slug;
        $menu->dexcription=$description;
        $menu->price=$price;
        $menu->category_id=$category_id;
        $menu->image=$imageName;
        $menu->save();
        return redirect()->route("menus.index")->with([
            'success'=>" la creation a ete faite !"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $produit=Menu::orderBy('created_at','DESC')->whereCategory_id($id)->get();
       
     
        
        return view("management.menus.index")->with([
            'menus'=>$produit,
            "categories"=>Category::all()
            
        ]);
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
       // dd($menu);
        return view('management.menus.edit')->with([
            "categories"=>Category::all(),
            "menu"=>$menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $title=$request->title;
        $slug=Str::slug($title);
        $description=$request->description;
        $price=$request->price;
        $image=$request->title;
        $category_id=$request->category_id;
        if($request->hasFile("image")){
            unlink(public_path('images/menu/'.$menu->image));
            $file=$request->image;
            $imageName=time()."-".$file->getClientOriginalName();
            $file->move(public_path('images/menu'),$imageName);
        }
       
        else{
            $imageName=$menu->image;
        }
        $menu->title=$title;
        $menu->slug=$slug;
        $menu->dexcription=$description;
        $menu->price=$price;
        $menu->image=$imageName;
        $menu->category_id=$category_id;
        $menu->save();
        return redirect()->route("menus.index")->with([
            'success'=>" la modification a ete faite !"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        unlink(public_path('images/menu/'.$menu->image));
        $menu->delete();
        return redirect()->route("menus.index")->with([
            "sucess"=>"menu a ete supprime avec succees !"
        ]);
    }
    public function trier(Request $request){
        if($request->tries==='price'){
            $menus=Menu::all();
            $menus=$menus->sortBy('price');
            return view('management.menus.index')->with([
                'menus'=>$menus,
                "categories"=>Category::all() 
            ]);
        }
        if($request->tries==='name'){
            $menus=Menu::all();
            $menus=$menus->sortBy('title', SORT_NATURAL);
           return view('management.menus.index')->with([
                'menus'=>$menus,
                "categories"=>Category::all()

            ]);
        }


    }
}
