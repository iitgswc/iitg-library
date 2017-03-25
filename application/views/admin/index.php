
<div class="col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-user fa-fw"></i> Administrators
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <table class="table table-striped">
                <tr>
                    <th><?php echo lang('index_fname_th');?></th>
                    <th><?php echo lang('index_lname_th');?></th>
                    <th><?php echo lang('index_email_th');?></th>
                    <th><?php echo lang('index_action_th');?></th>
                </tr>
                <?php foreach ($users as $user):?>
                    <tr>
                        <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                        <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                        <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                        <td><?php echo anchor("admin/edit_user/".$user->id, 'Edit') ;?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-8 -->

<div class="col-lg-2">
<!--     <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Users
        </div>
        <div class="panel-body">
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <i class="fa fa-comment fa-fw"></i> New Comment
                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                    </span>
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                    </span>
                </a>
            </div>
            <a href="#" class="btn btn-default btn-block">View All Alerts</a>
        </div>
    </div> -->
</div>
<!-- /.col-lg-4 -->
