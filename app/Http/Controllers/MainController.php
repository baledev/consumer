<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class MainController extends Controller
{
    public function index()
    {
        return view('index.main', [
            'branches' => Branch::all()
        ]);
    }
}
