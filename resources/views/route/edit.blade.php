@extends('layouts.master')

@section('content')

    @include('route.partials.menu')

    <div class="ui segment">
        <form class="ui form" method="post" action="{{ route('route.update', $route) }}">

            <h4 class="ui dividing header">Edit Route</h4>

            {{ csrf_field() }}
            {{method_field('PUT')}}

            <div class="field">
                <label>Name</label>
                <div class="field">
                    <input type="text" id="name" name="name" placeholder="Route Name" value="{{ $route->name }}">
                </div>
            </div>

            <div class="field">
                <label>Airplane</label>
                <div class="ui fluid search selection dropdown">
                    <input type="hidden" name="airplane_id" value="{{ $route->airplane->id }}">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select Airplane</div>
                    <div class="menu">
                        @foreach($airplanes as $airplane)
                            <div class="item" data-value="{{ $airplane->id }}">{{ $airplane->model }}</div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="field">
                <label>From</label>
                <div class="ui fluid search selection dropdown">
                    <input type="hidden" name="from_airport_id" value="{{ $route->fromAirport->id }}" id="from_airport_id">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select Airport</div>
                    <div class="menu">
                        @foreach($airports as $airport)
                            <div class="item" data-value="{{ $airport->id }}">{{ $airport->name }}</div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="field">
                <label>To</label>
                <div class="ui fluid search selection dropdown">
                    <input type="hidden" name="to_airport_id" value="{{ $route->toAirport->id }}" id="to_airport_id">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select Airport</div>
                    <div class="menu">
                        @foreach($airports as $airport)
                            <div class="item" data-value="{{ $airport->id }}">{{ $airport->name }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Distance</label>
                <div class="ui right input field">
                    <input type="text" id="distance" disabled>
                </div>
            </div>

            <div class="field">
                <label>Speed</label>
                <div class="ui right input field">
                    <input type="text" id="speed" disabled>
                </div>
            </div>

            <div class="field">
                <label>Time</label>
                <div class="ui right input field">
                    <input type="text" id="time" disabled>
                </div>
            </div>


            <div class="field">
                <label>Economy Class</label>
                <div class="ui right input field">
                    <input placeholder="Economy Class Price" type="text" name="price" id="economy_price" value="{{ $route->economy_price }}">
                </div>
            </div>

            <button class="ui button" tabindex="0">Update</button>
        </form>
    </div>

@endsection

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDrPlRO82vN0Zk3wjY-sk79l7Kq0-kWZw&libraries=geometry" async defer></script>

@endpush