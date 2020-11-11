@extends('layout.base')

@section('title', 'All Authors')

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
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        Our Estemeed Authors
      </h3>

    @foreach($users as $user)

          @include('partials.author')

    @endforeach


    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      @include('partials.about')
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

    @include('partials.footer')

@endsection