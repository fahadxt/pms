<section class="navigation" wire:ignore.self>
    <div class="nav-container">
        <div class="user-nav">
            @auth
            <div class="ui inline header2 dropdown">
                <div class="text ">
                    <img class="ui  circular image" src="{{ asset('storage/'. auth()->user()->avatar ) }}">
                    {{auth()->user()->name}}
                </div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item">
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            تسجيل خروج
                        </a>

                    </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

            {{-- <div class="sidebar-header">
                <div class="user-pic">
                    <img class="img-responsive img-rounded" src="{{ asset('storage/'. auth()->user()->avatar ) }}"
            alt="User picture">

        </div>
        <div class="user-info">
            <span class="user-name">
                {{auth()->user()->name}}
            </span>
            <span class="user-role">

                @foreach (auth()->user()->roles as $index=>$role)
                {{$role->display_name}} {{$index+1 <auth()->user()->roles->count() ? '|' : ''}}
                @endforeach
            </span>
        </div>

        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            تسجيل خروج
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </div> --}}
    @endauth
    </div>
    <div class="brand">
        <a href="/">{{ config('app.name', 'بوابة إدارة المشاريع') }}</a>
    </div>

    </div>
</section>
<div class="ui secondary pointing menu">
    @foreach($items as $menu_item)
    @if(Request::url() == 'http://127.0.0.1:8000')
    <a href="{{ $menu_item->link() }}" class="item {{  ( request()->is($menu_item->link()) ) ? "active" : "" }}">
        {{ $menu_item->title }}
    </a>
    @else
    <a href="{{ $menu_item->link() }}"
        class="item {{ Request::url() == 'http://127.0.0.1:8000' . $menu_item->link() ? "active" : "" }}">
        {{ $menu_item->title }}
    </a>
    @endif

    @endforeach
</div>

{{-- @foreach($items as $menu_item)
                    @if ( sizeof($menu_item->children) > 0)
                        <li class="have-dropdown">
                            <a href="#!">{{ $menu_item->title }}</a>
<ul class="nav-dropdown">
    @foreach($menu_item->children as $menu_item_sub)
    <li>
        <a href="{{ $menu_item_sub->link() }}"> {{ $menu_item_sub->title }} </a>
    </li>
    @endforeach
</ul>
</li>


@else

<li>
    <a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
</li>

@endif
@endforeach --}}


{{-- <div class="ui fixed menu">
    <div class="ui container">
        <a href="#" class="header item">
            <img class="logo" src="http://placeimg.com/30/25/any">
            Project Name
        </a>

        @foreach($items as $menu_item)
        @if ( sizeof($menu_item->children) > 0)
        <div class="ui simple dropdown item"> {{ $menu_item->title }} <i class="dropdown icon"></i>
<div class="menu">
    @foreach($menu_item->children as $menu_item_sub)
    <a class="item" href="{{ $menu_item_sub->link() }}">{{ $menu_item_sub->title }}</a>
    @endforeach
</div>
</div>
@else
<a href="{{ $menu_item->link() }}" class="item"><i class="{{ $menu_item->icon }}"></i>{{ $menu_item->title }}</a>
@endif

@endforeach

<div class="left menu">
    <div class="item">
        <a class="ui basic teal button" href="#"><i class="sign in icon"></i>Log in</a>
    </div>
    <div class="item">
        <a class="ui basic blue button" href="#"><i class="add user icon"></i>Sign up</a>
    </div>
</div>
</div>
</div> --}}