@extends('layouts.global')
@section('title') Category @endsection
@section('content')
<div class="col-md-8">
	@if(session('status'))
	<div class="alert alert-success">
		{{session('status')}}
	</div>
	@endif
	
</div>
@endsection