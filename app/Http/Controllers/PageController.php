<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trains;

class PageController extends Controller
{
    public function index() {

        $trains = Trains::all();

        return view('home', compact('trains'));
    }
}
