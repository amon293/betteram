@extends('layouts.master')

@section('content')

    @include('manufacture.partials.menu')

    <div class="ui segment">
        <form class="ui form" method="post" action="{{ route('manufacture.store') }}" enctype="multipart/form-data">

            <h4 class="ui dividing header">Create Manufacture</h4>

            {{ csrf_field() }}

            <div class="field">
                <label>Name</label>
                <div class="field">
                    <input type="text" name="name" placeholder="Manufacture Name">
                </div>
            </div>

            <button class="ui button" tabindex="0">Create</button>

        </form>
    </div>
@endsection
