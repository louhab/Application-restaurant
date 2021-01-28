<?php

namespace App\Http\Controllers;
use App\Table;
use App\Category;
use App\Servants;

use Illuminate\Http\Request;

class PayementController extends Controller
{
   public function index(){
       return view('payement.index')->with([
           "tables"=>Table::all(),
           "categories"=>Category::all(),
           "servants"=>Servants::all()
       ]);
   }
}
