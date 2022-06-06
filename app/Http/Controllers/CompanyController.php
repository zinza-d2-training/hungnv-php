<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyRequest;
use App\Models\Company;
use App\Services\UploadFileServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CompanyController extends Controller
{
    public UploadFileServiceInterface $uploadFileService;
    public function __construct(UploadFileServiceInterface $uploadFileService)
    {
        $this->uploadFileService = $uploadFileService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = new Company();
        $data = $request->validated();
        if(isset($data['avatar']) || !empty($data['avatar'])) {
            $filename = $this->uploadFileService->uploadFile($data['avatar'], 'company');
            $data['avatar'] = $filename;
        }
        $data['address'] = $request->input('address');
        $data['status'] = $request->input('status');
        $company->create($data);
        return redirect()->route('companies.index')->with(['status' => 'success', 'message' => "Thêm mới công ty thành công"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $data = $request->validated();
        if(isset($data['avatar']) || !empty($data['avatar'])) {
            $filename = $this->uploadFileService->uploadFile($data['avatar'], 'company');
            $data['avatar'] = $filename;
        }
        $data['address'] = $request->input('address');
        $data['expired_at'] = Carbon::createFromFormat('d/m/Y', $request->input('expired_at'))->format('Y-m-d');
        $data['status'] = $request->input('status');
        $company->update($data);
        return redirect()->route('companies.index')->with(['status' => 'success', 'message' => "Cập nhật dữ liệu thành công"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
