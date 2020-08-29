<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:super_admin');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
           $admins = Admin::role("admin")->where("name","like","%". $request->search . "%")
                            ->orWhere("email", "like", "%" . $request->search . "%")->paginate(PAGINATE_COUNT);
           return view("admin.admins.index", compact("admins"));

        }

        $admins = Admin::role("admin")->orderBy("id",'desc')->paginate(PAGINATE_COUNT);
        return view("admin.admins.index",compact("admins"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.admins.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {

        try{

            DB::beginTransaction();

            $validated = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password)
            ];

            if($request->has('photo')){
                $path = imageUpload($request->photo,"admins");
                $validated['photo'] = $path;
            }

            $admin = Admin::create($validated);
            $admin->assignRole('admin');

            if($request->has('permissions')){
                $admin->givePermissionTo($request->permissions);
            }


            DB::commit();

            return redirect()->route("admin.admins.index")->with(['success' => __("admin.success create")]);


        }catch(\Exception $ex){
            DB::rollback();
            return redirect(route("admin.admins.index"))->with(['error' => __("admin.message error")]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(Admin $admin)
     {
         return view("admin.admins.show",compact('admin'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view("admin.admins.edit",compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request,Admin $admin)
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
                $path = imageUpload($request->photo, "admins");
                $validated['photo'] = $path;

                if($admin->photo != "images/user_default.png"){
                    deleteFile($admin->photo);
                }
            }

            $admin->update($validated);


           //-----------------check permisssion ----------------
           /*
             *---note -------
             * --this method need update to be beter this fery ugly------
           */
            if($request->has('permissions')){
                $admin->syncPermissions($request->permissions);
            }else{
                $permissions = $admin->getDirectPermissions()->pluck('name');

                if($permissions->count() > 0){

                    $admin->revokePermissionTo($permissions->toArray());
                }
            }


            DB::commit();

            return redirect()->route("admin.admins.index")->with(['success' => __("admin.success create")]);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect(route("admin.admins.index"))->with(['error' => __("admin.message error")]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        try{
              $admin->delete();
              return redirect()->route("admin.admins.index")->with(['success' => __("admin.success delete")]);
        } catch (\Exception $ex) {
            return redirect(route("admin.admins.index"))->with(['error' => __("admin.message error")]);
        }
    }
}
