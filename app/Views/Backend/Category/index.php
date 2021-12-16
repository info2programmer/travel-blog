<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Category </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="<?= site_url() ?><?= site_url() ?>assets/backend/backend/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/backend/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?= site_url() ?>assets/backend/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/backend/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/backend/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/backend/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= site_url() ?>assets/backend/css/jquery.mCustomScrollbar.css">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?= $this->include('Backend/Layouts/nav') ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?= $this->include('Backend/Layouts/sidenav') ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Manage Category</h5>
                                            <p class="m-b-0">Hello <?= session('name') ?> you can manage categoies in here</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="<?= site_url() ?>admin/dashboard"> <i class=" fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/dashboard">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Manage Category</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <?php if (session()->has('warning')) : ?>
                                                    <p class="alert alert-warning"><?= session('warning') ?></p>
                                                <?php endif ?>
                                                <?php if (session()->has('success')) : ?>
                                                    <p class="alert alert-warning"><?= session('success') ?></p>
                                                <?php endif ?>
                                                <?php if (session()->has('error')) : ?>
                                                    <p class="alert alert-danger"><?= session('error') ?></p>
                                                <?php endif ?>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Category List</h5>
                                                        <div class="card-header-right">
                                                            <a class="btn btn-success" href="<?= site_url() ?>admin/category-add">Add New</a>
                                                        </div>
                                                    </div>
                                                    <div class="card-block table-border-style">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Category Name</th>
                                                                        <th>Added By</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 0; ?>
                                                                    <?php foreach ($data as $list) : ?>
                                                                        <tr>
                                                                            <th scope="row"><?= ++$i ?></th>
                                                                            <td><?= $list['category_name'] ?></td>
                                                                            <td><?= $list['name'] ?></td>
                                                                            <td>
                                                                                <a href="<?= site_url() ?>backend/category/editCategory/<?= $list['id'] ?>" class="btn btn-warning btn-sm">Edit</a>

                                                                                <a class="btn btn-danger btn-sm" href="<?= site_url() ?>backend/category/deleteData/<?= $list['id'] ?>" onclick="return confirm('Are you sure to delete this category?')">Delete</a>

                                                                                <?php if ($list['publised'] == "1") : ?>
                                                                                    <a href="<?= site_url() ?>backend/category/changeStatus/<?= $list['id'] ?>/0" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure?')">Un-Publish</a>
                                                                                <?php else : ?>
                                                                                    <a href="<?= site_url() ?>backend/category/changeStatus/<?= $list['id'] ?>/1" class="btn btn-info btn-sm" onclick="return confirm('Are you sure?')">Publish</a>
                                                                                <?php endif ?>

                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="styleSelector">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="<?= site_url() ?>assets/backend/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="<?= site_url() ?>assets/backend/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="<?= site_url() ?>assets/backend/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="<?= site_url() ?>assets/backend/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="<?= site_url() ?>assets/backend/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="<?= site_url() ?>assets/backend/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?= site_url() ?>assets/backend/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?= site_url() ?>assets/backend/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?= site_url() ?>assets/backend/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="<?= site_url() ?>assets/backend/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= site_url() ?>assets/backend/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?= site_url() ?>assets/backend/js/SmoothScroll.js"></script>
    <script src="<?= site_url() ?>assets/backend/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <script src="<?= site_url() ?>assets/backend/js/pcoded.min.js"></script>
    <script src="<?= site_url() ?>assets/backend/js/vertical-layout.min.js "></script>
    <script src="<?= site_url() ?>assets/backend/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="<?= site_url() ?>assets/backend/js/script.js"></script>

</body>

</html>