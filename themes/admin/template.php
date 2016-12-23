<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shark | Administrator</title>
    <link href="<?php echo base_url('favicon.ico'); ?>" rel="shortcut icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/select2.min.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/ionicons.min.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/style.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/iCheck/blue.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/daterangepicker.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/blue.min.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/pace.min.css">
    <script src="<?php asset_url('admin'); ?>js/jquery-2.2.3.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="" class="logo">
                <span class="logo-mini"><img src="<?php asset_url('admin'); ?>img/logo-small.png" alt="Hardware and Tools" height="30px"/></span>
                <span class="logo-lg"><img src="<?php asset_url('admin'); ?>img/logo.png" alt="Hardware and Tools" height="30px"/></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?php echo site_url(); ?>" target="_blank"><i class="fa fa-globe"></i> view site</a>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url('uploads/user/'.login_data('avatar')); ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo login_data('first_name').' '.login_data('last_name'); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?php echo base_url('uploads/user/'.login_data('avatar')); ?>" class="img-circle" alt="User Image">
                                    <p><?php echo login_data('first_name').' '.login_data('last_name'); ?><small><?php echo login_data('email'); ?></small></p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('user/profile/'.login_data('id'));?>" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu">
                    <li class="<?php menu_active('dashboard'); ?>">
                        <a href="<?php echo site_url('dashboard'); ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pencil"></i> <span>Posts</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php menu_active('articles'); ?>">
                                <a href="<?php echo site_url('articles'); ?>"><i class="fa fa-circle-o"></i> Articles</a>
                            </li>
                            <li class="<?php menu_active('categories'); ?>">
                                <a href="<?php echo site_url('categories'); ?>"><i class="fa fa-circle-o"></i> Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cubes"></i> <span>Products</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo site_url('products'); ?>"><i class="fa fa-circle-o"></i> Products</a></li>
                            <li><a href="<?php echo site_url('spareparts'); ?>"><i class="fa fa-circle-o"></i> Spareparts</a></li>
                            <li><a href="<?php echo site_url('product_categories'); ?>"><i class="fa fa-circle-o"></i> Categories</a></li>
                        </ul>
                    </li>
                    <li class="<?php menu_active('banners'); ?>">
                        <a href="<?php echo site_url('banners'); ?>">
                            <i class="fa fa-industry"></i> <span>Slider Banner</span>
                        </a>
                    </li>
                    <li class="<?php menu_active('pagebanners'); ?>">
                        <a href="<?php echo site_url('pagebanners'); ?>">
                            <i class="fa fa-industry"></i> <span>Page Banner</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-black-tie"></i> <span>Career</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo site_url('careers'); ?>"><i class="fa fa-circle-o"></i> Job Vacancies</a></li>
                            <li><a href="<?php echo site_url('applicants'); ?>"><i class="fa fa-circle-o"></i> Job Applicants</a></li>
                        </ul>
                    </li>
                    <li class="<?php menu_active('testimony'); ?>">
                        <a href="<?php echo site_url('testimony'); ?>">
                            <i class="fa fa-comments"></i> <span>Testimony</span>
                        </a>
                    </li>
                    <li class="<?php menu_active('projects'); ?>">
                        <a href="<?php echo site_url('projects'); ?>">
                            <i class="fa fa-industry"></i> <span>Projects</span>
                        </a>
                    </li>
                    <li class="<?php menu_active('partners'); ?>">
                        <a href="<?php echo site_url('partners'); ?>">
                            <i class="fa fa-building"></i> <span>Partners</span>
                        </a>
                    </li>
                    <li class="<?php menu_active('clients'); ?>">
                        <a href="<?php echo site_url('clients'); ?>">
                            <i class="fa fa-building"></i> <span>Clients</span>
                        </a>
                    </li>
                    <li class="<?php menu_active('sales'); ?>">
                        <a href="<?php echo site_url('sales'); ?>">
                            <i class="fa fa-users"></i> <span>Sales</span>
                        </a>
                    </li>
                    <!--<li class="<?php menu_active('banners'); ?>">
                        <a href="<?php echo site_url('banners'); ?>">
                            <i class="fa fa-industry"></i> <span>Page Banner</span>
                        </a>
                    </li>-->
                    <li class="<?php menu_active('pages'); ?>">
                        <a href="<?php echo site_url('pages'); ?>">
                            <i class="fa fa-files-o"></i> <span>Static Content</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-gears"></i> <span>Settings</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php menu_active('general_setting'); ?>">
                                <a href="<?php echo site_url('general_setting'); ?>"><i class="fa fa-circle-o"></i> <span>Site</span></a>
                            </li>
                            <li class="<?php menu_active('users'); ?>">
                                <a href="<?php echo site_url('users'); ?>"><i class="fa fa-circle-o"></i> <span>Users</span></a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </section>
        </aside>

        <!-- =============================================== -->

        <div class="content-wrapper">
            <section class="content-header">
                <h1>&nbsp;</h1>
                <?php echo ($this->breadcrumbs->show()) ? $this->breadcrumbs->show() : ''; ?>
            </section>
            <section class="content">
                <?php if($this->session->flashdata('message')): ?>
                    <div class="callout callout-info">
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                <?php endif; ?>
                <?php echo $content; ?>
            </section>
        </div>


        <footer class="main-footer">
            <div class="pull-right hidden-xs"><b>Version</b> 2.0.0</div>
            <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="http://matadantelinga.com/" target="_blank">matadantelinga</a>.</strong> All rights reserved.
        </footer>

    </div>

    <div class="modal fade" id="myConfirm" tabindex="-1" role="dialog" aria-labelledby="myConfirm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to do this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                    <a class="btn btn-primary action" href="">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">File Manager</h4>
                </div>
                <div class="modal-body">
                    <iframe  width="100%" height="450" frameborder="0" class="file" src=""></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php asset_url('admin'); ?>js/bootstrap.min.js"></script>
    <script src="<?php asset_url('admin'); ?>js/pace.min.js"></script>
    <script src="<?php asset_url('admin'); ?>js/jquery.slimscroll.min.js"></script>
    <script src="<?php asset_url('admin'); ?>js/fastclick.min.js"></script>
    <script src="<?php asset_url('admin'); ?>js/jquery.slugify.js"></script>
    <script src="<?php asset_url('admin'); ?>js/app.js"></script>
    <script>
        $('#myModal').on('hidden.bs.modal', function () {
            var user_avatar = $('#avatar').val();
            if(user_avatar != '') {
                $('img.profile-user-img').attr('src', user_avatar);
            }
        })
    </script>
</body>
</html>
