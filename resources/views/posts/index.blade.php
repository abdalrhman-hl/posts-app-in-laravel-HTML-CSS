@extends('layouts.app')
@section('title') index
@endsection
@section('content')
<div class="text-center">

  <a href="{{route('posts.create')}}" class="btn btn-success">create post</a>
</div>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">posted by</th>
      <th scope="col">created at</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr>
      <th>{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->user->name}}</td>
      <td>{{$post->created_at->format('Y-m-d')}}</td>
      <td>
        <a href="{{route('posts.show',$post->id)}}" class="btn btn-info">view</a>
        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">edit</a>
        <form style="display: inline;" method="POST" action="{{route('posts.destroy', $post->id)}}">
          @csrf
          @method('DELETE')
          <button type="submit" href="#" class="btn btn-danger">delete</button>
        </form>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
@endsection