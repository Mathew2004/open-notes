@extends('layouts.main')

@push('title')
    Add Notes
@endpush


@section('main-section')
<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #000;
        margin: 0;
    }

    .login-card {
        background: #fff;
        padding: 2rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
    }

    .login-card h2 {
        margin-bottom: 1.5rem;
        color: #333;
    }

    .google-btn {
        display: inline-block;
        margin-top: 1rem;
    }
</style>

<div class="login-container">
    <div class="login-card">
        <h2>Sign In</h2>
        <div class="google-btn">
            <a href="{{url('/auth/google')}}">
                <div class="btn btn-primary">
                   
                    Sign In With Google
                </div>
            </a>
        </div>
    </div>
</div>

@endsection