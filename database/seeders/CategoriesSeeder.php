<?php

namespace Database\Seeders;

use App\Models\VirtualDataSource_Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    private static array $category_list = [
        [
            'id' => 1,
            'title' => 'IT',
            'text' => 'Новости в IT индустрии',
            'slug' => 'it'
        ],
        [
            'id' => 2,
            'title' => 'Спорт',
            'text' => 'Новости спорта',
            'slug' => 'sport'
        ],
        [
            'id' => 3,
            'title' => 'Культура',
            'text' => 'Новости культуры',
            'slug' => 'culture'
        ],
        [
            'id' => 4,
            'title' => 'Наука',
            'text' => 'Новости науки',
            'slug' => 'science'
        ],
        [
            'id' => 5,
            'title' => 'Туризм',
            'text' => 'Новости туризма',
            'slug' => 'tourism'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array {
        $data = [];

        foreach (self::$category_list as $item) {
            $data[] = [
                'title' => $item['title'],
                'text' => $item['text'],
                'slug' => $item['slug']
            ];
        }

        return $data;
    }
}
