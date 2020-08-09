<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projects;
use App\Models\tasks;
use App\Models\statuses;
use App\User;


class Form extends Component
{

    use WithPagination;

    public  $name , $description , $assigned_to , $due_on , $status_id = 1 , $project , $users;
    
    public function mount($project)
    {
        $this->project = null;

        if($project){
            $this->project = $project;

        }
    }

    private function resetInput(){
        $this->name = null;
        $this->description = null;
        $this->assigned_to = null;
        $this->due_on = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required',
            'assigned_to' => 'required',
            'due_on' => 'required',
        ]);


        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'assigned_to' => $this->assigned_to,
            'due_on' => $this->due_on,
            'status_id' => $this->status_id,

            'created_by' => auth()->user()->id,
            'taskable_type' => get_class($this->project),
            'taskable_id' => $this->project->id,
        ];

        $createdData = tasks::create($data);

        
        $this->emit('taskCreated' , $createdData);
        $this->resetInput();
        // redirect()->route('projects.show',['id' => $this->project->id]); 


        

    }

    public function render()
    {
        return view('livewire.tasks.form', [
            'usersData' => $this->project->users,
            'statuses' => statuses::all()
        ]);
    }
}
