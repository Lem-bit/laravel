<?php

namespace App\Models;

use JetBrains\PhpStorm\Pure;
use VirtualDataSource_Categories;
use VirtualDataSource_News;

class VirtualDataSource
{

    public static function getNews() {
        //return static::$news_list;
    }

    public static function getNewsByCategory($id_category) {
        return \App\Models\VirtualDataSource_News::getNewsByCategory($id_category);
    }

    public static function getSingleNews($id_category, $id_news) {
        return \App\Models\VirtualDataSource_News::getNewsByIdAndCategory($id_category, $id_news);
    }

    #[Pure] public static function getCategories(): array
    {
        return \App\Models\VirtualDataSource_Categories::getCategoryList();
    }
}
