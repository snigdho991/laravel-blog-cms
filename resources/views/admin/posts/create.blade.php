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
			Create a new post
		</div>

		<div class="panel-body">			
			<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control">
				</div>

				
				<div class="form-group">
					<label for="featured">Featured Image</label>
					<input type="file" name="featured" class="form-control">
				</div>

				<div class="form-group">
					<label for="category">Select a Category</label>
					<select name="category_id" id="category" class="form-control">
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="tags">Select Tags</label>
						@foreach($tags as $tag)
							<div class="checkbox">
								<label><input type="checkbox" name="tags[]" style="cursor: pointer;" value="{{ $tag->id }}"> {{ $tag->tag }} </label>
							</div>
						@endforeach
				</div>

				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" id="content" cols="5" rows="6" class="form-control"></textarea>
				</div>

				<div class="form-group text-center">
					<button class="btn btn-success" type="submit">
						Store Post
					</button>
				</div>

			</form>
		</div>
	</div>
	
@stop

@section('styles')
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">	

	<!-- <link href="{{ asset('css/summernote.min.css') }}" rel="stylesheet"> -->
	
@stop

@section('scripts')
	<script src="{{ asset('js/summernote.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		 	$('#content').summernote();
		});
	</script>
@stop