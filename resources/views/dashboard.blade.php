<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto p-2 font-mono">
                <form method = "POST" action="{{ route('point.store') }}">
                    @csrf
                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Point Details</p>
                                <p>Please fill out all the fields.</p>
                            </div>
                        
                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <x-label for="description" :value="__('Description')" />
                                        <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required maxlength="255" autofocus />

                                        @error('description')
                                            <div class="font-medium text-red-600 pt-2">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-3">
                                        <x-label for="entry_time" :value="__('Entry Time')" />
                                        <x-input required id="entry_time" class="block mt-1 w-full" type="datetime-local" name="entry_time" :value="old('entry_time')"/>
                                                                            
                                        @error('entry_time')
                                            <div class="font-medium text-red-600 pt-2">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-2">
                                        <x-label for="exit_time" :value="__('Exit Time')" />
                                        <x-input required id="exit_time" class="block mt-1 w-full" type="datetime-local" name="exit_time" :value="old('exit_time')"/>
                                                                            
                                        @error('exit_time')
                                            <div class="font-medium text-red-600 pt-2">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="md:col-span-5 text-right pt-3">
                                        <x-button class="ml-4" id="submit">
                                            {{ __('Register') }}
                                        </x-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    
    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto p-2 font-mono">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-200 uppercase border-b border-gray-600">
                                    <th class="px-4 py-3">Description</th>
                                    <th class="px-4 py-3">Entry Time</th>
                                    <th class="px-4 py-3">Exit Time</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($points as $point)
                                    <tr class="text-gray-700">
                                        <td class="px-4 py-3 text-ms border">
                                            {{ $point->description }}
                                        </td>

                                        <td class="px-4 py-3 text-ms border">
                                            {{ $point->entry_time }}
                                        </td>

                                        <td class="px-4 py-3 text-ms border">
                                            {{ $point->exit_time }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex flex-col items-center my-12">
                    <div class="flex text-gray-700">
                        @if(!$points->onFirstPage())
                            <a class="block" href="{{ $points->previousPageUrl() }}">
                                <div class="h-8 w-8 mr-1 flex justify-center items-center rounded-full bg-gray-300 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4">
                                        <polyline points="15 18 9 12 15 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                        @endif
                        
                        <div class="flex h-8 font-medium rounded-full bg-gray-300">
                            @if($points->currentPage() > 2)
                                <a class="block md:flex" href="{{ $points->url(1) }}">
                                    <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full">1</div>
                                </a>
                            @endif

                            @if($points->currentPage() > 3)
                                <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full">...</div>
                            @endif

                            @if($points->currentPage() > 1)
                                <a class="block md:flex" href="{{ $points->url(($points->currentPage() - 1)) }}">
                                    <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full">{{ $points->currentPage() - 1 }}</div>
                                </a>
                            @endif

                            <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-green-500 text-white ">{{ $points->currentPage() }}</div>
                            <div class="w-8 h-8 md:hidden flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-green-500 text-white">{{ $points->currentPage() }}</div>

                            @if($points->currentPage() < $points->lastPage())
                                <a class="block md:flex" href="{{ $points->url(($points->currentPage() + 1)) }}">
                                    <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full">{{ $points->currentPage() + 1 }}</div>
                                </a>
                            @endif

                            @if($points->currentPage() < $points->lastPage() - 2)
                                <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full  ">...</div>
                            @endif

                            @if($points->currentPage() < $points->lastPage() - 1)
                                <a class="block md:flex" href="{{ $points->url($points->lastPage()) }}">
                                    <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full">{{ $points->lastPage() }}</div>
                                </a>
                            @endif
                        </div>

                        @if($points->hasMorePages())
                            <a class="block" href="{{ $points->nextPageUrl() }}">
                                <div class="h-8 w-8 ml-1 flex justify-center items-center rounded-full bg-gray-300 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>