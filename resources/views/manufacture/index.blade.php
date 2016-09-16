@extends('layouts.master')

@section('content')

    @include('manufacture.partials.menu')

    <table class="ui celled table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($manufactures as $manufacture)
            <tr>
                <td>{{ $manufacture->name }}</td>
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
