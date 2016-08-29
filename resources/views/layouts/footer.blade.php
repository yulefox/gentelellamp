      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Lamp - by <a href="https://github.com/yulefox">Yule Fox</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
    <!-- /main-containter -->
  </div>
  <!-- /containter body -->
  @yield('extend-content')

  <!-- jQuery -->
  <script src="/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="/vendors/nprogress/nprogress.js"></script>

  @if (in_array('icheck', $widgets))
  <!-- iCheck -->
  <script src="/vendors/iCheck/icheck.min.js"></script>
  @endif

  @if (in_array('datatable', $widgets))
  <!-- Datatables -->
  <script src="/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
  <script src="/vendors/jszip/dist/jszip.min.js"></script>
  <script src="/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="/vendors/pdfmake/build/vfs_fonts.js"></script>
  @endif

  @if (in_array('smart_wizard', $widgets))
  <!-- jQuery Smart Wizard -->
  <script src="/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
  @endif

  @if (in_array('select2', $widgets))
  <!-- Select2 -->
  <script src="/vendors/select2/dist/js/select2.full.min.js"></script>
  @endif

  @if (in_array('fullcalendar', $widgets))
  <!-- FullCalendar -->
  <script src="/vendors/moment/min/moment.min.js"></script>
  <script src="/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
  @endif

  @if (in_array('pnotify', $widgets))
  <!-- PNotify -->
  <script src="/vendors/pnotify/dist/pnotify.js"></script>
  <script src="/vendors/pnotify/dist/pnotify.buttons.js"></script>
  @endif

  @yield('script-import')

  <!-- Custom Theme Scripts -->
  <script src="/vendors/gentelella/js/custom.min.js"></script>

  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });
  </script>

  @yield('script-custom')
</body>
</html>
