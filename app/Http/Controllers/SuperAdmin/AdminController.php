<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->paginate(5);
        $count = ($admins->currentPage() - 1) * $admins->perPage() + 1;
        return view('superAdmin.admin.list')->withAdmins($admins)->withCount($count);
    }


    public function create()
    {
        return view('superAdmin.admin.create');
    }


    public function store(Request $request)
    {
        $pass = Str::random(10);
        $request['password'] = Hash::make($pass);
        $request['role'] = 'admin';

        $admin = User::create($request->all());

        return redirect()->route('superAdmin.admin.index')->withResult([
            'message' => __('superAdmin.alerts.admin.create', [
                'first_name' => $admin->first_name,
                'last_name'  => $admin->last_name,
                'password'   => $pass,
            ]),
            'alert'   => 'success',
        ]);

    }


    public function show(User $admin)
    {
        return view('superAdmin.admin.show')->withAdmin($admin);
    }


    public function edit(User $admin)
    {
        return view('superAdmin.admin.edit')->withAdmin($admin);
    }


    public function update(Request $request, User $admin)
    {
        $admin->update($request->all());
        return redirect()->route('superAdmin.admin.index')->withResult([
            'message' => __('superAdmin.alerts.admin.update', ['first_name' => $admin->first_name, 'last_name' => $admin->last_name]),
            'alert'   => 'success',
        ]);
    }


    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('superAdmin.admin.index')->withResult([
            'message' => __('superAdmin.alerts.admin.delete', ['first_name' => $admin->first_name, 'last_name' => $admin->last_name]),
            'alert'   => 'danger',
        ]);
    }

    public function keyGenerate(User $admin)
    {
        $pass = Str::random(10);
        $admin->password = Hash::make($pass);
        $admin->save();

        return redirect()->back()->withResult([
            'message' => __('superAdmin.alerts.admin.reset_password', ['password' => $pass]),
            'alert'   => 'primary',
        ]);
    }
}
