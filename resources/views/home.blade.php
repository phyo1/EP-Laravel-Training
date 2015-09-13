@extends('app')

@section('content')

@foreach($posts as $post)
{{ $post }} <br/>
@endforeach

@endsection