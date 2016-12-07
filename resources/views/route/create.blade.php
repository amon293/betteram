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
                    <input type="text" id="name" name="name" placeholder="Route Name">
                </div>
            </div>

            <div class="field">
                <label>Airplane</label>
                <div class="ui fluid search selection dropdown">
                    <input type="hidden" name="airplane_id">
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
                    <input type="hidden" name="from_airport_id">
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
                    <input type="hidden" name="to_airport_id">
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
                <label>Price</label>
                <div class="ui right input field">
                    <input placeholder="Flight price" type="text" name="price" id="price">
                </div>
            </div>

            <button class="ui button" tabindex="0">Create</button>
        </form>
    </div>

@endsection
