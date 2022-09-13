<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit a Project') }}
        </h2>
    </x-slot>

    <x-form-card>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('projects-store') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Project Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            </div>

            <!-- Overview -->
            <div class='mt-4'>
                <x-label for="overview" :value="__('Basic Overview')" />

                <x-textarea class="block mt-1 w-full" id="overview" name="overview" rows="4">{{ old('description') }}</x-textarea>
            </div>

            <!-- Functionality -->
            <div class='mt-4'>
                <x-label for="functionality" :value="__('Detailed Functionality')" />

                <x-textarea class="block mt-1 w-full" id="functionality" name="functionality" rows="10">{{ old('functionality') }}</x-textarea>
            </div>

            <div class='mt-4'>
                <label for='category_id' class='block mb-2'>Select a Category</label>
                <div class='flex justify-left'>
                    <select id='category_id' name='category_id' class='w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                        @foreach ($categories as $category)
                            @if ($loop->first)
                                <option value="{{$category->id}}" selected>{{$category->title}}</option>
                            @else 
                                <option value="{{$category->id}}">{{$category->title}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class='mt-4'>
                <label for='difficulty' class='block mb-2'>Choose Difficulty</label>
                <div class='flex justify-left'>
                    <select id='difficulty' name='difficulty' class='w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                        <option value='beginner'>Beginner</option>
                        <option value='intermediate'>Intermediate</option>
                        <option value='expert'>Expert</option>
                    </select>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Add Project') }}
                </x-button>
            </div>
        </form>
    </x-card>
</x-app-layout>