<?php
namespace App\Http\Controllers;
use illuminate\Support\Facades\Hash;
use App\models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataUser'] = User::all();
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());

        $data['first_name'] = $request->nama;
        $data['last_name']  = $request->email;
        $data['password']   = Hash::make($request->password);

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
        return view('admin.user.edit', compact('dataUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = $id;
        $user    = User::findOrFail($user_id);

        $data['nama']     = $request->nama;
        $data['email']    = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Penghapusan Data Berhasil!');

    }
}
