<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projects;
use App\User;

class Index extends Component
{

    use WithPagination;
    
    public $name , $description , $users;

    protected $listeners = [
        'projectCreate' => 'handleCreated',
        'projectDelete' => 'handleDeleted',
    ];

    public function render()
    {
        return view('livewire.projects.index', [
            'data' => projects::latest()->paginate(18),
            'usersData' => User::all(),
        ]);
    }


    public function handleCreated($data)
    {
        session()->flash('message', 'تم الإنشاء بنجاح 👍 ');
    }
    public function handleDeleted($data)
    {
        dd('sd');
        session()->flash('message', 'تم الحذف بنجاح 👍 ');
    }

}
