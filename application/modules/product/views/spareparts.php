<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-cog"></i> Spareparts</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo site_url('sparepart/new'); ?>" class="btn btn-info btn-sm">Add New</a>
                </div>
            </div>
            <div class="box-body">
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Part Image</th>
                            <th>Part Name</th>
                            <th>Part Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
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
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax": {
			"url": "<?php echo site_url('product/sparepart/ajax_grid'); ?>",
			"type": "POST"
		},
        "columnDefs": [
			{"class": "action", "orderable": false, "targets": -1},
		],
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
