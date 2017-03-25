<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
	<link rel="icon" type="image/ico" href="<?=base_url('resources/img/favicon.ico')?>"></link>
	<link rel="shortcut icon" href="<?=base_url('resources/img/favicon.ico')?>"></link>

	<link rel="stylesheet" href="<?=base_url('resources/css/reset.css');?>">
	<link rel="stylesheet" href="<?=base_url('resources/css/bootstrap/bootstrap.css');?>">
	<link rel="stylesheet" href="<?=base_url('resources/css/bootstrap/bootstrap-theme.css');?>">
	<link rel="stylesheet" href="<?=base_url('resources/css/jquery-ui/jquery-ui.css');?>">
	<link rel="stylesheet" href="<?=base_url('resources/css/jquery-ui/jquery-ui.structure.css');?>">
	
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">
	
	<link rel="stylesheet" href="<?=base_url('resources/css/font-awesome/css/font-awesome.css');?>">

	<link rel="stylesheet" href="<?=base_url('resources/css/main.css');?>">
</head>
<body>
	
	<?= $template_navbar ?>

	<div class="container" style="width: 90%;"> <!-- begin container -->
		<div class="row"> <!-- begin row -->
			
			<!-- begin left sidebar -->
			<div class="left-sidebar col-sm-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">e-Bibliographic Database</h3>
					</div>
					<div class="panel-body">
						<ul>
							<li>
								<a href="#">EBSCO Discovery Service</a>
							</li>
							<li>
								<a href="#">INSPEC</a>
							</li>
							<li>
								<a href="#">MathSciNet</a>
							</li>
							<li>
								<a href="#">SciFinder Scholar</a>
							</li>
							<li>
								<a href="#">Web of Science</a>
							</li>
							<li>
								<a href="#">Scopus</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Full-Text Database</h3>
					</div>
					<div class="panel-body">
						<ul>
							<li>
								<a href="#">ACM Digital Library</a>
							</li>
							<li>
								<a href="#">ACS Web Edition</a>
							</li>
							<li>
								<a href="#">AIP Journal Collection</a>
							</li>
							<li>
								<a href="#">APS Journal Collection</a>
							</li>
							<li>
								<a href="#">ASCE Journal Collection</a>
							</li>
							<li>
								<a href="#">ASME Journal Collection</a>
							</li>
							<li>
								<a href="#">EBSCO Engg. Source Database</a>
							</li>
							<li>
								<a href="#">Bureau of Indian Standards</a>
							</li>
							<li>
								<a href="#">IEL Online</a>
							</li>
						</ul>
					</div>
				</div>
			</div>