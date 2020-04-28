@extends('layouts.app')


@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		All Trashed Posts
	</div>

	<div class="panel-body">
		<table class="table table-hover table-striped">
			<thead>
				<th>
					Image
				</th>

				<th>
					Title
				</th>

				<th>
					Edition
				</th>

				<th>
					Retrieve
				</th>

				<th>
					Destroy
				</th>
			</thead>

			<tbody>
			@if($posts->count() > 0)
				@foreach($posts as $post)
				<tr>
					<td>
						<img src="{{ $post->featured }}" alt="{{ $post->title }}" height="30px" width="50px">
					</td>
					
					<td>
						{{ $post->title }}
					</td>

					<td>
						<a href="{{ route('post.editTrashed', ['id' => $post->id]) }}" class="btn btn-xs btn-primary">
							Edit
						</a>
					</td>

					<td>
						<a href="{{ route('post.restore', ['id' => $post->id ]) }}" class="btn btn-xs btn-success">
							Restore
						</a>
					</td>

					<td>
						<a href="{{ route('post.kill', ['id' => $post->id ]) }}" class="btn btn-xs btn-danger">
							Delete
						</a>
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<th colspan="5" class="alert alert-default text-center">No trashed post available !</th>
				</tr>
			@endif
			</tbody>
		</table>
	</div>
</div>

@stop