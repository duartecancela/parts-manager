@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="container mx-auto bg-gray-200 p-6 rounded-lg max-w-screen-lg">
            {{-- content name --}}
            <div class="border-b-2 border-white mb-8 pb-4">
                <div class="text-center text-3xl py-2"> Electronics Parts List</div>
            </div>

            <table class="table-fixed mx-auto w-full">
                <thead>
                <tr>
                    <th class="w-40 mx-auto">Name</th>
                    <th>Category</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($parts as $part)
                        <tr>
                            <td class="text-center"> {{ $part->name }} </td>
                            <td class="text-center">
                                @foreach($categories as $category)
                                    @if($category->id == $part->category_id)
                                        {{ $category->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-center"> {{ $part->description }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
@endsection


