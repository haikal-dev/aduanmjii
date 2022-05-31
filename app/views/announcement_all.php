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
                <h3 class="card-title">All Announcement</h3>
			  </div>
              <div class="card-body table-responsive">
                <table id="datatable" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Title of Announcement</th>
					  <th></th>
                    </tr>
                  </thead>
                  <tbody>
					<?php foreach($announcement as $an){
						?><tr>
							<td><?=$an['updated']?></td>
							<td><?=$an['title']?></td>
							<td><a class="btn btn-primary" href="<?=$url?>/announcement/show/<?=$an['id']?>"><span class="ion ion-eye"></span></a></td>
						</tr><?php
					} ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
		  </section>
		</div>
	</section>

	<?php require_once "../app/views/footer.php"; ?>
		