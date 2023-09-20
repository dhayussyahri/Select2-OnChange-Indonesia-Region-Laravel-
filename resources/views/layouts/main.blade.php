<!DOCTYPE html>
<html lang="en">
<head>
  @include('partials.head')
  @stack('css')
</head>
<body id="page-top">
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <div id="layoutSidenav_content">
                <main>
                    <!-- Main page content-->
                    @stack('css')
                    @yield('container')
                    @stack('script')
                </main>
                {{-- footer --}}
                @include('partials.footer')
            </div>
        </div>
        {{-- script --}}
          @include('partials.script')
          @stack('script')
</body>

</html>