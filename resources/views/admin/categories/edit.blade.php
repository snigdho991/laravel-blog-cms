@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

<style type="text/css">
	input[type="file"] {
    display: block;
    padding: 0px;
}
</style>

	<div class="panel panel-default">
		<div class="panel-heading">
			Update Category : <b>{{ $category->name }}</b>   
		</div>

		<div class="panel-body">			
			<form action="{{ route('category.update', ['id' => $category->id]) }}" method="post">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" value="{{ $category->name }}" class="form-control">
				</div>

				<div class="form-group text-center">
					<button class="btn btn-success" type="submit">
						Update Category
					</button>
				</div>

			</form>
		</div>
	</div>
	
@stop