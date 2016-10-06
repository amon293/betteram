@extends('layouts.master')

@section('content')

    @include('airplane.partials.menu')

    <div class="ui segment">
        <form class="ui form" method="post" action="{{ route('airplane.update',$airplane->id) }}" enctype="multipart/form-data">

            <h4 class="ui dividing header">Create Airplane</h4>

            {{ csrf_field() }}
            {{method_field('PUT')}}

            <div class="field">
                <label>Image</label>
                <div class="field">
                    <input type="file" name="{{$airplane->image}}">
                </div>
            </div>

            <div class="field">
                <label>Model</label>
                <div class="field">
                    <input type="text" name="model" placeholder="{{$airplane->model}}">
                </div>
            </div>

            <div class="field">
                <label>Price</label>
                <div class="field">
                    <input type="number" name="price" placeholder="{{$airplane->price}}">
                </div>
            </div>

            <div class="field">
                <label>Capacity</label>
                <div class="field">
                    <input type="number" name="capacity" placeholder="{{$airplane->capacity}}">
                </div>
            </div>

            <div class="field">
                <label>Manufacture</label>
                <div class="ui selection dropdown">
                    <input type="hidden" name="manufacturer_id">
                    <i class="dropdown icon"></i>
                    <div class="default text">Manufacture</div>
                    <div class="menu">
                        @foreach($manufacturers as $manufacture)
                            <div class="item" data-value="{{ $manufacture->id }}">{{ $manufacture->name }}</div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="field">
                <label>Size</label>
                <div class="ui selection dropdown">
                    <input type="hidden" name="size_class">
                    <i class="dropdown icon"></i>
                    <div class="default text">Size Class</div>
                    <div class="menu">
                        <div class="item" data-value="a">A</div>
                        <div class="item" data-value="b">B</div>
                        <div class="item" data-value="c">C</div>
                    </div>
                </div>
            </div>

            <div class="field">
                <label>Fuel</label>
                <div class="field">
                    <input type="text" name="fuel" placeholder="{{$airplane->fuel}}">
                </div>
            </div>

            <div class="field">
                <label>Cargo Load</label>
                <div class="field">
                    <input type="text" name="cargo_load" placeholder="{{$airplane->cargo_load}}">
                </div>
            </div>

            <div class="field">
                <label>Range</label>
                <div class="field">
                    <input type="text" name="range" placeholder="{{$airplane->range}}">
                </div>
            </div>

            <div class="field">
                <label>Cruise Speed</label>
                <div class="field">
                    <input type="text" name="cruise_speed" placeholder="{{$airplane->cruise_speed}}">
                </div>
            </div>

            <div class="field">
                <label>Engine</label>
                <div class="field">
                    <input type="text" name="engine" placeholder="{{$airplane->engine}}">
                </div>
            </div>

            <button class="ui button" tabindex="0">Edit</button>
        </form>
    </div>
@endsection