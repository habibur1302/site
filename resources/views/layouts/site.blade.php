@extends('master')
@section('content')
<div class="container"</div>
<form class="mt-5 pr-3" action="{{ route('import') }}" method="POST"  enctype="multipart/form-data">
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
   <div class="jumbotron ">
      <h4>CSV FILE IMPORT</h4>
      <input type="file" class="form-control-file" name="csvfile"/>
      <button type="submit" class="btn btn-primary btn-lg mt-3">
      Parse CSV
      </button>
   </div>
</form>
</div>
@endsection