<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use DB;

class TeacherController extends Controller
{
    public function getTeachers(Request $request) {

        $teachers = Teacher::where([]);

        if (!empty($request['firstName'])) {
            $criteria = strtolower($request['firstName']);
            $teachers->whereRaw("LOWER(firstName) LIKE '%$criteria%'");
        }

        if (!empty($request['lastName'])) {
            $criteria = strtolower($request['lastName']);
            $teachers->whereRaw("LOWER(lastName) LIKE '%$criteria%'");
        }

        if (!empty($request['city'])) {
            $criteria = strtolower($request['city']);
            $teachers->whereRaw("LOWER(city) LIKE '%$criteria%'");
        }

        if (!empty($request['address'])) {
            $teachers->where('address', $request->get('address'));
        }

        if (!empty($request['salary'])) {
            $teachers->where('salary', $request->get('salary'));
        }

        $teachers = $teachers->paginate(3);

        return view('teacherstable', [
            'teachers' => $teachers,
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'city' => $request['city'],
            'address' => $request['address'],
            'salary' => $request['salary']
        ]);
    }

    public function showTeacherAdd() {
        return view('teacheradd');
    }

    public function showTeacherAddAngular() {
        return view('teacheraddangular', [
            'pagetitle' => 'New Teacher'
        ]);
    }

    public function postTeacher(Request $request) {
        Teacher::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'salary' => $request->input('salary')
        ]);
        return redirect('/teachers');
    }

    public function getTeacher($id) {
        $teacher = Teacher::where('id', $id)->firstOrFail();
        return view('teacheredit', [
            'teacher' => $teacher
        ]);
    }

    public function putTeacher(Request $request) {
        $teacher = Teacher::find($request->get('id'));
        $teacher->firstName = $request->get('firstName');
        $teacher->lastName = $request->get('lastName');
        $teacher->city = $request->get('city');
        $teacher->address = $request->get('address');
        $teacher->salary = $request->get('salary');
        $teacher->save();
        return redirect('/teachers');
    }
}
