{{--
  Template Name: Home Page Template
--}}

@extends('layouts.homebase')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.home-hero')
    @include('partials.section1')
    @include('partials.section2')
    @include('partials.section')
    @include('partials.content-page')
    @php(do_action('get_header'))
    @include('partials.header')
  @endwhile
@endsection
