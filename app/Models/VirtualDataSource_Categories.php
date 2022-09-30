<?php

namespace App\Models;

class VirtualDataSource_Categories
{
    private array $category_list = [
        1 => [
            'id' => 1,
            'title' => 'IT',
            'text' => 'Новости в IT индустрии',
            'slug' => 'it'
        ],
        2 => [
            'id' => 2,
            'title' => 'Спорт',
            'text' => 'Новости спорта',
            'slug' => 'sport'
        ],
        3 => [
            'id' => 3,
            'title' => 'Культура',
            'text' => 'Новости культуры',
            'slug' => 'culture'
        ],
        4 => [
            'id' => 4,
            'title' => 'Наука',
            'text' => 'Новости науки',
            'slug' => 'science'
        ],
        5 => [
            'id' => 5,
            'title' => 'Туризм',
            'text' => 'Новости туризма',
            'slug' => 'tourism'
        ]
    ];

    public function getIdCategoryBySlug($slug) {
        foreach ($this->category_list as $item) {
            if ($item['slug'] == $slug)
                return $item['id'];
        }
        return null;
    }

    public function getCategoryList(): array {
        return $this->category_list;
    }

}
