<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TableController extends Controller
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
        return view('management.tables.index')->with([
            "tables"=>Table::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $name=$request->name;
        $statu=$request->statu;
        $slug=Str::slug($name);
        $table=new Table;
        $table->names=$name;
        $table->slug=$slug;
        $table->statu=$statu;
        $table->save();
     
        return redirect()->route("tables.index")->with([
            'success'=>" la creation a ete faite !"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view('management.tables.edit')->with([
            "table"=>$table
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        // $this->validate($request,[
        //     "title"=>"required | unique :tables,names,".$table->id,
        //     "statu"=>"required | boolean "
        // ]);
        $names=$request->names;
        $statu=$request->statu;
        $slug=Str::slug($names);
        // dd($title,$statu,$slug);
        //dd($table->names);
        $table->names=$names;
        $table->slug=$slug;
        $table->statu=$statu;
        $table->save();

        return redirect()->route("tables.index")->with([
            'success'=>" la modefication  a ete faite !"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->delete();
           return redirect()->route("tables.index")->with([
               'success'=>" la suppression a ete faite !"
           ]);
    }
}
