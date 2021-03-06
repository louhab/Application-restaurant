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
                            <h3 class="text-secondary"><i class="fas fa-plus"></i> Ajouter une table </h3>
                            <a href="{{route('tables.index')}}" class="btn btn-primary"> <i class="fas fa-home fa-x2"></i></a>
                            </div>
                            <form method="post" action="{{route('tables.store')}}" class="mb-3">
                             @csrf 
                             <div class="form-group">
                                 <input type="text" name="name" id="" class="form-control">
                             </div>
                             <div class="form-group">
                                <select name="statu" id="statu" class="form-control">
                                <option value="oui">oui </option>
                                <option value="non"> non </option>
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