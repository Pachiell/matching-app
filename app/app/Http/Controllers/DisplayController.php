<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as DefaultRequest;
use Illuminate\Support\Facades\Auth;
use App\Service;
use App\Request;
use App\User;

class DisplayController extends Controller
{

    public function login()
    {

        return view('auth/login', []);
    }

    public function logout()
    {
        Auth::logout();

        return view('auth/login', []);
    }

    public function ReadOnly()
    {
        $posts = new Service;
        $postAll = $posts->all()->where('del_flg', '=', '0')->toArray();

        return view('ReadOnly', [
            'results' => $postAll,
        ]);
    }

    public function SearchKeyWord_RO(DefaultRequest $request)
    {
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $result = Service::where('del_flg', '=', '0')
                ->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('comment', 'LIKE', "%{$keyword}%")
                ->orWhere('id', 'LIKE', "%{$keyword}%")
                ->get();
        } else {
            $result = Service::where('del_flg', '=', '0')->get();
        }

        return view('ReadOnly', [
            'results' => $result,
        ]);
    }

    public function SearchAmount_RO(DefaultRequest $request)
    {

        $from = $request->input('amount-from');
        $to = $request->input('amount-to');

        if (isset($from) && isset($to)) {
            $result = Service::where('del_flg', '=', '0')
                ->where('amount', '>=', $from)
                ->Where('amount', '<=', $to)
                ->get();
        } else {
            $result = Service::where('del_flg', '=', '0')->get();
        }
        return view('ReadOnly', [
            'results' => $result,
        ]);
    }

    public function index()
    {

        $posts = new Service;
        $postAll = $posts->all()->where('del_flg', '=', '0')->toArray();
        $user_id = Auth::user()->id;

        return view('PostLists', [
            'results' => $postAll,
            'user_id' => $user_id,
        ]);
    }

    public function SearchKeyWord(DefaultRequest $request)
    {
        $user_id = Auth::user()->id;
        $keyword = $request->input('keyword');

        if (!empty($keyword)) {
            $result = Service::where('del_flg', '=', '0')
                ->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('comment', 'LIKE', "%{$keyword}%")
                ->orWhere('id', 'LIKE', "%{$keyword}%")
                ->get();
        } else {
            $result = Service::where('del_flg', '=', '0')->get();
        }

        return view('PostLists', [
            'results' => $result,
            'user_id' => $user_id,
        ]);
    }

    public function SearchAmount(DefaultRequest $request)
    {
        $user_id = Auth::user()->id;
        $from = $request->input('amount-from');
        $to = $request->input('amount-to');

        if (isset($from) && isset($to)) {
            $result = Service::where('del_flg', '=', '0')
                ->where('amount', '>=', $from)
                ->Where('amount', '<=', $to)
                ->get();
        } else {
            $result = Service::where('del_flg', '=', '0')->get();
        }
        return view('PostLists', [
            'results' => $result,
            'user_id' => $user_id,
        ]);
    }

    public function profileForm()
    {

        $userdata = Auth::user();

        return view('profile_form', [
            'results' => $userdata,
        ]);
    }

    public function profileEditForm()
    {

        $userdata = Auth::user();


        return view('forms/edit_profile_form', [
            'results' => $userdata,
        ]);
    }

    public function Userpost()
    {

        $serviceAll = Auth::user()->service()->where('del_flg', '=', '0')->get();

        return view('Userposts', [
            'results' => $serviceAll,
        ]);
    }

    public function Userrequest()
    {

        $request = Request::with('service')->where([
            ['user_id', Auth::id()], ['del_flg', '=', '0']
        ])->get();

        return view('Userrequests', [
            'results' => $request,
        ]);
    }

    public function bookmark()
    {
        $bookmarks = Auth::user()->bookmark()->where('del_flg', '=', '0')->get();

        return view('Bookmarks', [
            'results' => $bookmarks,
        ]);
    }

    public function RequestList()
    {
        $services = Service::with(['request' => function ($query) {
            $query->where('del_flg', 0);
        }])
            ->where('user_id', Auth::id())->whereHas('request')
            ->get();



        return view('RequestLists', [
            'results' => $services,
        ]);
    }

    public function create_service_form()
    {

        return view('forms/create_service_form', []);
    }

    public function request_service_form(Service $service)
    {

        return view('forms/request_service_form', [
            'result' => $service,
        ]);
    }

    public function transaction(Auth $user_id)
    {

        // $service = Service::with(['request_belongsTo' => function ($query) {
        //     $query->where([
        //         ['del_flg', 0], ['transaction', 0]
        //     ]);
        // }])->where([
        //     ['del_flg', 0], ['user_id', Auth::id()]
        // ])->get();

        // dd($service);

        $service = Service::with(['request' => function ($query) {
            $query->where([
                ['del_flg', 0], ['transaction', 0]
            ]);
        }])->where([
            ['del_flg', 0], ['user_id', Auth::id()]
        ])->whereHas('request')->get();


        $request = Request::with(['service' => function ($query) {
            $query->where([
                ['del_flg', 0], ['transaction', 0]
            ]);
        }])->where([
            ['del_flg', 0], ['user_id', Auth::id()]
        ])->whereHas('service')->get();

        // dd($service,$request);


        return view('TransactionLists', [
            'services' => $service,
            'requests' => $request,
        ]);
    }
}
