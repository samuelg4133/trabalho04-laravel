<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
        $this->employees = Employee::with('role')->orderBy('firstname', 'ASC')->get();
    }

    public function index(){
        return view('pages.public.index', ['employees' => $this->employees]);
    }
}
