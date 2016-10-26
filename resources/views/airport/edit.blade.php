@extends('layouts.master')

@section('content')

    @include('airport.partials.menu')

    <div class="ui segment">
        <form class="ui form" method="post" action="{{ route('airport.update', $airport) }}">

            <h4 class="ui dividing header">Create Airport</h4>

            {{ csrf_field() }}
            {{method_field('PUT')}}

            <div class="field">
                <label>Name</label>
                <div class="field">
                    <input type="text" name="name" placeholder="Airport Name" value="{{ $airport->name }}">
                </div>
            </div>

            <div class="field">
                <label>IATA</label>
                <div class="field">
                    <input type="text" name="iata" placeholder="Iata Code" value="{{ $airport->iata }}">
                </div>
            </div>

            <div class="field">
                <label>City</label>
                <div class="field">
                    <input type="text" name="city" placeholder="City" value="{{ $airport->city }}">
                </div>
            </div>

            <div class="field">
                <label>Country</label>
                <div class="field">
                    <input type="text" name="country" placeholder="Country" value="{{ $airport->country }}">
                </div>
            </div>

            <div class="field">
                <label>Coordinates</label>
                <div class="field">
                    <input type="text" name="coordinates" placeholder="Coordinates" value="{{ $airport->coordinates }}">
                </div>
            </div>

            <div class="field">
                <label>Fee</label>
                <div class="field">
                    <input type="number" name="fee" placeholder="Fee" value="{{ $airport->fee }}">
                </div>
            </div>

            <div class="field">
                <label>Latitude</label>
                <div class="field">
                    <input type="text" name="latitude" placeholder="Latitude" value="{{ $airport->latitude }}">
                </div>
            </div>

            <div class="field">
                <label>Longitude</label>
                <div class="field">
                    <input type="text" name="longitude" placeholder="Longitude" value="{{ $airport->longitude }}">
                </div>
            </div>

            <div class="field">
                <label>Size</label>
                <div class="field">
                    <input type="number" name="size" placeholder="Size" value="{{ $airport->size }}">
                </div>
            </div>

            <div class="field">
                <label>Runways</label>
                <div class="field">
                    <input type="number" name="runways" placeholder="Runways" value="{{ $airport->runways }}">
                </div>
            </div>

            <div class="field">
                <label>Timezone</label>
                <div class="field">
                    <input type="text" name="timezone" placeholder="Timezone" value="{{ $airport->timezone }}">
                </div>
            </div>

            <button class="ui button" tabindex="0">Update</button>
        </form>
    </div>
@endsection
