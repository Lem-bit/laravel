<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use function PHPUnit\Framework\isNull;

class CategoriesController extends Controller
{

    public function getAllCategories(Categories $categories)
    {
        return view('news.categories')->with('categories', $categories->getCategories());
    }

    public function getNewsInCategory(Categories $categories, News $news, $slug) {
        $category = $categories->getCategoryBySlug($slug);
        return (isNull($category))?
            view('news.index')->with([
                'news' => $news->getNewsByIdCategory($category->id),
                'slug' => $slug,
                'title' => $category->title
            ]):
            view('404');
    }

    public function getNewsByCategory(Categories $categories, News $news, $slug, $id_news) {
        $category = $categories->getCategoryBySlug($slug);

        return (isNull($category))?
            view('news.item')->with([
                'item' => $news->getNewsById($id_news),
                'slug' => $category->slug
            ]):
            view('404');
    }

}
