<?php

use Carbon_Fields\Field;

$theme_options->add_tab(

    'Подвал',

    [

        /*
        |--------------------------------------------------------------------------
        | Основная информация
        |--------------------------------------------------------------------------
        */

        Field::make(
            'image',
            'footer_logo',
            'Логотип'
        ),

        Field::make(
            'textarea',
            'footer_description',
            'Краткое описание'
        ),

        Field::make(
            'text',
            'footer_copyright',
            'Копирайт'
        )

        ->set_default_value(
            '© ' . date('Y') . ' АО «Томскагроинвест». Все права защищены.'
        ),

        /*
        |--------------------------------------------------------------------------
        | Контактная информация
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'footer_contacts_separator',
            'Контакты'
        ),

        Field::make(
            'text',
            'footer_phone',
            'Телефон'
        ),

        Field::make(
            'text',
            'footer_email',
            'E-mail'
        ),

        Field::make(
            'textarea',
            'footer_address',
            'Адрес'
        ),

        Field::make(
            'textarea',
            'footer_worktime',
            'Режим работы'
        ),

        /*
        |--------------------------------------------------------------------------
        | Нижнее меню
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'footer_menu_separator',
            'Навигация'
        ),

        Field::make(
            'checkbox',
            'show_footer_menu',
            'Показывать меню'
        )

        ->set_default_value(true),

        /*
        |--------------------------------------------------------------------------
        | Партнеры
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'partners_separator',
            'Партнеры'
        ),

        Field::make(
            'checkbox',
            'show_partners',
            'Показывать логотипы партнеров'
        )

        ->set_default_value(true),

        Field::make(
            'complex',
            'partners'
        )

        ->set_layout('tabbed-horizontal')

        ->add_fields([

            Field::make(
                'image',
                'logo',
                'Логотип'
            ),

            Field::make(
                'text',
                'title',
                'Название'
            ),

            Field::make(
                'text',
                'url',
                'Ссылка'
            )

        ]),

        /*
        |--------------------------------------------------------------------------
        | Дополнительно
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'footer_extra_separator',
            'Дополнительно'
        ),

        Field::make(
            'checkbox',
            'show_scroll_top',
            'Показывать кнопку "Наверх"'
        )

        ->set_default_value(true),

        Field::make(
            'checkbox',
            'show_developer',
            'Показывать информацию о разработчике'
        )

        ->set_default_value(false),

        Field::make(
            'text',
            'developer_name',
            'Название разработчика'
        ),

        Field::make(
            'text',
            'developer_url',
            'Сайт разработчика'
        )

    ]

);