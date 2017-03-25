            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php
        if(isset($js_files)) {
            foreach($js_files as $file) {
                ?><script src="<?php echo $file; ?>"></script><?php
            }
        }else{
            ?><script type="text/javascript" src="<?=base_url('resources/js/jquery-3.2.0.min.js')?>"></script><?php
        }
    ?>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="<?=base_url('resources/js/bootstrap/bootstrap.min.js')?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="<?=base_url('assets/metisMenu/metisMenu.min.js')?>"></script>

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="<?=base_url('resources/js/sb-admin-2.js')?>"></script>
    
    <script>
    //     $(document).ready( function() {
    //     $(':file').on('fileselect', function(event, numFiles, label) {
    //         console.log(numFiles);
    //         console.log(label);
    //     });
    // });
        // We can attach the `fileselect` event to all file inputs on the page
        $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
        });

        // We can watch for our custom `fileselect` event like this
        $(document).ready( function() {
          $(':file').on('fileselect', function(event, numFiles, label) {

              var input = $(this).parents('.input-group').find(':text'),
                  log = numFiles > 1 ? numFiles + ' files selected' : label;

              if( input.length ) {
                  input.val(log);
              } else {
                  if( log ) alert(log);
              }

          });
        });
    </script>

</body>

</html>
