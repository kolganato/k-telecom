<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_the_title().' - '. get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="container">
            <div class="navigation">
                <div class="navigation-left">
                    <a href="<?php echo site_url(); ?>" class="navigation-logo"><img src="<?php echo carbon_get_theme_option('main_logo') ?>" alt="logo" class="navigation-logo--icon"></a>
                </div>
                <div class="navigation-right">
                    <div id="burger" class="burger">
                        <span id="sp1"></span>
                        <span id="sp2"></span>
                        <span id="sp3"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    