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
    public function getAllCategories(Request $request)
    {
        $categories = VirtualDataSource::getCategories();
        return $categories? view('news.categories')->with('categories', $categories): view('404');
    }

    public function getNewsByCategory($id_category) {
        $news = VirtualDataSource::getNewsByCategory($id_category);
        return $news? view('news.news')->with('news', $news): view('404');
    }

    public function getSingleNews($id_category, $id_news) {
        $single_news = VirtualDataSource::getSingleNews($id_category, $id_news);
        return $single_news? view('news.single_news')->with('single_news', $single_news): view('404');
    }

    public function addNews(Request $request) {
        return view('news.addnews');
    }


}
