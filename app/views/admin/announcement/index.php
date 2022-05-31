<?php extract($data); ?>
<?php require_once "../app/views/admin/header.php"; ?>
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Announcement</h4>
                  <p class="card-description">
                    Create new announcement to release new information or just edit existing announcement
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Status</th>
                          <th>Last Modified</th>
                          <th>&nbsp;</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($announcements as $announcement){
                            ?><tr>
                                <td><?=$announcement['title']?></td>
                                <td><?=($announcement['published'] == 1) ? "Published" : "Draft";?></td>
                                <td><?=$announcement['updated']?></td>
                                <td><a style="color: white;" class="btn btn-primary" href="<?=$url?>/admin/announcement/edit/<?=$announcement['id']?>">Review</a></td>
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
