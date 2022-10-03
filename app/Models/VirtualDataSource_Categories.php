<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;

class VirtualDataSource_Categories
{
    private array $category_list = [];

    public function getCategoryById($id) {
        $this->loadFromFile();
        return $this->category_list[$id];
    }

    public function getIdCategoryBySlug($slug) {
        $this->loadFromFile();
        foreach ($this->category_list as $item) {
            if ($item['slug'] == $slug)
                return $item['id'];
        }
        return null;
    }

    public function getCategoryList(): array {
        $this->loadFromFile();
        return $this->category_list;
    }

    public function saveToFile() {
        Storage::disk('local')->put('categories.json', json_encode($this->category_list),
            JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function loadFromFile() {
        $this->category_list = json_decode(Storage::disk('local')->get('categories.json'), true);
    }

}
