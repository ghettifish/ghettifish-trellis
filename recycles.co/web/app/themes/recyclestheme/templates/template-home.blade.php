{{--
  Template Name: Home Page Template
--}}

@extends('layouts.base')

  @while(have_posts()) @php(the_post())
    @include('partials.home-hero')
    @include('partials.content-page')
  @endwhile
