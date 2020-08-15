<div>
    <div wire:ignore.self class="ui modal task scrolling">
        <i id="close-icon" class="close icon"></i>
        {{-- @dump($data) --}}

        <div class="header">
            @if(!$data)
            {{__('Create')}}
            @else
            {{__('Edit')}}
            @endif
        </div>

        @include('layouts.alerts-error')
        <div class="content">
            <form method="POST" enctype="multipart/form-data" class="ui large form task" wire:submit.prevent='store'>
                @csrf
                <div class="ui equal width aligned padded grid">

                    <div class="doubling four column row">
                        <div class="column">
                            <label>{{__('projects.name')}}</label>
                            <input type="text" name="name" wire:dirty.class="text-red-500" wire:model.lazy='name'
                                class="@error('name') error-form @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="column" wire:ignore>
                            <label>{{__('Assigned To')}}</label>
                            <select name="assigned_to" id="assigned_to" class="ui fluid selection dropdown search" wire:model.lazy='assigned_to'>
                                <option value="" disabled selected>{{__('Select')}}</option>
                                @foreach($usersData as $user)
                                <option  value="{{$user->id}}">{{__($user->name)}}</option>
                                @endForeach
                            </select>
                        </div>

                        <div class="column" wire:ignore>
                            <label class="mb-2">{{__('Due on')}}</label>
                            <input type="text" name="due_on" id="due_on" class=" @error('due_on') error-form @enderror"
                                wire:model.lazy='due_on'>

                            @error('due_on')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        @if($data)
                        <div class="column" wire:ignore>
                            <label>{{__('Status')}}</label>
                            <select name="status_id"
                                class="ui fluid selection dropdown search " wire:model.lazy='status_id'>
                                <option value="" disabled selected></option>
                                @foreach($statuses as $status)
                                <option value="{{$status->id}}">{{__($status->name)}}</option>
                                @endForeach
                            </select>
                        </div>
                        @endif
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

                    <div class="actions">
                        <button type="submit" class="ui positive right labeled icon button" >
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