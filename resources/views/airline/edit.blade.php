@extends('layouts.master')

@section('content')

    @include('airline.partials.menu')

    <div class="ui segment">
        <form class="ui form" method="post" action="{{ route('airline.update',$airline->id) }}">

            <h4 class="ui dividing header">Edit Airline</h4>

            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="field">
                <label>Name</label>
                <div class="field">
                    <input type="text" name="name" placeholder="{{$airline->name}}">
                </div>
            </div>
            <button class="ui button" tabindex="0">edit</button>
        </form>
    </div>

@endsection
