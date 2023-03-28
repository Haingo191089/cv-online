@extends('layouts.main')

@section('page_head')
    @vite(['resources/scss/login_page.scss'])
@endsection

@section('content')
    <div id="login-page" class="d-flex justify-content-center align-items-center h-100-vh">
        <form method="POST" action="/admin/login" class="card card-body">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('login_page.email'); }}</label>
                <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                @error('email')
                    <small id="err-email" class="text-danger mt-2 d-block">{{ __("errors.$message") }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('login_page.password'); }}</label>
                <input type="password" name="password" class="form-control" id="password">
                @error('password')
                    <small id="err-email" class="text-danger mt-2 d-block">{{ __("errors.$message") }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{ __('login_page.login'); }}</button>
        </form>
    </div>
@endsection