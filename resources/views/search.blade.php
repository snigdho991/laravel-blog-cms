@extends('layouts.frontend')

@section('content')

<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Search Keyword : {{ $query }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">
        @if($posts->count() > 0)
                <div class="case-item-wrap">
            @foreach($posts as $post)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item">
                            <div class="case-item__thumb">
                                <img src="{{ $post->featured }}" alt="our case">
                            </div>
                            <h6 class="case-item__title"><a href="{{ route('post.single', ['slug' => $post->slug]) }}">{{ $post->title }}</a></h6>
                        </div>
                    </div>
            @endforeach
                </div>
        @else
                <h1 class="text-center">No post available with this keyword.</h1>
        @endif
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>
            

        </main>
    </div>
</div>

@stop

@section('styletoast')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
@stop

@section('scripttoast')
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script type="text/javascript">
        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}")  
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")  
        @endif
    </script>

@stop

