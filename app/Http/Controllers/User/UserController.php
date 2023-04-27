<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Annonce;
use App\Models\Classment;
use App\Models\demande;
use App\Models\facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\visit;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function change(){
        return view('user.change-password');

    }


    public function changepassword(Request $request){
        $user = User::where('id',auth()->user()->id)->first();
        if(Hash::check($request->passwordauncien, $user->password)){
            $user->update([
                'password' => Hash::make($request->passwordnew),
            ]);
            return redirect()->back();
        }else{
            return redirect()->back()->with('fail', 'Ancien password incorrect');
        }  
    }
    


    public function create(Request $request){
        //Validate Inputs
       $add= $request->validate([
            'name'=>'required',
            'prenom'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:30',
            'NomCommercial'=>'required',
            'tele'=>'required',
            'profile'=>'required',
            'status'=>'required',
            'cinDocument1'=>'required',
            'cinDocument2'=>'required',
            'profileDocument'=>'required',
            'statusDocument'=>'required', 
            'service_id'=>'required',
            'ville_id'=>'required',
        ]); 

        //check the file 

        if($request->has('profileDocument') &&  $request->has('statusDocument') && $request->has('cinDocument1') &&  $request->has('cinDocument2'))
            {
                //SAVE CIN 1
                $file =$request['cinDocument1'];
                $imagecin1=time().'_'.$file->getclientoriginalname();
                $file->move(public_path('cin1'),$imagecin1);

                 //SAVE CIN 2
                 $file =$request['cinDocument2'];
                 $imagecin2=time().'_'.$file->getclientoriginalname();
                 $file->move(public_path('cin2'),$imagecin2);

                //SAVE STATUS
                $file_status =$request['statusDocument'];
                $image_status=time().'_'.$file_status->getclientoriginalname();
                $file_status->move(public_path('status'),$image_status);

                //SAVE PROFILE
                $file_profile =$request['profileDocument'];
                $image_profile=time().'_'.$file_profile->getclientoriginalname();
                $file_profile->move(public_path('profile'),$image_profile);
                
            }


    
        //User::create($add);
        $user = new User();
        $user->name = $request->name;
        $user->prenom = $request->prenom;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->NomCommercial = $request->NomCommercial;
        $user->tele = $request->tele;
        $user->profile = $request->profile;
        $user->status = $request->status;
        $user->cinDocument1 = $imagecin1;
        $user->cinDocument2 = $imagecin2;
        $user->profileDocument = $image_profile;
        $user->statusDocument = $image_status;
        $user->service_id = $request->service_id;
        $user->ville_id = $request->ville_id;
        $user->save(); 

       



        if($add){
            return redirect()->back()->with('success', true);
        }else{
            return redirect()->back()->with('fail','Something went wrong, failed to register');
        }  

  }

 
  public function check(Request $request){
    //Validate inputs
        $request->validate([
        'email'=>'required|email|exists:users,email',
        'password'=>'required|min:5|max:30',
        ],[
            'email.exists'=>'This email is invalid',
            'password.exists'=>'This password is invalid',
        ]);
        
        $user = User::where('email', $request['email'])
                ->where('compte',1)
                ->first();
        if ($user) {
            if(Hash::check($request['password'], $user->password))
            {
                Auth::guard('web')->login($user);
                return redirect()->route('user.tableu');
            }else{
                return redirect()->back()->with('fail','Something went wrong, failed to register');
            }
           
        } else {
            return redirect()->route('user.active');
        }
}

 

public function logout(){
    Auth::guard('web')->logout();
    return redirect('user/login');
}

public function annonce($id){
    // Get the annonce with the given ID
    $annonce = Annonce::findOrFail($id);

    // Check if the visitor has already visited this post today
    //$visitor = auth()->check() ? auth()->user()->id : request()->ip();

    // If the visitor has not visited this post today, increment the visitors count and create a new visit record
    
        $annonce->visits()->create([
            'annonce_id'=>$id,
            'user_id' => $annonce->user_id,
            'created_at' => Carbon::now()
        ]);
    

    return view('details', ['annonce' => $annonce]);
}

public function show()
{
    $today = Carbon::today();
    $yesterday = Carbon::yesterday();
    $thisWeek = Carbon::now()->startOfWeek();
    $thisMonth = Carbon::now()->startOfMonth();
    $thisYear = Carbon::now()->startOfYear();
    
    $todayVisits = Visit::whereDate('created_at', $today)->where('user_id',auth()->id())->count();
    $yesterdayVisits = Visit::whereDate('created_at', $yesterday)->where('user_id',auth()->id())->count();
    $thisWeekVisits = Visit::whereBetween('created_at', [$thisWeek, Carbon::now()])->where('user_id',auth()->id())->count();
    $thisMonthVisits = Visit::whereBetween('created_at', [$thisMonth, Carbon::now()])->where('user_id',auth()->id())->count();
    $thisYearVisits = Visit::whereBetween('created_at', [$thisYear, Carbon::now()])->where('user_id',auth()->id())->count();
    $totalVisits = Visit::where('user_id',auth()->id())->count();


    // Pass the data to the view
    return view('user.tableu', [
        
        'todayVisitors' => $todayVisits,
        'yesterdayVisitors' => $yesterdayVisits,
        'thisWeekVisitors' => $thisWeekVisits,
        'thisMonthVisitors' => $thisMonthVisits,
        'thisYearVisitors' => $thisYearVisits,
        'totalVisitors' => $totalVisits,
    ]);
}


    //Annonce
    
    //info poste with filter if the poste annoncé or Not

    public function service(){
            $annonce = Annonce::with('user','ville','service')
                    ->where('user_id','=',auth()->id())
                    ->get();
            
            return view('user.services',['annonce'=>$annonce]);
    }

    //ajouté le post
    
    public function addPost(Request $request){
         //Validate Inputs
            $add= $request->validate([
                'des'=>'required',
                'video'=>'required',
                'photo'=>'required|',
                
            ]); 

            //check the file 

            if($request->has('photo'))
                {
                    //SAVE POST IMAGES
                    $photos = [];
                    foreach ($request->file('photo') as $image) {
                        $filename = time() . '_' . $image->getClientOriginalName();
                        $image->move(public_path('postimage'), $filename);
                        $photos[] = $filename;
                    }

                    
                }



            //Annonce::create($add);

            $annonce = new Annonce();
            $annonce->title = auth()->user()->NomCommercial;
            $annonce->NomComercial = auth()->user()->NomCommercial;
            $annonce->des = $request->des;
            $annonce->photo =  json_encode($photos);
            $annonce->video=$request->video;
            $annonce->user_id=auth()->user()->id;
            $annonce->service_id=auth()->user()->service_id;
            $annonce->ville_id=auth()->user()->ville_id;
            $annonce->save();

            
            if( $add){
                return redirect()->back()->with('success', true);
            }

    }

    public function updatePost($id,Request $request){
      
        $annonce = Annonce::findOrFail($id); 
        
        if($request->has('photo'))
        {
            $photos = [];
            foreach ($request->file('photo') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('postimage'), $filename);
                $photos[] = $filename;
            }
        
            // Decode the JSON-encoded string of filenames to an array
            $oldPhotos = json_decode($annonce->photo, true);
        
            // Now delete the old file(s), if needed
            // Do not delete the old file(s) if there was an error uploading the new file(s)
            if (!empty($photos)) {
                foreach ($oldPhotos as $oldPhoto) {
                    if (file_exists(public_path('postimage').'/'.$oldPhoto)) {
                        unlink(public_path('postimage').'/'.$oldPhoto);
                    }
                }
            }
        
            $annonce->update([
                'title' => $request['title'],
                'des' => $request['des'],
                
                'photo' => json_encode($photos),
                'video' => $request['video'],
            ]); 

            $user = User::where('id',auth()->id());
            $user->update([
                'tele' => $request['tele'],    
            ]);
        }

    
        return redirect()->back()->with('success', true);
        
        
    }

     public function deletepost($id) {
        $annonce = Annonce::findOrFail($id);
        $classment = Classment::where('user_id',auth()->user()->id);
        
        
        if ($annonce->photo) {
            $photos = json_decode($annonce->photo, true);
            foreach ($photos as $photo) {
                $filePath = public_path('postimage').'/'.$photo;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }
    
        $annonce->delete();
        $classment->delete();
        return redirect()->back()->with('success', true);

    }
 



       public function publicite(){
        //en affiche les classment deponible entre 1 and 10 par ville and service
        $annonce = Annonce::where('user_id',auth()->user()->id)->count();

        if (auth()->check()) {
            //user auth
            $user = auth()->user();

            $rankDespo = DB::table(DB::raw('(SELECT 1 AS n UNION ALL 
                                            SELECT 2 AS n UNION ALL 
                                            SELECT 3 AS n UNION ALL 
                                            SELECT 4 AS n UNION ALL 
                                            SELECT 5 AS n UNION ALL 
                                            SELECT 6 AS n UNION ALL 
                                            SELECT 7 AS n UNION ALL 
                                            SELECT 8 AS n UNION ALL 
                                            SELECT 9 AS n UNION ALL 
                                            SELECT 10 AS n) AS nums'))
                            ->select('nums.n AS classment')
                            ->whereNotExists(function ($query) use ($user) {
                                $query->select(DB::raw(1))
                                    ->from('annonces')
                                    ->whereColumn('annonces.classment', '=', 'nums.n')
                                    ->where('annonces.service_id', '=', $user->service_id)
                                    ->where('annonces.ville_id', '=', $user->ville_id);
                            })
                            ->orderBy('nums.n')
                            ->get();


                            return view('user.publicite',['rank'=>$rankDespo,'annonce'=>$annonce]);
                        }


       }

       public function demandeclassment(Request $request){

        $user = auth()->user();
        $annonce = Annonce::where('user_id',$user->id)->count();
    
        if($annonce >0){        
            $classemnt = new Classment();
            $classemnt->user_id=$user->id;
            $classemnt->service_id=$user->service_id;
            $classemnt->classment=$request['rank'];
            $classemnt->save();
            return redirect()->back()->with('success', true);

        }else{
            return redirect()->back()->with('fail', 'this not exist');

        }
            


       }

    public function demande(){
        return view('user.demande');
    }

    public function autredemande(Request $request){

            $demande = new demande();
            $demande->user_id=auth()->user()->id;
            $demande->objet=$request['objet'];
            $demande->Message=$request['message'];
            $demande->save();
        
        return redirect()->back()->with('success', true);


   }

   public function facture(){
    $facture = facture::where('user_id',auth()->user()->id)
                ->get();
    return view('user.facture',['facture'=>$facture]);
   }
    
        


}
