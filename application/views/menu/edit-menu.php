<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg">
            <form action ="<?= base_url('menu/edmenu/').$menu['id']?>" method="post">
         
                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">Menu</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="roleNow" name="roleNow" value="<?= $menu['menu']?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-sm-2 col-form-label">New Menu</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="newMenu" name="newMenu" ><?= form_error('newMenu', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit Menu</button>
                        <a href=<?= base_url('menu')?> class="btn btn-danger">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
 


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->