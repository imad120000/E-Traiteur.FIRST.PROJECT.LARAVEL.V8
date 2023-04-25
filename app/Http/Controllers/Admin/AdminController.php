<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\AnnonceAdmin;
use App\Models\Classment;
use App\Models\User;
use App\Models\demande;
use App\Models\facture;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;



class AdminController extends Controller
{

    public function check(Request $request){
        //Validate Inputs
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
         ],[
             'email.exists'=>'This email Invalid',
             'password.exists'=>'This password Invalid'
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

   public function logout(){
       Auth::guard('admin')->logout();
       return redirect('admin/login');
   }

    public function profile(){
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

        $today_      =  $demandeactivation_today + $demande_today+ $demandeclassment_today ;
        $yesterday_  =  $demandeactivation_yesterday + $demande_yesterday +$demandeclassment_yesterday;
        $week_       =  $demandeactivation_thisWeek + $demande_thisWeek + $demandeclassment_thisWeek;
        $mounth_     =  $demandeactivation_thisMounth +  $demande_thisMonth + $demandeclassment_thisMonth;
        $year_       =  $demandeactivation_thisYear + $demande_thisYear + $demandeclassment_thisYear ;
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

        $revenu_total= $revenu_all_years;

        return view('admin.profile',[
            //statistique les demandes
            'today' => $today_,
            'yesterday' => $yesterday_,
            'week' => $week_,
            'mounth' => $mounth_,
            'year' => $year_,
            'total_demand' => $total_demand,
            //statistique Revenu
            'revenu_today'=>   $revenu_today,
            'revenu_yesterday'=>   $revenu_yesterday,
            'revenu_thisweek'=>   $revenu_thisweek,
            'revenu_thismounth'=>   $revenu_thismounth,
            'revenu_thisyear'=>   $revenu_thisyear,
            'revenu_total'=>$revenu_total,
        ]);
    }

    public function annonce(){
        $annonce = AnnonceAdmin::all();
        return view('admin.annonce',[
            'annonce'=>$annonce,
        ]);
    }

    public function addannonce(Request $request){

        $request->validate([
            'centenu'=>'required',
            'title'=>'required',
            'image'=>'required',
            
        ]);
        
        if($request->hasFile('image'))
        { 
            $file = $request->file('image');
            $image = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('annonceadmin'), $image);
        }
        
        $annonce = new AnnonceAdmin();
        $annonce->title = $request->input('title');
        $annonce->centenu = $request->input('centenu');
        $annonce->image = $image;
        $annonce->save();
        
        return redirect()->back()->with('success', true);
        
    }

    

    public function updateannonce(Request $request,$id){

            $annonce_ = AnnonceAdmin::findOrFail($id);
            if($request->hasFile('imageU'))
                    { 
                        $file_ = $request->file('imageU');
                        $image_ = time().'_'.$file_->getClientOriginalName();
                        $file_->move(public_path('annonceadmin'), $image_);
                        unlink(public_path('annonceadmin').'/'.$annonce_->image); //delete ancien image
                    
                    
                    $annonce_->update([
                        'title' => $request['titleU'],
                        'centenu' => $request['centenuU'],
                        'image' => $image_, // include the updated image name here
                    ]);
                } 
            

     
            return redirect()->back();
    }
    
    public function deleteannonce($id){

        $delete = Annonceadmin::findOrFail($id)->first();
        unlink(public_path('./annonceadmin/').$delete->image);
        $delete->delete();
        return redirect()->back()->with('success', true);

    }

    
}


