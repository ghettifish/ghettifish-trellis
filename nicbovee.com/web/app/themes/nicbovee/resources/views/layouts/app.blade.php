<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    @php(do_action('get_header'))
    @include('partials.header')
    @yield('front-hero')
    <div class="wrap container-fluid" role="document">
      <div class="content">
        <main class="main container">
          @yield('posts')
          <div class="row">
            <div class="col-md-7">
              @yield('content')
            </div>
            <aside class="sidebar offset-md-1 col-md-4">
              @include('partials.sidebar')
            </aside>
          </div>
        </main>


      </div>
    </div>
    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>
