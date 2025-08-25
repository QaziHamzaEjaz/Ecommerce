<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        return view('dashboard');
    }

    public function admin()
    {
        return view('blogs');
    }
}

