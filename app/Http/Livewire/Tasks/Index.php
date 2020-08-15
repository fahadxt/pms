<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projects;
use App\Models\tasks;
use App\Models\statuses;

class Index extends Component
{
    protected $listeners = [
        'taskCreated' => 'handleCreated',
        'taskUpdated' => 'handleUpdated',
    ];
    use WithPagination;

    public $project,$assigned_to;

    public function mount($project)
    {
        $this->project = $project;
    }


    public function render()
    {
        $taskable_type = get_class($this->project);
        $taskable_id = $this->project->id;
        $user_id = auth()->user()->id;
        if(auth()->user()->hasRole('admin'))
        {
            $task = tasks::where('taskable_type',$taskable_type)->where('taskable_id', $taskable_id);
        }else{
            $task = tasks::where('taskable_type',$taskable_type)->where('taskable_id', $taskable_id)->where('assigned_to',$user_id);
        }
        $task = $task->latest()->paginate(18);
        return view('livewire.tasks.index',[
            'tasks' => $task,
            'data' =>$this->project
        ]);
    }



    public function handleCreated($data)
    {
        session()->flash('message', 'تم الإنشاء بنجاح 👍');
    }
    public function handleUpdated($data)
    {
        session()->flash('message', 'تم التعديل بنجاح 👍');
    }
}
