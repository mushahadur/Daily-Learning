<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Repositories\Interfaces\UserCreateRepositoryInterface;
use App\Http\Requests\Admin\UserRequest\UserCreateRequest;
use App\Http\Requests\Admin\UserRequest\UserUpdateRequest;

class UserCreateController extends Controller
{

    private $userCreateRepository;

    public function __construct(UserCreateRepositoryInterface $userCreateRepository){
        $this->userCreateRepository = $userCreateRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = $this->userCreateRepository->userAll();
        return view('admin.pages.user-create.user-list', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->userCreateRepository->roleAll();
        return view('admin.pages.user-create.user-create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $this->userCreateRepository->storeData($request);
        return redirect('admin/user-create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userCreateRepository->findById($id);
        $roles = $this->userCreateRepository->roleAll();
        return view('admin.pages.user-create.user-edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $this->userCreateRepository->updateData($request, $id);
        return redirect('admin/user-create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/user-create');
    }
}
