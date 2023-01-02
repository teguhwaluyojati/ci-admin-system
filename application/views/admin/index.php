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
                        <form action="<?=base_url('admin/delete/'). $d['id'];?>" method ="post">
                        <input type="hidden"name="delId" value="<?=$d['id']?>" >
                        <button type="submit" class="btn btn-danger btn-xs"title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                        </form>

                        <form action="<?=base_url('admin/edit/'). $d['id'];?>" method ="post">
                        <input type="hidden"name="edId" value="<?=$d['id']?>">
                        <button type="submit" class="btn btn-success btn-xs">
                            <i class="fas fa-pen"></i>
                        </button>
                        </form>
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