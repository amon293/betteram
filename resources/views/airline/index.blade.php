@extends('layouts.master')

@section('content')

    @include('airline.partials.menu')

    <table class="ui celled table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($airlines as $airline)
            <tr>
                <td>{{ $airline->name }}</td>
                <td class="collapsing">
                    <div class="ui small basic icon buttons">
                        <a href="{{route('airline.edit',$airline->id)}}" class="ui button"><i class="edit icon"></i> Edit</a>
                        <form action="{{route('airline.delete',$airline->id)}}" method="POST">
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
                    {{$airlines->links()}}
                </div>
            </th>
        </tr>
        </tfoot>
    </table>


@endsection
