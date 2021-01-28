<?php

namespace App\Http\Controllers;

use App\Servants;
use Illuminate\Http\Request;

class ServantsController extends Controller
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
        return view('management.serveurs.index')->with([
            "serveurs"=>Servants::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("management.serveurs.create");
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
            "names"=>"required | min :3"
        ]);
        $names=$request->names;
        $adresse=$request->adresse;
       // dd($names,$adresse);
       $serveurs=new Servants;
       $serveurs->names=$names;
       $serveurs->adesse=$adresse;
       $serveurs->save();
   
        return redirect()->route("serveurs.index")->with([
            'success'=>" la creation a ete faite !"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function show(Servants $servants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('management.serveurs.edite')->with([
            "serveur"=>Servants::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $names=$request->names;
        $adresse=$request->adresse;
       $servants=Servants::find($id); 
       $servants->names=$names;
       $servants->adesse=$adresse;
       $servants->save();
        return redirect()->route("serveurs.index")->with([
            'success'=>" la modefication  a ete faite !"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $serveur=Servants::find($id);
        $serveur->delete();
        return redirect()->route("serveurs.index")->with([
            'success'=>" la suppression a ete faite !"
        ]);
    }
}
