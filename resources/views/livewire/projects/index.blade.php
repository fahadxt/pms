<div>

    {{-- @include('layouts.alerts') --}}


    <div class="sub-menu">
        <div class="total">
            <span>{{__('Total')}} : {{$data->total()}} </span>
        </div>

        <div class="div-border">
            <div id="open-project" class="add-button">
                <button class="ui add button" type="button">
                    <i class="plus icon"></i>
                    {{__('projects.create')}}
                </button>
            </div>
        </div>
    </div>

    @livewire('projects.create', [ 'data' => null ])

    <div class="ui equal width aligned padded grid">

        <div class="doubling four column row">
            @foreach ($data as $key => $value)
            <div class="ui card web">
                <a class="href" href="{{route('projects.show',['id' => $value->id])}}">
                    <a class="header">
                        {{ (strlen(strip_tags($value->name)) >= 40) ? mb_substr(($value->name),0,40,'UTF-8').'...' : strip_tags($value->name) }}
                    </a>
                    <div class="content">
                        <div class="meta">

                            <span class="data">{{$value->user->name}}</span>
                        </div>
                        <div class="description">
                            {{ (strlen(strip_tags($value->description)) >= 90) ? mb_substr(($value->description),0,90,'UTF-8').'...' : strip_tags($value->description) }}
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="label">
                            {{$value->status->display_name}}
                        </div>
                        <div class="label">
                            {{$value->created_at->diffForHumans()}}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>

    {{$data->links('pagination-links')}}

</div>


