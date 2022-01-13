<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
public function index(request $request)

{
    $data['registrasi'] = \App\Registrasi::latest()->paginate(20);
    return view('registrasi_index', $data);
}
}
