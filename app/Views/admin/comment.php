<?= $this->extend('./layouts/admin.layout.php'); ?>
<?= $this->section('contents'); ?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Comment DataTables</h6>
    </div>

    <div>
        <?php if (session()->getflashdata('deleteCommentFailed')) : ?>

            <div class="alert alert-danger mt-3">
                <?= session()->getflashdata('deleteCommentFailed') ?>
            </div>
        <?php endif; ?>
    </div>

    <div>
        <?php if (session()->getflashdata('deletedCommentSuccessfully')) : ?>

            <div class="alert alert-success mt-3">
                <?= session()->getflashdata('deletedCommentSuccessfully') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <?php if (empty($all_comments)) : ?>

                <h1 class="h1 text-center">No comments. Check back later</h1>
            <?php else : ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>comment</th>
                            <th>post_id</th>
                            <th>Created_at</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>comment</th>
                            <th>post_id</th>
                            <th>Created_at</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($all_comments as $comment) : ?>
                            <tr>
                                <td><?= $comment['id'] ?></td>
                                <td><?= $comment['comment'] ?></td>
                                <td><?= $comment['post_id'] ?></td>
                                <td><?= $comment['created_at'] ?></td>
                                <form action="<?= url_to('delete_comment', $comment['id']) ?>" method="post">
                                    <td><button class="btn btn-danger w-100" type="submit" name="delete">Delete</button></td>
                                </form>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>


<?= $this->endsection(); ?>