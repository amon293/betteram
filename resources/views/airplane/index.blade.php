@extends('layouts.master')

@section('content')

    @include('airplane.partials.menu')

    <table class="ui celled table">
        <thead>
        <tr>
            <th>Image</th>
            <th>Model</th>
            <th>Manufacturer</th>
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
                <td>
                    <a href="{{route('manufactures')}}">{{ $airplane->manufacturer->name }}</a>
                </td>
                <td>{{ $airplane->price }}</td>
                <td>{{ $airplane->size_class }}</td>
                <td>{{ $airplane->fuel }}</td>
                <td>{{ $airplane->cargo_load }}</td>
                <td>{{ $airplane->range }}</td>
                <td>{{ $airplane->cruise_speed }}</td>
                <td>{{ $airplane->engine }}</td>
                <td class="collapsing">
                    <div class="ui small basic icon buttons">

                        <a href="{{route('airplane.edit',$airplane->id)}}"  class="ui button"><i class="edit icon"></i> Edit</a>

                        <form action="{{route('airplane.delete',$airplane->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" class="ui button"><i class="x icon"></i> Delete</button>
                        </form>

                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="11">
                <div class="ui right floated pagination menu" onclick="alert('to do')">
                   {{--{{$airplanes->links()}}--}}
                </div>
            </th>
        </tr>
        </tfoot>
    </table>

@endsection
