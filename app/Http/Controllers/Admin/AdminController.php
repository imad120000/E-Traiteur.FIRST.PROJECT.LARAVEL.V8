<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Annonce;
use App\Models\AnnonceAdmin;
use App\Models\Classment;
use App\Models\User;
use App\Models\demande;
use App\Models\message;
use App\Models\facture;
use App\Models\service;
use App\Models\ville;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\ComparisonMethodDoesNotDeclareBoolReturnTypeException;


class AdminController extends Controller
{

    public function check(Request $request)
    {
        //Validate Inputs
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30'
        ], [
            'email.exists' => 'This email Invalid',
            'password.exists' => 'This password Invalid'
        ]);


        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Authentication successful
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.profile');
        } else {
            // Authentication failed
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }


    // Page profile Statistique
    public function profile()
    {
        //statistique for les demandes

        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $thisWeek = Carbon::now()->startOfWeek();
        $thisMonth = Carbon::now()->startOfMonth();
        $thisYear = Carbon::now()->startOfYear();

        $demandeactivation_today = User::where('compte', 0)->whereDate('created_at', $today)->count();
        $demandeactivation_yesterday = User::where('compte', 0)->whereDate('created_at', $yesterday)->count();
        $demandeactivation_thisWeek = User::where('compte', 0)->whereBetween('created_at', [$thisWeek, Carbon::now()])->count();;
        $demandeactivation_thisMounth = User::where('compte', 0)->whereBetween('created_at', [$thisMonth, Carbon::now()])->count();
        $demandeactivation_thisYear = User::where('compte', 0)->whereBetween('created_at', [$thisYear, Carbon::now()])->count();


        $demande_today = demande::whereDate('created_at', $today)->count();
        $demande_yesterday = demande::whereDate('created_at', $yesterday)->count();
        $demande_thisWeek = demande::whereBetween('created_at', [$thisWeek, Carbon::now()])->count();
        $demande_thisMonth = demande::whereBetween('created_at', [$thisMonth, Carbon::now()])->count();
        $demande_thisYear = demande::whereBetween('created_at', [$thisYear, Carbon::now()])->count();

        $demandeclassment_today = Classment::whereDate('created_at', $today)->count();
        $demandeclassment_yesterday = Classment::whereDate('created_at', $yesterday)->count();
        $demandeclassment_thisWeek = Classment::whereBetween('created_at', [$thisWeek, Carbon::now()])->count();
        $demandeclassment_thisMonth = Classment::whereBetween('created_at', [$thisMonth, Carbon::now()])->count();
        $demandeclassment_thisYear = Classment::whereBetween('created_at', [$thisYear, Carbon::now()])->count();

        // i knew this not clean code bu i was hurry for finish this projet sorry
        // voila la somme des demandes

        $today_      =  $demandeactivation_today + $demande_today + $demandeclassment_today;
        $yesterday_  =  $demandeactivation_yesterday + $demande_yesterday + $demandeclassment_yesterday;
        $week_       =  $demandeactivation_thisWeek + $demande_thisWeek + $demandeclassment_thisWeek;
        $mounth_     =  $demandeactivation_thisMounth +  $demande_thisMonth + $demandeclassment_thisMonth;
        $year_       =  $demandeactivation_thisYear + $demande_thisYear + $demandeclassment_thisYear;
        $total_demand = $demandeactivation_today + $demande_today + $demandeclassment_today +
            $demandeactivation_yesterday + $demande_yesterday + $demandeclassment_yesterday +
            $demandeactivation_thisWeek + $demande_thisWeek + $demandeclassment_thisWeek +
            $demandeactivation_thisMounth + $demande_thisMonth + $demandeclassment_thisMonth +
            $demandeactivation_thisYear + $demande_thisYear + $demandeclassment_thisYear;


        //Statistique for the revenu
        $revenu_today = facture::whereDate('created_at', $today)->sum('montant');
        $revenu_yesterday = facture::whereDate('created_at', $yesterday)->sum('montant');
        $revenu_thisweek = facture::whereBetween('created_at', [$thisWeek, Carbon::now()])->sum('montant');
        $revenu_thismounth = facture::whereBetween('created_at', [$thisMonth, Carbon::now()])->sum('montant');
        $revenu_thisyear = facture::whereBetween('created_at', [$thisYear, Carbon::now()])->sum('montant');

        $revenu_all_years = facture::whereYear('created_at', '<=', date('Y'))->sum('montant');

        $revenu_total = $revenu_all_years;

        return view('admin.profile', [
            //statistique les demandes
            'today' => $today_,
            'yesterday' => $yesterday_,
            'week' => $week_,
            'mounth' => $mounth_,
            'year' => $year_,
            'total_demand' => $total_demand,
            //statistique Revenu
            'revenu_today' =>   $revenu_today,
            'revenu_yesterday' =>   $revenu_yesterday,
            'revenu_thisweek' =>   $revenu_thisweek,
            'revenu_thismounth' =>   $revenu_thismounth,
            'revenu_thisyear' =>   $revenu_thisyear,
            'revenu_total' => $revenu_total,
        ]);
    }

    // Page Annonce 
    public function annonce()
    {
        $annonce = AnnonceAdmin::all();
        return view('admin.annonce', [
            'annonce' => $annonce,
        ]);
    }

    public function addannonce(Request $request)
    {

        $request->validate([
            'centenu' => 'required',
            'title' => 'required',
            'image' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('annonceadmin'), $image);
        }

        $annonce = new AnnonceAdmin();
        $annonce->title = $request->input('title');
        $annonce->centenu = $request->input('centenu');
        $annonce->image = $image;
        $annonce->save();

        return redirect()->back()->with('success', true);
    }

    public function updateannonce(Request $request, $id)
    {

        $annonce_ = AnnonceAdmin::findOrFail($id);
        if ($request->hasFile('imageU')) {
            $file_ = $request->file('imageU');
            $image_ = time() . '_' . $file_->getClientOriginalName();
            $file_->move(public_path('annonceadmin'), $image_);
            unlink(public_path('annonceadmin') . '/' . $annonce_->image); //delete ancien image


            $annonce_->update([
                'title' => $request['titleU'],
                'centenu' => $request['centenuU'],
                'image' => $image_, // include the updated image name here
            ]);
        }



        return redirect()->back();
    }

    public function deleteannonce($id)
    {

        $delete = Annonceadmin::findOrFail($id);
        unlink(public_path('./annonceadmin/') . $delete->image);
        $delete->delete();
        return redirect()->back()->with('success', true);
    }

    //Page Activaion Compte
    public function activecompte()
    {
        $compte = User::with('ville', 'service')
            ->where('compte', 0)
            ->get();
        return view('admin.account-activation', ['compte' => $compte]);
    }

    public function active($id)
    {

        $compte = User::where('id', $id)->first();
        $compte->update([
            'compte' => 1,
        ]);

        $facture = new facture();
        $facture->user_id = $id;
        $facture->des = "Abonnement annuel";
        $facture->status = "Payé";
        $facture->montant = 100;
        $facture->save();

        return redirect()->back();
    }

    public function deletecompte($id)
    {
        $delete = User::find($id);
        unlink(public_path('./cin1/') . $delete->cinDocument1);
        unlink(public_path('./cin2/') . $delete->cinDocument2);
        unlink(public_path('./profile/') . $delete->profileDocument);
        unlink(public_path('./status/') . $delete->statusDocument);
        $delete->delete();
        return redirect()->back();
    }

    //Page Classment
    public function classment()
    {
        $classment = classment::with('service', 'user')
            ->where('status', 'En attente')
            ->get();
        return view('admin.utilisateur-classment', ['classment' => $classment]);
    }

    public function activeclassment($id)
    {

        $classment = classment::where('id', $id)->first();
        $classment->update([
            'status' => 'accepté',
        ]);

        $annonceclassment = Annonce::where('user_id', $classment->user_id);
        $annonceclassment->update([
            'classment' => $classment->classment,
        ]);

        if ($classment->classment == 1) {
            $facture = new facture();
            $facture->user_id = $classment->user_id;
            $facture->des = "Rank" . $classment->classment;
            $facture->status = "Payé";
            $facture->montant = 5300;
            $facture->save();
        } else if ($classment->classment == 2) {
            $facture = new facture();
            $facture->user_id = $classment->user_id;
            $facture->des = "Rank" . $classment->classment;
            $facture->status = "Payé";
            $facture->montant = 4500;
            $facture->save();
        } else if ($classment->classment == 3) {
            $facture = new facture();
            $facture->user_id = $classment->user_id;
            $facture->des = "Rank" . $classment->classment;
            $facture->status = "Payé";
            $facture->montant = 3900;
            $facture->save();
        } else if ($classment->classment == 4) {
            $facture = new facture();
            $facture->user_id = $classment->user_id;
            $facture->des = "Rank" . $classment->classment;
            $facture->status = "Payé";
            $facture->montant = 3000;
            $facture->save();
        } else if ($classment->classment == 5) {
            $facture = new facture();
            $facture->user_id = $classment->user_id;
            $facture->des = "Rank" . $classment->classment;
            $facture->status = "Payé";
            $facture->montant = 2800;
            $facture->save();
        } else if ($classment->classment == 6) {
            $facture = new facture();
            $facture->user_id = $classment->user_id;
            $facture->des = "Rank" . $classment->classment;
            $facture->status = "Payé";
            $facture->montant = 2500;
            $facture->save();
        } else if ($classment->classment == 7) {
            $facture = new facture();
            $facture->user_id = $classment->user_id;
            $facture->des = "Rank" . $classment->classment;
            $facture->status = "Payé";
            $facture->montant = 2000;
            $facture->save();
        } else if ($classment->classment == 8) {
            $facture = new facture();
            $facture->user_id = $classment->user_id;
            $facture->des = "Rank" . $classment->classment;
            $facture->status = "Payé";
            $facture->montant = 1700;
            $facture->save();
        } else if ($classment->classment == 9) {
            $facture = new facture();
            $facture->user_id = $classment->user_id;
            $facture->des = "Rank" . $classment->classment;
            $facture->status = "Payé";
            $facture->montant = 1300;
            $facture->save();
        } else if ($classment->classment == 10) {
            $facture = new facture();
            $facture->user_id = $classment->user_id;
            $facture->des = "Rank" . $classment->classment;
            $facture->status = "Payé";
            $facture->montant = 1000;
            $facture->save();
        }




        return redirect()->back();
    }

    //Page Message
    public function message()
    {
        $message = message::all();
        return view('admin.Message', ['message' => $message]);
    }

    public function envoye(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'objet' => 'required',
        ]);

        $message = new message();
        $message->email = $request['email'];
        $message->objet = $request['objet'];
        $message->save();

        return redirect()->back();
    }

    public function deletemessage($id)
    {
        $message = message::findOrFail($id);
        $message->delete();
        return redirect()->back();
    }

    //Page Autre demande for user
    public function autredemande()
    {
        $autre = demande::all();
        return view('admin.autre-demande', ['autre' => $autre]);
    }
    public function deletedemande($id)
    {
        $autrdemande = demande::findOrFail($id);
        $autrdemande->delete();
        return redirect()->back();
    }

    //Page Document
    public function document()
    {
        $user = User::all();
        $ville = ville::all();
        $service = service::all();
        return view('admin.utilisateur-document', ['user' => $user, 'ville' => $ville, 'service' => $service]);
    }

    public function recherche(Request $request)
    {

        $result = User::all();
        $ville = ville::all();
        $service = service::all();

        if (isset($request['ville']) && isset($request['service'])) {
            $result = User::where('ville_id', $request['ville'])
                ->where('service_id', $request['service'])
                ->get();
        } else if (isset($request['ville'])) {
            $result = User::where('ville_id', $request['ville'])
                ->get();
        } else if (isset($request['service'])) {
            $result = User::where('service_id', $request['service'])
                ->get();
        }



        return view('admin.utilisateur-document', ['result' => $result, 'ville' => $ville, 'service' => $service]);
    }

    //Home
    public function home()
    {
        $ville = ville::all();
        $service = service::all();
        $annonceAdmin = AnnonceAdmin::all();
        return view('welcome', ['ville' => $ville, 'service' => $service, 'annonceadmin' => $annonceAdmin]);
    }

    public function searche()
    {
        $ville = ville::all();
        $service = service::all();

        return view('recherche', ['ville' => $ville, 'service' => $service]);
    }

    //Page recherche
    public function search(Request $request)
    {
        $ville = ville::all();
        $service = service::all();

        $villeId = $request->input('ville', ''); // Get the ville id from the request, or set it as an empty string if it's not set
        $serviceId = $request->input('service', ''); // Get the service id from the request, or set it as an empty string if it's not set

        if (!empty($villeId) && !empty($serviceId)) {

            $result = Annonce::where('ville_id', $villeId)
                        ->where('service_id', $serviceId)
                        ->orderByRaw('CASE WHEN classment BETWEEN 1 AND 10 THEN classment END DESC')
                        ->inRandomOrder()
                        ->get();

        } else if (!empty($villeId)) {

            $result = Annonce::where('ville_id', $villeId)
                        ->orderByRaw('CASE WHEN classment BETWEEN 1 AND 10 THEN classment END DESC')
                        ->inRandomOrder()
                        ->get();

        } else if (!empty($serviceId)) {

            $result = Annonce::where('service_id', $serviceId)
                        ->orderByRaw('CASE WHEN classment BETWEEN 1 AND 10 THEN classment END DESC')
                        ->inRandomOrder()
                        ->get();

        } else {

            $result = Annonce::with('user', 'service')
                        ->orderByRaw('CASE WHEN classment BETWEEN 1 AND 10 THEN classment END DESC')
                        ->inRandomOrder()
                        ->get(); 
        }

        return view('recherche', ['ville' => $ville, 'service' => $service, 'result' => $result]);
    }

    //Page detail 
    public function detail($id)
    {
        $annonce = Annonce::findOrFail($id);
        return view('details', [
            'annonce' => $annonce,
        ]);
    }

    
}
