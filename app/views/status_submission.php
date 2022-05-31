<?php extract($data); ?>
<?php require_once "../app/views/header.php";
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		<div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
			
			<div class="card">
              <div class="card-header">
                <h3 class="card-title">Status Submission</h3>

                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
				<?php $tag = ""; $message = "";
				if($status_submission){ $tag = "alert-success"; $message = "Your report has been submitted successfully!"; }
				else { $tag = "alert-danger"; $message = "Your report failed to submit. Please contact administrator for any assistances."; } ?>
				<div class="alert <?=$tag?>"><?=$message?></div>
			  </div>
			  <!-- /.card-body -->
            </div>
            <!-- /.card -->
		  </section>
		</div>
	</section>

	<?php require_once "../app/views/footer.php"; ?>
		