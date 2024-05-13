<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;


class RootController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}