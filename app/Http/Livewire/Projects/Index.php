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
        $user_id = auth()->user()->id;
        

        $projects = projects::orderBy('created_at', 'desc');
        if(auth()->user()->hasRole('user'))
        {
            $projects = $projects->whereHas('users', function ($query) use($user_id) {
                $query->where('user_id', $user_id);
            });
        }


        $projects= $projects->latest()->paginate(18);
        return view('livewire.projects.index', [
            'data' => $projects,
            'usersData' => User::all(),
        ]);
    }


    public function handleCreated($data)
    {
        session()->flash('message', 'تم الإنشاء بنجاح 👍 ');
    }
    public function handleDeleted($data)
    {
        session()->flash('message', 'تم الحذف بنجاح 👍 ');
    }

}
