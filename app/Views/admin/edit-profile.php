<?= $this->extend('./layouts/admin.layout.php'); ?>

<?= $this->section('contents'); ?>


<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card-profile p-4">
        <div class="image-profile d-flex flex-column justify-content-center align-items-center"> <button class="btn-profile btn-secondary"> <img src="<?= base_url() ?>public/assets/images/user_profile/<?= session()->get('image') ?>" height="250" width="250" class="img-profile rounded-circle" /></button>

            <?php if (session()->getFlashdata('profile_update_failed')) : ?>
                <div
                    class="text-danger fs-6">
                    <?= session()->getFlashdata('profile_update_failed') ?>
                </div>
            <?php endif; ?>
            <form action="<?= url_to('edit-profile') ?>" method="post" enctype="multipart/form-data">

                <div class="form-floating">
                    <input
                        autocomplete="off"
                        class="form-control mt-3"
                        id="name"
                        type="text"
                        value="<?= session()->get('name') ?>"
                        name="name" />
                    <label for="name">Name</label>
                    <?php if (isset($errordata['name'])) : ?>
                        <div
                            class="text-danger fs-6">
                            <?= $errordata['name'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-floating">
                    <input
                        autocomplete="off"
                        class="form-control mt-3"
                        id="name"
                        type="text"
                        value="<?= session()->get('username') ?>"
                        name="username" />
                    <label for="name">Username</label>
                    <?php if (isset($errordata['username'])) : ?>
                        <div
                            class="text-danger fs-6">
                            <?= $errordata['username'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-floating">
                    <input
                        autocomplete="off"
                        class="form-control mt-3"
                        id="email"
                        type="text"
                        value="<?= session()->get('email') ?>"
                        data-sb-validations="required,email"
                        name="email" />
                    <label for="email">Email address</label>
                    <?php if (isset($errordata['email'])) : ?>
                        <div
                            class="text-danger fs-6">
                            <?= $errordata['email'] ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-floating">
                    <input autocomplete="off" class="form-control mt-3" id="phone" type="file" name="image" placeholder="Enter your phone number..." data-sb-validations="required" />
                    <label for="phone">Image</label>
                    <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                </div>
                <p>Please note that after editting your file,you'll have to login again</p>
                <div class=" d-flex mt-2"> <button class="btn-profile-1 btn-dark" type="submit" name="submit">Edit Profile</button> </div>
            </form>

            <div class="text-profile mt-3"> <span><?= session()->get('name') ?> is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT minting@ with FND night. </span> </div>
        </div>
    </div>
</div>



<?= $this->endsection(); ?>