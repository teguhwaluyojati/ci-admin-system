<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg">
            <form action ="<?= base_url('admin/edit/').$now['id']?>" method="post">
            <div class="form-group row">
                <!-- <label for="id" class="col-sm-2 col-form-label">User ID</label> -->
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="idNow" name="idNow" value="<?= $now['id']?>" hidden>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Fullname</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name"value="<?= $now['name']?>" ><?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $now['email']?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">New Email?</label>
                <div class="col-sm-5">
                <input type="email" class="form-control" id="email1" name="email1"> <?= form_error('email1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-3">
                <select class="custom-select" name ="role">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-3">
                    <select class="custom-select" name="status">
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit User</button>
                    <a href=<?= base_url('admin')?> class="btn btn-danger">Back</a>
                </div>
            </div>

            

            </form>
        </div>
    </div>
 


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->