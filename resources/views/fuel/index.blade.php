@extends('layouts.master')

@section('content')
    <canvas id="myChart" data-content="{{ json_encode($fuel) }}" width="400" height="100"></canvas>
@endsection

@push('scripts')
<script src="{{ asset('js/pages/fuel.js') }}"></script>
@endpush
