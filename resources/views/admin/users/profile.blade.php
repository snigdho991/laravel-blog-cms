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
			Edit Profile Information
		</div>

		<div class="panel-body">			
			<form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" value="{{ $user->name }}" class="form-control">
				</div>

				<div class="form-group">
					<label for="name">E-mail</label>
					<input type="email" name="email" value="{{ $user->email }}" class="form-control">
				</div>

				<div class="form-group">
					<label for="name">New Password</label>
					<input type="password" name="password" class="form-control">
				</div>

				<div class="form-group">
					<label for="featured">Featured Avatar</label><br>
					<img src="{{ asset($user->profile->avatar) }}" alt="Avatar" height="75px" width="125px">
				</div>

				<div class="form-group">
					<label for="featured">Upload new avatar</label>
					<input type="file" name="avatar" class="form-control">
				</div>

				<div class="form-group">
					<label for="about">About You</label>
					<input type="text" name="about" value="{{ $user->profile->about }}" class="form-control">
				</div>

				<div class="form-group">
					<label for="facebook">Facebook</label>
					<input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
				</div>

				<div class="form-group">
					<label for="youtube">Youtube</label>
					<input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control">
				</div>

				<div class="form-group text-center">
					<button class="btn btn-success" type="submit">
						Edit Profile
					</button>
				</div>

			</form>
		</div>
	</div>
	
@stop