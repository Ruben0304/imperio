
@extends('template')
@section('contenido')


 <x-guest-layout>
    <x-auth-card >
        <x-slot name="logo">
            
        </x-slot> 

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" /> 
        
        <img src="img/profile.gif" alt="" style="width: 30%; margin-left:35%">
    
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            {{-- @if ($email_exist=true)
           
            @endif --}}
            
            
                </div>


            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Registrate') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Entrar') }}
                </x-primary-button>
                <div class="social">
                    

                </div>
             
            </div>
        </form>
        
       
      
      

    </x-auth-card>
</x-guest-layout> 
@endsection



