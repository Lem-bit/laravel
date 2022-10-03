<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\VirtualDataSource_Categories;
use App\Models\VirtualDataSource_News;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return view('admin.index');
    }

    public function createNews(Request $request, VirtualDataSource_Categories $categories, VirtualDataSource_News $news){
        if ($request->isMethod('post')) {

            $news->loadFromFile();
            $id = $news->addNews($request->only(['id_category', 'title', 'text', 'isPrivate']));
            $news->saveToFile();

            $category = $categories->getCategoryById($request->input('id_category'));
            return redirect()->route('categories.show', [$category['slug'], $id]);
        }

        return view('admin.create_news', [
            'categories' => $categories->getCategoryList()
        ]);
    }

    public function saveNews(Request $request, VirtualDataSource_Categories $categories, VirtualDataSource_News $news) {
        if ($request->isMethod('post')) {

            //search category
            $id_category = $request->input('id_category');
            $list = $news->getNewsByCategory($id_category);

            //response
            if ($list) {
                $name = $categories->getCategoryById($id_category)['slug'];
                 return response()->json($list)
                    ->header('Content-Disposition', 'attachment; filename = "json_news_' . $name . '.txt"')
                    ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            }
        }

        //return default page
        return view('admin.save_news', ['categories' => $categories->getCategoryList()]);
    }

    public function actionTwo(VirtualDataSource_News $news) {

        return response()->json($news->getNewsList())
            ->header('Content-Disposition', 'attachment; filename = "json_news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
       //
       return view('admin.action_two');
    }
}
