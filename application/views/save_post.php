
<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
  <div class="col-sm-9">
    <h4 class="page-title">Add  Post</h4>
  </div>
  <div class="col-sm-3">
   <div class="btn-group float-sm-right">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postModal">
    <i class="fa fa-plus"></i> Add Post
</button>  </div>
</div>
</div>
<!-- End Breadcrumb-->
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">

        <div class="table-responsive">
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Image</th>
      <th style="width: 250px;">Description</th>
      <th>Date</th>
      <th>Action</th>   <!-- ✅ New column -->
    </tr>
  </thead>

  <tbody>
    <?php if(!empty($posts)): ?>
      <?php $i=1; foreach($posts as $row): ?>
        <tr>
          <td><?= $i++; ?></td>

          <td><?= html_escape($row->title); ?></td>

          <td>
            <img 
              src="<?= base_url('uploads/'.$row->image); ?>" 
              style="width:60px; height:60px; object-fit:cover; border-radius:6px; border:1px solid #ddd;">
          </td>

          <td style="max-width:250px; white-space: normal; word-break: break-word;">
            <?= substr(strip_tags($row->description), 0, 50); ?>...
          </td>

          <td><?= date('d-M-Y', strtotime($row->created_at)); ?></td>

          <!-- ✅ Action buttons -->
          <td>
            <a href="<?= base_url('index.php/Vishal/delete_post/'.$row->id); ?>" 
               class="btn btn-outline-danger btn-sm"
               onclick="return confirm('Are you sure you want to delete this post?');">
               <i class="fa fa-trash"></i>
            </a>
          </td>

        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="6" class="text-center">No records found</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

        </div>

      </div>
</div>
</div><!-- End Row-->

</div>
<!-- End container-fluid-->

</div><!--End content-wrapper-->
</div><!--End wrapper-->
<!-- Modal -->
<!-- Add Post Modal -->
<div class="modal fade" id="postModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">
          <i class="fa fa-star"></i> Add Post
        </h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <?php echo form_open_multipart('Vishal/save_post'); ?>

          <div class="form-group">
              <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
          </div>

          <div class="form-group">
              <label>Upload Image</label>
              <input type="file" name="image" class="form-control" accept="image/*" required>
          </div>

          <div class="form-group">
              <textarea name="description" rows="4" class="form-control" placeholder="Enter Paragraph" required></textarea>
          </div>

          <div class="text-right">
              <button type="submit" class="btn btn-primary">
                  Submit Post
              </button>
          </div>

        <?php echo form_close(); ?>
      </div>

    </div>
  </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<!-- simplebar js -->
<script src="<?php echo base_url();?>assets/plugins/simplebar/js/simplebar.js"></script>
<!-- waves effect js -->
<script src="<?php echo base_url();?>assets/js/waves.js"></script>
<!-- sidebar-menu js -->
<script src="<?php echo base_url();?>assets/js/sidebar-menu.js"></script>
<!-- Custom scripts -->
<script src="<?php echo base_url();?>assets/js/app-script.js"></script>

<!--Data Tables js-->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>



<!--Sweet Alerts -->
  <script src="<?php echo base_url();?>assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
  <script src="<?php echo base_url();?>assets/plugins/alerts-boxes/js/sweet-alert-script.js"></script>

<?php
  if($error = $this->session->flashdata('success')) {
    ?>
    <script>
      
      swal("Post added successfully!", "<?php echo $this->session->flashdata('success'); ?>", "success");

    </script>
    <?php
  }
  ?>

  <?php
  if($error = $this->session->flashdata('warning')) {
    ?>
    <script>
      swal("Warning!", "<?php echo $this->session->flashdata('warning'); ?>", "error");

    </script>
    <?php
  }
  ?>

<script>
 $(document).ready(function() {
      //Default data table
      $('#default-datatable').DataTable();


      var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'excel','print', ]
        //buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );

      table.buttons().container()
      .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
    } );

  </script>
  


