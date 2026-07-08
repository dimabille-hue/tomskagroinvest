<?php

use Carbon_Fields\Field;

$theme_options->add_tab(

    'О компании',

    [

        /*
        |--------------------------------------------------------------------------
        | Основная информация
        |--------------------------------------------------------------------------
        */

        Field::make(
            'text',
            'company_name',
            'Полное наименование'
        ),

        Field::make(
            'textarea',
            'company_short_description',
            'Краткое описание'
        ),

        Field::make(
            'rich_text',
            'company_description',
            'Полное описание'
        ),

        Field::make(
            'image',
            'company_image',
            'Основное изображение'
        ),

        /*
        |--------------------------------------------------------------------------
        | Миссия
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'mission_separator',
            'Миссия'
        ),

        Field::make(
            'text',
            'mission_title',
            'Заголовок'
        )

        ->set_default_value('Миссия'),

        Field::make(
            'rich_text',
            'mission_text',
            'Текст'
        ),

        /*
        |--------------------------------------------------------------------------
        | История
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'history_separator',
            'История'
        ),

        Field::make(
            'rich_text',
            'company_history',
            'История предприятия'
        ),

        /*
        |--------------------------------------------------------------------------
        | Руководство
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'director_separator',
            'Руководство'
        ),

        Field::make(
            'text',
            'director_name',
            'ФИО'
        ),

        Field::make(
            'text',
            'director_position',
            'Должность'
        ),

        Field::make(
            'image',
            'director_photo',
            'Фотография'
        ),

        Field::make(
            'rich_text',
            'director_message',
            'Обращение руководителя'
        ),

        /*
        |--------------------------------------------------------------------------
        | Преимущества
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'advantages_separator',
            'Преимущества'
        ),

        Field::make(
            'complex',
            'company_advantages',
            'Преимущества'
        )

        ->set_layout('tabbed-horizontal')

        ->add_fields([

            Field::make(
                'image',
                'icon',
                'Иконка'
            ),

            Field::make(
                'text',
                'title',
                'Название'
            ),

            Field::make(
                'textarea',
                'description',
                'Описание'
            )

        ]),

        /*
        |--------------------------------------------------------------------------
        | Показатели
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'facts_separator',
            'Основные показатели'
        ),

        Field::make(
            'complex',
            'company_facts',
            'Показатели'
        )

        ->set_layout('tabbed-horizontal')

        ->add_fields([

            Field::make(
                'text',
                'number',
                'Число'
            ),

            Field::make(
                'text',
                'suffix',
                'Суффикс'
            ),

            Field::make(
                'text',
                'title',
                'Подпись'
            )

        ]),

        /*
        |--------------------------------------------------------------------------
        | Документы
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'documents_separator',
            'Учредительные документы'
        ),

        Field::make(
            'file',
            'charter_file',
            'Устав'
        ),

        Field::make(
            'file',
            'registration_file',
            'Свидетельство'
        ),

        /*
        |--------------------------------------------------------------------------
        | Реквизиты
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'requisites_separator',
            'Реквизиты'
        ),

        Field::make(
            'textarea',
            'company_requisites',
            'Реквизиты'
        )

    ]

);