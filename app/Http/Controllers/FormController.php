<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormulaireRequest;
use Illuminate\Http\Request;
use App\Models\FormModel;
use Exception;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
    public function create(): \Illuminate\View\View
    {
        return view('formulaire');
    }

    public function store(FormulaireRequest $request)
    {
        $data=$request->validated();
        $formulaire=new \App\Models\FormModel();
        $formulaire->name=$data['name'];
        $formulaire->surname=$data['surname'];
        $formulaire->username=$data['username'];
        $formulaire->email=$data['email'];
        $formulaire->tel=$data['tel'];
        $formulaire->password = Hash::make($data['password']);
        $formulaire->statut = 'en_attente'; // Statut par défaut
        $formulaire->role_id = 1; // rôle par défaut

        try {
    
            $formulaire->save();
            // Validation des données
        /*          $data = $request->validate([
          'name' => 'required|string|max:255',
                'surname' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8',
                'tel' => 'required|string|max:20',  
            ]); */

            // Hash du mot de passe et ajout du statut


            // Création de l'utilisateur
          //  $user = FormModel::create($data);
    
            // Flash message de succès
       session()->flash('success', 'L\'utilisateur a été créé avec succès !');
    
            // Redirection vers la page d'inscription (ou une autre page) après succès
            return redirect()->back()->withInput()->with('success', 'L\'utilisateur a été créé avec succès !');
    
        } catch (Exception $e) {
            logger($e->getMessage());
         session()->flash('error', 'Une erreur est survenue, veuillez réessayer.');
    
            // En cas d'erreur, redirection vers la page d'inscription avec un message
            return back()->withInput();
        }
    }    
}    
