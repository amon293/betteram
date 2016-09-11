@extends('layouts.master')

@section('content')
    <div class="ui segment">
        <form class="ui form">
            <h4 class="ui dividing header">Create Airline</h4>
            <div class="field">
                <label>Name</label>
                <div class="field">
                    <input type="text" name="shipping[first-name]" placeholder="First Name">
                </div>
            </div>
            <button class="ui button" tabindex="0">Create Airline</button>
        </form>
    </div>
@endsection
