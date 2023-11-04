<?php

namespace App\Http\Controllers;
use App\Models\Tasks;
use App\Models\customers;
use Illuminate\Http\Request;

class tasksController extends Controller
{
    public function tasks()
    {
        $tasks = Tasks::latest()->get();

        // Get the current Unix timestamp
        $currentTimestamp = strtotime("-1 week");

        // Calculate the Unix timestamp for the start of the current week (Monday)
        $weekStartTimestamp = strtotime('last monday', $currentTimestamp);

        // Calculate the Unix timestamp for the end of the current week (Sunday)
        $weekEndTimestamp = strtotime('next sunday', $currentTimestamp);

        foreach ($tasks as $task) {

            // Replace $yourTimestamp with the timestamp you want to check
            $yourTimestamp = strtotime($task['Deadline']); // Replace with your timestamp

            // Check if $yourTimestamp is within the current week
            if ($yourTimestamp >= $weekStartTimestamp && $yourTimestamp <= $weekEndTimestamp) {
               $newTask[] = $task; 
            }

        }

        return Tasks::all();
    }

    public function tasksByDate(Request $req)
    {
        $tasks = Tasks::latest()->get();

        // Get the current Unix timestamp
        $currentTimestamp = strtotime($req->date);

        // Calculate the Unix timestamp for the start of the current week (Monday)
        $weekStartTimestamp = strtotime('last monday', $currentTimestamp);

        // Calculate the Unix timestamp for the end of the current week (Sunday)
        $weekEndTimestamp = strtotime('next sunday', $currentTimestamp);

        foreach ($tasks as $task) {

            // Replace $yourTimestamp with the timestamp you want to check
            $yourTimestamp = strtotime($task['Deadline']); // Replace with your timestamp

            // Check if $yourTimestamp is within the current week
            if ($yourTimestamp >= $weekStartTimestamp && $yourTimestamp <= $weekEndTimestamp) {
               $newTask[] = $task; 
            }

        }

        return $newTask;
    }

    public function create_task(Request $req)
    {
        $data = [
            'Task_Name' => $req->job,
            'Customer' => $req->name,
            'Status' => 'Pending',
            'Task_number' => 'JB'.random_int(1000, 9999),
            'Assigned_to' => 'none',
            'Assigned_by' => $req->admin
        ];

        Tasks::create($data);
    }

    public function individual_task($id)
    {
        return Tasks::find($id);
    }

    public function update_task(Request $req, $id)
    {
        $data = [
            'Task Name' => $req->task,
            'Category' => $req->cat,
            'Deadline' => $req->ddln,
            'Status' => $req->stts
        ];

        Tasks::find($id)->update($data);
    }

    public function task_action(Request $req, $id)
    {
        $task = Tasks::find($id);

        if($task->Status == "Pending")
        {
            $task->update(['Status' => 'Active', 'Assigned_to' => $req->tech]);
        }
        elseif ($task->Status == "Active") 
        {
            $task->update(['Status' => 'Completed']);
        }
    }

    public function task_category($category)
    {
        return Tasks::latest()->where('Status', $category)->get();
    }

    public function task_depatment($category)
    {
        return Tasks::latest()->where('Category', $category)->get();
    }

    public function getTasksAmount()
    {
        return tasks::all()->count();
    }

    public function get_tasks_amount_category($category)
    {
        return tasks::where('Status', $category)->count();
    }

    public function get_tasks_amount_department($category)
    {
        return tasks::where('Category', $category)->count();
    }
}
