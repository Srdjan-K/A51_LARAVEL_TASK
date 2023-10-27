<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;



class TaskApiController extends Controller
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
        $tasks = [];
        $count = 0;
        $message = "";

        if( $id != null ){
            $tasks = Task::where('id', $id)->get();
            $count = Task::where('id', $id)->count();
        }else{
            $tasks = Task::all();
            $count = Task::all()->count();
        }
        
        if( count($tasks) > 0 ) {
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
            "data" => $tasks,
        ]);

    }

    // public function create(){

    //     $task_lists = TaskList::all();

    //     return view('tasks.create',  ['task_lists' => $task_lists]);

    // }


    public function store(Request $request){
        
        $status = "";
        $count = 0;
        $message = "";


        $input = $request->all();
        // $user_id = Auth::id();

        $task = [];

        $task["name"] = ( isset($input["name"]) && !empty($input["name"]) ) ? $input["name"] : "DEFAULT TASK NAME";
        $task["is_completed"] = ( isset($input["is_completed"]) && !empty($input["is_completed"]) ) ? $input["is_completed"] : 0;
        $task["task_list_id"] =  ( isset($input["task_list_id"]) && !empty($input["task_list_id"]) ) ? $input["task_list_id"] : 1;
        $task["position"] =  ( isset($input["position"]) && !empty($input["position"]) ) ? $input["position"] : 0;
        $task["start_on"] = ( isset($input["start_on"]) && !empty($input["start_on"]) ) ? $input["position"] : NULL;
        $task["due_on"] =  ( isset($input["due_on"]) && !empty($input["due_on"]) ) ? $input["due_on"] : NULL;
        $task["labels"] =  ( isset($input["labels"]) && !empty($input["labels"]) ) ? $input["labels"] : "[]";
        $task["open_subtasks"] =  ( isset($input["open_subtasks"]) && !empty($input["open_subtasks"]) ) ? $input["open_subtasks"] : 0;
        $task["comments_count"] =  ( isset($input["comments_count"]) && !empty($input["comments_count"]) ) ? $input["comments_count"] : 0;
        $task["assignee"] =  ( isset($input["assignee"]) && !empty($input["assignee"]) ) ? $input["assignee"] : "[]";
        $task["is_important"] =  ( isset($input["is_important"]) && !empty($input["is_important"]) ) ? $input["is_important"] : 0;
        $task["completed_on"] = ( isset($input["completed_on"]) && !empty($input["completed_on"]) ) ? $input["completed_on"] : NULL;

        // persisting file data into database
        $task_id = Task::create($task)->id;

        if( !empty($task_id) && $task_id > 0 ){
            $status = "success";
            $count++;
            $message .= 'Task : ' . $task_id . ' / ' . $task["name"] . ' , was created !'; 
        }else{
            $status = "fail";
            $message .= 'Task : ' . $task_id . ' / ' . $task["name"] . ' , was NOT created !'; 
        }


        return response()->json([
            "status" => $status,
            "count" => $count,
            "message" => $message,
            "data" => $task,
        ]);
    
    }


    // public function edit(Task $task){

    //     $task_lists = TaskList::all();

    //     return view('tasks.edit', ['task' => $task, 'task_lists' => $task_lists] );

    // }


    public function update(Request $request , Task $task){

        $status = "";
        $count = 0;
        $message = "";

        $input = $request->all();
        // $user_id = Auth::id();

        // dd($input);

        $task = Task::find($task->id);

        $task->name = ( isset($input["name"]) && !empty($input["name"]) ) ? $input["name"] : $task->name;
        $task->is_completed = ( isset($input["is_completed"]) && !empty($input["is_completed"]) ) ? $input["is_completed"] : $task->is_completed;
        $task->task_list_id =  ( isset($input["task_list_id"]) && !empty($input["task_list_id"]) ) ? $input["task_list_id"] : $task->task_list_id;
        $task->position =  ( isset($input["position"]) && !empty($input["position"]) ) ? $input["position"] : $task->position;
        $task->start_on = ( isset($input["start_on"]) && !empty($input["start_on"]) ) ? $input["position"] : $task->start_on;
        $task->due_on =  ( isset($input["due_on"]) && !empty($input["due_on"]) ) ? $input["due_on"] : $task->due_on;
        $task->labels =  ( isset($input["labels"]) && !empty($input["labels"]) ) ? $input["labels"] : $task->labels;
        $task->open_subtasks =  ( isset($input["open_subtasks"]) && !empty($input["open_subtasks"]) ) ? $input["open_subtasks"] : $task->open_subtasks;
        $task->comments_count =  ( isset($input["comments_count"]) && !empty($input["comments_count"]) ) ? $input["comments_count"] : $task->comments_count;
        $task->assignee =  ( isset($input["assignee"]) && !empty($input["assignee"]) ) ? $input["assignee"] : $task->assignee;
        $task->is_important =  ( isset($input["is_important"]) && !empty($input["is_important"]) ) ? $input["is_important"] : $task->is_important;
        $task->completed_on = ( isset($input["completed_on"]) && !empty($input["completed_on"]) ) ? $input["completed_on"] : $task->completed_on;


        // $this->authorize('update', $task);      // policy check , edit ONLY MY task 
        $status = $task->save();


        if( $status ){
            $status = "success";
            $count++;
            $message .= 'Task : ' . $task->id . ' / ' . $task->name . ' , was updated !';  
        }else{
            $status = "fail";
            $message .= 'Task : ' . $task->id . ' / ' . $task->name . ' , was NOT updated !'; 
        }


        return response()->json([
            "status" => $status,
            "count" => $count,
            "message" => $message,
            "data" => $task,
        ]);


    }


    public function destroy(Task $task){

        $status = "";
        $count = 0;
        $message = "";


        $status = $task->delete();

        

        if( $status ){
            $status = "success";
            $count++;
            $message .= 'Task : ' . $task->id . ' / ' . $task->name . ' , was deleted !';  
        }else{
            $status = "fail";
            $message .= 'Task : ' . $task->id . ' / ' . $task->name . ' , was NOT deleted !';
        }


        return response()->json([
            "status" => $status,
            "count" => $count,
            "message" => $message,
            "data" => $task,
        ]);

    }


}
