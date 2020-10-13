<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('category')->get();

        return view('admins.books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admins.books.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), Book::$create_rule)->validate();
        $book = new Book();
        $book->name = $request->name;


        $img_path = Storage::disk('public')->put('images', $request->file('img'));
        $book->img = $img_path;
        $book->category_id = $request->category_id;
        $book->save();
        return Redirect::route('admin.books.index')->with('success', 'Đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::with('category')->find($id);

        return view('admins.books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        if (isset($book)) {
            return view('admins.books.edit')->with('book', $book);
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
        Validator::make($request->all(), Book::$edit_rule)->validate();
        $book = Book::find($id);
        if (!empty($book)) {
            //update category
            $book->name = $request->input('name');
            if ($request->has('img')) {
                // xoa hinh cu di
                Storage::disk('public')->delete($book->img);
                // luu hinh moi update
                $img_path = Storage::disk('public')->put('imgs', $request->file('img'));
                // update lai duong dan icon cua category
                $book->img = $img_path;
            }

            $book->save();

            return redirect()->route('admin.books.index')->with('success', 'Da luu lai book thanh cong');
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
        $book = Book::find($id);

        if (!empty($book)) {
            $book->delete();

            return Redirect::back()->with('success', 'Xoa Category Thanh Cong');
        }

        return Redirect::back()->with('fail', 'category khong ton tai');
    }
}
