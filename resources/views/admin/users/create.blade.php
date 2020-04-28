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
			Create a new tag
		</div>

		<div class="panel-body">			
			<form action="{{ route('user.store') }}" method="post">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" class="form-control">
				</div>

				<div class="form-group">
					<label for="name">E-mail</label>
					<input type="email" name="email" class="form-control">
				</div>

				<div class="form-group text-center">
					<button class="btn btn-success" type="submit">
						Store User
					</button>
				</div>

			</form>
		</div>
	</div>
	
@stop