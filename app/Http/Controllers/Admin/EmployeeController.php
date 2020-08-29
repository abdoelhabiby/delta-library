<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EmployeeRequest;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read_employees')->only(['index','show']);
        $this->middleware('permission:edit_employees')->only(['edit', 'update']);
        $this->middleware('permission:create_employees')->only(['create', 'store']);
        $this->middleware('permission:delete_employees')->only('destroy');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->has('search')){
        //    $employees = Admin::role("employees")->where("name","like","%". $request->search . "%")
        //                     ->orWhere("email", "like", "%" . $request->search . "%")->get();
        //    return view("admin.employees.index", compact("employees"));

        // }

        $employees = Admin::role("employees")->orderBy("id",'desc')->get();
        return view("admin.employees.index",compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.employees.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {


        try{

            DB::beginTransaction();

            $validated = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password)
            ];

            if($request->has('photo')){
                $path = imageUpload($request->photo,"employees");
                $validated['photo'] = $path;
            }

            $employee = Admin::create($validated);

            $employee->assignRole('employees');

            if($request->has('permissions')){
                $employee->givePermissionTo($request->permissions);
            }


            DB::commit();

            return redirect()->route("admin.employees.index")->with(['success' => __("admin.success create")]);


        }catch(\Exception $ex){
            DB::rollback();
            return redirect(route("admin.employees.index"))->with(['error' => __("admin.message error")]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(Admin $employee)
     {
         return view("admin.employees.show",compact('employee'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $employee)
    {
        return view("admin.employees.edit",compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request,Admin $employee)
    {
        try{

            DB::beginTransaction();

            $validated = [
                    "name" => $request->name,
                    "email" => $request->email,
                ];

               if($request->has('password')){
                 $validated["password"] = bcrypt($request->password);

               }


            if ($request->has('photo')) {
                $path = imageUpload($request->photo, "employees");
                $validated['photo'] = $path;

                if($employee->photo != "images/user_default.png"){
                    deleteFile($employee->photo);
                }
            }

            $employee->update($validated);


           //-----------------check permisssion ----------------
           /*
             *---note -------
             * --this method need update to be beter this fery ugly------
           */
            if($request->has('permissions')){
                $employee->syncPermissions($request->permissions);
            }else{
                $permissions = $employee->getDirectPermissions()->pluck('name');

                if($permissions->count() > 0){

                    $employee->revokePermissionTo($permissions->toArray());
                }
            }


            DB::commit();

            return redirect()->route("admin.employees.index")->with(['success' => __("admin.success create")]);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect(route("admin.employees.index"))->with(['error' => __("admin.message error")]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $employee)
    {
        try{
            $employee->delete();
              return redirect()->route("admin.employees.index")->with(['success' => __("admin.success delete")]);
        } catch (\Exception $ex) {
            return redirect(route("admin.employees.index"))->with(['error' => __("admin.message error")]);
        }
    }
}
