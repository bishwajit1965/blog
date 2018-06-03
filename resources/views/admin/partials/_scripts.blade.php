<!-- jQuery 3 -->
<script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
{{-- <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script> --}}

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Slimscroll -->
<script src="{{asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- FastClick -->
<script src="{{asset('admin/bower_components/fastclick/lib/fastclick.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>

<!-- fullCalendar -->
<script src="{{asset('admin/bower_components/moment/moment.js')}}"></script>

<!-- CK Editor -->
<script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>

<script src="{{asset('admin/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"></script>

{{-- Tool tip --}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Page specific script -->
@yield('scripts')

<!-- Fade out bootstrap alert messages -->
<script type="text/javascript">
  $(document).ready(function () {
  window.setTimeout(function() {
      $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
          $(this).remove(); 
      });
    }, 3000);
  });
</script>

{{-- Sidebar --}}
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

{{-- Tool tip --}}
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
  });
</script>