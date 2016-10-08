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
                    <input type="text" name="name" placeholder="{{ $airport->name }}">
                </div>
            </div>

            <div class="field">
                <label>Fee</label>
                <div class="field">
                    <input type="number" name="fee" placeholder="{{ $airport->fee }}">
                </div>
            </div>

            <div class="field">
                <label>Size</label>
                <div class="field">
                    <input type="number" name="size" placeholder="{{ $airport->size }}">
                </div>
            </div>

            <div class="field">
                <label>Coordinates</label>
                <div class="field">
                    <input type="text" name="coordinates" placeholder="{{ $airport->coordinates }}">
                </div>
            </div>

            <div class="field">
                <label>IATA</label>
                <div class="field">
                    <input type="text" name="iata" placeholder="{{ $airport->iata }}">
                </div>
            </div>

            <button class="ui button" tabindex="0">Update</button>
        </form>
    </div>
@endsection
