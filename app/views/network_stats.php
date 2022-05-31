<table class="table">
                  <thead>
                    <tr>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($net_stats as $netstat){
						$tag = "";
						if($netstat['status'] == 'Connected'){ $tag = "badge-success"; }
						elseif($netstat['status'] == 'Disconnected'){ $tag = "badge-danger"; }
						?><tr>
							<td><?=$netstat['device']?><br/><small><span class="fas fa-clock"></span> <?=$netstat['updated_at']?></small></td>
							<td><small class="badge <?=$tag?>"><?=$netstat['status']?></small></td>
						</tr><?php
					} ?>
                  </tbody>
                </table>