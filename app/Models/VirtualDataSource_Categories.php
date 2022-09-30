<?php

namespace App\Models;

class VirtualDataSource_Categories
{
    private static array $category_list = [
        [
            'id' => 1,
            'title' => 'IT',
            'text' => 'Новости в IT индустрии',
        ],
        [
            'id' => 2,
            'title' => 'Спорт',
            'text' => 'Новости спорта'
        ],
        [
            'id' => 3,
            'title' => 'Культура',
            'text' => 'Новости культуры'
        ],
        [
            'id' => 4,
            'title' => 'Наука',
            'text' => 'Новости науки'
        ],
        [
            'id' => 5,
            'title' => 'Туризм',
            'text' => 'Новости туризма'
        ]
    ];

    public static function getCategoryList(): array {
        return self::$category_list;
    }

}
