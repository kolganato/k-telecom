<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make( 'theme_options', __( 'Настройки темы' ) )
->add_fields( array(
    Field::make( 'image', 'main_logo', __( 'Логотип' ) )->set_value_type( 'url' )->set_width(30),
    Field::make( 'text', 'footer_text', __( 'Текст в футере' ) )->set_width(70),
    Field::make( 'complex', 'footer_social_list', __( 'Соцсети' ) )
        ->set_layout('tabbed-vertical')
        ->add_fields( array(
            Field::make( 'image', 'footer_social_icon', __( 'Иконка Соцсети' ) )->set_value_type( 'url' ),
            Field::make( 'text', 'footer_social_name', __( 'Название Соцсети' ) ),
            Field::make( 'text', 'footer_social_link', __( 'Ссылка на Соцсеть' ) ),
        ) )
        ->setup_labels( array(
            'plural_name' => 'Соцсеть',
            'singular_name' => 'Соцсеть', 
        ) )
        ->set_header_template('
            <% if (footer_social_name) { %>
                <%- footer_social_name %>
            <% } %>'),
));