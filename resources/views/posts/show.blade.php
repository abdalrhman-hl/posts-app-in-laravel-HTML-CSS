@extends('layouts.app')
@section('title') show @endsection
@section('content')
        <div class="card" style="width: 80rem;">
            <div class="card-header">
                post info
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">{{$post->title}} </li>
                <li class="list-group-item">{{$post->description}}</li>
            </ul>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                post creator info
            </div>
            <div class="card-body">
                
                <h5 class="card-title">name : {{$post->user->name}}</h5>
                <p class="card-text">email : {{$post->user->email}}</p>
                <p class="card-text">created at {{$post->user->created_at}}</p>

</div>
        </div>
@endsection
