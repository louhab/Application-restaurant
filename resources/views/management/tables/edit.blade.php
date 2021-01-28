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
                            <div class="d-flex flex-row justify-content-between align-items-center border-bottom bp-1 mb-3 ">
                            <h3 class="text-secondary"><i class="fas fa-plus"></i> modifier la  table {{$table->names}} </h3>
                            <a href="{{route('tables.index')}}" class="btn btn-primary"> <i class="fas fa-home fa-x2"></i></a>
                            </div>
                            <form method="post" action="{{route('tables.update',$table->slug)}}" class="mb-3">
                             @method("put")
                             @csrf 
                             <div class="form-group">
                                 <input type="text" name="names" value="{{$table->names}}" id="" class="form-control">
                             </div>
                             <div class="form-group">
                                <select name="statu" id="statu" class="form-control">
                                <option value="" disabled > Disponible </option>
                                <option {{$table->statu ==="oui" ? "selected" : ""}}  > oui </option>
                                <option  {{$table->statu ==="non" ? "selected" : ""}} > non </option>
                                </select>
                             </div>
                             <div class="form-group">
                              <button class="btn btn-primary"> valider </button>
                             </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 