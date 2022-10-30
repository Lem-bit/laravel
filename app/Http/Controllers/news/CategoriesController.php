<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use function PHPUnit\Framework\isNull;

class CategoriesController extends Controller
{

    public function getAllCategories(CategoriesQueryBuilder $builder)
    {
        return view('news.categories')->with('categories', $builder->getAll());
    }

    public function getNewsInCategory(CategoriesQueryBuilder $builder_cat, NewsQueryBuilder $builder_news, $slug) {
        $category = $builder_cat->getCategoryBySlug($slug);
        $news     = $builder_news->getNewsByCategoryId($category->getAttribute('id'));
        return (isNull($category))?
            view('news.index')->with([
                'news'  => $news,
                'slug'  => $slug,
                'title' => $category->title
            ]):
            view('404');
    }

    public function getNewsByCategory(NewsQueryBuilder $builder, $slug, $id_news) {
       return view('news.item')->with([
              'item' => $builder->getNewsById($id_news)->first(),
              'slug' => $slug
            ]);
    }

}
