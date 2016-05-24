<?php

namespace Kun\Categories\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Kun\Categories\Http\Models\Category;
use Kun\Categories\Http\Requests\SaveCategoryRequest;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $parent_id = null;

    public function __construct(Request $request)
    {
        if ($request->parent_id) {
            $this->parent_id = $request->parent_id;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::defaultOrder()->where(['parent_id' => $this->parent_id])->paginate(10);
        $ancestor = null;
        $categoryParent = null;
        if ($this->parent_id) {
            $categoryParent = Category::find($this->parent_id);
            $ancestor = $categoryParent->parent;
        }
        return view('categories::index', compact('categories'))->with([
            'p_parent_id' => $this->parent_id,
            'ancestor' => $ancestor,
            'current' => $categoryParent
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories::create')->with(['p_parent_id' => $this->parent_id])->withModel($model = new Category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(SaveCategoryRequest $request)
    {
        $categoryParent = null;
        if ($this->parent_id) {
            $categoryParent = Category::find($this->parent_id);
        }

        (new Category)->saveData(
            array_merge($request->all(), ['status' => ($request->status == null) ? 0 : 1]),
            $categoryParent
        );
        Session::flash('flash_success', 'Category added!');

        if ($this->parent_id) {

            return redirect('categories?parent_id=' . $this->parent_id);
        }
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('categories::show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        return view('categories::edit', compact('category'))->withModel($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, SaveCategoryRequest $request)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $category->saveData(
            array_merge($request->all(), ['status' => ($request->status == null) ? 0 : 1])
        );

        Session::flash('flash_message', 'Category updated!');

        if ($category->parent) {
            return redirect('categories?parent_id=' . $category->parent->id);
        }

        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        Session::flash('flash_message', 'Category deleted!');

        return redirect('categories');
    }

    public function moveUp($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $category->up();

        if ($category->parent) {
            return redirect('categories?parent_id=' . $category->parent->id);
        }

        return redirect('categories');
    }

    public function moveDown($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $category->down();

        if ($category->parent) {
            return redirect('categories?parent_id=' . $category->parent->id);
        }

        return redirect('categories');
    }

}
