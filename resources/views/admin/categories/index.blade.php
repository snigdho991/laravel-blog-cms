@extends('layouts.app')


@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		All Categories
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
			@if($categories->count() > 0)
				@foreach($categories as $category)
				<tr>
					<td>
						{{ $category->name }}
					</td>

					<td>
						<a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-xs btn-primary">
							Edit
						</a>
					</td>

					<td>
						<a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-xs btn-danger">
							Delete
						</a>
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<th colspan="5" class="alert alert-default text-center">Category not found !</th>
				</tr>
			@endif
			</tbody>
		</table>
	</div>
</div>

@stop