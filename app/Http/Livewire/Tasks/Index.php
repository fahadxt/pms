<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projects;
use App\Models\tasks;
use App\Models\statuses;

class Index extends Component
{
    use WithPagination;

    public $project;

    public function mount($project)
    {
        $this->project = $project;
    }


    public function render()
    {
        $taskable_type = get_class($this->project);
        $taskable_id = $this->project->id;
        return view('livewire.tasks.index',[
            'tasks' => tasks::where('taskable_type',$taskable_type)->where('taskable_id', $taskable_id)->latest()->paginate(18),
            'data' =>$this->project
        ]);
    }

    protected $listeners = [
        'taskCreated' => 'handleCreated',
    ];

    public function handleCreated($data)
    {
        session()->flash('message', 'تم الإنشاء بنجاح 👍 ');
    }
}
