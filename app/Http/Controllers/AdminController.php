<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Tahun;
use App\Models\IbuAnak;
use App\Models\Gizi;
use App\Models\PenyakitMenular;

use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function index()
    {
        $totalKecamatans = Kecamatan::count();
        $totalTahuns = Tahun::count();
        $totalIbuAnaks = IbuAnak::count();
        $totalGizis = Gizi::count();
        $totalUsers = User::count();
        $totalPenyakitMenulars = PenyakitMenular::count();

        return view('admin.index', compact('totalKecamatans', 'totalTahuns', 'totalIbuAnaks', 'totalGizis', 'totalPenyakitMenulars', 'totalUsers'));
    }
    public function add_user() 
{
    return view('admin.user.add_user');
}

public function upload_user(Request $request)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'status' => 'required|in:1,0',
        'role' => 'required|in:admin,user',
    ], [
        'email.unique' => 'The email has already been taken. Please choose another one.'
    ]);

    // Create new user
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->status = $request->status;
    $user->role = $request->role;

    // Save the user
    $user->save();

    toastr()->timeOut(10000)->closeButton()->addSuccess('User Added Successfully');
    return redirect('/view_user');
}


public function view_user()
{
    $users = User::paginate(10);
    return view('admin.user.view_user', compact('users'));
}


public function delete_user($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    toastr()->timeOut(10000)->closeButton()->addSuccess('User Deleted Successfully');
    return redirect()->back(); 
}

public function update_user($id)
{
    $user = User::findOrFail($id);
    return view('admin.user.update_user', compact('user'));
}

public function edit_user(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'status' => 'required|in:1,0',
        'role' => 'required|in:admin,user',
    ], [
        'email.unique' => 'The email has already been taken. Please choose another one.'
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    
    
    if ($request->password) {
        $user->password = Hash::make($request->password);
    }
    
    $user->role = 'admin';
    $user->status = $request->status;
    $user->role = $request->role;

    $user->save();

    toastr()->timeOut(10000)->closeButton()->addSuccess('User Updated Successfully');
    return redirect('/view_user');  
}

    
}