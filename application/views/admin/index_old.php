<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>

	<link rel="stylesheet" href="<?=base_url('resources/css/bootstrap/bootstrap.css')?>">
	<link rel="stylesheet" href="<?=base_url('resources/css/bootstrap/bootstrap-theme.css')?>">
</head>
<body>
	
	<div class="row">
		<h3>Admin Panel</h3>
		<div id="infoMessage"><?php echo $message;?></div>
		
		<div class="col-sm-8 col-sm-offset-2">
			<table class="table table-striped">
				<tr>
					<th><?php echo lang('index_fname_th');?></th>
					<th><?php echo lang('index_lname_th');?></th>
					<th><?php echo lang('index_email_th');?></th>
					<th><?php echo lang('index_groups_th');?></th>
					<th><?php echo lang('index_status_th');?></th>
					<th><?php echo lang('index_action_th');?></th>
				</tr>
				<?php foreach ($users as $user):?>
					<tr>
			            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
			            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
			            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
						<td>
							<?php foreach ($user->groups as $group):?>
								<?php echo anchor("admin/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
			                <?php endforeach?>
						</td>
						<td><?php echo ($user->active) ? anchor("admin/deactivate/".$user->id, lang('index_active_link')) : anchor("admin/activate/". $user->id, lang('index_inactive_link'));?></td>
						<td><?php echo anchor("admin/edit_user/".$user->id, 'Edit') ;?></td>
					</tr>
				<?php endforeach;?>
			</table>
		</div>
	</div>



	<p><?php echo anchor('admin/create_user', lang('index_create_user_link'))?> | <?php echo anchor('admin/create_group', lang('index_create_group_link'))?> | <?php echo anchor('admin/logout', "Logout")?></p>

	<p> <?php echo anchor('admin/manage_files', "Manage Files")?> </p>
	<p> <?php echo anchor('admin/manage_latest', "Manage Latest Items")?> </p>
	<p> <?php echo anchor('admin/manage_news', "Manage News Items")?> </p>

	<p> <?php echo anchor('admin/manage_staff_groups', "Manage Staff Groups")?> </p>
	<p> <?php echo anchor('admin/manage_staff', "Manage Staff")?> </p>
	<p> <?php echo anchor('admin/manage_lac_groups', "Manage LAC Groups")?> </p>
	<p> <?php echo anchor('admin/manage_lac', "Manage LAC")?> </p>
	<p> <?php echo anchor('admin/manage_form_groups', "Manage Form Groups")?> </p>
	<p> <?php echo anchor('admin/manage_forms', "Manage Forms")?> </p>
	<p> <?php echo anchor('admin/manage_journals', "Manage Journals")?> </p>


	<script type="text/javascript" src="<?=base_url('resources/js/jquery-3.2.0.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('resources/js/bootstrap/bootstrap.min.js')?>"></script>
</body>
</html>