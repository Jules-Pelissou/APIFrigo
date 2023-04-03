<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [App\Http\Controllers\ProduitController::class, 'message']);
Route::get('/produits', [App\Http\Controllers\ProduitController::class, 'list']);
Route::get('/produits', [App\Http\Controllers\ProduitController::class, 'recherche']);
Route::post('/produits', [App\Http\Controllers\ProduitController::class, 'ajouter']);
Route::delete('/produits/{id}', [App\Http\Controllers\ProduitController::class, 'delete']);
Route::put('/produits', [App\Http\Controllers\ProduitController::class, 'modif']);
Route::get('/produits/{id}', [App\Http\Controllers\ProduitController::class, 'recupid']);

// Route::get('/', function (Request $request) {
//     return response()->json(["message" => "Bienvenue dans l'API de gestion du frigo"], 200);
// });

// Route::get(
//     '/produits',
//     function (Request $request) {
//         if ($request->has('search')) {
//             $produits = Produit::where("nom", "LIKE", "%" . $request->search . "%")->get();
//             return response()->json($produits);
//         } else {
//             $produits = Produit::select("id", "nom", "qte")->get();
//             // return response()->json(["status" => 0, "message" => "pb lors de l'ajout"], 400);
//             return response()->json($produits);
//         }
//     }
// );

// Route::post('/produits', function (Request $request) {
//     $request->all();
//     $validator = Validator::make($request->all(), [
//         'nom' => ['required', 'alpha'],
//         'qte' => ['required', 'numeric'],
//     ]);
//     if ($validator->fails()) {
//         return $validator->errors();
//     }
//     $produit = new Produit;
//     $produit->nom = $request->nom;
//     $produit->qte = $request->qte;
//     $produit->save();
// });

// Route::delete('/produits/{id}', function ($id) {
//     $produit = Produit::find($id);
//     $ok = $produit->delete();
//     if ($ok) {
//         return response()->json(["status" => 1, "message" => "Produit supprimé"], 204);
//     } else {
//         return response()->json(["status" => 0, "message" => "problème lors de la suppression"], 400);
//     }
// });

// // Route::put('/produits/{id}', function (Request $request, $id) {
// //     $produit = Produit::find($id);
// //     $produit->nom = $request->nom;
// //     $produit->qte = $request->qte;
// //     $ok = $produit->save();
// //     if ($ok) {
// //         return response()->json(["status" => 1, "message" => "Produit modifié"], 200);
// //     } else {
// //         return response()->json(["status" => 0, "message" => "problème lors de la modification"], 400);
// //     }
// // //     $request->all();
// // //     $validator = Validator::make($request->all(),[
// // //         'id' => ['requiered','numeric'],
// // //         'nom' => ['requiered','alpha'],
// // //         'qte' => ['requiered','integer']
// // //     ]);
// // //     if ($validator->fails()) {
// // //     return $validator->errors();
// // //     }
// // });

// Route::put('/produits', function (Request $request) {
//     $request->all();
//     $validator = Validator::make($request->all(), [
//         'id' => ['required', 'numeric'],
//         'nom' => ['required', 'alpha'],
//         'qte' => ['required', 'numeric']
//     ]);

//     if ($validator->fails()) {
//         return $validator->errors();
//     }

//     if ($produit = Produit::find($request->id)) {
//         $produit->nom = $request->nom;
//         $produit->qte = $request->qte;
//         $produit->save();
//     }
// });

// Route::get('/produits/{id}', function ($id) {
//     $produit = Produit::find($id);
//     $ok = $produit->get();
//     if ($ok) {
//         return response()->json(["status" => 1, "message" => "Produit"], 200);
//     } else {
//         return response()->json(["status" => 0, "message" => "problème"], 400);
//     }
// });
