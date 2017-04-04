<section class="section1">
  @php($image = get_field("section1_image"))

  <div class="row">
    <div class="col-md-6">
      @if (isset($image) === false)
      @elseif (isset($image) === 'unknown')
      @else
        <img src="{{$image['url']}}" class="img-fluid">
      @endif

    </div>

    <div class="col-md-6">
      <h2 class="section1_title">{{get_field( "section1_title" )}}</h2>
      <p>{!! get_field( "section1_body" ) !!}</p>
      <a href="{{ get_field( "section1_btn_url" )}}" class="btn btn-primary" role="button">{{ get_field("section1_btn_text") }}</a>
    </div>
  </div>
</section>
