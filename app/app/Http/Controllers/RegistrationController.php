<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\User;
use App\Http\Requests\CreatePostData;
use App\Http\Requests\EditUserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\str;

class RegistrationController extends Controller
{

    public function editProfile(User $user,EditUserData $request){

        $columns = ['name','email', 'comment', 'oneword'];
        foreach ($columns as $column) {
            $user->$column = $request->$column;
        }

        $user->password = Hash::make($request['password']);

        if (isset($request->icon)) {
            $delImage = str_replace('/storage/profile/', '', $user->icon);
            Storage::disk('public')->delete('/profile/'.$delImage);
            $icon = $request->file("icon");
            $fileName = Str::random();
            $path = Storage::disk("public")->putFileAs('profile', $icon, $fileName);
            $imagePath = "/storage/" . $path;
            $user->icon = $imagePath;
        } else {
            $request->icon = $user->icon;
        }

        $user->save();

        return redirect()->route('profile_form');
    }

    public function CreateService(CreatePostData $request)
    {

        $service = new Service;
        $user_id = Auth::user()->id;

        $columns = ['title', 'amount', 'comment', 'image', 'user_id'];
        foreach ($columns as $column) {
            $service->$column = $column === 'user_id' ? $user_id : $request->$column;
        }

        if (isset($request->image)) {
            $image = $request->file("image");
            $fileName = Str::random();
            $path = Storage::disk("public")->putFileAs('profile', $image, $fileName);
            $imagePath = "/storage/" . $path;
            $service->image = $imagePath;
        }

        $service->save();

        return redirect()->route('Myposts');
    }
    public function editServiceForm(Service $service)
    {

        return view('forms/edit_service_form', [
            'id' => $service,
            'result' => $service,
        ]);
    }

    public function editService(Service $service, CreatePostData $request)
    {
        dd($service);
        $columns = ['title', 'amount', 'comment'];
        foreach ($columns as $column) {
            $service->$column = $request->$column;
        }

        if (isset($request->image)) {
            //strageのファイル削除
            $delImage = str_replace('/storage/profile/', '', $service->image);
            Storage::disk('public')->delete('/profile/'.$delImage);
            //DB更新
            $image = $request->file("image");
            $fileName = Str::random();
            $path = Storage::disk("public")->putFileAs('profile', $image, $fileName);
            $imagePath = "/storage/" . $path;;
            $service->image = $imagePath;
        } else {
            $request->image = $service->image;
        }

        $service->save();

        return redirect()->route('Myposts');
    }

    public function deleteServiceForm(Service $service)
    {

        return view('forms/delete_service_form', [
            'id' => $service,
            'result' => $service,
        ]);
    }

    public function deleteService(Service $service){

        $service->delete();

        return redirect()->route('Myposts');
    }
}
