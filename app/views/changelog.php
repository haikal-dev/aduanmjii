<?php extract($data); ?>
<?php require_once "../app/views/header.php";
?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		<div class="row">
          <!-- Left col -->
          <section class="col-lg-8">			
			<div class="card">
              <div class="card-header">
                <h3 class="card-title">Version Changelog</h3>
			  </div>
              <div class="card-body">

                <h4>v3.4.0</h4>
                <p style="font-size: 0.8em;"> 
                  <span class="badge badge-success">Latest</span> 
                  <span class="badge badge-warning">Feature</span><br/>
                  <strong>Released:</strong> 19-03-2022<br />
                  <strong>Developer(s):</strong> Md. Adli Hidayat
                </p>
                <p>Since our system received a lot of complaint data, the <a href="<?=$url?>/issue/show/all">issue 
                section</a> data becomes longer than expected. We collected the data since 2018 but we did not manage that 
                properly. For this release feature version (v3.4.0), we <b>added pagination feature</b> so that we can access the issue 
                by pages.</p>

                <hr />

                <h4>v3.3.2</h4>
                <p style="font-size: 0.8em;">
                  <span class="badge badge-warning">Bugfix</span><br/>
                  <strong>Released:</strong> 18-03-2022<br />
                  <strong>Developer(s):</strong> Haikal Azizan
                </p>
                <ul>
                  <li>Fixed some bugs on RADIUS Web v1.0.1-beta</li>
                </ul>

                <hr />

                <h4>v3.3.0</h4>
                <p style="font-size: 0.8em;"> 
                  <span class="badge badge-primary">Feature</span><br/>
                  <strong>Released:</strong> 10-03-2022<br />
                  <strong>Developer(s):</strong> Haikal Azizan
                </p>
                <ul>
                  <li><b>New Feature:</b> Added RADIUS Web Application.</li>
                  <li>Improvements for better experiences and stability.</li>
                </ul>

                <h5 style="text-decoration: underline;">About RADIUS Web</h5>

                <p>RADIUS Web is a RADIUS management tools based on MikroTik API v6.47+ with simple user interface. <br/>Features on this web app:-</p>

                <ul>
                  <li>Active User with user ID and device used details</li>
                </ul>

                <hr />

                <h4>v3.2.4</h4>
                
                <p style="font-size: 0.8em;">
                  <span class="badge badge-warning">Bugfix</span><br/>
                  <strong>Released:</strong> 22-02-2022<br />
                  <strong>Developer(s):</strong> Haikal Azizan
                </p>

                <ul>
                  <li>Removed announcement sidebar menu from admin dashboard.</li>
                  <li>Removed Bug Report.</li>
                  <li>Improved performance and stability.</li>
                </ul>

                <hr />

                <h4>v3.2.0</h4>
                <p style="font-size: 0.8em;">
                  <span class="badge badge-primary">Feature</span><br/>
                  <strong>Released:</strong> 26-01-2022<br />
                  <strong>Developer(s):</strong> Haikal Azizan
                </p>
                <ul>
                  <li><b>New Feature:</b> Added new bar chart for report statistic visualization.</li>
                </ul>
				
				        <hr />
                
                <h4>v3.1.0</h4>
                <p style="font-size: 0.8em;">
                  <span class="badge badge-primary">Feature</span>
                  <span class="badge badge-primary">Stable</span><br/>
                  <strong>Released:</strong> 17-01-2022<br />
                  <strong>Developer(s):</strong> Haikal Azizan, <a target="_blank" href="https://node.my">Node Team</a> & <a target="_blank" href="https://themify.me/">Themify</a>
                </p>
                <ul>
                  <li><b>Major Update:</b> New UI for Admin - Complaints Management System.</li>
                  <li><b>New Feature:</b> Added Technical Performance Rating <i>(displayed in Admin Dashboard)</i>.</li>
                  <li>Issues section divided by categories: New / Progress / Resolved / Unresolved.</li>
                  <li>Improvements for better experiences and complaints management.</li>
                  <li><b>Note:</b> Announcement functionality will be removed on this version for UI development.</li>
                  <li>Removed: Pie-chart for analyzing issues in dashboard.</li>
                </ul>

                <hr />

                <h4>v2.2.9</h4>
                <p style="font-size: 0.8em;"> 
                  <span class="badge badge-primary">Stable</span> 
                  <span class="badge badge-danger">Hotfix</span><br/>
                  <strong>Released:</strong> 11-01-2022<br />
                  <strong>Developer(s):</strong> Haikal Azizan & Contributors
                </p>
                <ul>
                  <li>Added new section: Changelog for log and version record for this web application.</li>
                  <li>Removed IoTHMS <i>(on development/staging).</i></li>
                  <li>Improved version labelling in one configuration based on semantic versioning.</li>
                  <li>Bug fixes for improvement and stability.</li>
                  <li>Resolved multi-code conflicts.</li>
                </ul>

                <hr />

                <h4>v2.0.10</h4>
                <p style="font-size: 0.8em;">
                  <span class="badge badge-primary">Feature</span> 
                  <span class="badge badge-warning">Bugfix</span><br/>
                  <strong>Released:</strong> 21-04-2021<br />
                  <strong>Developer(s):</strong> Haikal Azizan
                </p>
                <ul>
                  <li><b>New Feature:</b> Added new IoTHMS (IoT Based Hotspot Monitoring System).</li>
                  <li>Added new Announcement section and Latest Announcement in dashboard.</li>
                  <li>Bug fixes for improvement and stability.</li>
                </ul>

                <hr />

                <h4>v1.0.0-beta</h4>
                <p style="font-size: 0.8em;">
                  <span class="badge badge-info">Development / Staging</span><br />
                  <strong>Released:</strong> 15-08-2018<br />
                  <strong>Developer(s):</strong> Haikal Azizan, Danial Ridzuan & Nurul Izzati
                </p>
                <ul>
                  <li>Developed WiFi Hotspot Complaint System</li>
                  <li>Initial Development</li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
		  </section>
      <section class="col-lg-4">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Current Version</h3>
              </div>
              <div class="card-body">
                <h3 align="center"><?=$version?></h3>
              </div>
            </div>
          </div>

          <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">Developers</h3>
              </div>
              <div class="card-body">
                <div style="margin-bottom:20px;" class="alert alert-info">
                  <small style="font-style: italic;"><i class="fas fa-exclamation-triangle"></i>&nbsp; &nbsp; Developers that contribute for research and development on AduanMJII <?=$version?> will be list on this section.</small>
                </div>
                <ul>
                  <li>Danial Ridzuan</li>
                  <li>Nurul Izzati</li>
                  <li>Haikal Azizan</li>
                  <li>Node Team</li>
                  <li>Themify</li>
                  <li>Md. Adli Hidayat</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        
      </section>
		</div>
	</section>

	<?php require_once "../app/views/footer.php"; ?>
		