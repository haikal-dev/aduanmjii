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
			  </div>
              <div class="card-body table-responsive">
                <table id="datatable" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Date</th>
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
              <div class="card-footer" align="right">
                <div><?=$paginate['status']?></div>
                <ul class="btn-group">
                  <a href="<?=$url?>/issue/show/all/<?=$paginate['first']?>" class="btn btn-primary<?=($paginate['first'] == '#') ? ' disabled':'' ?>">First</a>
                  <a href="<?=$url?>/issue/show/all/<?=$paginate['prev']?>" class="btn btn-primary<?=($paginate['prev'] == '#') ? ' disabled':'' ?>">Previous</a>
                  <a href="<?=$url?>/issue/show/all/<?=$paginate['next']?>" class="btn btn-primary<?=($paginate['next'] == '#') ? ' disabled':'' ?>">Next</a>
                  <a href="<?=$url?>/issue/show/all/<?=$paginate['last']?>" class="btn btn-primary<?=($paginate['last'] == '#') ? ' disabled':'' ?>">Last</a>
                </ul>
              </div>
            </div>
            <!-- /.card -->
            
		  </section>
		</div>
	</section>

	<?php require_once "../app/views/footer.php"; ?>
		