<?= $this->extend('./layouts/main.layout.php'); ?>
<?= $this->section('main'); ?>


<?php if (url_is('content')) : ?>
    <header class="masthead" style="background-image: url('<?= base_url() ?>public/assets/images/ui/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Simple Blog</h1>
                        <span class="subheading">A Blog created by Adie Lawrence</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <?php foreach ($all_posts as $post) : ?>
                    <?php foreach ($author as $$author) : ?>
                        <!-- Post preview-->
                        <div class="post-preview mt-5">
                            <a href="<?= url_to('view', $post['post_id']) ?>">
                                <h2 class="post-title"><?= $post['title'] ?></h2>
                                <!-- <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3> -->
                            </a>
                            <p class="post-meta">
                                Posted by

                                <a href="mailto:<?= $post['email'] ?>"><?= $post['name'] ?></a>
                                <?php

                                $date = $post['created_at'];
                                $newdate = explode(' ', $date);
                                echo $newdate[0];
                                ?>
                            </p>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <!-- Post preview-->
                <!-- <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.</h2>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on September 18, 2023
                </p>
            </div> -->
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="<?= url_to('index') ?>">Newer Posts →</a></div>
            </div>
        </div>
    </div>
<?php else : ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('<?= base_url() ?>public/assets/images/ui/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Simple Blog</h1>
                        <span class="subheading">A Blog created by Adie Lawrence</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <?php foreach ($view_posts as $post) : ?>
                    <!-- Post preview-->
                    <div class="post-preview mt-5">
                        <a href="<?= url_to('view', $post['post_id']) ?>">
                            <h2 class="post-title"><?= $post['title'] ?></h2>
                            <!-- <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3> -->
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="mailto:<?= $post['email'] ?>"><?= $post['name'] ?></a>
                            <?php

                            $date = $post['created_at'];
                            $newdate = explode(' ', $date);
                            echo $newdate[0];
                            ?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                <?php endforeach; ?>
                <!-- Post preview-->
                <!-- <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.</h2>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        on September 18, 2023
                    </p>
                </div> -->
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="<?= url_to('content') ?>">Older Posts →</a></div>
            </div>
        </div>
    </div>
<?php endif; ?>


<?= $this->endsection(); ?>