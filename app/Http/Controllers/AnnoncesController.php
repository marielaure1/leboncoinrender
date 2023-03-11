<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Annonces;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateMail;
use App\Mail\ValidateMail;
use App\Mail\DeleteMail;

class AnnoncesController extends Controller
{
    /* Lister les annonces valides */
    public function all(): View
    {
        $annonces = Annonces::where("status", 1)->orderBy('updated_at', 'desc')->get();

        return view("index", ["annonces" => $annonces]);
    }

     /* Formulaire pour créer une annonce */
     public function formCreate()
     {
         return view("create");
     }
 

    /* Créer une annonce */
    public function create(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:15',
            'location' => 'required',
            'price' => 'required|numeric',
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $title = $request->old('title');
        $description = $request->old('description');
        $location = $request->old('location');
        $price = $request->old('price');
        $name = $request->old('name');
        $email = $request->old('email');

        $notification = "";

        if($validated){
            
            $annonce = Annonces::create($validated);
            $token = Str::random(15);
            $tokenExist = Annonces::where("token", $token)->first();

            while ($tokenExist) {
                $token = Str::random(15);
                $tokenExist = Annonces::where("token", $token)->first();
            }

            $annonce->token = $token;
            $annonce->save();

            Mail::to($annonce->email)->send(new CreateMail(env("APP_URL")."/validate/$annonce->token"));

            $notification = "Votre annonce a été créé avec succès ! Un email vous a été envoyé pour valider l'annonce.";
        }

        return redirect('create')->with('notification', $notification);
    }

    /* Afficher l'annonce */
    public function show(string $id)
    {
        $annonce = Annonces::where("id", $id)->first();

        return view("show", ["annonce" => $annonce]);
    }

     /* Afficher les annonces d'un vendeur */
     public function vendeur(string $name): View
     {
         $vendeur = Annonces::where("name", $name)->first();
         $annonces = Annonces::where("name", $name)->get();
 
         return view("vendeur", ["annonces" => $annonces, "vendeur" => $vendeur]);
     }

    /* Valider annonce */
    public function validateAnnonce(string $tokenRandom): RedirectResponse
    {

        $annonce = Annonces::where("token", $tokenRandom)->first();
        $annonce->status = 1;
        $annonce->save();

        $notification = "";

        if(!$annonce){
            return redirect('/');
        }

        $notification = "Votre annonce a été validé avec succès ! Un email vous a été envoyé si vous voulez la supprimer annonce.";

        Mail::to($annonce->email)->send(new ValidateMail(env("APP_URL")."/delete/$annonce->token"));
        return redirect('/')->with('notification', $notification);

    }

    /* Supprimmer annonce */
    public function delete(string $tokenRandom): RedirectResponse
    {
        $annonce = Annonces::where("token", $tokenRandom)->first();
        $annonce->delete();

        $notification = "";

        if(!$annonce){
            return redirect('/');
        }

        $notification = "Votre annonce a été supprimé avec succès ! Un email de confirmation vous a été envoyé.";
        Mail::to($annonce->email)->send(new DeleteMail());
        return redirect('/')->with('notification', $notification);
    }
}
