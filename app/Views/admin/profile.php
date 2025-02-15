<?= $this->extend('./layouts/admin.layout.php'); ?>

<?= $this->section('contents'); ?>


<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card-profile p-4">
        <?php if (session()->getFlashdata('profile_update')) : ?>
            <div
                class="text-danger fs-6">
                <?= session()->getFlashdata('profile_update') ?>
            </div>
        <?php endif; ?>
        <div class="image-profile d-flex flex-column justify-content-center align-items-center"> <button class="btn-profile btn-secondary"> <img src="<?= base_url() ?>public/assets/images/user_profile/<?= session()->get('image') ?>" height="250" width="250" class="img-profile rounded-circle" /></button> <span class="name-profile mt-3"><?= session()->get('name') ?></span> <span class="idd-profile"><?= session()->get('email') ?></span>

            <div class=" d-flex mt-2"> <a href="<?= url_to('edit-profile') ?>" role="button" class="btn btn-dark btn-lg text-center ">Edit Profile</a> </div>
            <div class="text-profile mt-3"> <span><?= session()->get('name') ?> is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT minting@ with FND night. </span> </div>
        </div>
    </div>
</div>



<?= $this->endsection(); ?>