<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{

    public function show()
    {
        return view('admin.index');
    }

    public function createNews(Request $request, NewsQueryBuilder $builder_news, CategoriesQueryBuilder $builder_cat){
        if ($request->isMethod('post')) {

            $id = $builder_news->add($request->only(['id_category', 'title', 'text', 'is_private']));
            $category = $builder_cat->getCategoryById($request->input('id_category'));
            return redirect()->route('categories.show', [$category->getAttribute('slug'), $id]);
        }

        $request->flash();
        return view('admin.create_news', [
            'categories' => $builder_cat->getAll()
        ]);
    }

    public function createCategory(Request $request, CategoriesQueryBuilder $builder)
    {
        if ($request->isMethod('post')) {
            $builder->add($request->only(['title', 'text', 'slug']));
           return redirect()->route('categories.all');
        }

        $request->flash();
        return view('admin.create_category', [  ]);
    }

    public function saveNews(Request $request, NewsQueryBuilder $builder_news, CategoriesQueryBuilder $builder_cat) {
        if ($request->isMethod('post')) {
            $list = $builder_news->getNewsByCategoryId($request->input('id_category'));
            $category = $builder_cat->getCategoryById($request->input('id_category'));

            //response
            if ($list) {
                 return response()->json($list)
                    ->header('Content-Disposition', 'attachment; filename = "json_news_' . $category->getAttribute('slug'). '.txt"')
                    ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            }
        }

        //return default page
        return view('admin.save_news', ['categories' => $builder_cat->getAll()]);
    }

    public function editNews(Request $request, NewsQueryBuilder $builder_news, CategoriesQueryBuilder $builder_cat, $id) {
        if ($request->isMethod('post')) {

            $data = $request->only(['id_category', 'title', 'text']);
            $is_private = $request->get('is_private');
            if (is_null($is_private)) {
                $is_private = 0;
            }

            $data['is_private'] = $is_private;
            $builder_news->update($id, $data);
            return redirect()->route('admin.news');
        }

        return view('admin.edit_news', [
            'id' => $id,
            'categories' => $builder_cat->getAll(),
            'news' => $builder_news->getNewsById($id)
        ]);
    }

    public function getAllNews(NewsQueryBuilder $builder) {
        return view('admin.news', [
                'news' => $builder->getNews()
        ]);
    }

    public function getAllCategories(CategoriesQueryBuilder $builder) {
        return view('admin.categories', [
           'categories' => $builder->getAll()
        ]);
    }

    public function deleteNews(NewsQueryBuilder $builder, $id) {
        $builder->remove($id);
        return redirect()->route('admin.news');
    }

    public function deleteCategory(NewsQueryBuilder $builder_news, CategoriesQueryBuilder $builder_cat, $id)
    {
       $builder_news->removeByCategoryId($id);
       $builder_cat->remove($id);
       return redirect()->route('admin.categories');
    }

    public function editCategory(Request $request, CategoriesQueryBuilder $builder, $id)
    {
        if ($request->isMethod('post')) {
            $builder->update($id, $request->only(['title', 'text', 'slug']));
            return redirect()->route('admin.categories');
        }

        return view('admin.edit_category', [
            'id' => $id,
            'category' => $builder->getCategoryById($id)
        ]);
    }

    public function saveAllNews() {
        return response()->json(News::all())
            ->header('Content-Disposition', 'attachment; filename = "json_news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
