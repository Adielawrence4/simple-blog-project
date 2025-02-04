<?= $this->extend('./layouts/admin.layout.php'); ?>

<?= $this->section('contents'); ?>


<?php if (session()->getFlashdata('loggedIn')) : ?>
    <div class="alert alert-success text-center"><?= session()->getFlashdata('loggedIn') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('forbidden')) : ?>
    <div class="alert alert-success text-center"><?= session()->getFlashdata('forbidden') ?></div>
<?php endif; ?>
<div class="main-content">

    <!-- COUNTING POST -->
    <?php if (empty($total_post)) : ?>
        <div class="content shadow-lg">
            <div
                class="d-flex flex-column justify-content-center align-items-center h-100">
                <h2>0</h2>
                <h4>Blog Post</h4>
            </div>
        </div>
    <?php else : ?>
        <?php if (is_array($total_post)) : ?>
            <div class="content shadow-lg">
                <div
                    class="d-flex flex-column justify-content-center align-items-center h-100">
                    <h2><?= count($total_post) ?></h2>
                    <h4>Blog post</h4>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>


    <!-- COUNTING comment -->
    <?php if (empty($total_comment)) : ?>
        <div class="content shadow-lg">
            <div
                class="d-flex flex-column justify-content-center align-items-center h-100">
                <h2>0</h2>
                <h4>Comment</h4>
            </div>
        </div>
    <?php else : ?>
        <?php if (is_array($total_comment)) : ?>
            <div class="content shadow-lg">
                <div
                    class="d-flex flex-column justify-content-center align-items-center h-100">
                    <h2><?= count($total_comment) ?></h2>
                    <h4>Comment</h4>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>




    <!-- COUNTING user -->
    <?php if (empty($total_user)) : ?>
        <div class="content shadow-lg">
            <div
                class="d-flex flex-column justify-content-center align-items-center h-100">
                <h2>0</h2>
                <h4>User</h4>
            </div>
        </div>
    <?php else : ?>
        <?php if (is_array($total_user)) : ?>
            <div class="content shadow-lg">
                <div
                    class="d-flex flex-column justify-content-center align-items-center h-100">
                    <h2><?= count($total_user) ?></h2>
                    <h4>User</h4>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>


    <?php if (empty($total_contact)) : ?>
        <div class="content shadow-lg">
            <div
                class="d-flex flex-column justify-content-center align-items-center h-100">
                <h2>0</h2>
                <h4>Contact</h4>
            </div>
        </div>
    <?php else : ?>
        <?php if (is_array($total_contact)) : ?>
            <div class="content shadow-lg">
                <div
                    class="d-flex flex-column justify-content-center align-items-center h-100">
                    <h2><?= count($total_contact) ?></h2>
                    <h4>Contact</h4>
                </div>
            </div>
        <?php endif; ?>

    <?php endif; ?>
</div>
</div>

<!-- End of Main Content -->



<?= $this->endsection(); ?>