<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Student;
use App\Monument;
use Illuminate\Support\Str;

class ApiController extends Controller
{
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

            $monument->nom = is_null($request->nom) ? $monument->nom : $request->nom;
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
                "message" => "Monument mis à jour"
            ], 200);
        } else {
            return response()->json([
                "message" => "Monument introuvable"
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
                "message" => "Monument introuvable"
            ], 404);
        }
    }

    public function getAllUsers() {
        $users = User::get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function createUser(Request $request) {
        $user = new User;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->mail = $request->mail;
        $user->login = $request->login;
        $user->password = $request->password;
        $user->api_token = Str::random(60);
        $user->isAdmin = $request->isAdmin;
        $user->save();

        return response()->json([
            "message" => "User ajouté !"
        ], 201);
    }

    public function getUser($id) {
        if (User::where('id', $id)->exists()) {
            $user = User::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($user, 200);
        } else {
            return response()->json([
                "message" => "User introuvable"
            ], 404);
        }
    }

    public function updateUser(Request $request, $id) {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);

            $user->nom = is_null($request->nom) ? $user->nom : $request->nom;
            $user->prenom = is_null($request->prenom) ? $user->prenom : $request->prenom;
            $user->mail = is_null($request->mail) ? $user->mail : $request->mail;
            $user->login = is_null($request->login) ? $user->login : $request->login;
            $user->password = is_null($request->password) ? $user->password : $request->password;
            $user->isAdmin = is_null($request->isAdmin) ? $user->isAdmin : $request->isAdmin;
            $user->save();

            return response()->json([
                "message" => "Données user mis à jour"
            ], 200);
        } else {
            return response()->json([
                "message" => "User introuvable"
            ], 404);
        }
    }

    public function deleteUser ($id) {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message" => "User supprimé"
            ], 202);
        } else {
            return response()->json([
                "message" => "User introuvable"
            ], 404);
        }
    }
}
