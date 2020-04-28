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
			Update Website Settings
		</div>

		<div class="panel-body">			
			<form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="title">Site Name</label>
					<input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}">
				</div>

				<div class="form-group">
					<label for="featured">Contact Number</label><br>
					<input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
				</div>

				<div class="form-group">
					<label for="featured">Contact Email</label><br>
					<input type="text" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
				</div>

				<div class="form-group">
					<label for="address">Address</label><br>
					<input type="text" name="address" class="form-control" value="{{ $settings->address }}">
				</div>

				<div class="form-group">
					<label for="site_about">About</label>
					<textarea name="site_about" id="address" cols="5" rows="6" class="form-control">{{ $settings->site_about }}</textarea>
				</div>

				<div class="form-group text-center">
					<button class="btn btn-success" type="submit">
						Update Settings
					</button>
				</div>

			</form>
		</div>
	</div>
	
@stop