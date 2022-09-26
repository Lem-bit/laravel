<?php

namespace App\Http\Controllers\news;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VirtualDataSource;

class CategoriesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories = VirtualDataSource::getCategories();
        return view('news.categories')->with('categories', $categories);
    }

    public function getNewsByCategory($id_category) {
        $news = VirtualDataSource::getNewsByCategory($id_category);
        return view('news.news')->with('news', $news);
    }

    public function getSingleNews($id_category, $id_news) {
        $single_news = VirtualDataSource::getSingleNews($id_category, $id_news);
        return view('news.single_news')->with('single_news', $single_news);
    }

}
