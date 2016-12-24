<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-users"></i> All Users</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo site_url('user/new'); ?>" class="btn btn-info btn-sm">Add New</a>
                </div>
            </div>
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Group</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td>
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="<?php echo base_url('uploads/user/'.$user->avatar); ?>" alt="user image">
                                        <span class="username">
                                            <a href="<?php echo site_url('user/edit/'.$user->id); ?>"><?php echo $user->first_name.' '.$user->last_name; ?></a>
                                        </span>
                                        <span class="description"><?php echo $user->email; ?></span>
                                    </div>
                                </td>
                                <td><?php echo $user->phone; ?></td>
                                <td>
                    				<?php foreach ($user->groups as $group):?>
                                        <a href="<?php echo $group->id; ?>"><span class="label label-info"><?php echo $group->name; ?></span></a>
                					<?php endforeach?>
                    			</td>
                                <td><?php echo ($user->active == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>'; ?></td>
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

	oTable = $('#datatable').DataTable();

});
</script>
