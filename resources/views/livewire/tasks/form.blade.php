<div>
    @include('layouts.alerts-error')

    <div wire:ignore.self class="ui modal task">
        <i id="close-icon" class="close icon"></i>

        <div class="header">
            {{-- @if(!$tasks)
            {{__('Create')}}
            @else --}}
            {{__('Edit')}}
            {{-- @endif --}}
        </div>

        <div class="content">
            <form method="POST" enctype="multipart/form-data" class="ui large form project" wire:submit.prevent='store'>
                @csrf
                <div class="ui equal width aligned padded grid">

                    <div class="doubling one column row">
                        <div class="column">
                            <label>{{__('projects.name')}}</label>
                            <input type="text" name="name" wire:model.lazy='name'
                                class="@error('name') error-form @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="doubling one column row">
                        <div class="column">
                            <label>{{__('projects.description')}}</label>
                            <textarea name="description" cols="50" rows="9"
                                class="form-control @error('description') error-form @enderror"
                                wire:model.lazy='description'></textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="doubling one column row">
                        <div class="column" wire:ignore>
                            <label>{{__('Assigned To')}}</label>
                            <select name="assigned_to" id="assigned_to"
                                class="ui fluid selection dropdown search ">
                                <option value="" disabled selected>{{__('Select')}}</option>
                                @foreach($usersData as $user)
                                    <option value="{{$user->id}}">{{__($user->name)}}</option>
                                @endForeach
                            </select>

                            @error('assigned_to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="doubling one column row">
                        <div class="column" wire:ignore>
                            <label class="mb-2">{{__('Due On')}}</label>
                            <input type="text" name="due_on" id="due_on" class=" @error('due_on') error-form @enderror" 
                             wire:model.lazy='due_on'>

                            @error('due_on')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
                </div>
            </form>
        </div>

    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#assigned_to').dropdown();
        $('#assigned_to').on('change', function (e) {
            @this.set('assigned_to', e.target.value);
        });
    });
</script>
@endpush