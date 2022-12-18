<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('task Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update this information") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('task.update', $task->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $task->title)" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea id="description" name="description" type="text" class="mt-1 block w-full" required autocomplete="description">{{$task->description}}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div>
            <x-input-label for="created_date" :value="__('Created Date')" />
            <x-text-input id="created_date" name="created_date" type="datetime-local" class="mt-1 block w-full" :value="old('created_date', $task->created_date)" required/>
            <x-input-error class="mt-2" :messages="$errors->get('created_date')" />
        </div>

        <div>
            <x-select name="project_id">
                <x-slot name="content">
                    @foreach ($projects as $pr)
                    <option value="{{ $pr->id }}">{{ $pr->title }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'task-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
