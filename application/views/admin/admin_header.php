<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Library - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?=base_url('resources/css/bootstrap/bootstrap.css')?>">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/metisMenu/metisMenu.min.css')?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url('resources/css/sb-admin-2.css')?>">

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

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Lakshminath Bezbaroa Central Library - Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown pull-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=base_url('admin/edit_user/'.$current_user->id)?>"><i class="fa fa-gear fa-fw"></i> <?=$current_user->first_name." ".$current_user->last_name?></a>
                        </li>
                        <!-- <li class="divider"></li> -->
                        <li><a href="<?=base_url('admin/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?=base_url('admin/')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?=base_url('admin/manage_latest')?>"><i class="fa fa-newspaper-o fa-fw"></i> Manage Latest Items</a>
                        </li>
                        <li>
                            <a href="<?=base_url('admin/manage_news')?>"><i class="fa fa-list fa-fw"></i> Manage News & Ads</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Staff<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url('admin/manage_staff_groups')?>">Manage Staff Groups</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('admin/manage_staff')?>">Manage Staff Members</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Library Advisory Committee<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url('admin/manage_lac_groups')?>">Manage LAC Groups</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('admin/manage_lac')?>">Manage LAC Members</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Forms<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?=base_url('admin/manage_form_groups')?>">Manage Form Groups</a>
                                </li>
                                <li>
                                    <a href="<?=base_url('admin/manage_forms')?>">Manage Forms</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=base_url('admin/manage_files')?>"><i class="fa fa-dashboard fa-fw"></i> Manage Files</a>
                        </li>
                        <li>
                            <a href="<?=base_url('admin/manage_departments')?>"><i class="fa fa-dashboard fa-fw"></i> Manage Departments</a>
                        </li>
                        <li>
                            <a href="<?=base_url('admin/manage_journals')?>"><i class="fa fa-dashboard fa-fw"></i> Manage Journals</a>
                        </li>
                        <li>
                            <a href="<?=base_url('admin/updateExpenditureSheet')?>"><i class="fa fa-dashboard fa-fw"></i> Update Expenditure Status</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?=$page_title?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">