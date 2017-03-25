<style>
    .btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>

<?php if(isset($bulk_upload)) { ?>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-file fa-fw"></i> Bulk Upload
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <?php echo $error;?>
            <?php echo form_open_multipart('admin/bulk_upload_journals');?>

            <!-- <input type="file" name="journals_csv"> -->
            <!-- <label class="btn btn-default btn-file">
                Browse <input type="file" style="display:none;" name="journals_csv">
            </label> -->


            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        BROWSE<input type="file" style="display: none;" name="journals_csv">
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
                <label class="input-group-btn">
                    <span class="">
                        <input type="submit" class="btn btn-primary" value="UPLOAD" />
                    </span>
                </label>
            </div>

            </form>
        </div>
    </div>
<?php } ?>

<!-- <div class="col-lg-12"> -->
<?php echo $output; ?>
<!-- </div> -->