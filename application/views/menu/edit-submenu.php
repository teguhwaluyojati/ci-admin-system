<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg">
            <form action ="<?= base_url('menu/edsubmenu/').$submenu['id']?>" method="post">
         
                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="oldtitle" name="oldtitle" value="<?=$submenu['title']?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">New Title</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="newTitle" name="newTitle"><?= form_error('newTitle', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="newIcon" name="newIcon" value="<?=$submenu['icon']?>">
                    </div>
                </div>

                
                <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-3">
                    <select class="custom-select" name="newStatus">
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>
                </div>
            </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit Role</button>
                        <a href=<?= base_url('menu/submenu')?> class="btn btn-danger">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
 


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->