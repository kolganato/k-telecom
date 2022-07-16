
<footer>
    <div class="container">
        <div class="navigation">
            <div class="navigation-left">
                <a href="<?php echo site_url(); ?>" class="navigation-logo"><img src="<?= carbon_get_theme_option('main_logo') ?>" alt="logo" class="navigation-logo--icon"></a>
                <p class="footer-text"><?= carbon_get_theme_option('footer_text') ?></p>
            </div>
            <div class="navigation-right">
                <?php $social_list = carbon_get_theme_option('footer_social_list');
                if( $social_list ) { ?>
                <ul class="footer-list--social">
                    <?php foreach( $social_list as $social_item){ ?>
                    <li>
                        <a href="<?= $social_item['footer_social_link'] ?>" class="footer-item--link">
                            <img class="footer-item--icon" src="<?= $social_item['footer_social_icon'] ?>" alt="<?= $social_item['footer_social_name'] ?>">
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>