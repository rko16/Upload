@extends('app')
@section('content')
    <div class="container mt-4 pt-4">
        <div class="row mt-4 pt-4">
            <h1 style="text-align: center;">Privacy Policy</h1>
            <p>{!! $privacydata->content !!}</p>
        </div>
    </div>
@endsection