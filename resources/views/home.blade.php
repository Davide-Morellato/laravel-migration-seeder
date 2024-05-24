@extends('layouts.app')

@section('title', 'Trains')

@section('content')
<section class="py-3">
    <div class="container">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company</th>
                        <th scope="col">Departure Station</th>
                        <th scope="col">Arrival Station</th>
                        <th scope="col">Departure Time</th>
                        <th scope="col">Arrival Time</th>
                        <th scope="col">Train Code</th>
                        <th scope="col">Coaches Numbers</th>
                        <th scope="col">On Time</th>
                        <th scope="col">Deleted</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trains as $train)
                    <tr>
                        <th scope="row">{{$train->id}}</th>
                        <td>{{$train->company}}</td>
                        <td>{{$train->departure_trains_station}}</td>
                        <td>{{$train->arrival_trains_station}}</td>
                        <td>{{$train->departure_time}}</td>
                        <td>{{$train->arrival_time}}</td>
                        <td>{{$train->train_code}}</td>
                        <td>{{$train->coaches_numbers}}</td>
                        <td>{{$train->on_time}}</td>
                        <td>{{$train->deleted}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection