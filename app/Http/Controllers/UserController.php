<?php
<<<<<<< HEAD
namespace App\Http\Controllers;
use illuminate\Support\Facades\Hash;
use App\models\User;
use Illuminate\Http\Request;
=======

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
>>>>>>> 9b314858a1178f3c9bf2c563edbd1642f44e8c28

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataUser'] = User::all();
<<<<<<< HEAD
=======

>>>>>>> 9b314858a1178f3c9bf2c563edbd1642f44e8c28
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        return view('admin.user.create'); //
=======
        return view('admin.user.create');
>>>>>>> 9b314858a1178f3c9bf2c563edbd1642f44e8c28
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

<<<<<<< HEAD
        //dd($request->all());

        $data['first_name'] = $request->nama;
        $data['last_name']  = $request->email;
        $data['password']   = Hash::make($request->password);
=======
        // tambahkan validasi
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        // dd($request->all());

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
>>>>>>> 9b314858a1178f3c9bf2c563edbd1642f44e8c28

        User::create($data);

        return redirect()->route('user.index')->with('success', 'Penambahan Data Berhasil!');
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
        $dataUser = User::findOrFail($id);
<<<<<<< HEAD
=======

>>>>>>> 9b314858a1178f3c9bf2c563edbd1642f44e8c28
        return view('admin.user.edit', compact('dataUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
<<<<<<< HEAD
        $user_id = $id;
        $user    = User::findOrFail($user_id);

        $data['nama']     = $request->nama;
        $data['email']    = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::findOrFail($id);
        $user->update($request->all());
=======
        $user = User::findOrFail($id);

        // Tambahkan validasi
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|min:8|confirmed',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user->update($data);

>>>>>>> 9b314858a1178f3c9bf2c563edbd1642f44e8c28
        return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
<<<<<<< HEAD
=======

>>>>>>> 9b314858a1178f3c9bf2c563edbd1642f44e8c28
        return redirect()->route('user.index')->with('success', 'Penghapusan Data Berhasil!');

    }
}
