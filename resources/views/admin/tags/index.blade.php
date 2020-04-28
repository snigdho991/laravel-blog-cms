@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		All Tags
	</div>

	<div class="panel-body">
		<table class="table table-hover table-striped">
			<thead>
				<th>
					Name
				</th>

				<th>
					Edition
				</th>

				<th>
					Deletion
				</th>
			</thead>

			<tbody>
			@if($tags->count() > 0)
				@foreach($tags as $tag)
				<tr>
					<td>
						{{ $tag->tag }}
					</td>

					<td>
						<a href="{{ route('tag.edit', ['id' => $tag->id]) }}" class="btn btn-xs btn-primary">
							Edit
						</a>
					</td>

					<td>
						<a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-xs btn-danger">
							Delete
						</a>
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<th colspan="5" class="alert alert-default text-center">Tag not found !</th>
				</tr>
			@endif
			</tbody>
		</table>
	</div>
</div>

@stop