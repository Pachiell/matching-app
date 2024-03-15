<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Service;
use App\Request;
use App\User;

class DisplayController extends Controller
{

    public function login(){ 

        return view('auth/login',[
            ]);

    }

    public function logout(){ 
        Auth::logout();

        return view('auth/login',[
            ]);

    }

    public function index(){

        $posts = new Service;
        $postAll = $posts->all()->toArray();

        return view('PostLists',[
          'results' => $postAll,
        ]);
    }

    public function profileForm(){

        $userdata = Auth::user();

        return view('profile_form',[
            'results' => $userdata,
        ]);
    }

    public function profileEditForm(){
        
        $userdata = Auth::user();


        return view('forms/edit_profile_form',[
            'results' => $userdata,
        ]);
    }

    public function Userpost(){

        $serviceAll = Auth::user()->service()->where('del_flg','=','0')->get();
    
        return view('Userposts',[
            'results' => $serviceAll,
        ]);
    }

    public function Userrequest(){

        $request = Request::with('service')->where('user_id',Auth::id())->get();

        return view('Userrequests',[
            'results' => $request,
        ]);
    }

    public function bookmark(){

        return view('Bookmarks',[

        ]);
    }

    public function RequestList(){
        $services = Service::with('request')->where('user_id',Auth::id())->whereHas('request')->get();
        

        return view('RequestLists',[
            'results' => $services,
        ]);
   
    }

    public function create_service_form(){

        return view('forms/create_service_form',[

        ]);

    }

    public function request_service_form(Service $service){

        return view('forms/request_service_form',[
            'result' => $service,
        ]);

    }

}
