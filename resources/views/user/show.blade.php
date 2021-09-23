<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto p-2 font-mono">
                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Personal Details</p>
                            </div>
                        
                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <x-label for="name" :value="__('Name')" />
                                        <x-input class="block mt-1 w-full" type="text" value="{{ $user->name }}" disabled />
                                    </div>

                                    <div class="md:col-span-5">
                                        <x-label for="email" :value="__('Email')" />
                                        <x-input class="block mt-1 w-full" type="email" value="{{ $user->email }}" disabled/>
                                    </div>

                                    <div class="md:col-span-4">
                                        <x-label for="address" :value="__('Address')" />
                                        <x-input class="block mt-1 w-full" type="text" value="{{ $user->address }}" disabled/>
                                    </div>

                                    <div class="md:col-span-1">
                                        <x-label for="cep" :value="__('CEP')" />
                                        <x-input class="block mt-1 w-full" type="text" value="{{ $user->cep }}" disabled/>
                                    </div>

                                    <div class="md:col-span-1">
                                        <x-label for="cpf" :value="__('CPF')" />
                                        <x-input class="block mt-1 w-full" type="text" value="{{ $user->cpf }}" disabled/>
                                    </div>

                                    <div class="md:col-span-2">
                                        <x-label for="birthday" :value="__('Date of Birth')" />
                                        <x-input class="block mt-1 w-full" type="date" value="{{ $user->birthday }}" disabled/>
                                    </div>

                                    <div class="md:col-span-2">
                                        <x-label for="role" :value="__('Role')" />
                                        <x-input class="block mt-1 w-full" type="text" value="{{ $user->roles[0]->display_name }}" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</x-app-layout>