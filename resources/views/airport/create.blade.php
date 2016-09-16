@extends('layouts.master')

@section('content')

    @include('airport.partials.menu')

    <div class="ui segment">
        <form class="ui form" method="post" action="{{ route('airport.store') }}">

            <h4 class="ui dividing header">Create Airport</h4>

            {{ csrf_field() }}

            <div class="field">
                <label>Name</label>
                <div class="field">
                    <input type="text" name="name" placeholder="Airport Name">
                </div>
            </div>

            <div class="field">
                <label>Fee</label>
                <div class="field">
                    <input type="number" name="fee" placeholder="Fee">
                </div>
            </div>

            <div class="field">
                <label>Size</label>
                <div class="field">
                    <input type="number" name="size" placeholder="Size">
                </div>
            </div>

            <div class="field">
                <label>Coordinates</label>
                <div class="field">
                    <input type="text" name="coordinates" placeholder="Coordinates">
                </div>
            </div>

            <div class="field">
                <label>IATA</label>
                <div class="field">
                    <input type="text" name="iata" placeholder="Iata Code">
                </div>
            </div>

            <button class="ui button" tabindex="0">Create</button>
        </form>
    </div>
@endsection
