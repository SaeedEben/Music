<?php

namespace App\Http\Controllers\Panel\Music;

use App\Http\Controllers\Controller;
use App\Http\Requests\Music\Category\StoreCategoryRequest;
use App\Http\Requests\Music\Category\UpdateCategoryRequest;
use App\Http\Resources\Music\Category\CategoryIndexResource;
use App\Http\Resources\Music\Category\CategoryShowResource;
use App\Models\Music\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|object
     *
     */
    public function index()
    {
        $pure_data = Category::paginate();
        $obj = CategoryIndexResource::collection($pure_data)->resource;
        $categories = json_decode(json_encode($obj))->data;
        return view('music.category.categoryindex' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|array
     */
    public function store(StoreCategoryRequest $request)
    {
        \DB::beginTransaction();
        try {
            $category = new Category();

            $translation = [
                'en' => $request->name['en'],
                'fa' => $request->name['fa'],
            ];
            $category->setTranslations('name' , $translation);

            $category->fill($request->all());
            $category->save();

            \DB::commit();

            return redirect('music/category');
        }catch (\Exception $exception){
            \DB::rollBack();

            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     *
     * @return CategoryShowResource
     */
    public function show(Category $category)
    {
        return new CategoryShowResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category                 $category
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|array
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        \DB::beginTransaction();

        try {
            $translations = [
                'en' => $request->name['en'],
                'fa' => $request->name['fa'],
            ];

            $category->setTranslations('name' , $translations);

            $category->fill($request->all());
            $category->save();

            \DB::commit();
            return redirect('/music/category');
        }catch (\Exception $exception){
            \DB::rollBack();

            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|array
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return \redirect('music/category');
        }catch(\Exception $exception){
            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|array
     * @throws \Exception
     */
    public function restore(Request $request)
    {
        try {
            Category::onlyTrashed()->findOrFail($request->id)->restore();
            return redirect('music/category/list');
        }catch(\Exception $exception){
            return [
                'success' => false,
                'message' => $exception->getMessage(),
            ];
        }
    }

    public function list()
    {
        $pure_data = Category::paginate();
        $obj = CategoryIndexResource::collection($pure_data)->resource;
        $categories = json_decode(json_encode($obj))->data;
        return view('music.category.categorylist', compact('categories'));
    }

    public function edit(Category $category)
    {
        return view('music.category.update-category' , compact('category'));
    }
}
