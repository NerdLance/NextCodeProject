<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Created Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @unless ($projects->isEmpty())
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class='text-xl font-bold'>Projects You've Created</h2>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class='w-full text-left'>
                            <tr class='border-b text-left'>
                                <th class='text-sm text-left w-3/5'><p class="text-left">Project Title</p></th>
                                <th class='text-sm text-left w-1/5'>Votes</th>
                                <th class='text-sm text-left w-1/5'>Options</th>
                            </tr>
                            @foreach ($projects as $project)
                                <tr class='border-b hover:bg-gray-50'>
                                    <td class='py-6'>{{ $project->title }}</td>
                                    <td class='py-6'>Votes: 0</td>
                                    <td class='py-6'>
                                        <a href='#edit' class='no-underline hover:underline'>Edit</a> / 
                                        <a href='#delete' class='no-underline hover:underline'>Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ $projects->links() }}
                    </div>
                @else
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class='text-xl font-bold'>You haven't created any projects.</h2>
                        <a href="{{ route('projects-create') }}">
                            <button class='mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                Create a Project
                            </button>
                        </a>
                    </div>
                @endunless
            </div>
        </div>
    </div>
</x-app-layout>