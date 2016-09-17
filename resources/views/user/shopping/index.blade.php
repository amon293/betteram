@extends('layouts.master')

@section('content')


    <div class="ui piled massive center aligned padded segment">
        <h2 class="ui center aligned icon header">
            <i class="plane icon"></i>
            <div class="content">
                Shopping
                <div class="sub header">
                    Here you can find all planes that can be purchased or rent
                </div>
            </div>
        </h2>
    </div>

    <table class="ui celled table">
        <thead>
        <tr>
            <th>Details</th>
            <th>Engine</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($airplanes as $airplane)

            <tr>
                <td>
                    <h4 class="ui image header">
                        <img src="{{ $airplane->image }}" class="ui mini rounded image">
                        <div class="content">
                            {{ $airplane->model }}
                            <a href="#" class="sub header">
                                {{ $airplane->manufacturer->name }}
                            </a>
                        </div>
                    </h4>
                </td>
                <td>
                    {{ $airplane->engine }}
                </td>
                <td class="collapsing">
                    $ {{ $airplane->price }}
                </td>
                <td class="collapsing">
                    <div class="ui green labeled icon button">
                        <i class="shop icon"></i> Purchase
                    </div>
                </td>
            </tr>


        @empty
            <div class="ui segment">
                <p>No Airplane at the moment... please checkout later</p>
            </div>
        @endforelse
        </tbody>
    </table>

@endsection
