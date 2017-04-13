<header class="banner">
<nav class="navbar navbar-toggleable-md ">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a href="{{ home_url('/') }}" class="navbar-brand"></a>
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav', 'walker' => new WP_Bootstrap_Navwalker()]) !!}
      @endif
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>
</header>
