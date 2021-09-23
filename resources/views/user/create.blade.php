<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto p-2 font-mono">
                <form method = "POST" action="{{ route('register') }}">
                    @csrf
                    <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                            <div class="text-gray-600">
                                <p class="font-medium text-lg">Personal Details</p>
                                <p>Please fill out all the fields.</p>

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            </div>
                        
                            <div class="lg:col-span-2">
                                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <x-label for="name" :value="__('Name')" />
                                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required maxlength="255" autofocus />
                                    </div>

                                    <div class="md:col-span-5">
                                        <x-label for="email" :value="__('Email')" />
                                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required maxlength="255"/>
                                    </div>

                                    <div class="md:col-span-4">
                                        <x-label for="address" :value="__('Address')" />
                                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required maxlength="255"/>
                                    </div>

                                    <div class="md:col-span-1">
                                        <x-label for="cep" :value="__('CEP')" />
                                        <x-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')" required maxlength="8"/>
                                    </div>

                                    <div class="md:col-span-3">
                                        <x-label for="cpf" :value="__('CPF')" />
                                        <x-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required maxlength="11"/>
                                    </div>

                                    <div class="md:col-span-2">
                                        <x-label for="birthday" :value="__('Date of Birth')" />
                                        <x-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" :value="old('birthday')"/>
                                    </div>

                                    <div class="md:col-span-3">
                                        <x-label for="password" :value="__('Password')" />
                                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required maxlength="255" autocomplete="new-password" />
                                    </div>

                                    <div class="md:col-span-2">
                                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required maxlength="255"/>
                                    </div>

                                    <div class="md:col-span-5 text-right pt-3">
                                        <x-button class="ml-4">
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
</x-app-layout>