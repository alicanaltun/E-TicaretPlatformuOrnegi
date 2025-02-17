<footer class="main-footer">
    <strong>Copyright &copy; 2024 </strong>
    Tüm hakları saklıdır.
    <div class="float-right d-none d-sm-inline-block">
    </div>
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    $('[data-mask]').inputmask()

    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    $('#reservation').daterangepicker()
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    $('.duallistbox').bootstrapDualListbox()

    $('.my-colorpicker1').colorpicker()
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>

<script>
    $(document).ready(function() {
        $('#example2').DataTable({
            "oLanguage": {
                    "oPaginate": {
                        "sFirst": "İlk",
                        "sLast": "Son",
                        "sNext": "Sonraki",
                        "sPrevious": "Önceki"
                    },
                    "sInfo": "Toplam _TOTAL_ kayıttan _START_ ile _END_ arasındakiler gösteriliyor",
                    "sInfoEmpty": "Gösterilecek kayıt yok",
                    "sInfoFiltered": "(_MAX_ kayıt içerisinden filtrelendi)",
                    "sLengthMenu": "Göster _MENU_ kayıt",
                    "sLoadingRecords": "Yükleniyor...",
                    "sProcessing": "İşleniyor...",
                    "sSearch": "Ara:",
                    "sZeroRecords": "Eşleşen kayıt bulunamadı",
                    "sEmptyTable": "Tabloda veri yok"
                },
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>