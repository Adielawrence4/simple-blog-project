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
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
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
                            id="submitButton"
                            type="submit" 
                            name="submit">
                            submit
                        </button>
                    </form>
                    <h5 class="text-uppercase text-center mt-4">
                        Don't have an account? <a href="login.html" class="link-primary">sign in</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</main>


<?= $this->endsection(); ?>