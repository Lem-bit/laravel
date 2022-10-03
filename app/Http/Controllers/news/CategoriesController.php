<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VirtualDataSource_News;
use App\Models\VirtualDataSource_Categories;
use function PHPUnit\Framework\isNull;

class CategoriesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getAllCategories(VirtualDataSource_Categories $categories)
    {
        return view('news.categories')->with('categories', $categories->getCategoryList());
    }

    public function getNewsInCategory(VirtualDataSource_Categories $categories, VirtualDataSource_News $news, $slug) {
        $id = $categories->getIdCategoryBySlug($slug);
        return (isNull($id))?
            view('news.index')->with([
                'news' => $news->getNewsByCategory($id),
                'slug' => $slug,
                'title' => $categories->getCategoryById($id)['title']
            ]):
            view('404');
    }

    public function getNewsByCategory(VirtualDataSource_Categories $categories, VirtualDataSource_News $news, $slug, $id_news) {
        $id = $categories->getIdCategoryBySlug($slug);
        return (isNull($id))?
            view('news.item')->with([
                'item' => $news->getNewsByIdAndCategory($id, $id_news),
                'slug' => $slug
            ]):
            view('404');
    }

}
