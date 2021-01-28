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
                            <h3 class="text-secondary"><i class="fas fa-chair"></i> Tables </h3>
                            <a href="{{route('tables.create')}}" class="btn btn-primary"> <i class="fas fa-plus fa-x2"></i></a>
                            </div>
                            <table class=" table table-hover table-responsive-sm">
                            <thead>
                            <th>ID</th>
                            <th>Nom de la table</th>
                            <th>Disponible</th>
                            <th>Action </th>
                            </thead>
                            @foreach($tables as $table)
                            <tbody>
                           
                            <td>{{$table->id}}</td>
                            <td>{{$table->names}}</td>
                            <td>
                            @if($table->statu === "oui")
                            <span class="badge badge-success"> oui </span>
                            @elseif($table->statu === "non")
                            <span class="badge badge-danger"> non </span>
                            @endif
                            </td>
                            <td class="d-flex flex-row justify-content-center align-items-center">
                            <a href="{{route('tables.edit', $table->slug )}}" class="btn btn-warning">  editer </a>
                           <form id="{{$table->id}}"
                           action="{{route('tables.destroy', $table->slug )}}" method="post">
                           @csrf
                           @method("delete")
                            <button
                            onclick="
                            event.preventDefault();
                            if(confirm('voulez vous supprimer la categories {{$table->names}} ?'))
                            document.getElementById({{$table->id}}).submit()
                            "
                             class="btn btn-danger">supprimer </button></form>

                            </td>
                            @endforeach
                            </tbody>
                            </table>
                            <div class="my-3 d-flex justify-content-center align-items-center">
                            {{$tables->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 