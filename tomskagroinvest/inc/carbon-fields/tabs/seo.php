<?php

use Carbon_Fields\Field;

$theme_options->add_tab(

    'SEO',

    [

        /*
        |--------------------------------------------------------------------------
        | Основные SEO-настройки
        |--------------------------------------------------------------------------
        */

        Field::make(
            'text',
            'seo_title',
            'SEO-заголовок сайта'
        ),

        Field::make(
            'textarea',
            'seo_description',
            'SEO-описание'
        ),

        Field::make(
            'text',
            'seo_keywords',
            'Ключевые слова'
        ),

        /*
        |--------------------------------------------------------------------------
        | Open Graph
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'og_separator',
            'Open Graph'
        ),

        Field::make(
            'image',
            'og_image',
            'Изображение по умолчанию'
        ),

        Field::make(
            'text',
            'og_type',
            'Тип Open Graph'
        )

        ->set_default_value('website'),

        /*
        |--------------------------------------------------------------------------
        | Яндекс
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'yandex_separator',
            'Яндекс'
        ),

        Field::make(
            'text',
            'yandex_verification',
            'Мета-тег верификации'
        ),

        Field::make(
            'textarea',
            'yandex_metrika',
            'Код Яндекс.Метрики'
        ),

        /*
        |--------------------------------------------------------------------------
        | Google
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'google_separator',
            'Google'
        ),

        Field::make(
            'text',
            'google_verification',
            'Google Site Verification'
        ),

        Field::make(
            'textarea',
            'google_analytics',
            'Google Analytics'
        ),

        /*
        |--------------------------------------------------------------------------
        | robots
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'robots_separator',
            'Индексация'
        ),

        Field::make(
            'checkbox',
            'allow_indexing',
            'Разрешить индексацию'
        )

        ->set_default_value(true),

        Field::make(
            'checkbox',
            'allow_follow',
            'Разрешить переход по ссылкам'
        )

        ->set_default_value(true),

        /*
        |--------------------------------------------------------------------------
        | Дополнительный код
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'code_separator',
            'Дополнительный код'
        ),

        Field::make(
            'textarea',
            'head_code',
            'Код перед </head>'
        ),

        Field::make(
            'textarea',
            'body_code',
            'Код перед </body>'
        )

    ]

);