@extends('layouts.app')

@section('front-hero')
  @include('partials.front-hero')
@endsection

@section('posts')
 <h1> Latest posts</h1>
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.content')
  @endwhile
  {!! get_the_posts_navigation() !!}
@endsection
