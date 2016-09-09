@extends('layouts.master')

@section('content')

    <div class="ui segment">

        <form class="ui form" method="POST" action="{{ route('login') }}">

            {{ csrf_field() }}

            <div class="field">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input type="checkbox" tabindex="0" class="hidden" name="remember">
                    <label>Remember Me</label>
                </div>
            </div>

            <button class="ui button" type="submit">Login</button>

        </form>

    </div>
    <a href="{{ url('/password/reset') }}">
        Forgot Your Password?
    </a>
@endsection
