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
                <h3 class="card-title">Create Report / Issue</h3>

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
              <form role="form" onsubmit="return submitReport(this);">
                <div class="card-body">
				  <div id="message" class="" style="display: none;"></div>
				  <div id="form">
				    <div class="form-group">
						<label>Fullname</label>
						<input type="text" name="name" class="form-control" placeholder="Enter fullname" required>
					  </div>
					  <div class="form-group">
						<label>Student ID</label>
						<input type="text" name="memberid" class="form-control" placeholder="Enter Student ID" required>
					  </div>
					  <div class="form-group">
						<label>Room Number</label>
						<input type="text" name="roomno" class="form-control" placeholder="Enter Room No (eg: DML211)" required>
					  </div>
					  <div class="form-group">
						<label>Phone No</label>
						<input type="text" name="phone" class="form-control" placeholder="Enter Phone No (eg: 0123456789)" required>
					  </div>
					  <div class="form-group">
						<label>WiFi Hotspot</label>
						<select class="form-control" name="pole">
							<?php foreach($poles as $pole){
								?><option value="<?=$pole['id']?>"><?=$pole['name']?> - <?=$pole['place']?></option><?php
							} ?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Message</label>
						<textarea class="form-control" name="message" style="height:232px;"></textarea>
					  </div>
				  </div>
				  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button id="btnSubmit" type="submit" class="btn btn-primary">Submit Report / Issue</button>
                </div>
              </form>
              <!-- /.form -->
            </div>
            <!-- /.card -->
		  </section>
		</div>
	</section>
	
	<script>
		var elem=function(e){return document.getElementById(e)},post=function(e){var s=new XMLHttpRequest;s.open("POST",e.url,!0),s.setRequestHeader("Content-Type","application/json"),s.onreadystatechange=function(){4===this.readyState&&200===this.status&&e.success(this.responseText)},s.send(JSON.stringify(e.data))},submitReport=function(e){var s=e.name.value,t=e.memberid.value,a=e.phone.value,n=e.roomno.value,l=e.pole.value,r=e.message.value;return""==s||""==t||""==a||""==n||""==l||""==r?alert("All fields are mandatory. Please enter information below."):(elem("message").innerHTML="Submitting...",elem("message").style.display="block",elem("form").style.display="none",elem("btnSubmit").style.display="none",post({url:"/report/create?submit&mode=report",data:{name:s,memberid:t,phone:a,roomno:n,pole:l,message:r},success:function(e){"ok"==e?(elem("message").innerHTML="Report has been sent successfully!",elem("message").className="alert alert-success"):(e=JSON.parse(e),elem("message").innerHTML=e.message,elem("message").className="alert alert-danger")}})),!1};
	</script>
	
	<?php require_once "../app/views/footer.php"; ?>
		
