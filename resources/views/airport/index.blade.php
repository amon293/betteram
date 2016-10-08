@extends('layouts.master')

@section('content')

    @include('airport.partials.menu')

    <table class="ui celled table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($airports as $airport)
            <tr>
                <td>{{ $airport->name }}</td>
                <td class="collapsing">
                    <div class="ui small basic icon buttons">
                        <a href="{{ route('airport.edit', $airport) }}" class="ui button"><i class="edit icon"></i> Edit</a>
                        <form action="{{ route('airport.delete', $airport) }}" method="POST">
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
            <th colspan="3">
                <div class="ui right floated pagination menu">
                   {{ $airports->links() }}
                </div>
            </th>
        </tr>
        </tfoot>
    </table>

@endsection
