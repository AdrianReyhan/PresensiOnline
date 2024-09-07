<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $query = Karyawan::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('no_id', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%")
                    ->orWhere('jenis_kelamin', 'like', "%{$search}%");
            });
        }

        $karyawans = $query->paginate(10);
        $users = User::all();

        if ($request->ajax()) {
            return view('admin.karyawan.table', compact('karyawans', 'users'))->render();
        }
        return view('admin.karyawan.index', compact('karyawans', 'users'));
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        if (!$karyawan) {
            return redirect()->route('admin.karyawan.index')->with('error', 'Karyawan Tidak Ditemukan.');
        }
        return view('admin.karyawan.show', ['karyawan' => $karyawan]);
    }

    public function create()
    {
        $users = User::all();
        return view('admin.karyawan.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_id' => 'nullable',
            'tanggal_lahir' => 'required|date',
            'status' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'telepon' => 'required|string|max:15',
            'user_id' => 'required',


        ]);

        Karyawan::create($validatedData);
        return redirect('karyawans')->with('success', 'Data karyawan telah ditambahkan.');
    }

    public function destroy($id)
    {
        $karyawans = Karyawan::findOrFail($id);
        $karyawans->delete();
        return redirect('karyawans')->with('danger', 'User  Berhasil Dihapus');
    }
}
