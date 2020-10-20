<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Validator;

class LessonController extends Controller
{

    private $numberItemPerPage = 20 ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::with('book')->paginate($this->numberItemPerPage);

        return view('admins.lessons.index' , compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
    

        return view('admins.lessons.create')->with('books', $books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), Lesson::$create_rule)->validate();

        $lesson = new Lesson();
        $lesson->book_id = $request->book_id;
        $lesson->name = $request->name;
        $img_path = Storage::disk('public')->put('images', $request->file('img'));
        $lesson->img = $img_path;
        $lesson->description = $request->description;
        $lesson->save();

        return redirect()->route('admin.lessons.index')->with('success','Đã tạo thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);

        return view('admins.lessons.show')->with('lesson', $lesson);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::find($id);

        if (!empty($lesson)) {
            return view('admins.lessons.edit')->with('lesson', $lesson);
        }

        return redirect()->back()->with('fail', "Lesson khong ton tai");
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
        Validator::make($request->all(), Lesson::$create_rule)->validate();
        $lesson = Lesson::find($id);
        if (!empty($lesson)) {
            //update lesson
            $lesson->name = $request->input('name');
            if ($request->has('img')) {
                // xoa hinh cu di
                Storage::disk('public')->delete($lesson->img);
                // luu hinh moi update
                $img_path = Storage::disk('public')->put('imgs', $request->file('img'));
                // update lai duong dan icon cua lesson
                $lesson->img = $img_path;
            }

            $lesson->save();

            return redirect()->route('admin.lessons.index')->with('success', 'Da luu lai book thanh cong');
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
        $lesson = Lesson::find($id);

        if (!empty($lesson)) {
            $lesson->delete();

            return Redirect::back()->with('success', 'Xoa Category Thanh Cong');
        }

        return Redirect::back()->with('fail', 'category khong ton tai');
    }
}
