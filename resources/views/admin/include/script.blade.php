<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="{{ asset('/assets/admin/node_modules/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap popper Core JavaScript -->

<script src="{{ asset(('/')) }}assets/admin/node_modules/popper/popper.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"
  integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset(('/')) }}assets/admin/js/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="{{ asset(('/')) }}assets/admin/js/waves.js"></script>
<!--Menu sidebar -->
<script src="{{ asset(('/')) }}assets/admin/js/sidebarmenu.js"></script>

<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{ asset(('/')) }}assets/admin/node_modules/raphael/raphael-min.js"></script>
<script src="{{ asset(('/')) }}assets/admin/node_modules/morrisjs/morris.min.js"></script>

<script src="{{ asset(('/')) }}assets/admin/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="{{ asset(('/')) }}assets/admin/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Popup message jquery -->
<script src="{{ asset(('/')) }}assets/admin/node_modules/toast-master/js/jquery.toast.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.js"
  integrity="sha512-S1KaVll2UTj29SOXML7O4LxU7zEoQhJgnondHE/ZvNrk7H4Rc9TLFKDaWuEzsHmAEkJnWFedc0hcVrpvFTOlwA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<!--datatable plugins -->
<script src="{{ asset(('/')) }}assets/admin/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset(('/')) }}assets/admin/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<!-- Sweet-Alert  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.5/sweetalert2.all.min.js"
  integrity="sha512-Ne7tFIuQ9TY6PXjMLKcfZlOnBLUVmLW0YDUV1h1wp+Qr5Fe0EoqHh242XT+GbX/tcXsbnVALt/zF6ouJaKa91w=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- jQuery file upload -->
<script src="{{ asset(('/')) }}assets/admin/node_modules/dropify/dist/js/dropify.min.js"></script>
<!--Custom JavaScript -->
<script src="{{ asset(('/')) }}assets/admin/js/custom.min.js"></script>
<script>
    $(function () {
      $('#myTable').DataTable();
      var table = $('#example').DataTable({
          "columnDefs": [{
              "visible": false,
              "targets": 3
          }],
          "order": [
              [2, 'asc']
          ],
          "displayLength": 25,
          "drawCallback": function (settings) {
              var api = this.api();
              var rows = api.rows({
                  page: 'current'
              }).nodes();
              var last = null;
              api.column(2, {
                  page: 'current'
              }).data().each(function (group, i) {
                  if (last !== group) {
                      $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                      last = group;
                  }
              });
          }
      });
      // Order by the grouping
      $('#example tbody').on('click', 'tr.group', function () {
          var currentOrder = table.order()[0];
          if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
              table.order([2, 'desc']).draw();
          } else {
              table.order([2, 'asc']).draw();
          }
      });
      // responsive table
      $('#config-table').DataTable({
          responsive: true
      });
      $('#example23').DataTable({
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      });
      $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
  });

</script>
@if ($massage = Session::get('success'))
<script>
    Swal.fire({
  position: "top-end",
  icon: "success",
  title: "{{ $massage }}",
  showConfirmButton: !1,
  timer: 3000
  })
  Swal();
</script>
@endif


@if ($massage = Session::get('error'))
<script>
    Swal.fire({
position: "top-end",
icon: "Error",
title: "{{ $massage }}",
showConfirmButton: !1,
timer: 3000
})
Swal();
</script>
@endif
