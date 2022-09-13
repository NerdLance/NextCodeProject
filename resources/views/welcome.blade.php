<x-home-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Next Code Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-row flex-wrap">
            <div class="basis-full md:basis-2/3 md:pr-2 mb-4 md:mb-0">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Most Recent Projects
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        @unless($projects->isEmpty())
                        <table class='w-full'>
                            @foreach($projects as $project)
                                <tr class='hover:bg-gray-50'>
                                    <td class='w-1/5 text-center py-6'>
                                        <div class='text-2xl'>{{$project->votes()->count()}}</div>
                                        <div class='text-xl mb-1'>Votes</div>
                                        <div class='w-1/2 mx-auto border-b border-gray-300'></div>
                                        <form action="{{route('votes-vote', $project->id)}}" method='POST'>
                                            @csrf
                                            <button type='submit' class='mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                                Vote
                                            </button>
                                        </form>
                                    </td>
                                    <td class='w-4/5 my-6 pl-4 md:pl-0'>
                                        <p class='text-xl md:text-2xl'>{{$project->title}}</p>
                                        <p class='text-lg text-gray-500 italic'>{{ $project->overview }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @else
                            No Projects Available
                        @endunless
                    </div>
                    @unless($projects->isEmpty())
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{$projects->links()}}
                    </div>
                    @endunless
                </div>
            </div>
            <div class="basis-full md:basis-1/3 md:pl-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class='text-lg'>Categories</div>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class='text-base'>
                            @unless($categories->isEmpty())
                                @foreach($categories as $category)
                                    <div class="flex">
                                        <a href="#category-{{$category->id}}" class='no-underline hover:underline'>{{$category->title}}</a>
                                    </div>
                                @endforeach
                            @endunless
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
