<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials.title-meta')

  @include('partials.head-css')
</head>

<body>

  <div class="wrapper">

    @include('partials.sidenav')

    <!-- Start Page Content here -->
    <div class="page-content">

      @include('partials.topbar')

      <main>

        @include('partials.page-title')

        @yield('content')
      </main>

      {{-- @include('partials.footer') --}}

    </div>
    <!-- End Page content -->

  </div>

  @include('partials.footer-scripts')

  @stack('js')

</body>

</html>
