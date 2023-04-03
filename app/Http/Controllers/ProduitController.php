<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
 //
 public function list()
 {
 $produits = Produit::select("id","nom","qte")->get();
 return response()->json($produits);
 }

 public function message(){
    return ("Bienvenue dans l'API de gestion du frigo");
 }

 public function recherche(Request $request){

    if ($request->has('search')) {
                $produits = Produit::where("nom", "LIKE", "%" . $request->search . "%")->get();
                return response()->json($produits);
            } else {
                $produits = Produit::select("id", "nom", "qte")->get();
                return response()->json($produits);
            }
        }

 public function ajouter(Request $request){
    $request->all();
        $validator = Validator::make($request->all(), [
            'nom' => ['required', 'alpha'],
            'qte' => ['required', 'numeric'],
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }

        // Validator sans utiliser la classe Validator

        // $validated = $request->validate( [
        //     'nom' => ['required','alpha'],
        //     'qte' => ['required','integer'],
        // ]);

        $produit = new Produit;
        $produit->nom = $request->nom;
        $produit->qte = $request->qte;
        $produit->save();
 }

 public function delete($id){
    $produit = Produit::find($id);
    $produit->delete();
    }

public function modif(Request $request){
    $request->all();
    $request->all();
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'numeric'],
            'nom' => ['required', 'alpha'],
            'qte' => ['required', 'numeric']
        ]);
        if ($validator->fails()) {
                    return $validator->errors();
                }
    // $validator = $request->validate( [
    //     'id' => ['required', 'integer'],
    //     'nom' => ['required', 'alpha'],
    //     'qte' => ['required', 'integer']
    // ]);

    if ($produit = Produit::find($request->id)) {
        $produit->nom = $request->nom;
        $produit->qte = $request->qte;
        $produit->save();
    }
    }

    public function recupid($id){
        $produit = Produit::find($id);
        $produit->get();
        return response()->json($produit);

 }
}