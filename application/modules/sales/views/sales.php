<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-users"></i> All Sales</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo site_url('sales/new'); ?>" class="btn btn-info btn-sm">Add New</a>
                </div>
            </div>
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sales as $sales) : ?>
                            <tr>
                                <td>
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="<?php echo base_url('uploads/sales/'.$sales['sales_img']); ?>" alt="user image">
                                        <span class="username">
                                            <a href="<?php echo site_url('sales/edit/'.$sales['sales_id']); ?>"><?php echo $sales['sales_name']; ?></a>
                                        </span>
                                        <span class="description"><?php echo $sales['sales_email']; ?></span>
                                    </div>
                                </td>
                                <td><?php echo $sales['sales_phone']; ?></td>
                                <td><?php echo $sales['sales_website']; ?></td>
                                <td>
                                    <div class="btn btn-group">
                                        <a class="btn btn-link" title="edit" href="<?php echo site_url('sales/edit/'.$sales['sales_id']); ?>"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-link btn-del" title="delete" href="<?php echo site_url('sales/delete/'.$sales['sales_id']); ?>"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?php asset_url('admin'); ?>js/jquery.dataTables.js"></script>
<script src="<?php asset_url('admin'); ?>js/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function(){

    oTable = $('#datatable').DataTable({
		"drawCallback": function ( settings) {

             $('.btn-del').on('click', function(e){
                e.preventDefault();
                $('#myConfirm, a.action').attr('href', $(this).attr('href'));
                $('#myConfirm').modal('show');
            });

            $('[title]').tooltip();
        },

	});


});
</script>
