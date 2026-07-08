<?php

use Carbon_Fields\Field;

$theme_options->add_tab(

    'Шапка сайта',

    [

        /*
        |--------------------------------------------------------------------------
        | Логотип
        |--------------------------------------------------------------------------
        */

        Field::make(
            'image',
            'header_logo',
            'Основной логотип'
        ),

        Field::make(
            'image',
            'header_logo_white',
            'Белый логотип'
        ),

        Field::make(
            'image',
            'favicon',
            'Favicon'
        ),

        /*
        |--------------------------------------------------------------------------
        | Название
        |--------------------------------------------------------------------------
        */

        Field::make(
            'text',
            'site_name_short',
            'Краткое название'
        ),

        Field::make(
            'text',
            'site_name_full',
            'Полное название'
        ),

        /*
        |--------------------------------------------------------------------------
        | Контакты
        |--------------------------------------------------------------------------
        */

        Field::make(
            'text',
            'header_phone',
            'Телефон'
        ),

        Field::make(
            'text',
            'header_email',
            'Email'
        ),

        /*
        |--------------------------------------------------------------------------
        | Кнопка
        |--------------------------------------------------------------------------
        */

        Field::make(
            'text',
            'header_button_text',
            'Текст кнопки'
        )

        ->set_default_value(
            'Обратная связь'
        ),

        Field::make(
            'text',
            'header_button_url',
            'Ссылка кнопки'
        ),

        /*
        |--------------------------------------------------------------------------
        | Отображение элементов
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'header_options',
            'Настройки'
        ),

        Field::make(
            'checkbox',
            'show_search',
            'Показывать поиск'
        )

        ->set_default_value(true),

        Field::make(
            'checkbox',
            'show_phone',
            'Показывать телефон'
        )

        ->set_default_value(true),

        Field::make(
            'checkbox',
            'show_email',
            'Показывать email'
        )

        ->set_default_value(true),

        Field::make(
            'checkbox',
            'show_accessibility',
            'Версия для слабовидящих'
        )

        ->set_default_value(true),

        Field::make(
            'checkbox',
            'sticky_header',
            'Закрепить шапку при прокрутке'
        )

        ->set_default_value(true),

        /*
        |--------------------------------------------------------------------------
        | Баннер
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'header_banner_separator',
            'Верхний информационный баннер'
        ),

        Field::make(
            'checkbox',
            'show_header_banner',
            'Показывать баннер'
        ),

        Field::make(
            'text',
            'header_banner_text',
            'Текст баннера'
        ),

        Field::make(
            'text',
            'header_banner_link',
            'Ссылка'
        )

    ]

);