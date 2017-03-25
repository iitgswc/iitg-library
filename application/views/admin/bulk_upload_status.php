<style>	
	.table th, .table td{
		text-align: center;
		vertical-align: middle;
	}
</style>

	<?php if($status != false) { ?>
		<div class="panel panel-default">
	        <div class="panel-heading">
	            <i class="fa fa-list fa-fw"></i> 
	        </div>
	        <!-- /.panel-heading -->
	        <div class="panel-body">
				<table class="table table-condensed table-striped" style="width:30%;margin: auto;">
					<tr>
						<td>Total Successfully Inserted</td>
						<td><?=$total_success?></td>
					</tr>
					<tr>
						<td>Total Unsuccessfull</td>
						<td><?=$total_failed?></td>
					</tr>
				</table>
				<table class="table table-condensed table-striped" style="width:90%;margin: auto;">
					<thead>
						<tr>
							<th>Line Number</th>
							<th>Status</th>
							<th>Details</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($status as $line){ ?>
							<tr>
								<td><?=$line['lineNo']?></td>
								<td><?=$line['status']?></td>
								<td><?=$line['details']?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	<?php } ?>