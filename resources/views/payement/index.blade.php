@extends('layouts.app')
@section('content')

<div class="container">
    <form id="add-sale" action="{{route('sales.store')}}" method="post">
        @csrf
        <div class="justify-content-center row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-3">
                       <div class="form-group">
                        <a href="/home" class="btn btn-outline-secondary"><i class="fas fa-chevron-left"></i> Home </a>
                       </div>
                    </div>
                
                
                     <div class="my-2 col-md-4">
                     <h3 class="text-muted border-bottom">
                     {{Carbon\Carbon::now()}}
                     </h3>
                     </div>
                

                    <div class="col-md-2 mb-3">
                       <div class="form-group">
                        <a href="{{route('sales.index')}}" class="btn btn-outline-secondary"> Toutes les ventes  </a>
                       </div>
                    </div>
                </div>
                    
              <div class="card">
                <div class="card-body">
                <div class="row">
                @foreach($tables as $table)
                <div class="col-md-3 ">
                <div class="card p-2 
                mb-2 d-flex flex-column 
                justify-contenet-center 
                align-items-center 
                list-group-item-action">
                    <div class="align-self-end">
                    
                    <input type="checkbox" name="table_id[]" id="table" value="{{$table->id}}">
                   
                    </div>
                    <i class="fas fa-chair fa-5x">
                    </i>
                    <span class="mt-2 text-muted font-weight-bold">
                    {{$table->names}}
                    </span>
                    <div class="card p-2 
                mb-2 d-flex flex-column 
                justify-contenet-betwen 
                align-items-center 
                list-group-item-action">
                        <a href="#" class="btn btn-warning"> <i class="fas fa-print"></i>  </a>
                       </div>
                  <hr>
                  @foreach($table->sales as $sale)
                  @if($sale->created_at >= Carbon\Carbon::today())
                  <div class="mb-2 mt-2 shadow w-100" id="{{$sale->id}}" style="border:dashed pink">
                  <div class="card">
                  <div class="card-body d-flex flex-column justify-contenet-center align-items-center list-group-item-action">
                  @foreach($sale->menus()->where("sales_id",$sale->id)->get() as $menu)
                  <h5 class="font-weight-bold mt-2">
                  {{$menu->title}}
                  </h5>
                  <span class="text-muted">
                  {{$menu->price}}DH
                  </span>
                  @endforeach
                  <h5 class="font-weight-bold mt-2">
                 <span class=" badge badge-danger">
                Ser : {{$sale->servant->names}}
                 </span>
                  </h5>
                  <h5 class="font-weight-bold mt-2">
                 <span class=" badge badge-danger">
                qte : {{$sale->quentity}}
                 </span>
                  </h5>
                  <h5 class="font-weight-bold mt-2">
                 <span class=" badge badge-danger">
                total : {{$sale->totale_price}} DH 
                 </span>
                  </h5>
                  <h5 class="font-weight-bold mt-2">
                 <span class=" badge badge-danger">
                statu : {{$sale->payement_statu}}  
                 </span>
                  </h5>
                  
                  </div>
                  </div>
                  </div>
                  @endif
                  @endforeach

                </div>
                </div>
                @endforeach
                </div>
                </div>
              </div>     
            </div>
        </div>  
        <div class="row justify-content-center mt-2">
        <div class="col-md-12 card p-3">
        <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
           @foreach($categories as $category)
             <li class="nav-item">
               <a href="#{{$category->slug}}" 
               class="nav-link mr-1 {{$category->slug==="salade-maroccaine" ? "active" : " " }} "
               id="{{$category->slug}}-tab"
               data-toggle="pill"
               role="tab"
               aria-controls="{{$category->slug}}"
               aria-selected="true"
               > {{$category->title}}</a>
             </li>
           @endforeach
          </ul>
          <div class="tab-content" id="pills-tabcontent">
          @foreach($categories as $category)
          <div class="tab-pane fade {{$category->slug==="salade-maroccaine" ? " active show " : " " }}"
           id="{{$category->slug}}"
           role="tabpanel"
           aria-labelledby="pills-home-tab" 
           >
           <div class="row">
           @foreach($category->menus as $menu)
           <div class="col-md-4 mb-2">
           <div class="card h-100">
           <div class="card-body
           d-flex flex-column 
                justify-contenet-center
             align-items-center">
             <div class="align-self-end">
                <input type="checkbox" name="menu_id[]" id="menu" value="{{$menu->id}}">      
             </div>
             <img src="{{asset('images/menu/'.$menu->image)}}"
                 alt="{{$menu->image}}"
                  class="img-fluid rounded-circle"
                   width="100" 
                   height="100">
                <h5 class="font-weight-bold mt-2">{{$menu->title}}</h5>
                <h5 class="text-muted">{{$menu->price}} DH </h5>   
             </div>
           </div>
           </div>
           @endforeach
           </div>
           
           </div>
           
          @endforeach

          </div>
          <div class="row">
           <div class="col-md-6 mx-auto">
           <div class="form-group">
           <select name="servant_id" id="" class="form-control">
           <option value="" selected disabled> Serveur</option>
           @foreach($servants as $servant)
           <option value="{{$servant->id}}">{{$servant->names}}</option>
           @endforeach
           </select>
           </div>
           <div class="input-group mb-3">
           <span class="input-group-text">Qte</span>
            <input type="number" class="form-control" name="qte" >
            
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text">prix totale  </span>
            <input type="number" class="form-control" name="total_price" >
            
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text">totale recue </span>
            <input type="number" class="form-control" name="total_received" >
            
            </div>
            <div class="input-group mb-3">
            <span class="input-group-text">Reste </span>
            <input type="number" class="form-control" name="change" >
            
            </div>
            <div class="form-group">
           <select name="payment_type" id="" class="form-control">
           <option value="" selected disabled> Type de payment </option>
           
           <option value="cash"> Espece </option>
           <option value="card"> card bancaire </option>
          
           </select>
           </div>
           <div class="form-group">
           <select name="payment_statu" id="" class="form-control">
           <option value="" selected disabled>  statue de payment  </option>
           
           <option value="piad"> Paye </option>
           <option value="impiad"> impaye  </option>
          
           </select>
           </div>
           <div class="form-group">
           <button 
           onclick="event.preventDefault();
           document.getElementById('add-sale').submit();
                      "
           class="btn btn-primary"           
           > valider </button>
           </div>
           </div>
        </div>
        </div>
       </div>
     </form> 
    
</div>
@endsection 