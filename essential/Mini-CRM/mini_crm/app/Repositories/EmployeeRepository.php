<?php

namespace App\Repositories;

use App\Models\Company;
use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeRepository implements EmployeeRepositoryInterface{
    public function All(){
        return Employee::all();
    }
    public function CompanyAllData(){
       return Company::all();
    }
    public function requestValidate($request){
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'company_id'    => 'required',

        ]);
    }
    public function storeData($request){
        //return Employee::create($request->validated());
        
        $employee = new Employee();
        $employee->first_name   = $request->first_name;
        $employee->last_name    = $request->last_name;
        $employee->email        = $request->email;
        $employee->phone        = $request->phone;
        $employee->company_id   = $request->company_id;
        $employee->save();
        return $employee;
    }
    public function findById($id){
        return Employee::find($id);
    }
    public function updateData($request, $id){
        $employee = new Employee();
        $employee->first_name   = $request->first_name;
        $employee->last_name    = $request->last_name;
        $employee->email        = $request->email;
        $employee->phone        = $request->phone;
        $employee->company_id   = $request->company_id;
        $employee->save();
    }


    public function delete($id){
        $company = $this->findById($id)->delete();
    }

}


