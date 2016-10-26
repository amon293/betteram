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
                <label>IATA</label>
                <div class="field">
                    <input type="text" name="iata" placeholder="Iata Code">
                </div>
            </div>

            <div class="field">
                <label>City</label>
                <div class="field">
                    <input type="text" name="city" placeholder="City">
                </div>
            </div>

            <div class="field">
                <label>Country</label>
                <div class="field">
                    <input type="text" name="country" placeholder="Country">
                </div>
            </div>

            <div class="field">
                <label>Coordinates</label>
                <div class="field">
                    <input type="text" name="coordinates" placeholder="Coordinates">
                </div>
            </div>

            <div class="field">
                <label>Fee</label>
                <div class="field">
                    <input type="number" name="fee" placeholder="Fee">
                </div>
            </div>

            <div class="field">
                <label>Latitude</label>
                <div class="field">
                    <input type="text" name="latitude" placeholder="Latitude">
                </div>
            </div>

            <div class="field">
                <label>Longitude</label>
                <div class="field">
                    <input type="text" name="longitude" placeholder="Longitude">
                </div>
            </div>

            <div class="field">
                <label>Size</label>
                <div class="field">
                    <input type="number" name="size" placeholder="Size">
                </div>
            </div>

            <div class="field">
                <label>Runways</label>
                <div class="field">
                    <input type="number" name="runways" placeholder="Runways">
                </div>
            </div>

            <div class="field">
                <label>Timezone</label>
                <div class="field">
                    <input type="text" name="timezone" placeholder="Timezone">
                </div>
            </div>

            <button class="ui button" tabindex="0">Create</button>
        </form>
    </div>
@endsection
