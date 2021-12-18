<!DOCTYPE html>
<html lang="en">

<head>
    <title> <?php if (isset($mode) && $mode == "edit") : ?>Edit <?= $data['blog_title'] ?><?php else : ?>Create New blog<?php endif ?> </title>
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
    <link rel="icon" href="<?= site_url() ?>assets/backend/images/favicon.ico" type="image/x-icon">
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
                                            <h5 class="m-b-10"> <?php if (isset($mode) && $mode == "edit") : ?>Edit<?php else : ?>Create<?php endif ?> blog</h5>
                                            <p class="m-b-0">Hello <?= session('name') ?>! you can <?php if (isset($mode) && $mode == "edit") : ?>edit <?php else : ?>create new<?php endif ?> categry in this section</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="<?= site_url() ?>admin/dashboard"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="<?= site_url() ?>admin/blog-list">Manage blog</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!"><?php if (isset($mode) && $mode == "edit") : ?>Edit<?php else : ?>Create<?php endif ?> blog</a>
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
                                                <?php if (session()->has('errors')) : ?>
                                                    <?php foreach (session('errors') as $list) : ?>
                                                        <p class="alert alert-danger"><?= $list ?></p>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                                <?php if (session()->has('warning')) : ?>
                                                    <p class="alert alert-warning"><?= session('warning') ?></p>
                                                <?php endif ?>

                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5><?php if (isset($mode) && $mode == "edit") : ?>Edit blog<?php else : ?>Add New<?php endif ?> </h5>
                                                        <!-- <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa-chevron-left"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-times close-card"></i></li>
                                                            </ul>
                                                        </div> -->
                                                    </div>
                                                    <div class="card-block">
                                                        <?php if (isset($mode) && $mode == "edit") : ?>
                                                            <?= form_open_multipart("") ?>
                                                        <?php else : ?>
                                                            <?= form_open_multipart(site_url() . "Backend/blog/createBlog") ?>
                                                        <?php endif ?>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Title</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="blog_title" class="form-control" required value="<?php if (isset($mode) && $mode == "edit") : ?><?= $data['blog_title'] ?><?php old('blog_title') ?><?php endif ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Description</label>
                                                            <div class="col-sm-10">
                                                                <textarea name="blog_details" class="form-control" id="blog_details" rows="10"><?php if (isset($mode) && $mode == "edit") : ?><?= $data['blog_details'] ?><?php else : ?><?php old('blog_details') ?><?php endif ?></textarea>
                                                            </div>
                                                        </div>
                                                        <?php if (isset($mode) && $mode == "edit") : ?>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Old Image</label>
                                                                <div class="col-sm-10">
                                                                    <img src="<?= site_url() ?>backend/blog/image/<?= $data['blog_image'] ?>" alt="">
                                                                </div>
                                                            </div>
                                                        <?php endif ?>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Image</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" name="blog_image" id="blog_image" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Youtube Link</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="youtube_link" class="form-control" value="<?php if (isset($mode) && $mode == "edit") : ?><?= $data['youtube_link'] ?><?php old('youtube_link') ?><?php endif ?>">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Category</label>
                                                            <div class="col-sm-10">
                                                                <select name="category_id" id="category_id" class="form-control">
                                                                    <option value="">Select Category</option>
                                                                    <?php foreach ($category as $list) : ?>
                                                                        <option value="<?= $list['id'] ?>" <?php if (isset($mode) && $mode == "edit" && $list['id'] == $data['category_id']) : ?>selected<?php endif ?>><?= $list['category_name'] ?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                        </div>




                                                        <button type="submit" class="btn btn-success"><?php if (isset($mode) && $mode == "edit") : ?>Update<?php else : ?>Create <?php endif ?> </button>

                                                        <?= form_close() ?>
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