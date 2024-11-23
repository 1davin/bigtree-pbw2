<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">

<x-guest-layout>
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
        <div class="card rounded-4 regist-card shadow-sm" 
             style="max-width: 500px; width: 100%; min-width: 450px; padding: 20px;">
            <!-- Card Title -->
            <h1 class="fw-bold text-center mt-3 mb-4">Register</h1>
            
            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" class="card-body">
                @csrf

                <!-- Name Field -->
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Field -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Already Registered Link -->
                <div class="d-flex justify-content-between mt-3">
                    <a class="text-decoration-none text-primary fw-bold" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                </div>

                <!-- Register Button -->
                <div class="text-center mt-4">
                    <x-primary-button class="w-100 btn btn-primary">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
