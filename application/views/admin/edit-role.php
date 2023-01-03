<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg">
            <form action ="<?= base_url('admin/edrole/').$role['id']?>" method="post">
         
                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="roleNow" name="roleNow" value="<?= $role['role']?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">New Role</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="newRole" name="newRole" ><?= form_error('newRole', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit Role</button>
                        <a href=<?= base_url('admin/role')?> class="btn btn-danger">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
 


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->