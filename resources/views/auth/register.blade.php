@extends('layouts.guest')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                    <div class="text-center text-md-center mb-4 mt-md-0">
                        <h1 class="mt-n3 mb-0 h3">{{ __('Create Account') }}</h1>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Form -->
                        <div class="form-group mt-4 mb-4">
                            <label for="name">{{ __('Your Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-user-alt fa-fw"></i>
                                </span>
                                <input name="name" id="name" type="name" class="form-control"
                                    placeholder="{{ __('Name') }}" value="{{ old('name') }}" autofocus required>
                            </div>

                            @error('name')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- End of Form -->

                        <!-- Form -->
                        <div class="form-group mt-4 mb-4">
                            <label for="email">{{ __('Your Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                        </path>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                        </path>
                                    </svg>
                                </span>
                                <input name="email" id="email" type="email" class="form-control"
                                    placeholder="{{ __('Email') }}" value="{{ old('email') }}" autofocus required>
                            </div>
                            @error('email')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password">{{ __('Your Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon2">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </span>
                                <input name="password" type="password" placeholder="{{ __('Password') }}"
                                    class="form-control" id="password" required autocomplete="new-password">
                            </div>
                            @error('password')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </span>
                                <input name="password_confirmation" type="password"
                                    placeholder="{{ __('Confirm Password') }}" class="form-control"
                                    id="password_confirmation" required>
                            </div>
                        </div>
                        <!-- End of Form -->
                        <!-- Form -->
                        <div class="form-group mb-4">
                            <label for="role">{{ __('Role') }}</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon4">
                                    <svg class="icon icon-xs text-gray-600" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M78.6 5C69.1-2.4 55.6-1.5 47 7L7 47c-8.5 8.5-9.4 22-2.1 31.6l80 104c4.5 5.9 11.6 9.4 19 9.4l54.1 0 109 109c-14.7 29-10 65.4 14.3 89.6l112 112c12.5 12.5 32.8 12.5 45.3 0l64-64c12.5-12.5 12.5-32.8 0-45.3l-112-112c-24.2-24.2-60.6-29-89.6-14.3l-109-109 0-54.1c0-7.5-3.5-14.5-9.4-19L78.6 5zM19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L233.7 374.3c-7.8-20.9-9-43.6-3.6-65.1l-61.7-61.7L19.9 396.1zM512 144c0-10.5-1.1-20.7-3.2-30.5c-2.4-11.2-16.1-14.1-24.2-6l-63.9 63.9c-3 3-7.1 4.7-11.3 4.7L352 176c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l63.9-63.9c8.1-8.1 5.2-21.8-6-24.2C388.7 1.1 378.5 0 368 0C288.5 0 224 64.5 224 144l0 .8 85.3 85.3c36-9.1 75.8 .5 104 28.7L429 274.5c49-23 83-72.8 83-130.5zM56 432a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                    </svg>
                                </span>
                                <select id="role" class="form-control" name="role" required>
                                    <option value="karyawan">Karyawan</option>
                                    <!-- Tambahkan opsi lain jika diperlukan -->
                                </select>
                            </div>
                            @error('role')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- End of Form -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-gray-800">{{ __('Register') }}</button>
                        </div>
                    </form>

                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <span class="fw-normal">
                            {{ __('Already have an account?') }}
                            <a href="{{ route('login') }}" class="fw-bold">{{ __('Login here') }}</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
