<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->employee = new Employee();
        $this->roles = Role::orderBy('name', 'ASC')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $this->employee->query();

        if ($request->has('name')) {
            $query->whereRaw('CONCAT(firstname, " " , lastname) like ' . '"%' . $request->name . '%"')->get();
        }
        return view(
            'pages.admin.employees.index',
            ['employees' => $query->with('role')->orderBy('firstname')->paginate(5)->withQueryString(), 'name' => $request->name]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.employees.form', ['roles' => $this->roles->where('active', 1)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        if ($request->hasFile('profile_picture')) {
            if ($request->profile_picture->isValid()) {
                $imageURL = $request->profile_picture->hashName();
                $image = Image::make($request->profile_picture)->fit(800, 600);

                Storage::disk('public')->put($imageURL, $image->encode());

                $this->employee->firstname = strtoupper($request->firstname);
                $this->employee->lastname = strtoupper($request->lastname);
                $this->employee->birth_date = $request->birth_date;
                $this->employee->active = $request->active;
                $this->employee->role_id = $request->role_id;
                $this->employee->profile_picture = $imageURL;
                $this->employee->save();
            }
        }


        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Storage::disk('public')->delete($employee->profile_picture);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
