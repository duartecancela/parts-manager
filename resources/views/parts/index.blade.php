@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="container mx-auto bg-gray-200 p-6 rounded-lg max-w-screen-lg">
            {{-- content name --}}
            <div class="border-b-2 border-white mb-8 pb-4">
                <div class="text-center text-3xl py-2">List Electronics Parts</div>
            </div>

           @foreach($parts as $part)
               <h1>{{ $part->name }}</h1>
            @endforeach
        </div>
    </div>
@endsection


