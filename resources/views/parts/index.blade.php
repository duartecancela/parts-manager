@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="container mx-auto bg-gray-200 p-6 rounded-lg max-w-screen-lg">
           @foreach($parts as $part)
               <h1>{{ $part->name }}</h1>
            @endforeach
        </div>
    </div>
@endsection


