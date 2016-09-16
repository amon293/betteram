@extends('layouts.master')

@section('content')

    @include('airplane.partials.menu')

    <div class="ui segment">
        <form class="ui form" method="post" action="{{ route('airplane.store') }}" enctype="multipart/form-data">

            <h4 class="ui dividing header">Create Airplane</h4>

            {{ csrf_field() }}

            <div class="field">
                <label>Image</label>
                <div class="field">
                    <input type="file" name="image">
                </div>
            </div>

            <div class="field">
                <label>Model</label>
                <div class="field">
                    <input type="text" name="model" placeholder="Airplane Model">
                </div>
            </div>

            <div class="field">
                <label>Price</label>
                <div class="field">
                    <input type="number" name="price" placeholder="Price">
                </div>
            </div>

            <div class="field">
                <label>Capacity</label>
                <div class="field">
                    <input type="number" name="capacity" placeholder="Capacity">
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
                    <input type="text" name="fuel" placeholder="Fuel">
                </div>
            </div>

            <div class="field">
                <label>Cargo Load</label>
                <div class="field">
                    <input type="text" name="cargo_load" placeholder="Cargo Load">
                </div>
            </div>

            <div class="field">
                <label>Range</label>
                <div class="field">
                    <input type="text" name="range" placeholder="Range">
                </div>
            </div>

            <div class="field">
                <label>Cruise Speed</label>
                <div class="field">
                    <input type="text" name="cruise_speed" placeholder="Cruise Speed">
                </div>
            </div>

            <div class="field">
                <label>Engine</label>
                <div class="field">
                    <input type="text" name="engine" placeholder="Engine">
                </div>
            </div>


            <button class="ui button" tabindex="0">Create</button>

        </form>
    </div>
@endsection
