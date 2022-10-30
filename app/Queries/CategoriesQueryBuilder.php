<?php

namespace App\Queries;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoriesQueryBuilder
{
   private Builder $model;
   public function __construct()
   {
       $this->model = Categories::query();
   }

   public function getAll(): Collection
   {
       return $this->model->get();
   }

   public function getCategoryById($id)
   {
       return $this->model->where('id', '=', $id)->first();
   }

   public function getCategoryBySlug($slug): Model
   {
       return $this->model->where('slug', '=', $slug)->get()->first();
   }

   public function add(array $data)
   {
       return $this->model->create($data);
   }

   public function update($id, array $data)
   {
       return $this->getCategoryById($id)->fill($data)->save();
   }

   public function remove($id)
   {
       return $this->getCategoryById($id)->delete();
   }
}
