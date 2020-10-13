<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;
use Redirect;
use Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admins.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), Category::$create_rule)->validate();
        $category = new Category();
        $category->name = $request->name;

        $icon_url = Storage::disk('public')->put('icons', $request->file('icon'));
        $category->icon = $icon_url;

        $category->save();
        return Redirect::route('admin.categories.index')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('admins.categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        if (isset($category)) {
            return view('admins.categories.edit')->with('category', $category);
        }

        return redirect()->back()->with('fail', "Category khong ton tai");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        Validator::make($request->all(), Category::$update_rule)->validate();
        $category = Category::find($id);
        if (!empty($category)) {
            //update category
            $category->name = $request->input('name');
            if ($request->has('icon')) {
                // xoa hinh cu di
                Storage::disk('public')->delete($category->icon);
                // luu hinh moi update
                $icon_path = Storage::disk('public')->put('icons', $request->file('icon'));
                // update lai duong dan icon cua category
                $category->icon = $icon_path;
            }

            $category->save();

            return redirect()->route('admin.categories.index')->with('success', 'Da luu lai category thanh cong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!empty($category)) {
            $category->delete();

            return Redirect::back()->with('success', 'Xoa Category Thanh Cong');
        }

        return Redirect::back()->with('fail', 'category khong ton tai');
    }
}
