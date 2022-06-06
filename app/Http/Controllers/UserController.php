<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserSettingRequest;
use App\Http\Requests\User\UserUploadFileRequest;
use App\Services\UploadFileServiceInterface;
use App\Services\UserServiceInterface;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    private UserServiceInterface $userService;
    private UploadFileServiceInterface $uploadFileService;

    /**
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService, UploadFileServiceInterface $uploadFileService)
    {
        $this->userService = $userService;
        $this->uploadFileService = $uploadFileService;
    }

    public function setting()
    {
        return view('user.setting');
    }

    public function saveInfo(UserSettingRequest $request)
    {
        $data = $request->validated();
        $this->userService->checkOldPassword($request);
        $user = auth()->user();
        $data['password'] = bcrypt($data['password']);
        $data['dob'] = Carbon::createFromFormat('d/m/Y', $request->input('dob'))->format('Y-m-d');
        $user->update($data);
        return redirect()->back()->with(['status' => 'success', 'message' => "Cập nhât dữ liệu thành công"]);
    }

    function updateAvatar(UserUploadFileRequest $request)
    {
        $data = $request->validated();
        $user = auth()->user();
        $filename = $this->uploadFileService->uploadFile($data['avatar']);
        $user->update(['avatar' => $filename]);
        return response()->json([
            'status' => 'success',
            'message' => "Cập nhật ảnh đại diện thành công"
        ]);
    }
}
