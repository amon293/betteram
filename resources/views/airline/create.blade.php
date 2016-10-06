@extends('layouts.master')

@section('content')

    @include('airline.partials.menu')

    <div class="ui segment">
        <form class="ui form" method="post" action="{{ route('airline.store') }}">

            <h4 class="ui dividing header">Create Airline</h4>

            {{ csrf_field() }}

            <div class="field">
                <label>Name</label>
                <div class="field">
                    <input type="text" name="name" placeholder="Airline Name">
                </div>
            </div>
            <button class="ui button" tabindex="0">Create</button>
        </form>
    </div>

@endsection
