<?= $this->extend('./layouts/auth.layout.php'); ?>

<?= $this->section('auth'); ?>


<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 vh-100 justify-content-center align-items-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1 class="text-uppercase text-center mt-4">sb admin login</h1>
                <div class="my-5">

                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post">

                        <?php if (session()->getFlashdata('registrationSuccess')) : ?>
                            <div class="d-block" id="submitSuccessMessage">
                                <div class="alert alert-success text-center mb-3">
                                    <?= session()->getFlashdata('registrationSuccess') ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('verifyError')) : ?>
                            <div class="d-block" id="submitSuccessMessage">
                                <div class="alert alert-danger text-center">
                                    <?= session()->getFlashdata('verifyError') ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($errors['email'])) : ?>
                        <div class="alert alert-danger text-center"><?= $errors['email']; ?></div>
                        <?php endif; ?>

                        <?php if (isset($errors['email_val'])) : ?>
                        <div class="alert alert-danger text-center"><?= $errors['email_val'] ?></div>
                        <?php endif; ?>

                        <div class="form-floating">
                            <input class="form-control" id="email" name="email" autocomplete="off" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>

                        <div class="form-floating">
                            <input class="form-control" id="phone" name="password" type="password" autocomplete="off" placeholder="Enter your password..." data-sb-validations="required" />
                            <label for="phone">Password</label>

                        </div>

                        <br>
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
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase" type="submit" name="submit">
                            submit
                        </button> 
                                           
                    </form>
                    <h6 class="text-uppercase text-center mt-4">
                        Don't have an account? <a href="<?= url_to('register') ?>" class="link-primary">sign up here</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</main>


<?= $this->endsection(); ?>