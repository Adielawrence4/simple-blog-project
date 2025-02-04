<?= $this->extend('./layouts/admin.layout.php'); ?>
<?= $this->section('contents'); ?>


<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Blog DataTables</h6>
        <a href="<?= url_to('create_post') ?>" class="btn btn-primary btn-lg" style="transform: translateY(-10px);">add post</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <?php if (session()->getFlashdata('deleteMessage')) : ?>
                <div class="alert alert-success text-center"><?= session()->getFlashdata('deleteMessage') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('deleteError')) : ?>
                <div class="alert alert-danger text-center"><?= session()->getFlashdata('deleteError') ?></div>
            <?php endif; ?>
            <?php if (empty($all_posts)) : ?>
                <h1 class="h1 text-center">No post uploaded</h1>
                <a href="<?= url_to('create_post') ?>" class="btn btn-primary text-uppercase w-25 fs-4 mt-3" style="margin-left:550px;">add post</a>
            <?php else: ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Created_at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Created_at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($all_posts as $post) : ?>
                            <tr>
                                <td><?= $post['id'] ?></td>
                                <td><?= $post['title'] ?></td>
                                <td><?= $post['content'] ?></td>
                                <td><?= $post['created_at'] ?></td>
                                <td><a href="<?= url_to('edit_post', $post['id']) ?>" class="btn btn-primary" style="width: 100%;">Edit</a></td>
                                <form action="<?= url_to('delete_post', $post['id']) ?>" method="post">
                                    <td><button name="delete" class="btn btn-danger" style="width: 100%;">Delete</button></td>
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