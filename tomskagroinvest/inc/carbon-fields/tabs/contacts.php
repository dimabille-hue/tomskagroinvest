<?php

use Carbon_Fields\Field;

$theme_options->add_tab(

    'Контакты',

    [

        /*
        |--------------------------------------------------------------------------
        | Основные контакты
        |--------------------------------------------------------------------------
        */

        Field::make(
            'text',
            'contact_phone',
            'Основной телефон'
        ),

        Field::make(
            'text',
            'contact_phone2',
            'Дополнительный телефон'
        ),

        Field::make(
            'text',
            'contact_email',
            'E-mail'
        ),

        Field::make(
            'text',
            'contact_email2',
            'Дополнительный E-mail'
        ),

        /*
        |--------------------------------------------------------------------------
        | Адрес
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'address_separator',
            'Адрес'
        ),

        Field::make(
            'textarea',
            'contact_address',
            'Почтовый адрес'
        ),

        Field::make(
            'textarea',
            'contact_actual_address',
            'Фактический адрес'
        ),

        Field::make(
            'textarea',
            'working_hours',
            'Режим работы'
        ),

        /*
        |--------------------------------------------------------------------------
        | Карта
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'map_separator',
            'Карта'
        ),

        Field::make(
            'textarea',
            'map_iframe',
            'Код карты (iframe)'
        ),

        Field::make(
            'text',
            'latitude',
            'Широта'
        ),

        Field::make(
            'text',
            'longitude',
            'Долгота'
        ),

        /*
        |--------------------------------------------------------------------------
        | Приём граждан
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'reception_separator',
            'Приём граждан'
        ),

        Field::make(
            'textarea',
            'reception_info',
            'Информация'
        ),

        /*
        |--------------------------------------------------------------------------
        | Контактные лица
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'staff_separator',
            'Контактные лица'
        ),

        Field::make(
            'complex',
            'contact_persons',
            'Сотрудники'
        )

        ->set_layout('tabbed-horizontal')

        ->add_fields([

            Field::make(
                'text',
                'name',
                'ФИО'
            ),

            Field::make(
                'text',
                'position',
                'Должность'
            ),

            Field::make(
                'text',
                'phone',
                'Телефон'
            ),

            Field::make(
                'text',
                'email',
                'E-mail'
            )

        ])

    ]

);