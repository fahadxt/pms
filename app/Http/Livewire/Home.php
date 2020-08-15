<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\tasks;
use Carbon\Carbon;

class Home extends Component
{
    use WithPagination;

    public function render()
    {
        $dt = (Carbon::now())->format('Y-m-d');
        $user_id = auth()->user()->id;
        $task = tasks::where('assigned_to',$user_id)->where('due_on', $dt)->latest()->paginate(18);
        return view('livewire.home',[
            'tasks' => $task,
        ]);
    }
}
