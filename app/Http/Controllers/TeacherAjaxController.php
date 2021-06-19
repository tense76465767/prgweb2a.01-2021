<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherAjaxController extends Controller
{
    public function getTeachers() {
        return Teacher::all();
    }

    public function postTeacher(Request $request) {
        $teacher = $request->all();
        return ['result' => Teacher::create($teacher)];
    }

    public function putTeacher(Request $request) {
        $teacherData = $request->all();
        $teacher = Teacher::find($teacherData['id']);
        $teacher->firstName = $teacherData['firstName'];
        $teacher->lastName = $teacherData['lastName'];
        $teacher->city = $teacherData['city'];
        $teacher->address = $teacherData['address'];
        $teacher->salary = $teacherData['salary'];
        return ['result' => $teacher->save()];
    }

    public function deleteTeacher($id) {
        Teacher::where('id', $id)->delete();
        return ['result' => true];
    }
}
