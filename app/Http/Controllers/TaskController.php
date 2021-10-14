<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;




use App\Models\SparkTask;


use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index()
    {
        return view('add-new-task');
    }
    public function store(Request $request)
    {
        
        $file = $request->file('app_file');
        echo $file;
        $path = $file->store('/');
        echo $path;
        

        $connection = ssh2_connect('3.130.118.112', 22);
        

    if (ssh2_auth_password($connection, 'hawas', '123456')) {

        $stream = ssh2_exec($connection, 'cd /opt/tasks/');

        $filenamewithextension = $request->file('app_file')->getClientOriginalName();

        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $request->file('app_file')->getClientOriginalExtension();

        //filename to store
        $filenametostore = $filename.'_'.uniqid().'.'.$extension;

        //Upload File to external server
        Storage::disk('public')->put($filenametostore, fopen($request->file('app_file'), 'r+'));



        echo "Authentication Successful!\n";
    } else {
        die('Authentication Failed...');
        }
        $task = new SparkTask;
        $task->app_name = $request->app_name;
        $task->entry_class = $request->entry_class;
        $task->core_count = $request->core_count;
        $task->master_url = $request->master_url;
        $task->app_file = $request->app_file;

        $task->save();
        return redirect('add-new-task')->with('status', 'Task Has Been inserted '. stream_get_contents($stream));
    }
}
