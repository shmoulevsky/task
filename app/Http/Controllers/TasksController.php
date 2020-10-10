<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Tasks\Tasks;
use App\Models\Tasks\Status;

class TasksController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        $statuses = Status::all();
        
        return view('index', ['statuses' => $statuses]);
    }
    
    
    public function addOrEdit(Request $request)
    {
        $request->validate([
		    'title' => 'bail|required|max:255',
		    'description' => 'required',
		    'status_id' => 'required'
		]);
		
		if ($request->has('id') && intval($request->id > 0)){
			
            $task = Tasks::findOrFail($request->id);
            $status = 'edit';
					   
		}else{
			
			$task = new Tasks();
			$status = 'add';	
		}
		
		$task->title = $request->title;
		$task->name = $request->title;
		$task->description = $request->description;
		$task->status_id = $request->status_id;
		$task->important = ($request->important == 1) ? 1 : 0;
	 	$task->save(); 
        
        return response()->json([
            'id' => $task->id,
            'status' => $status
        ]);
		
    }

    public function changeStatus(Request $request)
    {
        $request->validate([
		    'id' => 'required',
		    'status_id' => 'required'
		]);
		
		$task = Tasks::findOrFail($request->id);
        $task->status_id = $request->status_id;
	 	$task->save(); 
        
        return response()->json([
            'id' => $task->id,
            'status' => 'changed'
        ]);
		
    }
        
    public function delete(Request $request)
    {
        
        if ($request->has('id') && intval($request->id > 0)){
            Tasks::findOrFail($request->id)->delete();
            $status = 'deleted';
        }else{
            $status = 'not found';
        }
        
        return response()->json([
           'status' => $status
        ]);
    }
    
    
}