@extends('layouts.master')

@section('content')

    <div class="ui segments">

        <div class="ui piled massive center aligned padded segment">
            <h2 class="ui center aligned icon header">
                <i class="settings icon"></i>
                <div class="content">
                    Welcome to the... game...
                    <div class="sub header">
                        to continue.. you have to create an airline
                    </div>
                </div>
            </h2>
        </div>

        <div class="ui secondary segment">
            <form class="ui  form" method="post" action="{{ route('user.airline.store') }}">

                {{ csrf_field() }}

                <div class="field">
                    <label>Your Airline Name</label>
                    <div class="field">
                        <input type="text" name="name" placeholder="Airline Name">
                    </div>
                </div>

                <button class="ui green button" tabindex="0">Create</button>

            </form>
        </div>
    </div>
@endsection
