@extends('layouts.base')

@section('content')

<div class="border padding rounded-lg mt-44 flex justify-evenly fade h-80 w-96 ml-448">
    <div class="flex flex-col uppercase">
        <div class="font-bold text-2xl orange mt-11">Reset Password</div>
        <div class="items-center text">

            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Forgot your password? Enter your email address and we will email you a password reset link.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4 ">
                    <x-primary-button class="rounded-lg">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection