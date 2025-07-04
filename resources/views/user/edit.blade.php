<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }} : {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                
                    <form action="{{ route('user.update', $user ) }}" method="post">
                    @csrf 
                    @method('PUT')
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" 
            name="name" :value="old('name', $user->name)" 
            required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <pre>@error('name') {{ $message }}  @enderror </pre>

        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" 
            name="email" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div class="mt-4 block border border-gray-300 rounded-md px-3 py-2 bg-gray-50 text-gray-700 text-sm mb-2">
            <em >
                Only enter password to change current password
            </em>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" 
                                autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />



            </div>


        </div>

            <div class="mt-4">
                <x-input-label :value="__('Roles')" />

                @foreach ($roles as $role )

                    <div>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                            @if ($user->roles->contains($role)) checked @endif
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="ms-2 text-sm text-gray-600">{{ $role->name }}</span>
                        </label>

                    </div>

                @endforeach
                <x-input-error :messages="$errors->get('roles')" class="mt-2" />

            </div>






            <x-primary-button class="mt-4">
                {{ __('Update') }}
            </x-primary-button>


                    </form>



                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
