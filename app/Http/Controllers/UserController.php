<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserSettingRequest;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private UserServiceInterface $userService;

    /**
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function setting()
    {
        return view('user.setting');
    }

    public function saveInfo(UserSettingRequest $request)
    {
        $this->userService->checkOldPassword($request);
        $user = Auth::user();
        $request->validated();
        //Update data
        if (!empty($request->input('new_password'))){
            $user->password = bcrypt($request->input('new_password'));
        }
        $user->name = $request->input('name');
        $user->dob = Carbon::createFromFormat('d/m/Y', $request->input('dob'))->format('Y-m-d');
        $user->save();
        return redirect()->back()->with(['status' => 'success', 'message' => "Cập nhât dữ liệu thành công"]);
    }

    function updateAvatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'max:5128' //5M
        ],[
            'avatar.max' => "Upload file giới hạn 5MB"
        ]);
        $user = Auth::user();
        $uploadedFile = $request->file('avatar');
        $filename = time().$uploadedFile->getClientOriginalName();

        Storage::disk('public')->putFileAs(
            'uploads/',
            $uploadedFile,
            $filename
        );

        $user->avatar = $filename;
        $user->save();
        return redirect()->back()->with(['status' => 'success', 'message' => "Cập nhât dữ liệu thành công"]);
    }
}
