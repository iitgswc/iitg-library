<?php if($show_success) { ?>
    <div class="alert alert-success">
        Expenditure pdf successfully updated! You can view it here : <a target="_blank" href="<?=base_url('assets/sheets/bvstatus.pdf')?>"><?=base_url('assets/sheets/bvstatus.pdf')?></a>
    </div>
<?php } ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-file fa-fw"></i>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <form action="<?=site_url('admin/updateExpenditureSheet')?>" method="POST">
            <div class="form-group">
                <label for="">Google Sheet File Name</label>
                <input type="text" class="form-control" value="<?=$sheet_remote_filename?>" name="sheet_remote_filename">
            </div>
            <div class="form-group">
                <label for="">Update Cell Location</label>
                <input type="text" class="form-control" value="<?=$update_cell_location?>" name="update_cell_location">
            </div>
            <div class="form-group">
                <input class="btn btn-large btn-primary" type="submit" value="Update Expenditure Sheet">
            </div>
        </form>
    </div>
</div>