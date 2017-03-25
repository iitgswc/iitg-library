<div class="col-lg-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Panel
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">

          <h1><?php echo lang('edit_user_heading');?></h1>
          <p><?php echo lang('edit_user_subheading');?></p>
        
            <?php if(isset($message)) { ?>
                <div id="infoMessage" class="alert alert-danger">
                    <?php echo $message;?>
                </div>
            <?php } ?>

          <?php echo form_open(uri_string());?>

                <div class="form-group">
                        <label for=""><?php echo lang('edit_user_fname_label', 'first_name');?></label>
                        <?php
                            $first_name['class'] = 'form-control';
                            echo form_input($first_name);
                        ?>
                </div>

                <div class="form-group">
                        <label for=""><?php echo lang('edit_user_lname_label', 'last_name');?> </label>
                        <?php
                            $last_name['class'] = 'form-control';
                            echo form_input($last_name);
                        ?>
                </div>

                <div class="form-group">
                        <label for=""><?php echo lang('edit_user_email_label', 'email');?> </label>
                        <?php
                            $email['class'] = 'form-control';
                            echo form_input($email);
                        ?>
                </div>

                <div class="form-group">
                        <label for=""><?php echo lang('edit_user_password_label', 'password');?> </label>
                        <?php
                            $password['class'] = 'form-control';
                            echo form_input($password);
                        ?>
                </div>

                <div class="form-group">
                        <label for=""><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>
                        <?php
                            $password_confirm['class'] = 'form-control';
                            echo form_input($password_confirm);
                        ?>
                </div>

                <?php echo form_hidden('id', $user->id);?>
                <?php echo form_hidden($csrf); ?>
                
                <br>
                <br>
                <div>
                    <?php echo form_submit('submit', lang('edit_user_submit_btn'),"class='btn btn-info btn-lg pull-left'");?>
                    <!-- <a href="" class='btn btn-danger btn-lg pull-left'>Delete User</a> -->
                </div>

          <?php echo form_close();?>
      </div>
  </div>
</div>