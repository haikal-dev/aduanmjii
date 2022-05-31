<?php extract($data); ?>
<?php require_once "../app/views/admin/header.php"; ?>
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Issues (Solved)</h4>
                  <p class="card-description">
                    This page shows all solved issues as your future references.
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>AP Name</th>
                          <th>Status</th>
                          <th>Created</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($issues as $issue){
                            ?><tr>
                                <td><?=$issue['name']?></td>
                                <td><?=$issue['polename']?></td>
                                <td><?=$issue['status']?></td>
                                <td><?=$issue['updated']?></td>
                                <td><a style="color: white;" class="btn btn-primary" href="<?=$url?>/admin/issue/id/<?=$issue['id']?>">Open</a></td>
                            </tr><?php
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php require_once "../app/views/admin/footer.php"; ?>
