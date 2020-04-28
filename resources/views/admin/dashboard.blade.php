@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            Dashboard
        </div>

        <div class="panel-body">
        	Welcome back, <a href="{{ route('user.profile') }}"><b>{{ Auth::user()->name }}</b></a><br>
        	Role :
            @if (Auth::user()->admin == 1)
				<b>Admin</b>
			@elseif(Auth::user()->admin == 0)
				<b>Author</b>
			@endif
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-info">
            <div class="panel-heading text-center" style="text-transform: uppercase;">
                Posted
            </div>
            <div class="panel-body">
                <h1 class="text-center" style="text-transform: uppercase;">
                    {{ $posts_count }}
                </h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-danger">
            <div class="panel-heading text-center" style="text-transform: uppercase;">
                Trashed Posts
            </div>
            <div class="panel-body">
                <h1 class="text-center">
                    {{ $trashed_count }}
                </h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-success">
            <div class="panel-heading text-center" style="text-transform: uppercase;">
                Users
            </div>
            <div class="panel-body">
                <h1 class="text-center">
                    {{ $users_count }}
                </h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-warning">
            <div class="panel-heading text-center" style="text-transform: uppercase;">
                Categories
            </div>
            <div class="panel-body">
                <h1 class="text-center">
                    {{ $categories_count }}
                </h1>
            </div>
        </div>
    </div>
        
@endsection
