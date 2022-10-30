<?php

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

final class NewsQueryBuilder
{
  private Builder $model;
  public function __construct()
  {
      $this->model = News::query();
  }

  private function paginate($items, $perPage = 5, $page = null, $options = [])
  {
      $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
      $items = $items instanceof Collection ? $items : Collection::make($items);
      return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
  }

  public function getNews(): Collection | LengthAwarePaginator
  {
      return $this->paginate($this->model->get()->sortByDesc('id'), config('pagination.admin.news'));
  }

  public function getNewsById($id)
  {
      return $this->model->where('id', '=', $id)->get()->first();
  }

  public function getNewsByCategoryId($id_category)
  {
      return $this->model->where('id_category', '=', $id_category)->get();
  }

  public function add(array $data): int
  {
      return $this->model->insertGetId($data);
  }

  public function update($id, array $data)
  {
      return $this->getNewsById($id)->fill($data)->save();
  }

  public function remove($id)
  {
      return $this->model->where('id', '=', $id)->delete();
  }

  public function removeByCategoryId($id)
  {
      return $this->model->where('id_category', '=', $id)->delete();
  }

}
