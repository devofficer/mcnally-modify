@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')
<div id="app">
    <app></app>
</div>
@endsection

@section('script')
        <!-- plugin js -->
        <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Calendar init -->
        <script src="{{ URL::asset('assets/js/pages/dashboard.init.js')}}"></script>
@endsection
