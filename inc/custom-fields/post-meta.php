<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'post_meta', __( 'Контент' ) )
    ->where( 'post_type', '=', 'page' )
    ->where( 'post_template', '=', 'page.php' )
    ->add_tab( __( 'Шапка' ), array(
        Field::make( 'image', 'header_image_right', __( 'Изображение справа от заголовка' ) )->set_width(30),
        Field::make( 'text', 'header_btn_link', __( 'Ссылка в кнопке' ) )->set_width(70),
        Field::make( 'complex', 'header_list', __( 'Список под заголовком' ) )
        ->set_layout('tabbed-horizontal')
        ->add_fields( array(
            Field::make( 'text', 'header_list_item', __( 'Пункт списка' ) ),
        ) )
        ->setup_labels( array(
            'plural_name' => 'Пункт',
            'singular_name' => 'Пункт', 
        ) ),
    ) )
    ->add_tab( __( 'Слайдер' ), array(
        Field::make( 'text', 'slider_headline', __( 'Заголовок слайдера' ) ),
        Field::make( 'complex', 'slider_cards', __( 'Тарифы' ) )
        ->set_layout('tabbed-vertical')
        ->add_fields( array(
            Field::make( 'text', 'slider_card_title', __( 'Название тарифа' ) ),
            Field::make( 'text', 'slider_card_speed', __( 'Скорость тарифа' ) ),
            Field::make( 'textarea', 'slider_card_description', __( 'Описание тарифа' ) ),
            Field::make( 'textarea', 'slider_card_checkbox_text', __( 'Текст у пункта галочки' ) ),
            Field::make( 'text', 'slider_card_price', __( 'Цена за тариф в месяц' ) ),
            Field::make( 'text', 'slider_card_add', __( 'Дополнительный текст в конце карточки' ) ),
        ) )
        ->setup_labels( array(
            'plural_name' => 'Тариф',
            'singular_name' => 'Тариф', 
        ) )
        ->set_header_template('
            <% if (slider_card_title) { %>
                <%- slider_card_title %>
            <% } %>'),
    ) )

;