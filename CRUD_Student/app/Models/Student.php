<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Student extends Model
{
    use HasFactory;
    protected $table='students';

    public function getAllStudent()
    {
        $students = DB::select('SELECT * FROM students');
        return $students;
    }
    public function postAdd($data)
    {
        $inserted = DB::table('students')->insert([
            'name' => $data[0],
            'phoneNumber' => $data[1]
        ]);
        return $inserted;
    }
    public function getDetail($id)
    {
        return DB::select('SELECT * FROM students WHERE id= ?', [$id]);
    }
    public function postEdit($data, $id)
    {
        DB::table('students')
        ->where('id', $id)
        ->update([
            'name' => $data['name'],
            'phoneNumber' => $data['phoneNumber']
        ]);

    return redirect()->back()->with('msg', 'Cập nhật thành công');
    }
    public function deleteUser($id)
    {
        return  DB::delete("DELETE FROM students WHERE id=? ", [$id]);
    }
}