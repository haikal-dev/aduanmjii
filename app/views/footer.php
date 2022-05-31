</div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018-<?=gmdate('Y', time() + (3600*8))?> <a href="https://node.my/">NODE.MY</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> <?=$version?>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=$url?>/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=$url?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=$url?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php if(isset($manageTable) && $manageTable){
?><!-- DataTables -->
<script src="<?=$url?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=$url?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=$url?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=$url?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<?php
} ?>
<!-- ChartJS -->
<script src="<?=$url?>/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=$url?>/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=$url?>/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=$url?>/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=$url?>/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=$url?>/plugins/moment/moment.min.js"></script>
<script src="<?=$url?>/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=$url?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=$url?>/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=$url?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=$url?>/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<?php if(isset($load_dashboard_js) && $load_dashboard_js){ ?><script src="<?=$url?>/dist/js/pages/dashboard.js"></script><?php } ?>
<!-- AdminLTE for demo purposes -->
<script src="<?=$url?>/dist/js/demo.js"></script>
</script>
</body>
</html>