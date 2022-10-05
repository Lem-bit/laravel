<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function show()
    {
        return view('admin.index');
    }

    public function createNews(Request $request, Categories $categories, News $news){
        if ($request->isMethod('post')) {
            $id = $news->createNews($request->only(['id_category', 'title', 'text', 'isPrivate']));
            $category = $categories->getCategoryById($request->input('id_category'));
            return redirect()->route('categories.show', [$category->slug, $id]);
        }

        $request->flash();
        return view('admin.create_news', [
            'categories' => $categories->getCategories()
        ]);
    }

    public function saveNews(Request $request, Categories $categories, News $news) {
        if ($request->isMethod('post')) {

            //search category
            $id_category = $request->input('id_category');
            $list = $news->getNewsByIdCategory($id_category);

            //response
            if ($list) {
                $category = $categories->getCategoryById($id_category);
                 return response()->json($list)
                    ->header('Content-Disposition', 'attachment; filename = "json_news_' . $category->slug . '.txt"')
                    ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            }
        }

        //return default page
        return view('admin.save_news', ['categories' => $categories->getCategories()]);
    }

    public function editNews($id, Request $request, News $news, Categories $categories) {

        return view('404');
        /*return view('admin.create_news', [
            'categories' => $categories->getCategories(),
            'news' => $news->getNewsById($id)
        ]);*/
    }

    public function getAllNews(News $news) {
        return view('admin.news', [
                'news' => $news->getNews()
        ]);
    }

    public function deleteNews($id, News $news) {
        $news->deleteById($id);
        return view('admin.news', [
             'news' => $news->getNews()
        ]);
    }

    public function saveAllNews(News $news) {
        return response()->json($news->getNews())
            ->header('Content-Disposition', 'attachment; filename = "json_news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
