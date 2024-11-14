<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style.css">


<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="container vh-100">  
            <div class="col-12 col-md-6 col-lg-4 d-none d-md-block me-5">
                <img src="/img/bgLogincompo.png" alt="Login Background" class="img-fluid">
            </div>
                    <div class="card rounded-4">
                        <h1 class="fw-bold text-center mt-4 mb-4">Log In</h1>
                            <form method="POST" action="{{ route('login') }}" class ="card-body">
                            @csrf
                                <!-- Email Address -->
                                <div clas="mb-4">
                                    <x-input-label for="email" :value="__('Email')"/>
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="mb-4">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">               
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                            
                                <div class="text-center">
                                    <div class="flex items-center justify-end mt-4">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </div>

                                    <div class="d-grid">
                                        <x-primary-button class="ms-3">
                                            {{ __('continue') }}
                                    </x-primary-button>
                                    </div>
                                        <p style="font-size: 0.9rem;">Don't have an account? 
                                            <a class="text-dark link-underline-dark link-underline-opacity-0 link-underline-opacity-100-hover fw-bolder" style="font-size: 1rem;" href="/register">Register</a>
                                        </p>
                                </div>
                            </form>
                        </div>
                    </div>
</x-guest-layout>