<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shark</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/ionicons.min.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/style.css">
    <link rel="stylesheet" href="<?php asset_url('admin'); ?>css/iCheck/blue.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo site_url(); ?>"><img src="<?php asset_url('admin'); ?>img/logo.png" alt="Hardware and Tools" height="30px"/></a>
        </div>
        <div class="login-box-body">
            <?php if($this->session->flashdata('message')) : ?>
                <div class="callout callout-danger">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
            <?php else : ?>
                <div class="callout callout-info">
                    Sign in to start your session.
                </div>
            <?php endif; ?>
            <?php echo $content; ?>
            <!-- <div class="text-center">
                <a href="#">I forgot my password</a>
            </div> -->
        </div>
    </div>

    <script src="<?php asset_url('admin'); ?>js/jquery-2.2.3.min.js"></script>
    <script src="<?php asset_url('admin'); ?>js/bootstrap.min.js"></script>
    <script src="<?php asset_url('admin'); ?>js/icheck.min.js"></script>
    <script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
    </script>
</body>
</html>
