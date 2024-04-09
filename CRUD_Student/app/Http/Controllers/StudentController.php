<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    private $students;
    public function __construct()
    {
        $this->students = new Student();
    }
    public function index()
    {
        $students = $this->students->paginate(10);
        return view('index', compact('students'));
    }
    public function add()
    {
        return view('add');
    }
    public function postAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'phoneNumber' => 'required|numeric'
        ], [
            'name.required' => 'Bạn phải nhập thông tin vào ô',
            'name.min' => 'Bạn phải nhập trên :min',
            'phoneNumber.required' => 'Bạn phải nhập thông tin vào ô',
            'phoneNumber.numeric' => 'Bạn phải nhập số không được nhập chữ'
        ]);
        $data = [
            $request->name,
            $request->phoneNumber
        ];
        $this->students->postAdd($data);
        return redirect()->route('index')->with('msg', 'Thêm người dùng thành công');
    }
    public function edit(Request $request, $id = 0)
    {
        $title = 'Chỉnh sửa thông tin ';
        if (!empty($id)) {
            $userDetails = $this->students->getDetail($id);
            if (!empty($userDetails)) {
                $request->session()->put('id', $id);
                $userDetail = $userDetails[0];
            } else {
                return redirect()->route('index')->with('msg', 'Người dùng không tồn tại');
            }
        }
        return view('edit', compact('userDetail'));
    }
    public function postEdit(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'ID không tồn tại');
        }

        $request->validate([
            'name' => 'required|min:5',
            'phoneNumber' => 'required|numeric'
        ], [
            'name.required' => 'Bạn phải nhập thông tin vào ô',
            'name.min' => 'Bạn phải nhập trên :min ký tự',
            'phoneNumber.required' => 'Bạn phải nhập thông tin vào ô',
            'phoneNumber.numeric' => 'Bạn phải nhập số không được nhập chữ'
        ]);

        $data = [
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber
        ];

        $this->students->postEdit($data, $id);

        return redirect()->route('index')->with('msg', 'Cập nhật thành công');
    }
    public function deleteUser($id)
    {
        $delete = $this->students->deleteUser($id);

        if ($delete) {
            return redirect()->route('index')->with('msg', 'Xóa người dùng thành công');
        } else {
            return redirect()->route('index')->with('msg', 'Không tìm thấy người dùng để xóa');
        }
    }
}
