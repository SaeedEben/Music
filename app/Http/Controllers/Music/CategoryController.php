<?php

namespace App\Http\Controllers\Music;

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
     */
    public function index()
    {
        $category = Category::paginate();
        return CategoryIndexResource::collection($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response|array
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return [
            'success' => true,
            'message' => 'اطلاعات شما با موفقیت ذخیره شد',
        ];
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
     * @return array
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->save();

        return [
            'success' => true,
            'message' => 'اطلاعات شما با موفقیت به روزرسانی شد',
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response|array
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return [
            'success' => true,
            'message' => 'اطلاعات مورد نظر شما حذف شد'
        ];
    }
}
