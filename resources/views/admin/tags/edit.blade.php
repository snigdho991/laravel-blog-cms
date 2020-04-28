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
			Update Tag : <b>{{ $tag->tag }}</b>   
		</div>

		<div class="panel-body">			
			<form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Tag</label>
					<input type="text" name="tag" value="{{ $tag->tag }}" class="form-control">
				</div>

				<div class="form-group text-center">
					<button class="btn btn-success" type="submit">
						Update Tag
					</button>
				</div>

			</form>
		</div>
	</div>
	
@stop