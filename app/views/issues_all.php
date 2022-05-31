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
                <h3 class="card-title">All Issues</h3>

                <div class="card-tools">
				  <!--
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
				  -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Date</th>
					  <th>Pole</th>
                      <th>Status</th>
                      <th>Message</th>
					  <th></th>
                    </tr>
                  </thead>
                  <tbody>
					<?php foreach($issues as $issue){ 
					$tag = "";
					$status = $issue['status'];
					if($status == "Resolved"){ $tag = "badge-success"; }
					elseif($status == "Progress"){ $tag = "badge-warning"; } ?>
					<tr>
					  <td><?=$issue['updated']?></td>
					  <td><?=$issue['polename']?></td>
					  <td><small class="badge <?=$tag?>"><?=$status?></small></td>
					  <td><?=$issue['message']?></td>
					  <td><a class="btn btn-primary" href="<?=$url?>/issue/show/<?=$issue['id']?>"><span class="ion ion-eye"></span></a></td>
					</tr>
					<?php
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
		