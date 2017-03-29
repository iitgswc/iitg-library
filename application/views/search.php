<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search</title>

	<link rel="stylesheet" href="<?=base_url('resources/css/bootstrap/bootstrap.css')?>">
	<link rel="stylesheet" href="<?=base_url('resources/css/bootstrap/bootstrap-theme.css')?>">
	
	<link rel="stylesheet" href="<?=base_url('resources/css/jquery-ui/jquery-ui.css')?>">
	<link rel="stylesheet" href="<?=base_url('resources/css/jquery-ui/jquery-ui.structure.css')?>">

	<style>
		.ui-autocomplete{
			border: 2px solid gray;
			border-radius: 10px 10px;
			background-color: #e0e0e0;
			max-height: 400px;
			overflow-x: hidden;
			overflow-y: scroll;
		}
		.ui-menu-item:hover{
			color:White;
			background:#96B202;
			outline:none;
		}

		.check_avail{
			color: blue;
			cursor: pointer;
		}
	
		.table th, .table td{
			text-align: center;
    		vertical-align: middle;
		}
		.table th:nth-child(1),.table td:nth-child(1){
			width: 5%;
		}
		.table th:nth-child(2),.table td:nth-child(2){
			width: 50%;
			text-align: left;
		}
		.table th:nth-child(3),.table td:nth-child(3){
			width: 10%;
		}
		.table th:nth-child(4),.table td:nth-child(4){
			width: 10%;
		}
		.table th:nth-child(5),.table td:nth-child(5){
			width: 10%;
		}
		.table th:nth-child(6),.table td:nth-child(6){
			width: 15%;
		}
	</style>
</head>
<body>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-md-offset-5">
				<h3>Journal Search</h3>
			</div>

			<div class="col-md-8 col-md-offset-2">
				
				<form id="journal_search_form" method="POST">
					<div class="form-group">
						<!-- <label for="exampleInputEmail1">Search</label> -->
						<input type="text" class="form-control" id="journal_search" name="journal_search" placeholder="Journal Title/ISSN/Publisher (Min 5 characters. Press Enter for detailed results.)" value="<?=set_value('journal_search')?>" required>
					</div>
				</form>
			</div>
		</div>
		<?php if(isset($search_results)){ ?>
			<div class="row">
				<table class="table table-striped" style="width:90%;margin: auto;">
					<thead>
						<tr>
							<th>Sno</th>
							<th>Journal Title</th>
							<th>Publisher</th>
							<th>Dept</th>
							<th>Format</th>
							<th>ISSN</th>
							<th>Availability</th>
						</tr>
					</thead>
					<tbody>
						<?php
							// var_dump($search_results);
							$i = 1;
							foreach ($search_results as $journal) {
								?>
								<tr>
									<td><?=$i?></td>
									<td><a href="<?=isset($journal['journal_url'])?$journal['journal_url']:'#'?>"><?=$journal['journal_title']?></a></td>
									<td><a href="<?=isset($journal['publisher_url'])?$journal['publisher_url']:'#'?>"><?=$journal['publisher']?></a></td>
									<td><?=$journal['dept_code']?></td>
									<td><?=$journal['format']?></td>
									<td><?=$journal['issn_no']?></td>
									<td>
										<span class="check_avail" journal_id="<?=$journal['journal_id']?>">Check</span>
										<span id="avail_status_<?=$journal['journal_id']?>" style="display:none;">
											<?=$journal['availability']?>
										</span>
									</td>
								</tr>
								<?php
								$i += 1;
							}
						?>
					</tbody>
				</table>
			</div>
		<?php } ?>
	</div>

	<script type="text/javascript" src="<?=base_url('resources/js/jquery-3.2.0.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('resources/js/bootstrap/bootstrap.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('resources/js/jquery-ui/jquery-ui.min.js')?>"></script>


	<script>
		$( document ).ready(function() {
			$( "#journal_search" ).autocomplete({
				source: "<?=base_url('library/search_auto_complete')?>",
				minLength: 3,
				select: function( event, ui ) {
					event.target.value = ui.item.label;
					$('#journal_search_form').submit();
				}
			});


			$( ".check_avail" ).click(function() {
				var journal_id = $(this).attr('journal_id');
				$(this).css('display','none');
				$( "#avail_status_"+journal_id ).slideDown("slow");
			});
		});
	</script> 
</body>
</html>