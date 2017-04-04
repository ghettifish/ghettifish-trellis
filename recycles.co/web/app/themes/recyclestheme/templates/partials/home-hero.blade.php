@php($image = get_field('hero_image'))

<section class"jumbotron jumbotron-fluid" style="background: url({{$image['url']}}) no-repeat center center fixed;  background-size: cover; height: 100vh; padding:25vh 5vh;">
  <div class="col-md-6">
    <h1 class="display-6">{{get_field( "hero_heading" )}}</h1>
    <p>{{get_field( "hero_text" )}}</p>
  </div>
</section>
