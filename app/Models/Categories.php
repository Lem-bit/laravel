<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Categories
{
    private const FIELD_LIST = ['id', 'title', 'text', 'slug'];
    private const TABLE_NAME = 'categories';

    public function getCategoryById($id) {
        return DB::table(self::TABLE_NAME)->where('id', '=', $id)
            ->get(self::FIELD_LIST)->first();
    }

    public function getCategoryBySlug($slug) {
        return DB::table(self::TABLE_NAME)->where('slug', '=', $slug)
            ->get(self::FIELD_LIST)->first();
    }

    public function getCategories(): array {
        return DB::table(self::TABLE_NAME)->get()->toArray();
    }

    public function getIdBySlug($slug): int {
        $item = $this->getCategoryBySlug($slug);
        return ($item) ? $item->id : 0;
    }
}
