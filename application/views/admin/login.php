<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?=base_url('resources/css/bootstrap/bootstrap.css')?>">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="<?=base_url('resources/css/font-awesome/css/font-awesome.min.css')?>" type="text/css">    


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
        if(isset($css_files)) {
            foreach($css_files as $file){
                ?><link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" /> <?php
            }
        }
    ?>
</head>

<body>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row" style="margin-top:100px;">
              
              <div class="col-lg-1 col-lg-offset-5">
                <img id="center-logo" class="responsive-img" src="<?=base_url('resources/img/iitg_logo.png')?>" style="width:200%;">
              </div>

              <div class="col-lg-4 col-lg-offset-4" style="text-align: center; margin-bottom: 50px;">
                <h3>LAKSHMINATH BEZBAROA CENTRAL LIBRARY</h3>
              </div>

              <div class="col-lg-4 col-lg-offset-4">
                
                <?php if(isset($message)){ ?>
                  <div id="infoMessage" class="alert alert-danger"><?php echo $message;?></div>
                <?php } ?>

                <?php echo form_open("admin/login");?>

                  <div class="form-group">
                    <label for=""><?php echo lang('login_identity_label', 'identity');?></label>
                    <?php
                      $identity['class'] = 'form-control';
                      echo form_input($identity);
                    ?>
                  </div>

                  <div class="form-group">
                    <label for=""><?php echo lang('login_password_label', 'password');?></label>
                    <?php
                      $password['class'] = 'form-control';
                      echo form_input($password);
                    ?>
                  </div>

                  <p>
                      <?php echo form_submit('submit', lang('login_submit_btn'), "class='btn btn-info' style='width:180px;margin:auto;display:block;'");?>
                  </p>

                <?php echo form_close();?>

              </div>
            </div>
        </div>
      </div>

    <script type="text/javascript" src="<?=base_url('resources/js/jquery-3.2.0.min.js')?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="<?=base_url('resources/js/bootstrap/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="<?=base_url('assets/metisMenu/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="<?=base_url('resources/js/sb-admin-2.js')?>"></script>
</body>
</html>