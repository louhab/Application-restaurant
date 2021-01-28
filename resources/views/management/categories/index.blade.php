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
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex flex-row justify-content-between align-items-center border-bottom bp-1">
                            <h3 class="text-secondary"><i class="fas fa-th-list"></i> Categories</h3>
                            <a href="{{route('categories.create')}}" class="btn btn-primary"> <i class="fas fa-plus fa-x2"></i></a>
                            </div>
                            <table class=" table table-hover table-responsive-sm">
                            <thead>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Action </th>
                            </thead>
                            @foreach($categories as $category)
                            <tbody>
                           
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>
                            <td class="d-flex flex-row justify-content-center align-items-center">
                            <a href="{{route('categories.edit', $category->slug )}}" class="btn btn-warning">  editer </a>
                           <form id="{{$category->id}}"
                           action="{{route('categories.destroy', $category->slug )}}" method="post">
                           @csrf
                           @method("delete")
                            <button
                            onclick="
                            event.preventDefault();
                            if(confirm('voulez vous supprimer la categories {{$category->title}} ?'))
                            document.getElementById({{$category->id}}).submit()
                            "
                             class="btn btn-danger">supprimer </button></form>

                            </td>
                            @endforeach
                            </tbody>
                            </table>
                            <div class="my-3 d-flex justify-content-center align-items-center">
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 