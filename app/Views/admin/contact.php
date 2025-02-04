<?= $this->extend('./layouts/admin.layout.php'); ?>
<?= $this->section('contents'); ?>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Blog DataTables</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <?php if (session()->getFlashdata('contactDelete')) : ?>
                <div class="alert alert-success text-center"><?= session()->getFlashdata('contactDelete') ?></div>
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('contactDeleteError')) : ?>
                    <div class="alert alert-success text-center"><?= session()->getFlashdata('contactDeleteError') ?></div>
            <?php endif; ?>

            <?php if (empty($all_contacts)) : ?>

                <h1 class="h1 text-center">No contact for now</h1>
            <?php else : ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Created_at</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Created_at</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($all_contacts as $contact) : ?>
                            <tr>
                                <td><?= $contact['name'] ?></td>
                                <td><?= $contact['email'] ?></td>
                                <td><?= $contact['number'] ?></td>
                                <td><?= $contact['message'] ?></td>
                                <td><?= $contact['created_at'] ?> </td>

                                <form action="<?= url_to('delete_contact', $contact['id']) ?>" method="post">
                                <td><button type="submit" class="btn btn-danger">Delete</button></td>
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