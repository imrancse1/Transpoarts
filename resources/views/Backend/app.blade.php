@include('Backend._partials.top')
<div class="wrapper">
  @include('Backend._partials.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content-header')
    @include('Backend.common.message')
    <!-- Main content -->
     @yield('main-content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('Backend.common.modal')
  @include('Backend._partials.footer')
</div>
<!-- ./wrapper -->
@yield('script')
@include('Backend._partials.bottom')
