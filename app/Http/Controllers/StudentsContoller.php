<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsContoller extends Controller
{
    //get all students information
    public function getAllStudents(){
       $students= Student::get()->toJson(JSON_PRETTY_PRINT);
       return response($students, 200);

    }

    //create students information
    public function createStudent(Request $request){
        $student= new Student;
        $student->name = $request->name;
        $student->course = $request->course;
        $student-> save();
        
        return response()->json([
            "message"=>"student record created"
        ], 201);

    }

    //get a single student recortd
    public function getStudent($id){
        if (Student::where('id', $id)->exists()){
            $student= Student:: where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        }
        else{
            return response()->json([
                "message"=>"Student not found"
            ], 404);
        }

    }

    //update a student record 
    public function updateStudent(Request $request, $id){
        if (Student::where('id', $id)->exists()){
            $student= Student::find($id);
            $student->name= is_null($request->name)? $student->name: $request->name;
            $student->course= is_null($request->course)? $student->course: $request->course;
            $student->save();

            return response()->json([
                "message"=>"records updated successfully"
            ], 200);
        }else{
            return response()->json([
                "message"=>"Student not found"
            ], 404);
        }

    }

    //delete a student record
    public function deleteStudent($id){
        if (Student::where('id', $id)->exists()){
            $student= Student::find($id);
            $student->delete();

            return response()->json([
                "message"=>"Record deleted successfully"
            ], 202);
        }else{
            return response()->json([
                "message"=>"Student not found"
            ], 404);
        }

    }
}
