<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\Interfaces\CompanyRepositoryInterface;


class CompanyController extends Controller
{
    protected $companyRepository;
   public function __construct(CompanyRepositoryInterface $companyRepository)
   {
        $this->companyRepository = $companyRepository;
   }
    public function index()
    {
        $company = $this->companyRepository->All();

        return view('admin.company.index')->with( 'companies', $company);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    public function store(Request $request)
    {
        $this->companyRepository->requestValidate($request);
        $this->companyRepository->storeData($request);

        return redirect('/companies')->with('message', 'Company info create successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = $this->companyRepository->findById($id);
        return view('admin.company.detail')->with('company', $company);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = $this->companyRepository->findById($id);
        return view('admin.company.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->companyRepository->requestValidateForUpdate($request);
        $this->companyRepository->updateData($request, $id);
        return Redirect::route('companies.index');
        //return redirect('/companies')->with('message', 'Company Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->companyRepository->delete($id);
        return redirect(route('companies.index'));
    }
}
