@extends('layout.base')

@section('title', 'Writers - Writer Heaven')

@section('style')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
    </style>
@endsection

@section('scripts')

@endsection

@section('body')

    <div class="container">

        @include('partials.header')

        @include('partials.submenu')

    </div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">

      @include('partials.edit-blog-input')

    </div><!-- /.blog-main -->

  </div><!-- /.row -->

</main><!-- /.container -->

    @include('partials.footer')

@endsection