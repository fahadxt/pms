<div>

    @include('layouts.alerts')


    @livewire('projects.create', [ 'data' => $data])


    <div class="sub-menu">
        <div class="users">
            @foreach ($data->users as $key => $value)
                <div class="ui inline header2 dropdown">
                    <div class="text ">
                        <img class="ui huge circular image" src="{{ asset('storage/'. $value->avatar ) }}">
                        
                    </div>
                    <div class="menu menu2">
                        <div class="item">
                            {{$value->name}}
                        </div>
                        <div class="item" wire:click='deattach({{$value->id}})'>
                            إزالة
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="div-border">
            <div id="open-task" class="add-button">
                <button class="ui add button" type="button">
                    <i class="plus icon"></i>
                    {{__('New Task')}}
                </button>
            </div>
        </div>
    </div>

    <div class="ui card show">
        <div class="header">
            <div class="right">
                {{$data->name}}
            </div>
            <div class="left">
                <div id="open-project" class="pointer">
                    {{__('Edit')}}
                </div>
                <div class="pointer" wire:click='delete({{$data->id}})'>
                    {{__('Remove')}}
                </div>
            </div>
        </div>
        <div class="ui large form">
            <div class="ui equal width aligned padded grid">
                <div class="doubling one column row border-bottom">
                    <div class="column">
                        <div class=""> 
                            {{__('Status')}} : <span class="status" style="background-color:{{$data->status->color}}">{{__($data->status->name)}}</span></div>
                    </div>
                </div>
            </div>
            <div class="ui equal width aligned padded grid">
                <div class="doubling one column row">
                    <div class="column">
                        <div class="input-show"> {{$data->description}} </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    @livewire('tasks.index' , ['project' => $data])


</div>