<?= $this->extend('./layouts/admin.layout.php'); ?>
<?= $this->section('contents'); ?>

<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center align-items-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h3 class="h3 text-center text-uppercase">create post</h3>
                <div class="my-5">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post" action="<?= url_to('create_post') ?>" enctype="multipart/form-data">
                        <div class="form-floating ">
                            <input autocomplete="off" class="form-control" id="name" name="title" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Title</label>
                            <?php if (isset($errors['title'])) : ?>
                                <div
                                class="text-danger fs-6"
                                >
                                <?= $errors['title'] ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-floating my-4">
                            <textarea class="form-control" id="message" name="content" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                            <label for="message">Content</label>
                            <?php if (isset($errors['content'])) : ?>
                                <div
                                class="text-danger fs-6"
                                >
                                <?= $errors['content'] ?>
                            </div>
                            <?php endif; ?>                        
                        </div>
                        <div class="form-floating">
                            <input autocomplete="off" class="form-control" id="phone" type="file" name="image" placeholder="Enter your phone number..." data-sb-validations="required" />
                            <label for="phone">Image</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                         <?php if (session()->getFlashdata('postSuccess')) : ?>
                            <div class="d-block" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder"><?= session()->getFlashdata('postSuccess') ?></div>
                                    
                                </div>
                            </div>
                            <?php endif; ?>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <?php if (session()->getFlashdata('postError')) : ?>
                                <div class="d-block" id="submitErrorMessage">
                                    <div class="text-center text-danger mb-3"><?= session()->getFlashdata('postError') ?></div>
                                </div>
                            <?php endif; ?>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase w-25" id="submitButton" name="submit" type="submit">add post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endsection(); ?>