<?php

use Carbon_Fields\Field;

$theme_options->add_tab(

    'Главная',

    [

        /*
        |--------------------------------------------------------------------------
        | HERO СЛАЙДЕР
        |--------------------------------------------------------------------------
        */

        Field::make(
            'complex',
            'hero_slides',
            'Слайды'
        )

        ->set_layout('tabbed-horizontal')

        ->add_fields([

            Field::make(
                'image',
                'image',
                'Фоновое изображение'
            ),

            Field::make(
                'text',
                'title',
                'Заголовок'
            ),

            Field::make(
                'textarea',
                'text',
                'Описание'
            ),

            Field::make(
                'text',
                'button_text',
                'Текст кнопки'
            ),

            Field::make(
                'text',
                'button_url',
                'Ссылка'
            ),

            Field::make(
                'color',
                'overlay_color',
                'Цвет затемнения'
            )

            ->set_default_value('#0A5B38'),

            Field::make(
                'text',
                'overlay_opacity',
                'Прозрачность (%)'
            )

            ->set_default_value('45')

        ]),

        /*
        |--------------------------------------------------------------------------
        | HERO
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'hero_separator',
            'Главный экран'
        ),

        Field::make(
            'checkbox',
            'hero_show_scroll',
            'Показывать стрелку вниз'
        )

        ->set_default_value(true),

        Field::make(
            'checkbox',
            'hero_autoplay',
            'Автопрокрутка'
        )

        ->set_default_value(true),

        Field::make(
            'text',
            'hero_speed',
            'Скорость переключения (мс)'
        )

        ->set_default_value('5000'),

        /*
        |--------------------------------------------------------------------------
        | КНОПКИ
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'buttons_separator',
            'Главные кнопки'
        ),

        Field::make(
            'text',
            'hero_button1_text',
            'Кнопка №1'
        )

        ->set_default_value(
            'Направления деятельности'
        ),

        Field::make(
            'text',
            'hero_button1_url',
            'Ссылка №1'
        )

        ->set_default_value('/activities/'),

        Field::make(
            'text',
            'hero_button2_text',
            'Кнопка №2'
        )

        ->set_default_value('Документы'),

        Field::make(
            'text',
            'hero_button2_url',
            'Ссылка №2'
        )

        ->set_default_value('/documents/'),

        /*
        |--------------------------------------------------------------------------
        | ПОКАЗАТЕЛИ
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'stats_separator',
            'Ключевые показатели'
        ),

        Field::make(
            'text',
            'stats_title',
            'Заголовок'
        )

        ->set_default_value(
            'Ключевые показатели'
        ),

        Field::make(
            'complex',
            'stats'
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
                'Префикс / Суффикс'
            ),

            Field::make(
                'text',
                'title',
                'Подпись'
            )

        ]),

        /*
        |--------------------------------------------------------------------------
        | О КОМПАНИИ
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'company_separator',
            'Блок "О компании"'
        ),

        Field::make(
            'checkbox',
            'show_company',
            'Показывать блок'
        )

        ->set_default_value(true),

        Field::make(
            'text',
            'company_title',
            'Заголовок'
        )

        ->set_default_value(
            'О компании'
        ),

        Field::make(
            'rich_text',
            'company_short'
        ),

        Field::make(
            'image',
            'company_image',
            'Изображение'
        ),

        /*
        |--------------------------------------------------------------------------
        | НАПРАВЛЕНИЯ
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'activities_separator',
            'Направления деятельности'
        ),

        Field::make(
            'checkbox',
            'show_activities'
        )

        ->set_default_value(true),

        Field::make(
            'text',
            'activities_title',
            'Заголовок'
        )

        ->set_default_value(
            'Основные направления деятельности'
        ),

        Field::make(
            'text',
            'activities_count',
            'Количество'
        )

        ->set_default_value('6'),

        /*
        |--------------------------------------------------------------------------
        | ПРОЕКТЫ
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'projects_separator',
            'Проекты'
        ),

        Field::make(
            'checkbox',
            'show_projects'
        )

        ->set_default_value(true),

        Field::make(
            'text',
            'projects_title',
            'Заголовок'
        )

        ->set_default_value(
            'Инвестиционные проекты'
        ),

        Field::make(
            'text',
            'projects_count',
            'Количество'
        )

        ->set_default_value('3'),

        /*
        |--------------------------------------------------------------------------
        | НОВОСТИ
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'news_separator',
            'Новости'
        ),

        Field::make(
            'checkbox',
            'show_news'
        )

        ->set_default_value(true),

        Field::make(
            'text',
            'news_title',
            'Заголовок'
        )

        ->set_default_value(
            'Новости'
        ),

        Field::make(
            'text',
            'news_count',
            'Количество'
        )

        ->set_default_value('3'),

        /*
        |--------------------------------------------------------------------------
        | ДОКУМЕНТЫ
        |--------------------------------------------------------------------------
        */

        Field::make(
            'separator',
            'documents_separator',
            'Документы'
        ),

        Field::make(
            'checkbox',
            'show_documents'
        )

        ->set_default_value(true),

        Field::make(
            'text',
            'documents_title',
            'Заголовок'
        )

        ->set_default_value(
            'Документы'
        ),

        Field::make(
            'text',
            'documents_count',
            'Количество'
        )

        ->set_default_value('6')

    ]

);