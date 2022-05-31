<?php extract($data); ?>
<?php require_once "../app/views/header.php";
?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Issue #<?=$issue['id']?></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12">
                  <h4>Issue Details</h4>
                    <div class="post">
                      <div class="user-block">
                        <span class="username">
                          <a href="#"><?=$issue['polename']?></a>
                        </span>
                        <span class="description">Shared publicly - <?=$issue['updated']?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?=$issue['message']?>
                      </p>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fab fa-android"></i> <?=$issue['polename']?></h3>
              <p class="text-muted"><?php if($issue['solution'] != ""){ ?>Solution: <pre class="custom-pre"><?=$issue['solution']?><?php } ?></pre></p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Pole Place
                  <b class="d-block"><?=$issue['poleplace']?></b>
                </p>
                <p class="text-sm">Status
                  <b class="d-block"><?php $tag = ""; if($issue['status'] == "Progress"){ $tag = "badge-warning"; } elseif($issue['status'] == "Resolved"){ $tag = "badge-success"; } ?><span class="badge <?=$tag?>"><?=$issue['status']?></span></b>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

	<?php require_once "../app/views/footer.php"; ?>
		