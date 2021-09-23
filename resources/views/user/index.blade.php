<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto p-2 font-mono">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-200 uppercase border-b border-gray-600">
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3 text-center">Role</th>
                                    <th class="px-4 py-3 text-center">Status</th>
                                    <th class="px-4 py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($users as $user)
                                    <tr class="text-gray-700">
                                        <td class="px-4 py-3 text-ms border">
                                            {{ $user->name }}
                                        </td>

                                        <td class="px-4 py-3 text-ms border">
                                            {{ $user->email }}
                                        </td>

                                        <td class="px-4 py-3 text-xs font-semibold border text-center">
                                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">{{ $user->role->display_name }}</span>
                                        </td>

                                        <td class="px-4 py-3 text-xs font-semibold border text-center">
                                            @if($user->deleted_at == null)         
                                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">Ativo</span>
                                            @else
                                                <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm">Inativo</span>
                                            @endif
                                        </td>

                                        <td class="px-4 py-3 text-xs font-semibold border text-center">
                                            <div class="flex item-center justify-center">

                                                <form action = "{{ route('user.show', ['id' => $user->id]) }}" method = "GET" class = "btn form-button p-1">
                                                    <button type = "submit" class = "block" title = "Show User">
                                                        <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                            </svg>
                                                        </div>
                                                    </button>
                                                </form>

                                                @if($user->deleted_at == null)
                                                    @if($user->user_id == auth()->user()->id)
                                                        <form action = "{{ route('user.edit', ['id' => $user->id]) }}" method = "GET" class = "btn form-button p-1">
                                                            <button type = "submit" class = "block" title = "Edit User">
                                                                <div class="w-4 mr-2 transform hover:text-yellow-500 hover:scale-110">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                                </div>
                                                            </button>
                                                        </form>
                                                        
                                                        <form action = "{{ route('user.delete', ['id' => $user->id]) }}" method = "POST" class = "btn form-button p-1">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type = "submit" class = "block" title = "Delete User">
                                                                <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </div>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                    <form action = "{{ route('user.restore', ['id' => $user->id]) }}" method = "POST" class = "btn form-button p-1">
                                                        @csrf
                                                        <button type = "submit" class = "block" title = "Restore User">
                                                            <div class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.254,6.572c0.008,0.072,0.048,0.123,0.082,0.187c0.036,0.07,0.06,0.137,0.12,0.187C3.47,6.957,3.47,6.978,3.484,6.988c0.048,0.034,0.108,0.018,0.162,0.035c0.057,0.019,0.1,0.066,0.164,0.066c0.004,0,0.01,0,0.015,0l2.934-0.074c0.317-0.007,0.568-0.271,0.56-0.589C7.311,6.113,7.055,5.865,6.744,5.865c-0.005,0-0.01,0-0.015,0L5.074,5.907c2.146-2.118,5.604-2.634,7.971-1.007c2.775,1.912,3.48,5.726,1.57,8.501c-1.912,2.781-5.729,3.486-8.507,1.572c-0.259-0.18-0.618-0.119-0.799,0.146c-0.18,0.262-0.114,0.621,0.148,0.801c1.254,0.863,2.687,1.279,4.106,1.279c2.313,0,4.591-1.1,6.001-3.146c2.268-3.297,1.432-7.829-1.867-10.101c-2.781-1.913-6.816-1.36-9.351,1.058L4.309,3.567C4.303,3.252,4.036,3.069,3.72,3.007C3.402,3.015,3.151,3.279,3.16,3.597l0.075,2.932C3.234,6.547,3.251,6.556,3.254,6.572z"/>
                                                                </svg>
                                                            </div>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex flex-col items-center my-12">
                    <div class="flex text-gray-700">
                        @if(!$users->onFirstPage())
                            <a class="block" href="{{ $users->previousPageUrl() }}">
                                <div class="h-8 w-8 mr-1 flex justify-center items-center rounded-full bg-gray-300 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4">
                                        <polyline points="15 18 9 12 15 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                        @endif
                        
                        <div class="flex h-8 font-medium rounded-full bg-gray-300">
                            @if($users->currentPage() > 2)
                                <a class="block md:flex" href="{{ $users->url(1) }}">
                                    <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full">1</div>
                                </a>
                            @endif

                            @if($users->currentPage() > 3)
                                <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full">...</div>
                            @endif

                            @if($users->currentPage() > 1)
                                <a class="block md:flex" href="{{ $users->url(($users->currentPage() - 1)) }}">
                                    <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full">{{ $users->currentPage() - 1 }}</div>
                                </a>
                            @endif

                            <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-green-500 text-white ">{{ $users->currentPage() }}</div>
                            <div class="w-8 h-8 md:hidden flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-green-500 text-white">{{ $users->currentPage() }}</div>

                            @if($users->currentPage() < $users->lastPage())
                                <a class="block md:flex" href="{{ $users->url(($users->currentPage() + 1)) }}">
                                    <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full">{{ $users->currentPage() + 1 }}</div>
                                </a>
                            @endif

                            @if($users->currentPage() < $users->lastPage() - 2)
                                <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full  ">...</div>
                            @endif

                            @if($users->currentPage() < $users->lastPage() - 1)
                                <a class="block md:flex" href="{{ $users->url($users->lastPage()) }}">
                                    <div class="w-8 md:flex justify-center items-center hidden cursor-pointer leading-5 transition duration-150 ease-in rounded-full">{{ $users->lastPage() }}</div>
                                </a>
                            @endif
                        </div>

                        @if($users->hasMorePages())
                            <a class="block" href="{{ $users->nextPageUrl() }}">
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