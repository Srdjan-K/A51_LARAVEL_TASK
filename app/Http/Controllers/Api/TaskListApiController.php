<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\TaskList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;



class TaskListApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id=null)
    {

        $task_list = [];
        $count = 0;
        $message = "";

        if( $id != null ){
            $task_list = TaskList::where('id', $id)->get();
            $count = TaskList::where('id', $id)->count();
        }else{
            $task_list = TaskList::all();
            $count = TaskList::all()->count();
        }
        
        if( count($task_list) > 0 ) {
            $status = "success";
            $message .= "Success. We have results !";
        }else{
            $status = "empty";
            $message .= "Empty. No Results Found . . . ";
        }

        return response()->json([
            "status" => $status,
            "count" => $count,
            "message" => $message,
            "data" => $task_list,
        ]);

    }

    // public function create(){

    //     return view('task-lists.create');

    // }

    public function store(Request $request){
        
        $status = "";
        $count = 0;
        $message = "";

        $input = $request->all();

        $task_list = [];

        $task_list["name"] =  ( isset($input["name"]) && !empty($input["name"]) ) ? $input["name"] : "DEFAULT NAME of Task List";
        $task_list["is_completed"] =  ( isset($input["is_completed"]) && !empty($input["is_completed"]) ) ? $input["is_completed"] : 0;
        $task_list["open_tasks"] =  ( isset($input["open_tasks"]) && !empty($input["open_tasks"]) ) ? $input["open_tasks"] : 0;
        $task_list["completed_tasks"] = ( isset($input["completed_tasks"]) && !empty($input["completed_tasks"]) ) ? $input["completed_tasks"] : 0;
        $task_list["position"] =  ( isset($input["position"]) && !empty($input["position"]) ) ? $input["position"] : 0;
        $task_list["is_completed"] =  ( isset($input["is_completed"]) && !empty($input["is_completed"]) ) ? $input["is_completed"] : 0;
        $task_list["is_trashed"] =  ( isset($input["is_trashed"]) && !empty($input["is_trashed"]) ) ? $input["is_trashed"] : 0;

        // persisting file data into database
        $task_list_id = TaskList::create($task_list)->id;

        if( $task_list_id > 0 ){
            $count++;
            $status = "success";
            $message .= "New insert record. ID : " . $task_list_id;
        }else{
            $status = "fail";
            $message .= "Record was not inserted into database.";
        }


        return response()->json([
            "status" => $status,
            "count" => $count,
            "message" => $message,
            "data" => $task_list,
        ]);
    
    }





    // public function edit(TaskList $task_list){

    //     return view('task-lists.edit', ['task_list' => $task_list] );

    // }


    public function update(Request $request, $task_list_id){

        $status = "";
        $count = 0;
        $message = "";

        $input = $request->all();
        // $user_id = Auth::id();

        // dd($input);

        $task_list = TaskList::find($task_list_id);

        $task_list["name"] =  ( isset($input["name"]) && !empty($input["name"]) ) ? $input["name"] : $task_list->name;
        $task_list["open_tasks"] =  ( isset($input["open_tasks"]) && !empty($input["open_tasks"]) ) ? $input["open_tasks"] : $task_list->open_tasks;
        $task_list["completed_tasks"] = ( isset($input["completed_tasks"]) && !empty($input["completed_tasks"]) ) ? $input["completed_tasks"] : $task_list->completed_tasks;
        $task_list["position"] =  ( isset($input["position"]) && !empty($input["position"]) ) ? $input["position"] : $task_list->position;
        $task_list["is_completed"] =  ( isset($input["is_completed"]) && !empty($input["is_completed"]) ) ? $input["is_completed"] : $task_list->is_completed;
        $task_list["is_trashed"] =  ( isset($input["is_trashed"]) && !empty($input["is_trashed"]) ) ? $input["is_trashed"] : $task_list->is_trashed;


        // $this->authorize('update', $task);      // policy check , edit ONLY MY task_list 
        $status = $task_list->save();

        if( $status ){
            $status = "success";
            $count++;
            $message .= 'Task List : ' . $task_list->id . ' / ' . $input["name"] . ' , was updated !'; 
        }else{
            $status = "fail";
            $message .= 'Task List : ' . $task_list->id . ' / ' . $input["name"] . ' , was NOT updated !'; 
        }
        


        return response()->json([
            "status" => $status,
            "count" => $count,
            "message" => $message,
            "data" => $task_list,
        ]);


    }








    public function destroy(TaskList $task_list){

        $status = "";
        $count = 0;
        $message = "";

        // dd($task_list->id);
        
        $status = $task_list->delete();

        if( $status ){
            $status = "success";
            $count++;
            $message .= 'Task List : ' . $task_list->id . ' / ' . $task_list->name . ' , was deleted !';  
        }else{
            $status = "fail";
            $message .= 'Task List : ' . $task_list->id . ' / ' . $task_list->name . ' , was NOT deleted !';  
        }
        

        return response()->json([
            "status" => $status,
            "count" => $count,
            "message" => $message,
            "data" => $task_list,
        ]);

    }



}
