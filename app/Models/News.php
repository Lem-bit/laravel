<?php

namespace App\Models;

use Illuminate\Routing\RouteBinding;
use Illuminate\Support\Facades\DB;

class News
{
   private const FIELD_LIST = ['id', 'id_category', 'title', 'text', 'is_private'];
   private const TABLE_NAME = 'news';

   public function getNews(): array {
       return DB::table(self::TABLE_NAME)
           ->get(self::FIELD_LIST)->toArray();
   }

   public function getNewsByIdCategory($id_category) {
       return DB::table(self::TABLE_NAME)->where('id_category', '=', $id_category)
           ->get(self::FIELD_LIST)->toArray();
   }

   public function getNewsById($id) {
       return DB::table(self::TABLE_NAME)->where('id', '=', $id)
           ->get(self::FIELD_LIST)->first();
   }

   public function createNews($item): int {
       if (!array_key_exists('is_private', $item)) {
           $item['is_private'] = false;
       }

      return DB::table(self::TABLE_NAME)
          ->insertGetId(['id_category' => $item['id_category'], 'title' => $item['title'], 'text' => $item['text'], 'is_private' => $item['is_private']]);
   }

   public function deleteById($id) {
       return DB::table(self::TABLE_NAME)
                ->delete($id);
   }
}
