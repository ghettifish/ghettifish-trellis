<section class="section2">
  @php($image = get_field("section2_image"))

  <div class="row">
    <div class="col-md-6">
      <h2 class="section2_title">{{get_field( "section2_title" )}}</h2>
      <p>{!! get_field( "section2_body" ) !!}</p>
      <a href="{{ get_field( "section2_btn_url" )}}" class="btn btn-primary" role="button">{{ get_field("section2_btn_text") }}</a>
    </div>
    <div class="col-md-6">
      @if (isset($image) === false)
      @elseif (isset($image) === 'unknown')
      @else
        <img src="{{$image['url']}}" class="img-fluid">
      @endif
    </div>
  </div>
</section>
