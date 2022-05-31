<?php extract($data); ?>
<?php require_once "../app/views/header.php";
?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Announcement #<?=$announcement['id']?></h3>

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
                  <h4><?=$announcement['title']?></h4>
                    <div class="post">
                      <div class="user-block">
                        <span class="username">
                          <a href="#"></a>
                        </span>
                        <span class="description"><i class="fas fa-clock"></i> <?=$announcement['updated']?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <?=$announcement['message']?>
                      </p>
                    </div>
                </div>
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
		