<section class="tariffs">
    <div class="container">
        <h3 class="section-headline"><?= carbon_get_the_post_meta('slider_headline') ?></h3>
        <?php $slider = carbon_get_the_post_meta('slider_cards'); 
        if( $slider ){ ?>
        <div class="tariffs-slider">
            <div class="tariffs-cards swiper-wrapper">
                <?php $slide_id = 1; 
                foreach( $slider as $slide ){ ?>
                <div class="tariffs-card swiper-slide">
                    <h4 class="tariffs-card--title"><?= $slide['slider_card_title'] ?></h4>
                    <div class="tariffs-card--subtitle">Скорость интернета</div>
                    <div class="tariffs-card--speed"><?= $slide['slider_card_speed'] ?></div>
                    <div class="tariffs-card--description"><?= $slide['slider_card_description'] ?></div>
                    <label class="tariffs-card--field" for="tariff-<?= $slide_id ; ?>">
                        <input type="checkbox" name="tariff" id="tariff-<?= $slide_id++ ; ?>" checked>
                        <div class="tariffs-card--checkbox element-checkbox"></div>
                        <div class="tariffs-card--strings">
                            <span><?= replace_str_custom_field_without_p( $slide['slider_card_checkbox_text'] ) ?></span>
                        </div>
                    </label>
                    <div class="tariffs-card--price"><?= $slide['slider_card_price'] ?> ₽<span>в месяц</span></div>
                    <div class="tariffs-card--add"><?= $slide['slider_card_add'] ?></div>
                    <a href="" class="tariffs-card-link btn">Выбрать тариф</a>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</section>