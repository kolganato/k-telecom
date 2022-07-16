<section class="top">
    <div class="top-wrapper container">
        <div class="top-left">
            <div class="top-info">
                <h1 class="top-title"><?php the_title(); ?></h1>
                <?php $header_list = carbon_get_the_post_meta('header_list');
                if( $header_list ) { ?>
                <ul class="top-list">
                    <?php foreach( $header_list as $header_item ){ ?>
                        <li class="top-list--item"><?= $header_item['header_list_item'] ?></li>
                    <?php } ?>
                </ul>
                <?php } ?>
                <a href="" class="top-link btn">Подробнее</a>
            </div>
        </div>
        <div class="top-right">
            <?= wp_get_attachment_image( carbon_get_the_post_meta( "header_image_right"), 'full', false, ['class'=>'top-img']); ?>
        </div>
    </div>
</section>