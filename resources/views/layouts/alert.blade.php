@if($errors->all())
@foreach($errors as $error)
<div class="alert aler-danger">{{$error}}</div>
@endforeach
@endif
@if(session()->has("success"))
<div class="alert alert-sucess alert-dismissible fade show" role="alert"><strong>{{session()->get("success")}}</strong>
<button class="close" type="button" data-dismss="alert" area-label="close"
>
<span>&times;</span>
</button>
</div>
@endif