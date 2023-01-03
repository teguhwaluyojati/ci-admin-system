<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 ml-4"><?= $title ?></h1>

    <!-- Tables -->
    <table class="table table-hover" id="table_dashboard">
        <thead>
            <a class="btn btn-sm btn-success ml-4 mb-4" href="<?= base_url('admin/user') ?>"><i class="fas fa-edit"></i> Add New User</a>
            <?= $this->session->flashdata('message'); ?>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dashboard as $d) : ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $d['name'] ?></td>
                    <td><?= $d['email'] ?></td>
                    <td><?php if ($d['role_id'] == 1) : ?>
                            Admin
                        <?php elseif ($d['role_id'] != 1) : ?>
                            User
                        <?php endif; ?></td>
                    <td><?php if ($d['is_active'] == 1) : ?>
                            Active
                        <?php elseif ($d['is_active'] != 1) : ?>
                            Not Active
                        <?php endif; ?></td>
                    <td>
                        <a href="<?=base_url('admin/edit/'). $d['id'];?>" class="badge badge-success">Edit</a>
                        <a href="<?=base_url('admin/delete/'). $d['id']?>" class="badge badge-danger" class="badge badge-danger" data-toggle="modal" name="delId"data-target="#deleteUserModal">Delete</a>
                    </td>
                    <?php $i++ ?>
                <?php endforeach; ?>
                </tr>
        </tbody>
    </table>
    


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Delete Menu Modal-->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are You Sure Want To Delete?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Delete" below if you sure to delete.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('admin/delete/'. $d['id']) ?>">Delete</a>
            </div>
        </div>
    </div>
</div>