@extends('layouts.master')

@section('content')

    @include('airplane.partials.menu')

    <table class="ui celled table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Model</th>
            <th>Price</th>
            <th>Size Class</th>
            <th>Fuel</th>
            <th>Cargo Load</th>
            <th>Range</th>
            <th>Cruise Speed</th>
            <th>Engine</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($airplanes as $airplane)
            <tr>
                <td class="collapsing">
                    <img class="ui medium rounded image" src="{{ $airplane->image }}">
                </td>
                <td>{{ $airplane->model }}</td>
                <td>{{ $airplane->price }}</td>
                <td>{{ $airplane->size_class }}</td>
                <td>{{ $airplane->fuel }}</td>
                <td>{{ $airplane->cargo_load }}</td>
                <td>{{ $airplane->range }}</td>
                <td>{{ $airplane->cruise_speed }}</td>
                <td>{{ $airplane->engine }}</td>
                <td class="collapsing">
                    <div class="ui small basic icon buttons" onclick="alert('to do')">
                        <button class="ui button"><i class="edit icon"></i> Edit</button>
                        <button class="ui button"><i class="x icon"></i> Delete</button>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="10">
                <div class="ui right floated pagination menu" onclick="alert('to do')">
                    <a class="icon item">
                        <i class="left chevron icon"></i>
                    </a>
                    <a class="item">1</a>
                    <a class="item">2</a>
                    <a class="item">3</a>
                    <a class="item">4</a>
                    <a class="icon item">
                        <i class="right chevron icon"></i>
                    </a>
                </div>
            </th>
        </tr>
        </tfoot>
    </table>

@endsection
