<?php if($flash_message) { ?>
    <div class="alert alert-success">
        <?=$flash_message?>
    </div>
<?php } ?>
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
                    <th><?php echo lang('index_groups_th');?></th>
                    <th><?php echo lang('index_action_th');?></th>
                </tr>
                <?php foreach ($users as $user):?>
                    <tr>
                        <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                        <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                        <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                        <td><?php echo htmlspecialchars($user->groups[0]->name,ENT_QUOTES,'UTF-8');?></td>
                        <td>
                            <?php if($is_admin || $user->id == $current_user->id) { ?>
                                <?php echo anchor("admin/edit_user/".$user->id, 'Edit') ;?>
                            <?php } ?>
                            <?php if($is_admin && $user->id != $current_user->id) { ?>
                                <a href="<?=site_url("admin/delete_user/".$user->id)?>" onclick="return confirm_delete(this);" style="margin-left:10px;">Delete</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
        <!-- /.panel-body -->
    </div>
    <?php if($is_admin) { ?>
        <a class="btn btn-large btn-primary" href="<?=base_url('admin/create_user')?>">Add New User</a>
    <?php } ?>
    <!-- /.panel -->
</div>
<!-- /.col-lg-8 -->

<div class="col-lg-2">
</div>
<!-- /.col-lg-2 -->

<script type="text/javascript">
    function confirm_delete(node) {
        return confirm("Are you sure?");
    }
</script>