<?php

use Carbon_Fields\Field;

$theme_options->add_tab(

    'Социальные сети',

    [

        /*
        |--------------------------------------------------------------------------
        | Основные ссылки
        |--------------------------------------------------------------------------
        */

        Field::make(
            'text',
            'social_vk',
            'ВКонтакте'
        ),

        Field::make(
            'text',
            'social_telegram',
            'Telegram'
        ),

        Field::make(
            'text',
            'social_youtube',
            'YouTube'
        ),

        Field::make(
            'text',
            'social_rutube',
            'Rutube'
        ),

        Field::make(
            'text',
            'social_ok',
            'Одноклассники'
        ),

        Field::make(
            'text',
            'social_dzen',
            'Дзен'
        ),

        /*
        |--------------------------------------------------------------------------
        | Дополнительные сервисы
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'services_separator',
            'Дополнительные сервисы'
        ),

        Field::make(
            'text',
            'official_site',
            'Официальный сайт'
        ),

        Field::make(
            'text',
            'gosuslugi_link',
            'Госуслуги'
        ),

        Field::make(
            'text',
            'procurement_link',
            'Госзакупки'
        ),

        Field::make(
            'text',
            'anticorruption_link',
            'Противодействие коррупции'
        ),

        /*
        |--------------------------------------------------------------------------
        | Настройки отображения
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'social_options',
            'Настройки'
        ),

        Field::make(
            'checkbox',
            'show_social_header',
            'Показывать в шапке'
        )

        ->set_default_value(false),

        Field::make(
            'checkbox',
            'show_social_footer',
            'Показывать в подвале'
        )

        ->set_default_value(true)

    ]

);