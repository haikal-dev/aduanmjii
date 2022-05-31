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

<script type="text/javascript">
	function api(fn){
		var xhr = new XMLHttpRequest();
		xhr.open("GET", fn.url, true);
		xhr.setRequestHeader("Content-Type", "application/json");
		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				fn.result(xhr.responseText);
			}
		};
		xhr.send();
	}

</script>

<script type="text/javascript">
	var xhr = new XMLHttpRequest();
	var url = "<?=$url?>/api/data_report_statistics";
	xhr.open("GET", url, true);
	xhr.setRequestHeader("Content-Type", "application/json");
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			var data = JSON.parse(xhr.responseText);
			data = data.message;
			const ctx = document.getElementById('reportChart').getContext('2d');
			const myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: data.date,
					datasets: [{
						label: '# of reports',
						data: data.numbers,
						borderWidth: 2
					}]
				},
				options: {
					scales: {
						xAxes: [{
							display: true
						}]
					}
				}
			});
		}
	};
	xhr.send();
</script>

<?php if(isset($hasGraph) && $hasGraph){
	?>
	<!-- FLOT CHARTS -->
	<script src="<?=$url?>/plugins/flot/jquery.flot.js"></script>
	<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
	<script src="<?=$url?>/plugins/flot-old/jquery.flot.resize.min.js"></script>
	<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
	<script src="<?=$url?>/plugins/flot-old/jquery.flot.pie.min.js"></script>
	<?php
} ?>

<?php if(isset($manageTable) && $manageTable){
?>
<script>
  $(function () {
    $('#datatable').DataTable({
      "responsive": false,
      "autoWidth": true,
	  "searching": false,
	  "ordering": false,
	  "info": true,
	  "lengthChange": false
    });
	
  });
</script>
<?php
} ?>
<script>
	<?php if(isset($hasGraph) && $hasGraph){
		?>
$(function(){
	setInterval(function(){
		var xhr = new XMLHttpRequest();
		var url = "https://v2.haikalazizan.com/mjii/api/tangki1.json";
		xhr.open("GET", url, true);
		xhr.setRequestHeader("Content-Type", "application/json");
		xhr.onreadystatechange = function () {
			if (xhr.readyState === 4 && xhr.status === 200) {
				var data = JSON.parse(xhr.responseText);
				$.plot('#area-chart', [data], {
				  grid  : {
					borderWidth: 0
				  },
				  series: {
					shadowSize: 0, // Drawing is faster without shadows
					color     : '#00c0ef',
					lines : {
					  fill: true //Converts the line chart to area chart
					},
				  },
				  yaxis : {
					axisLabel: "Voltage (V)",
					show: true
				  },
				  xaxis : {
					axisLabel: "Period",
					show: false
				  }
				});
			}
		};
		xhr.send();
		
		var xhr1 = new XMLHttpRequest();
		var url1 = "https://v2.haikalazizan.com/mjii/api/current_tangki1.json";
		xhr1.open("GET", url1, true);
		xhr1.setRequestHeader("Content-Type", "application/json");
		xhr1.onreadystatechange = function () {
			if (xhr1.readyState === 4 && xhr1.status === 200) {
				var data = JSON.parse(xhr1.responseText);
				var d = document;
				var curVoltage = d.getElementById("curVoltage");
				curVoltage.innerHTML = "(Current Voltage: " + data[0].voltage + " V)";
			}
		};
		xhr1.send();
		
	}, 5000);
	
	
});	
	
		<?php
	} ?>
</script>
</body>
</html>
