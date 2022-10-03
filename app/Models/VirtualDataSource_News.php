<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use function MongoDB\BSON\toJSON;
use function PHPUnit\Framework\isNull;

class VirtualDataSource_News {

    private array $news_list = [];

    public function getNewsByCategory($id_category) {
        $this->loadFromFile();
        return array_filter($this->news_list, function ($item) use ($id_category) {
           return $item['id_category'] == $id_category;
        });
    }

    public function getNewsByIdAndCategory($id_category, $id_news) {
        $this->loadFromFile();
        $arr = array_filter($this->news_list, function ($item) use ($id_news, $id_category) {
            return ($item['id'] == $id_news) && ($item['id_category'] == $id_category);
        });
        return array_shift($arr);
    }

    public function getNewsList() {
        $this->loadFromFile();
        return $this->news_list;
    }

    public function addNews($item) {
        if (!array_key_exists('isPrivate', $item)) {
            $item['isPrivate'] = false;
        }

        $item['id'] = count($this->news_list) + 1;
        $this->news_list[] = $item;
        return $item['id'];
    }

    public function saveToFile() {
        Storage::disk('local')->put('news.json', json_encode($this->news_list),
            JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function loadFromFile() {
        $this->news_list = json_decode(Storage::disk('local')->get('news.json'), true);
    }

}
