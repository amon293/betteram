@extends('layouts.master')

@section('content')

    @include('route.partials.menu')

    <div class="ui segment">
        <form class="ui form" method="post" action="{{ route('route.store') }}">

            <h4 class="ui dividing header">Create Route</h4>

            {{ csrf_field() }}

            <div class="field">
                <label>Name</label>
                <div class="field">
                    <input type="text" name="name" placeholder="Route Name">
                </div>
            </div>

            <div class="field">
                <label>Airplane</label>
                <div class="ui right icon input field loading">
                    <input placeholder="Airplane" type="text" name="airplane" id="airplane">
                    <i class="search icon"></i>
                </div>
            </div>

            <div class="field">
                <label>From</label>
                <div class="ui right icon input field loading">
                    <input placeholder="From" type="text" name="from" id="from">
                    <i class="search icon"></i>
                </div>
            </div>



            <button class="ui button" tabindex="0">Create</button>
        </form>
    </div>

@endsection
