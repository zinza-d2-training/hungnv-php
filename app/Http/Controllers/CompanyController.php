<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyRequest;
use App\Models\Company;
use App\Services\UploadFileServiceInterface;
use Illuminate\Support\Carbon;

class CompanyController extends Controller
{
    private UploadFileServiceInterface $uploadFileService;

    public function __construct(UploadFileServiceInterface $uploadFileService)
    {
        $this->uploadFileService = $uploadFileService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * @param CompanyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompanyRequest $request)
    {
        $data = $request->validated();
        if (isset($data['avatar']) || !empty($data['avatar'])) {
            $folder = 'company';
            $filename = $this->uploadFileService->uploadFile($data['avatar'], $folder);
            $data['avatar'] = $filename;
        }
        Company::create($data);
        return redirect()->route('companies.index')->with([
            'status' => 'success',
            'message' => "Thêm mới công ty thành công"
        ]);
    }

    /**
     * @param Company $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * @param CompanyRequest $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $data = $request->validated();
        if (isset($data['avatar']) || !empty($data['avatar'])) {
            $filename = $this->uploadFileService->uploadFile($data['avatar'], 'company');
            $data['avatar'] = $filename;
        }
        $data['expired_at'] = Carbon::createFromFormat('d/m/Y', $data['expired_at'])->format('Y-m-d');
        $company->update($data);
        return redirect()->route('companies.index')->with([
            'status' => 'success',
            'message' => "Cập nhật dữ liệu thành công"
        ]);
    }

    /**
     * @param Company $company
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json([
            'title' => 'Success',
            'message' => "Xóa bản ghi thành công"
        ]);
    }
}
