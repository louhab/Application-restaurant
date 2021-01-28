@extends('layouts.app')
@section('content')

<div class="container">
    <div class="justify-content-center row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                           @include('layouts.seidebar')
                           <div class="card">
                           <div class="card-body">
                           <h5 class="font-weight-bold mt-2"> CHoisir la categories </h5>
                      
                           <ul class="list-group mb-3">
                           @foreach($categories as $categorie )
                            <a href="{{route('menus.show',$categorie->id)}}"
                            class="list-group-item 
                            font-wight-bold
                            list-group-item-action
                            list-group-item-light">{{$categorie->title}}</a>
                            @endforeach
                            </ul>
                           
                           </div>
                           </div>
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex flex-row justify-content-between align-items-center border-bottom bp-1">
                            <h3 class="text-secondary"><i class="fas fa-clipboard-list"></i> Prduits </h3>
                            
                            <a href="{{route('menus.create')}}" class="btn btn-primary"> <i class="fas fa-plus fa-x2"></i></a>
                            </div>
                            
                            
                            
                            <form action="{{route('menu.trie')}}" method="post">
                            @csrf
                            <div class="col-md-4">
                            <select name="tries" id="" class="form-control mt-2">
                            <option value="" selected disabled class="font-weight-bold " >Trier par :</option>
                            
                            <option value="price">
                           prix  
                             </option>
                            <option value="name">
                           nom
                            </option>
                            </select>
                            <button class="btn btn-primary mt-2 ">tirer </button>
                            </div>
                            
                            </form>
                           
                            
                            <table class=" table table-hover table-responsive-sm mt-2">
                            <thead>
                            <th>title</th>
                  
                            <th>description </th>
                            <th>price </th>
                            <th>image </th>
                            <th>category </th>
                            <th>Action </th>
                            </thead>
                            @foreach($menus as $menu)
                            <tbody>
                           
                            <td>{{$menu->title}}</td>
                            
                            <td>{{substr($menu->dexcription,0,100)}}</td>
                            <td>{{$menu->price}} DH </td>
                            <td><img src="{{asset('images/menu/'.$menu->image)}}" alt="{{$menu->image}}" class="fluid" width="60" height="60"></td>
                            <td>{{$menu->category->title}}</td>
                            <td class="d-flex flex-row justify-content-center align-items-center">
                            <a href="{{route('menus.edit',$menu->slug )}}" class="btn btn-warning">  editer </a>
                           <form id="{{$menu->id}}"
                           action="{{route('menus.destroy',$menu->slug )}}" method="post">
                           @csrf
                           @method("delete")
                            <button
                            onclick="
                            event.preventDefault();
                            if(confirm('voulez vous supprimer Menu {{$menu->title}} ?'))
                            document.getElementById({{$menu->id}}).submit()
                            "
                             class="btn btn-danger">supprimer </button></form>

                            </td>
                            @endforeach
                            </tbody>
                            </table>
                            <div class="my-3 d-flex justify-content-center align-items-center">
                              <a href="{{route('menus.index')}}" class="btn btn-primary">tous les produits </a>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 