<?php extract($data); ?>
<?php require_once "../app/views/header.php";
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$total_issues?></h3>

                <p>Issues</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="<?=$url?>/issue/show/all" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?=$percent_total_resolved?><sup style="font-size: 20px">%</sup></h3>

                <p>Issue Resolved</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="<?=$url?>/issue/show/all" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?=$total_unread_report?> <sup style="font-size: 20px;">/ <?=$total_progress?> / <?=$total_unsolved?></sup></h3>

                <p>New / Progress / Unsolved</p>
              </div>
              <div class="icon">
                <i class="ion ion-document-text"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?=number_format($rating,1)?> <sup style="font-size: 20px;">/ 5</sup></h3>

                <p>Response Rating</p>
              </div>
              <div class="icon">
                <i class="ion ion-star"></i>
              </div>
            </div>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">

          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->

                <!-- Area chart -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                        <i class="ion ion-stats-bars mr-1"></i>
                        Yearly Report Analytic Chart
                    </h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <canvas id="reportChart" width="100%"></canvas>
                  </div>
                  <!-- /.card-body-->
                </div>
                <!-- /.card -->
            
                <!-- Area chart -->
                <!--<div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                        <span class="badge badge-danger">LIVE</span> Tangki Air Voltage Monitoring<br/><span id="curVoltage"><i>(Loading current voltage...)</i></span>
                    </h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="area-chart" style="height: 338px;" class="full-width-chart"></div>
                  </div>
                </div>-->
                <!-- /.card -->

          </section>
		  
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <!--<section class="col-lg-5 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-stats-bars mr-1"></i>
                  Network Status
                </h3>
                <div class="card-tools">
				            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
				          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              <div class="card-body">
                <div class="tab-content p-0">
                    <?php //require_once "../app/views/network_stats.php"; ?>
                </div>
              </div>
            </div>-->
            <!-- /.card -->
			
          </section>
		  <!-- todolist -->
		  <?php //require_once "../app/views/todolist.php"; ?>
		  <!-- end: todolist -->
		  
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  <?php require_once "../app/views/footer_index.php"; ?>
