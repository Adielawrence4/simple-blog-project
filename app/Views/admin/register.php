<?= $this->extend('./layouts/auth.layout.php'); ?>

<?= $this->section('auth'); ?>


<!-- Main Content-->
<main class="mb-4" style="margin-bottom: 150px !important;">
    <div class="container px-4 px-lg-5">
        <div
            class="row gx-4 gx-lg-5 vh-100 justify-content-center align-items-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1 class="text-uppercase text-center mt-4">
                    sb admin registration
                </h1>
                <div class="my-5">
                    <form id="contactForm"
                        data-sb-form-api-token="API_TOKEN"
                        method="post"
                        action="<?= url_to('register') ?>"
                        enctype="multipart/form-data">



                        <div class="form-floating">
                            <input
                                autocomplete="off"
                                class="form-control"
                                id="name"
                                type="text"
                                placeholder="Enter your name..."
                                name="name" />
                            <label for="name">Name</label>
                            <?php if (isset($errordata['name'])) : ?>
                                <div
                                class="text-danger fs-6"
                                >
                                <?= $errordata['name'] ?>
                            </div>
                            <?php endif; ?>    
                        </div>
                        <div class="form-floating">
                            <input
                                autocomplete="off"
                                class="form-control"
                                id="name"
                                type="text"
                                placeholder="Enter your username..."
                                name="username" />
                            <label for="name">Username</label>
                            <?php if (isset($errordata['username'])) : ?>
                                <div
                                class="text-danger fs-6"
                                >
                                <?= $errordata['username'] ?>
                            </div>
                            <?php endif; ?> 
                        </div>
                        <div class="form-floating">
                            <input
                                autocomplete="off"
                                class="form-control"
                                id="email"
                                type="text"
                                placeholder="Enter your email..."
                                data-sb-validations="required,email"
                                name="email" />
                            <label for="email">Email address</label>
                            <?php if (isset($errordata['email'])) : ?>
                                <div
                                class="text-danger fs-6"
                                >
                                <?= $errordata['email'] ?>
                            </div>
                            <?php endif; ?> 
                            <?php if (isset($errordata['email_duplication'])) : ?>
                                <div
                                class="text-danger fs-6"
                                >
                                <?= $errordata['email_duplication'] ?>
                            </div>
                            <?php endif; ?> 
                        </div>
                        <div class="form-floating">
                            <input
                                autocomplete="off"
                                class="form-control"
                                id="phone"
                                type="password"
                                placeholder="Enter your password..."
                                name="password" />
                            <label for="phone">Password</label>
                            <?php if (isset($errordata['password'])) : ?>
                                <div
                                class="text-danger fs-6"
                                >
                                <?= $errordata['password'] ?>
                            </div>
                            <?php endif; ?> 
                        </div>
                        <div class="form-floating">
                            <input
                                autocomplete="off"
                                class="form-control"
                                id="phone"
                                type="password"
                                placeholder="Enter your password..."
                                name="confirmPassword" />
                            <label for="phone">Confirm Password</label> 
                        </div>
                        <div class="form-floating">
                            <input
                                autocomplete="off"
                                class="form-control"
                                id="phone"
                                type="file"
                                placeholder="Select your image profile..."
                                name="image" />
                            <label for="phone">Image</label>
                            <div
                                class="invalid-feedback"
                                data-sb-feedback="phone:required">
                                image is required.
                            </div>
                        </div>
                        <br />
                        <!-- Submit success message-->

                        <!-- an error submitting the form-->
                         <?php if (session()->getFlashdata('registrationError')) : ?>
                        <div class="d-block" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">
                                <?= session()->getFlashdata('registrationError') ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('passError')) : ?>
                        <div class="d-block" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">
                                <?= session()->getFlashdata('passError') ?>
                            </div>
                        </div>
                        <?php endif; ?>


                        <!-- Submit Button-->
                        <button
                            class="btn btn-primary text-uppercase"
                            type="submit" 
                            name="submit">
                            submit
                        </button>
                    </form>
                    <h5 class="text-uppercase text-center mt-4">
                        Don't have an account? <a href="<?= url_to('login') ?>" class="link-primary">sign in</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</main>


<?= $this->endsection(); ?>