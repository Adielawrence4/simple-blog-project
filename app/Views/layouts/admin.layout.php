<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin dashboard</title>


    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/Bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/sb-admin/css/all.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/sb-admin/css/sb-admin-2.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>public/assets/sb-admin/css/style.css" />

</head>

<body>
    <div class="container-fluid mt-1" style="padding-left: 0">
        <div class="row">
            <!-- Page Wrapper -->
            <div id="wrapper">
                <!-- Sidebar -->
                <ul
                    class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
                    id="accordionSidebar">
                    <!-- Sidebar - Brand -->
                    <a
                        class="sidebar-brand d-flex align-items-center justify-content-center"
                        href="index.html">
                        <img
                            class="img-profile rounded-circle"
                            src="<?= base_url() ?>public/assets/images/user_profile/<?= $users_info['image'] ?>"
                            style="width: 50px; height: 50px;" />
                        <div class="sidebar-brand-text mx-3">SB Admin</div>
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0" />

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= url_to('dashboard') ?>">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider" />

                    <!-- Nav Item - Charts -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url_to('admin.post') ?>">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Blog</span></a>
                    </li>

                    <hr class="sidebar-divider" />

                    <!-- Nav Item - Tables -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url_to('admin.comment') ?>">
                            <i class="fas fa-fw fa-table"></i>
                            <span>comment</span></a>
                    </li>

                    <hr class="sidebar-divider" />

                    <!-- Nav Item - contact -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url_to('admin.contact') ?>">
                            <i class="fas fa-fw fa-table"></i>
                            <span>contacts</span></a>
                    </li>

                    <hr class="sidebar-divider" />

                    <!-- Nav Item - user -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= url_to('admin.user') ?>">
                            <i class="fas fa-fw fa-table"></i>
                            <span>users</span>
                        </a>
                    </li>
                </ul>
                <!-- End of Sidebar -->
                <!-- End of Page Wrapper -->

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <!-- Main Content -->
                    <div id="content">
                        <!-- Topbar -->
                        <nav
                            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                            <!-- Sidebar Toggle (Topbar) -->
                            <button
                                id="sidebarToggleTop"
                                class="btn btn-link d-md-none rounded-circle mr-3">
                                <i class="fa fa-bars"></i>
                            </button>

                            <!-- Topbar Search -->
                            <form
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control bg-light border-0 small"
                                        placeholder="Search for..."
                                        aria-label="Search"
                                        aria-describedby="basic-addon2" />
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Topbar Navbar -->
                            <ul class="navbar-nav ml-auto w-auto">
                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                                <a href="<?= url_to('logout') ?>"><img src="<?= base_url() ?>public/assets/images/ui/logout_exit_icon_221144.png" style="width: 40px;" alt=""></a>

                                <!-- Nav Item - User Information -->
                            </ul>
                        </nav>
                        <!-- End of Topbar -->


                        <?= $this->rendersection('contents'); ?>

                        <!-- End of Main Content -->
                    </div>

                    <!-- End of Content Wrapper -->
                </div>
            </div>
        </div>

        <script src="<?= base_url() ?>public/assets/Bootstrap/js/bootstrap.bundle.js"></script>
    </body>

</html>