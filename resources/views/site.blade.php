@extends('master')
@section('content')
   
	<div class="container">

        <div class="row">


   

<form action="{{ route('import') }}" method="POST"  enctype="multipart/form-data">
	{{ csrf_field() }}
	
	@if($errors->all())
<div class="alert alert-danger">
  @foreach($errors->all() as $error)
   <li>{{$error}}</li>
   @endforeach
   </div>
@endif


@if (session()->has('message'))
       <div class="alert alert-success">
			{{session()->get('message')}}
        </div>
    @endif


  

	<div class="form-group">
		<label for="exampleFormControlFile1 mt-10">CSV FILE IMPORT</label>
		<input type="file" class="form-control-file" name="csvfile"/>

	</div>
	<div class="form-group">
		<div class="form-control-file">
			<button type="submit" class="btn btn-primary">
			     Parse CSV
			</button>
		</div>
	</div>
</form>
        </div>
    </div>
    @endsection
	

