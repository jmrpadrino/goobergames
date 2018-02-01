<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Webcreek.com">
    <title>Goober Games LLC.</title>
    <link rel="shortcut icon" href="">
    <!--[if IE]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/loaders.min.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,700|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
    <!-->

    <!-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div style="display: none;" class="anim-loader">
        <div class="ball-triangle-path"><div></div><div></div><div></div></div>
    </div>
    <nav class="navbar navbar-default goober-navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="logoLink" href="#">
                    <img class="gooberLogo header animated shake" src="<?php echo get_template_directory_uri(); ?>/assets/svg/logo.svg" alt="Goober Games - Logo" width="120" height="60">
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right navbar-links">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">THE COMPANY</a></li>
                    <li><a href="#about">OUR GAMES</a></li>
                    <li><a href="#support">SUPPORT</a></li>
                    <li><a href="#blog">BLOG</a></li>
                    <li><a href="#contact">REACH US</a></li>
                </ul>
            </div><!--.nav-collapse -->
        </div>
    </nav>
    <main>