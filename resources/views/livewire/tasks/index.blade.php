<div>

        @include('layouts.alerts')

    @livewire('tasks.form' , ['project' => $data])

    <div class="ui equal width aligned padded grid">

        <div class="doubling five column row">
            @foreach ($tasks as $key => $value)
            <div class="ui card web">
                    <a class="header">
                        {{ (strlen(strip_tags($value->name)) >= 40) ? mb_substr(($value->name),0,40,'UTF-8').'...' : strip_tags($value->name) }}
                    </a>
                    <div class="content">
                        <div class="meta">

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
            </div>
            @endforeach
        </div>

    </div>

    {{$tasks->links('pagination-links')}}


</div>
