<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read_categories')->only('index');
        $this->middleware('permission:edit_categories')->only(['edit', 'update']);
        $this->middleware('permission:create_categories')->only(['create', 'store']);
        $this->middleware('permission:delete_categories')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->has('search')) {
        //     $categories = Category::where("name", "like", "%" . $request->search . "%")
        //         ->paginate(PAGINATE_COUNT);
        //     return view("admin.categories.index", compact('categories'));
        // }

        $categories = Category::get();

        return view("admin.categories.index",compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            Category::create($request->validated());

            return redirect(route("admin.categories.index"))->with(['success' => __("admin.success create")]);
        } catch (\Exception $ex) {
            return redirect(route("admin.categories.index"))->with(['error' => __("admin.message error")]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {


        try {
            $category->update($request->validated());
            $category->books()->update(['parent_active' => $request->active]);

            return redirect(route("admin.categories.index"))->with(['success' => __("admin.success create")]);
        } catch (\Exception $ex) {
            return redirect(route("admin.categories.index"))->with(['error' => __("admin.message error")]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {

            $category->books()->update(['parent_active' => 1]);
            $category->delete();

            return redirect(route("admin.categories.index"))->with(['success' => __("admin.success delete")]);
        } catch (\Exception $ex) {
            return redirect(route("admin.categories.index"))->with(['error' => __("admin.message error")]);
        }
    }
}
