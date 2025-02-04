<?= $this->extend('./layouts/main.layout.php'); ?>
<?= $this->section('main'); ?>

<header class="masthead" style="background-image: url('<?= base_url() ?>public/assets/images/ui/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1><?= $single_post['title'] ?></h1>
                        <span class="meta">
                            Posted by
                            <a href="#!">Adie Lawrence</a>
                            <?= $single_post['created_at'] ?>
                        </span>
                    </div>
            </div>
        </div>
    </div>
</header>

<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-10 fs-3">
                    <?= $single_post['content'] ?>
                </div>

            <div class="col-md-10 col-lg-8 col-xl-10 mt-5">
                <h1 class="h1 ">comments</h1>

                <div>
                    <?php foreach ($comments as $comment) : ?>
                        <p class="fs-5 text-black-50 ps-2"><?= $comment['comment'] ?></p>
                        <hr />
                    <?php endforeach; ?>
                </div>

                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post" action="<?= url_to('add_view_comment', $single_post['post_id']) ?>">

                        <div class="form-floating">
                            <input type="hidden" name="post_id" value="<?= $single_post['post_id'] ?>">
                            <textarea class="form-control fs-5" name="comment" id="message" placeholder="Enter your message here..." style="height: 6rem" data-sb-validations="required"></textarea>
                            <label for="message">comment on this post</label>
                        </div>
                        <br />
                        <button class="btn btn-primary text-uppercase" name="submit" id="submitButton" type="submit">Send</button>
                    </form>
            </div>
        </div>
    </div>
</article>




<?= $this->endsection(); ?>