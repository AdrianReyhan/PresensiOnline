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
    public function index()
    {
        $karyawans = Karyawan::paginate(10);
        $users = User::paginate(10);
        return view('admin.karyawan.index', compact('users'));
    }
}
