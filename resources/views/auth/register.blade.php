@extends('layouts.master')

@section('content')

    <div class="ui segment">

        <form class="ui form" method="POST" action="{{ route('register') }}">

            {{ csrf_field() }}

            <div class="field">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name">
            </div>

            <div class="field">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email">
            </div>

            <div class="field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password">
            </div>

            <div class="field">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password">
            </div>


            <button class="ui button" type="submit">Register</button>

        </form>

    </div>

@endsection
