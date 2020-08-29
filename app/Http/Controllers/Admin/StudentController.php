<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StudentRequest;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read_students')->only(['index','show']);
        $this->middleware('permission:edit_students')->only(['edit', 'update']);
        $this->middleware('permission:create_students')->only(['create', 'store']);
        $this->middleware('permission:delete_students')->only('destroy');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $students = Student::orderBy("id",'desc')->get();
        return view("admin.students.index",compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.students.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {

        try{

          $validated = $request->validated();

           $validated['password'] = bcrypt($request->password);

             student::create($validated);

            return redirect()->route("admin.students.index")->with(['success' => __("admin.success create")]);
        }catch(\Exception $ex){
            return redirect(route("admin.students.index"))->with(['error' => __("admin.message error")]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {

        return view("admin.students.edit",compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request,Student $student)
    {


        try{

            $validated = collect($request->validated());
            $filter = $validated->filter(function ($query) {
                return $query != null;
            });

            $data = json_decode($filter, true);


               if($request->has('password')){
                 $data["password"] = bcrypt($request->password);

               }


            $student->update($data);


            return redirect()->route("admin.students.index")->with(['success' => __("admin.success create")]);
        } catch (\Exception $ex) {
            return redirect(route("admin.students.index"))->with(['error' => __("admin.message error")]);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try{
            $student->delete();
              return redirect()->route("admin.students.index")->with(['success' => __("admin.success delete")]);
        } catch (\Exception $ex) {
            return redirect(route("admin.students.index"))->with(['error' => __("admin.message error")]);
        }
    }
}
