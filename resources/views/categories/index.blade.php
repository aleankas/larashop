@extends('layouts.global')
@section('title') Category @endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<h1>Category List</h1>
		<a href="{{route('categories.create')}}" class="btn btn-md btn-primary">Add New Category</a><br><br>
		@if(session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
		@endif
		
		<!-- filter category by name -->
		<div class="row">
		  <div class="col-md-6">
		    <form action="{{route('categories.index')}}">
		      <div class="input-group">
		          <input type="text" class="form-control" placeholder="Filter by category name" name="name">
		          <div class="input-group-append">
		            <input type="submit" value="Filter" class="btn btn-primary">
		          </div>
		      </div>
		    </form>
		  </div>
		</div>

		<hr class="my-3">

		<!-- table category list -->
		<table class="table table-bordered table-stripped">
			<thead>
				<tr>
					<th><b>Name</b></th>
					<th><b>Slug</b></th>
					<th><b>Image</b></th>
					<th><b>Actions</b></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $category)
				<tr>
					<td>{{$category->name}}</td>
					<td>{{$category->slug}}</td>
					<td>
						@if($category->image)
						<img src="{{asset('storage/' . $category->image)}}" width="48px"/>
							@else
								No image
						@endif
					</td>
					<td>
						<a href="{{route('categories.edit', [$category->id])}}" class="btn btn-info btn-sm">Edit</a>
						<a href="{{route('categories.show', [$category->id])}}" class="btn btn-primary"> Show </a>
						<form class="d-inline" action="{{route('categories.destroy', [$category->id])}}" method="POST" onsubmit="return confirm('Move category to trash?')" >
							@csrf
						  <input type="hidden" value="DELETE" name="_method">
						  <input type="submit" class="btn btn-danger btn-sm" value="Trash">
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td colSpan="10">
						{{$categories->appends(Request::all())->links()}}
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
@endsection