<?php extract($data); ?>
<?php require_once "../app/views/admin/header.php"; ?>
          <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
              <div class="row">
                <div class="col-lg-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Issues #<?=$issue['id']?></h4>
                      <p class="card-description">
                        You can edit and submit your solution for future reference if there is same issue goes on.
                      </p>

                      <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-3" align="right">
                          Issue ID:
                        </div>
                        <div class="col-md-9">
                          #<?=$issue['id']?>
                        </div>
                      </div>

                      <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-3" align="right">
                          Name:
                        </div>
                        <div class="col-md-9">
                          <?=$issue['name']?>
                        </div>
                      </div>

                      <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-3" align="right">
                          Student ID:
                        </div>
                        <div class="col-md-8">
                          <?=$issue['memberid']?>
                        </div>
                      </div>

                      <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-3" align="right">
                          Phone No:
                        </div>
                        <div class="col-md-8">
                          <?=$issue['phone']?>
                        </div>
                      </div>

                      <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-3" align="right">
                          Room No:
                        </div>
                        <div class="col-md-8">
                          <?=$issue['roomno']?>
                        </div>
                      </div>

                      <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-3" align="right">
                          Access Point:
                        </div>
                        <div class="col-md-8">
                          <?=$issue['polename']?> - <?=$issue['poleplace']?>
                        </div>
                      </div>

                      <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-3" align="right">
                          Created:
                        </div>
                        <div class="col-md-8">
                          <?=$issue['updated']?>
                        </div>
                      </div>

                      <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-3" align="right">Status:</div>
                        <div class="col-md-8"><?=$issue['status']?></div>
                      </div>

                      <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-3" align="right">Message:</div>
                        <div class="col-md-8"><?=$issue['message']?></div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-lg-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div id="message" style="display: none;"></div>
                        <form onsubmit="return submitSolution(this);">
                          <input type="hidden" name="id" value="<?=$issue['id']?>" />
                          <div class="form-group">
                            <label for="solution"><strong>Solution</strong></label>
                            <div style="font-size: 0.8em; margin: 0px 0px 10px 0px;">Submit your solution here.</div>
                            <textarea name="solution" style="height: 232px;" class="form-control"><?=$issue['solution']?></textarea>
                          </div>
                          <div class="form-group">
                            <input style="color: white;" type="submit" name="btnSubmit" class="btn btn-primary form-control" value="Submit Solution" />
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            
            <div class="col-lg-4 grid-margin">
              <div class="row">
              <div class="col-lg-12 grid-margin">
                  <div class="card">
                    <div class="card-header">
                      Set As
                    </div>
                    <div class="card-body">
                      <?php if($issue['status'] == 'New'){
                        ?><a style="color: white;" class="btn btn-primary form-control" href="<?=$url?>/admin/issue/id/<?=$issue['id']?>?pid=setStatus&status=progress">Progress</a><?php
                      } elseif($issue['status'] == 'Progress'){
                        ?><a style="color: white;" class="btn btn-primary form-control" href="<?=$url?>/admin/issue/id/<?=$issue['id']?>?pid=setStatus&status=solved">Solved</a><br />
                        <a style="color: white;" class="btn btn-primary form-control" href="<?=$url?>/admin/issue/id/<?=$issue['id']?>?pid=setStatus&status=unsolved">Unsolved</a><?php
                      } else {
                        ?><div class="alert alert-info">No action can't be done on this area</div><?php
                      } ?>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 grid-margin">
                  <div class="card">
                    <div class="card-header">
                      Options 
                    </div>
                    <div class="card-body">
                    <a style="color: white;" class="btn btn-danger form-control" onclick="return deleteIssue(<?=$issue['id']?>)">Delete Permanently</a>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>

        <?php require_once "../app/views/admin/footer.php"; ?>
