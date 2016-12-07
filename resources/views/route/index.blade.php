@extends('layouts.master')

@section('content')

    @include('route.partials.menu')

    <table class="ui celled table">
        <thead>
        <tr>
            <th>Name</th>
            <th>From Airport</th>
            <th>To Airport</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($routes as $route)
            <tr>
                <td>{{ $route->name }}</td>
                <td>{{ $route->fromAirport->name }}</td>
                <td>{{ $route->toAirport->name }}</td>
                <td class="collapsing">
                    <div class="ui small basic icon buttons">
                        <a href="{{ route('route.edit', $route) }}" class="ui button"><i class="edit icon"></i> Edit</a>
                        <form action="{{ route('route.delete', $route) }}" method="POST">
                        <button type='submit' class="ui button"><i class="x icon"></i> Delete</button>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="5">
                <div class="ui right floated pagination menu">
                   {{ $routes->links() }}
                </div>
            </th>
        </tr>
        </tfoot>
    </table>

@endsection
