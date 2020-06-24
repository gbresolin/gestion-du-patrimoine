<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Monument;

class ApiController extends Controller
{
    public function getAllStudents() {
        $students = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);
    }

    public function createStudent(Request $request) {
        $student = new Student;
        $student->name = $request->name;
        $student->course = $request->course;
        $student->save();

        return response()->json([
            "message" => "student record created"
        ], 201);
    }

    public function getStudent($id) {
        if (Student::where('id', $id)->exists()) {
            $student = Student::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    public function updateStudent(Request $request, $id) {
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);

            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            $student->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    public function deleteStudent ($id) {
        if(Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    public function getAllMonuments() {
        $monuments = Monument::get()->toJson(JSON_PRETTY_PRINT);
        return response($monuments, 200);
    }

    public function createMonument(Request $request) {
        $monument = new Monument;
        $monument->userCreateur = $request->userCreateur;
        $monument->nom = $request->nom;
        $monument->rue = $request->rue;
        $monument->cp = $request->cp;
        $monument->ville = $request->ville;
        $monument->latitude = $request->latitude;
        $monument->longitude = $request->longitude;
        $monument->dateCrea = $request->dateCrea;
        $monument->image = $request->image;
        $monument->audio = $request->audio;
        $monument->save();

        return response()->json([
            "message" => "Monument ajouté !"
        ], 201);
    }

    public function getMonument($id) {
        if (Monument::where('id', $id)->exists()) {
            $monument = Monument::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($monument, 200);
        } else {
            return response()->json([
                "message" => "Monument introuvable"
            ], 404);
        }
    }

    public function updateMonument(Request $request, $id) {
        if (Monument::where('id', $id)->exists()) {
            $monument = Monument::find($id);

            $monument->nom = is_null($request-nom) ? $monument->name : $request->nom;
            $monument->rue = is_null($request->rue) ? $monument->rue : $request->rue;
            $monument->cp = is_null($request->cp) ? $monument->cp : $request->cp;
            $monument->ville = is_null($request->ville) ? $monument->ville : $request->ville;
            $monument->latitude = is_null($request->latitude) ? $monument->latitude : $request->latitude;
            $monument->longitude = is_null($request->longitude) ? $monument->longitude : $request->longitude;
            $monument->dateCrea = is_null($request->dateCrea) ? $monument->dateCrea : $request->dateCrea;
            $monument->image = is_null($request->image) ? $monument->image : $request->image;
            $monument->audio = is_null($request->audio) ? $monument->audio : $request->audio;
            $monument->save();

            return response()->json([
                "message" => "Données monument mis à jour"
            ], 200);
        } else {
            return response()->json([
                "message" => "Monument non trouvé"
            ], 404);
        }
    }

    public function deleteMonument ($id) {
        if(Monument::where('id', $id)->exists()) {
            $monument = Monument::find($id);
            $monument->delete();

            return response()->json([
                "message" => "Monument supprimé"
            ], 202);
        } else {
            return response()->json([
                "message" => "Monument non trouvé"
            ], 404);
        }
    }
}
