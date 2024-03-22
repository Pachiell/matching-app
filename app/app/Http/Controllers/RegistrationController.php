<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as DefaultRequest;
use App\Service;
use App\User;
use App\Request;
use App\Bookmark;
use App\Violation;
use App\Http\Requests\CreatePostData;
use App\Http\Requests\CreateRequestData;
use App\Http\Requests\EditUserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\str;

class RegistrationController extends Controller
{

    public function editProfile(User $user, EditUserData $request)
    {

        $columns = ['name', 'email', 'comment', 'oneword'];
        foreach ($columns as $column) {
            $user->$column = $request->$column;
        }

        if (isset($request->icon) && $user->icon = '/storage/app/profile/default_icon.png') {
            $icon = $request->file("icon");
            $fileName = Str::random();
            $path = Storage::disk("public")->putFileAs('profile', $icon, $fileName);
            $imagePath = "/storage/" . $path;
            $user->icon = $imagePath;
        } elseif (isset($request->icon)) {
            $delImage = str_replace('/storage/profile/', '', $user->icon);
            Storage::disk('public')->delete('/profile/' . $delImage);
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

    public function deleteProfile(User $user)
    {
        $user_id = $user->id;
        $services = Service::where('user_id', $user_id)->get();
        //Requestデータも入れる

        if (!$services->isEmpty()) {
            foreach ($services as $service) {
                $service->delete();
            }
        }

        $user->delete();

        return redirect()->route('login');
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

        $service->status = "掲載中";

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

        $columns = ['title', 'amount', 'comment'];
        foreach ($columns as $column) {
            $service->$column = $request->$column;
        }

        if (isset($request->image)) {
            //strageのファイル削除
            $delImage = str_replace('/storage/profile/', '', $service->image);
            Storage::disk('public')->delete('/profile/' . $delImage);
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

    public function deleteService(Service $service)
    {

        $service->del_flg = 1;
        $service->save();

        return redirect()->route('Myposts');
    }

    public function CreateRequest(Request $request_m, Service $service, CreateRequestData $request)
    {


        $user_id = Auth::user()->id;
        $columns = ['comment', 'e-mail', 'tel', 'deadline'];

        foreach ($columns as $column) {
            $request_m->$column = $request->$column;
        }
        $request_m->user_id = $user_id;
        $request_m->service_id = $service->id;
        $request_m->status = "掲載中";

        $request_m->save();

        return redirect('/');
    }

    public function editRequestForm(Request $request)
    {

        $service = Service::where('id', $request->service_id)->first();

        return view('forms/edit_request_form', [
            'service' => $service,
            'request' => $request,
        ]);
    }

    public function editRequest(Request $request, CreateRequestData $request_v)
    {

        $columns = ['comment', 'e-mail', 'tel', 'deadline'];

        foreach ($columns as $column) {
            $request->$column = $request_v->$column;
        }

        $request->save();

        return redirect()->route('Myrequests');
    }

    public function deleteRequestForm(Request $request)
    {
        $service = Service::where('id', $request->service_id)->first();

        return view('forms/delete_request_form', [
            'service' => $service,
            'request' => $request,
        ]);
    }

    public function deleteRequest(Request $request)
    {

        $request->delete();

        return redirect()->route('Myrequests');
    }

    public function CreateBookmark(DefaultRequest $request)
    {

        $bookmark = new Bookmark;
        $user_id = Auth::user()->id;

        $columns = ['service_id', 'title', 'amount', 'comment', 'image'];

        foreach ($columns as $column) {
            $bookmark->$column = $request->$column;
        }
        $bookmark->user_id = $user_id;

        $bookmark->save();
        $result = "保存完了";

        return $result;
    }

    public function JudgeRequestForm(Request $request, Service $service)
    {

        $request_data = Request::where('id', $request->id)->first();
        $service_data = Service::where('id', $service->id)->first();

        return view('forms/judge_request_form', [
            'request' => $request_data,
            'service' => $service_data,
        ]);
    }

    public function JudgeRequestApproval(Request $request, Service $service)
    {

        $request->status = "進行中";
        $request->del_flg = 1;

        $service->status = "進行中";

        $request->save();
        $service->save();

        return redirect()->route('RequestList');
    }

    public function JudgeRequestReject(Request $request, Service $service)
    {

        $request->status = "却下";
        $request->del_flg = 1;
        $request->transaction = 1;

        $service->status = "進行中";

        $request->save();
        $service->save();

        return redirect()->route('RequestList');
    }

    public function deleteBookmarkForm(Bookmark $bookmark)
    {

        return view('forms/delete_bookmark_form', [
            'id' => $bookmark,
            'result' => $bookmark,
        ]);
    }

    public function deleteBookmark(Bookmark $bookmark)
    {
        $bookmark->del_flg = 1;
        $bookmark->save();

        return redirect()->route('Bookmarks');
    }
    public function ViolationCountService(DefaultRequest $request)
    {
        $violation = new Violation;
        $user_id = Auth::user()->id;

        $violation_data = Violation::where('user_id', $user_id)->where('service_id', $request->service_id)->first();

        if (isset($violation_data)) {
            $result = "保存完了";
            return $result;
        } else {
            $violation->service_id = $request->service_id;
            $violation->user_id = $user_id;
            $result = "保存完了";
            $violation->save();
        }

        return $result;
    }

    public function ViolationCountRequest(DefaultRequest $request)
    {
        $violation = new Violation;
        $user_id = Auth::user()->id;

        $violation_data = Violation::where('user_id', $user_id)->where('request_id', $request->request_id)->first();

        if (isset($violation_data)) {
            $result = "保存完了";
            return $result;
        } else {
            $violation->request_id = $request->request_id;
            $violation->user_id = $user_id;
            $result = "保存完了";
            $violation->save();
        }

        return $result;
    }
}
