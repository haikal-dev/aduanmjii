<div align="right" style="margin: 5px 0px;">
    <button class="btn btn-danger" onclick="pages('#root', '/master')"><i class="fa fa-home"></i></button> 
    <button class="btn btn-warning" onclick="pages('#wireless', '/master/wireless-only')"><i class="fa fa-refresh"></i></button>
</div>
<div id="wireless">
    <div style="margin: 10px 0px;" class="alert alert-info">Total: <?=$data['total']?></div>
    <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>CAP</th>
                    <th>Username</th>
                    <th>Signal</th>
                    <th>Uptime</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['users'] as $user){
                    ?><tr>
                    <td><?=explode('-', $user['interface'])[1]?></td>
                    <td><?=$user['name']?><br/><small><?=$user['device']?><br/><?=$user['phone']?></small></td>
                    <td><?=$user['rx-signal']?> dBm</td>
                    <td><?=$user['uptime']?></td>    
                    </tr><?php
                } ?>
            </tbody>
        </table>
    </div>
</div>
