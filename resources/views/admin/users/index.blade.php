@extends('layouts.app')


@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		All Users
	</div>

	<div class="panel-body">
		<table class="table table-hover table-striped">
			<thead>
				<th>
					Avatar
				</th>

				<th>
					Name
				</th>

				<th>
					E-mail
				</th>

			@if (Auth::user()->admin)
				<th>
					Permissions
				</th>
			@endif

				<th>
					Deletion
				</th>
			</thead>

			<tbody>
			@if($users->count() > 0)
				@foreach($users as $user)
				<tr>
					<td>
						<img src="{{ asset($user->profile->avatar) }}" alt="" height="30px" width="30px" style="border-radius: 50%;">
					</td>
					
					<td>
						{{ $user->name }}
					</td>

					<td>
						{{ $user->email }}
					</td>
			@if (Auth::user()->admin)
					<td>
					@if (Auth::id() !== $user->id)
						@if ($user->admin)
							<a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-primary">
								Remove Admin
							</a>
						@else
							<a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">
								Make Admin
							</a>
						@endif
					@endif
					</td>
			@endif
					<td>
				@if (Auth::id() !== $user->id)
					@if($user->admin !== 1)
						<a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">
							Delete
						</a>
					@endif
				@endif
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<th colspan="5" class="alert alert-default text-center">No users available !</th>
				</tr>
			@endif
			</tbody>
		</table>
	</div>
</div>

@stop