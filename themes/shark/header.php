<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="ZHmt6muahav8UmF7UZxm46kVCmEGhz971JeGcnzosOE" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo (isset($metadescription)) ? $meta_description : ''; ?>">
    <meta name="keywords" content="">
    <meta name="author" content="Yoodeo Global Media">
    <meta name="robots" content="index, follow" />
    <link rel="shortcut icon" href="<?php echo base_url('favicon.ico'); ?>">

    <title>Shark | Produsen Alat Teknik</title>

    <!-- facebook meta -->
    <meta property="og:url" content="<?php echo current_url(); ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo (isset($meta_title)) ? $meta_title: ''; ?>" />
    <meta property="og:image" content="<?php echo (isset($meta_image)) ? $meta_image : base_url('uploads/site/logo.png') ; ?>" />
    <meta property="og:site_name" content="yoodeo.com" />
    <meta property="og:description" content="<?php echo (isset($metadescription)) ? $meta_description : ''; ?>" />
    <meta property="article:author" content=""/>
	<meta property="article:publisher" content="" />
    <!-- facebook meta -->

    <link rel="canonical" href="<?php echo current_url(); ?>" />
    <link rel="dns-prefetch" href="twitter.com">

    <!-- twitter card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:creator" content="">
    <meta name="twitter:title" content="<?php echo (isset($meta_title)) ? $meta_title: ''; ?>" />
    <meta name="twitter:description" content="<?php echo (isset($metadescription)) ? $meta_description : ''; ?>" />
    <meta name="twitter:image" content="<?php echo (isset($meta_image)) ? $meta_image : base_url('uploads/site/logo.png') ; ?>" />
    <!-- twitter card -->

    <!--styles-->
    <link rel="stylesheet" href="<?php asset_url('shark'); ?>fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php asset_url('shark'); ?>js/vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="<?php asset_url('shark'); ?>js/vendor/jquery-custom-scrollbar/jquery.custom-scrollbar.css">
    <link rel="stylesheet" href="<?php asset_url('shark'); ?>js/vendor/slicknav/slicknav.css"></script>
    <link rel="stylesheet" href="<?php asset_url('shark'); ?>fonts/content/fonts.css">
    <link rel="stylesheet" href="<?php asset_url('shark'); ?>main.css">
    <!--end styles-->
    <!--scripts-->
    <script src="<?php asset_url('shark'); ?>js/vendor/jquery-1.10.2.min.js"></script>
    <script src="<?php asset_url('shark'); ?>js/bootstrap.min.js"></script>
    <script src="<?php asset_url('shark'); ?>js/vendor/superfish/js/superfish.js"></script>
    <script src="<?php asset_url('shark'); ?>js/vendor/slicknav/jquery.slicknav.min.js"></script>
    <script src="<?php asset_url('shark'); ?>js/vendor/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script>
    <script src="<?php asset_url('shark'); ?>js/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?php asset_url('shark'); ?>js/vendor/jquery.easing.1.3.min.js"></script>
    <script src="<?php asset_url('shark'); ?>js/vendor/jquery.sticky.js"></script>
    <script src="<?php asset_url('shark'); ?>js/vendor/jquery.easing.1.3.min.js"></script>
    <script src="<?php asset_url('shark'); ?>js/sharrre/platform/platform.js"></script>
    <script src="<?php asset_url('shark'); ?>js/sharrre/platform/facebook.js"></script>
    <script src="<?php asset_url('shark'); ?>js/sharrre/platform/twitter.js"></script>
    <script src="<?php asset_url('shark'); ?>js/sharrre/platform/linkedin.js"></script>
    <script src="<?php asset_url('shark'); ?>js/sharrre/platform/googlePlus.js"></script>
    <script src="<?php asset_url('shark'); ?>js/sharrre/jquery.sharrre.js"></script>
    <script src="<?php asset_url('shark'); ?>js/main.js"></script>
    <!--end scripts-->

    <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '<?php echo get_option('opt_tracking_id'); ?>']);
    _gaq.push(['_trackPageview']);
    (function() { var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); })();
    </script>
</head>
<body>
    <header id="header-wrapper">
        <div id="top-header" class="desktop-only">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div id="contact-top">
                            <ul>
                                <li><a href="mailto:<?php site_option('opt_contact_email'); ?>"><img src="<?php asset_url('shark'); ?>images/icon-mail-orange.png" /> <?php site_option('opt_contact_email'); ?></a></li>
                                <li><a href="tel:<?php site_option('opt_contact_phone'); ?>"><img src="<?php asset_url('shark'); ?>images/icon-phone-orange.png" /> <?php site_option('opt_contact_phone'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="social-media-icon text-right">
                            <?php $socialmedia_navs = socialmedia_navs(); ?>
                            <ul>
                                <?php foreach ($socialmedia_navs as $link => $icon) : ?>
                                    <?php if(get_option($link)): ?>
                                        <li><a href="<?php echo get_option($link); ?>"><i class="<?php echo $icon; ?>"></i></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-menu-wrapper">
            <div class="container">
                <div class="clearfix">
                    <div id="logo-bg">
                        <div class="pull-left logo">
                            <a href="<?php echo site_url(); ?>"><img src="<?php site_option('opt_logo'); ?>" alt="<?php site_option('opt_title'); ?>"/></a>
                        </div>
                    </div>

                    <div class="pull-right clearfix">
                        <div id="mobile-nav" class="mobile-only"></div>
                        <div id="main-menu" class="navbar-collapse collapse">
                            <nav id="main-navigation" class="desktop-only">
                                <ul class="sf-menu nav navbar-nav">
                                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                                    <li><a href="<?php echo site_url('about'); ?>">About</a></li>
                                    <li><a href="<?php echo site_url('our_product/1'); ?>">Product</a>
                                        <ul>
                                            <?php $product_categories = product_categories(); ?>
                                            <?php foreach ($product_categories as $product_category) : ?>
                                                <li><a href="<?php echo site_url('category_product/'.$product_category['category_slug'].'/1'); ?>"><?php echo $product_category['category_name']; ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo site_url('support/new-product-development'); ?>">Support</a>
                                        <ul class="submenu">
                                            <?php $pages = get_pages(); ?>
                                            <?php foreach ($pages as $page) : ?>
                                                <?php if($page['page_id'] == 1 || $page['page_id'] == 2): ?>
                                                    <li><a href="<?php echo site_url('support/'.$page['page_slug']); ?>"><?php echo $page['page_title']; ?></a></li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <li><a href="<?php echo site_url('sales_team'); ?>">Sales Engineer</a></li>
                                            <li><a href="<?php echo site_url('cs_form'); ?>">Customer Service Form</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo site_url('shark_career'); ?>">Career</a></li>
                                    <li><a href="<?php echo site_url('contact_us'); ?>">Contact</a></li>
                                    <li class="search"><a href="#"><img style="width:19px;" src="<?php asset_url('shark'); ?>images/icon-searrch.png" /></a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="search-form">
                            <form>
                                <input type="text" placeholder="Search . . ." />
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
