<div>

    <div wire:ignore.self class="ui modal project">
        <i id="close-icon" class="close icon"></i>
        @include('layouts.alerts-error')

        <div class="header">
            @if(!$data)
                {{__('Create')}}
            @else
                {{__('Edit')}}
            @endif
        </div>

        <div class="content">
            <form method="POST" enctype="multipart/form-data" class="ui large form project"
                wire:submit.prevent='store'>
                @csrf
                <div class="ui equal width aligned padded grid">

                    <div class="doubling three column row">
                        <div class="column">
                            <label class="@error('name') error-form @enderror" >{{__('projects.name')}}</label>
                            <input type="text" id="name" name="name"
                                wire:model.lazy='name'>
                        </div>

                        <div class="column">
                            <label class="@error('users') error-form @enderror" >{{__('projects.Joint users')}}</label>
                            <div wire:ignore>
                            <select name="users[]" multiple id="users"
                                class="ui fluid multiple selection dropdown search " wire:model.lazy='users'>
                                <option value="" disabled selected></option>
                                @foreach($usersData as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endForeach
                            </select>
                            </div>
                        </div>

                        @if($data)
                        <div class="column">
                            <label class="@error('status') error-form @enderror">{{__('Status')}}</label>
                            <div wire:ignore>
                            <select name="status"
                                class="ui fluid selection dropdown search " wire:model.lazy='status'>
                                <option value="" disabled selected></option>
                                @foreach($statuses as $status)
                                <option value="{{$status->id}}">{{__($status->name)}}</option>
                                @endForeach
                            </select>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="doubling one column row">
                        <div class="column">
                            <label class="@error('description') error-form @enderror">{{__('projects.description')}}</label>
                            <textarea name="description" id="description" cols="50" rows="9" wire:model.lazy='description'></textarea>
                        </div>
                    </div>
                </div>

                <div class="actions">
                    <button type="submit" class="ui positive right labeled icon button" wire:dirty.attr="disabled">
                        حفظ
                        <i class="checkmark icon"></i>
                    </button>
                    <div class="ui black deny button">
                        إلغاء
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#users').dropdown({ 
            fullTextSearch: true,
            clearable: true,
            detachable: false,
        });
        $('#users').on('change', function (e) {
            var userss = $(this).val();
            @this.set('users', userss);
        });
    });


</script>
@endpush