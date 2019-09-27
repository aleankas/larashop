@extends('layouts.global')
@section('title') Edit Category @endsection
@section('content')
<div class="col-md-8">
	<form action="{{route('categories.update', [$category->id])}}" enctype="multipart/form-data" method="POST" class="bg-white shadow-sm p-3">
		@csrf
		<input type="hidden" value="PUT" name="_method">
		<label>Category name</label> <br>
		<input type="text" class="form-control" value="{{$category->name}}" name="name">
		<br><br>

		<label>Cateogry slug</label>
		<input type="text" class="form-control" value="{{$category->slug}}" name="slug">
		<br><br>
		
		<span>Current image</span><br>
		@if($category->image != 'no-img')
		<img src="{{asset('storage/'. $category->image)}}" width="120px">
		@else
		N/A
		@endif
		<br><br>

		<input type="file" class="form-control" name="image">
		<small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
		<br><br>

		<input type="submit" class="btn btn-primary" value="Update">
		
	</form>
</div>
@endsection