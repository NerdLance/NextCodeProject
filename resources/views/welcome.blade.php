<x-home-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Next Code Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-row flex-wrap">
            <div class="basis-full md:pr-2 mb-4 md:mb-0">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
                        <div>
                            Top 5 Highest Rated Projects
                        </div>
                        <div>
                            <a href='#'>
                                <button type='button' class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                                    View All
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                    @unless($projects_by_votes->isEmpty())
                        <table class='w-full'>
                            @foreach($projects_by_votes as $project)
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
                                        <p class='text-xl'>{{$project->title}}</p>
                                        <p class='text-lg text-gray-500 italic'>{{ $project->overview }}</p>
                                        <p class='text-sm underline hover:no-underline text-gray-500 mt-4'><a href='#'>Save to My Projects</a></p>
                                        {{-- <button class='text-sm underline hover:no-underline text-gray-500 mt-4'>Save to My Projects</button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        No Projects Available
                    @endunless
                    </div>
                </div>
            </div>
            <div class="basis-full mt-8 md:pr-2 mb-4 md:mb-0">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Most Recent Projects
                    </div>
                    @unless($categories->isEmpty())
                        <div class="categories-container p-6 bg-white border-b border-gray-200 flex flex-wrap justify-between">
                            <div class="font-bold">Categories:</div>
                            @foreach($categories as $cat)
                                <div>
                                    @if($category && $cat->id == $category->id)
                                        <a href="?category={{$cat->id}}" class='underline hover:underline'>{{$cat->title}}</a>
                                    @else
                                        <a href="?category={{$cat->id}}" class='no-underline hover:underline'>{{$cat->title}}</a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endunless
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
        </div>
    </div>
</x-app-layout>
