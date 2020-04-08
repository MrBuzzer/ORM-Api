<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

use App\Http\Requests\dept as Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Department::paginate(5)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Department::create($request->toArray());
        $e = Department::find($request->emp_no);
        return $e;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Api\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Api\Department $department)
    {
        return $department;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Api\Department $department)
    {
        $no = $request->dept_no;
        Department::where('dept_no', $no)->update([
          'dept_no' => $request->dept_no,
          'dept_name' => $request->dept_name,
        ]);
    return $department;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Api\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Api\Department $department)
    {
        $e = $department;
        $department->delete();
        return $e->toJson();
    }
}
