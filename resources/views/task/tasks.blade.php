<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        title
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        project
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        created_date
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $ts)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$ts->title}}
                                    </th>
                                    <td class="py-4 px-6">
                                        @if($ts->title_name)
                                            {{$ts->title_name}}
                                        @else
                                            {{ __('invalid project') }}
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$ts->created_date}}
                                    </td>
                                    <td class="py-4 px-6">
                                        <a href="{{ route('task.edit', $ts->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
