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

    public function addNews(Request $request, VirtualDataSource_Categories $categories){
        if ($request->isMethod('post')) {
            $request->flash();
            return redirect()->route('admin.addnews');
           //dd($request);
        }
        return view('admin.addnews', [
            'categories' => $categories->getCategoryList()
        ]);
    }

    public function Action_one() {
       //return response()->download('images/logo.png');

       //
       return view('admin.action_one');
    }

    public function Action_two(VirtualDataSource_News $news) {

        return response()->json($news->getNewsList())
            ->header('Content-Disposition', 'attachment; filename = "json_news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
       //
       return view('admin.action_two');
    }
}
