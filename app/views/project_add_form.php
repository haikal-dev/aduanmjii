<?php extract($data); ?>
<?php require_once "../app/views/header.php";
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->

                <!-- Area chart -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                        Publish Your Project Here
                    </h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="message" style="display:none;"></div>
                    <form id="form" onsubmit="return submitProject(this);">
                      <div class="form-group">
                        <label for="title">Title of Project</label>
                        <input type="text" name="title" id="" class="form-control" placeholder="Eg: Smart Home" />
                      </div>

                      <div class="form-group">
                        <label for="video_url">Video URL</label>
                        <input type="text" name="video_url" id="" class="form-control" placeholder="Eg: https://www.youtube.com/watch?v=CIePSlKI12Y" />
                      </div>

                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="" style="height: 232px;" class="form-control"></textarea>
                      </div>

                      <div class="form-group">
                        <input type="submit" value="Request" class="btn btn-primary form-control">
                      </div>
                    </form>
                  </div>
                  <!-- /.card-body-->
                </div>
                <!-- /.card -->
          </section>
		  
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  <?php require_once "../app/views/footer_project_form.php"; ?>
