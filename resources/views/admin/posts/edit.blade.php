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
			Update Post : <b>{{ $post->title }}</b>
		</div>

		<div class="panel-body">			
			<form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" value="{{ $post->title }}">
				</div>

				<div class="form-group">
					<label for="featured">Featured Image</label><br>
					<img src="{{ $post->featured }}" alt="{{ $post->title }}" height="70px" width="125px">
				</div>

				<div class="form-group">
					<label for="featured">Upload new Image</label>
					<input type="file" name="featured" class="form-control">
				</div>

				<div class="form-group">
					<label for="category">Select a Category</label>
					<select name="category_id" id="category" class="form-control">
						@foreach($categories as $category)
							<option value="{{ $category->id }}"
								
								@if($post->category->id == $category->id)
									selected 
								@endif

							>{{ $category->name }}</option>
						@endforeach
					</select>
				</div>

				
				<div class="form-group">
					<label for="tags">Select Tags</label>
						@foreach($tags as $tag)
							<div class="checkbox">
								<label><input type="checkbox" name="tags[]" style="cursor: pointer;" value="{{ $tag->id }}"
										
										@foreach($post->tags as $t)
											@if($tag->id == $t->id)
												checked="" 
											@endif
										@endforeach
										
									> {{ $tag->tag }} </label>
							</div>
						@endforeach
				</div>

				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" id="content" cols="5" rows="6" class="form-control">{!! $post->content !!}</textarea>
				</div>

				<div class="form-group text-center">
					<button class="btn btn-success" type="submit">
						Update Post
					</button>
				</div>

			</form>
		</div>
	</div>
	
@stop