@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="container mx-auto bg-gray-100 p-6 rounded-lg max-w-screen-lg">
            {{-- content name --}}
            <div class="border-b-2 border-white mb-8 pb-4">
                <div class="text-center text-3xl py-2">Electronic Part</div>
            </div>

            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                        <p class="font-bold">Success</p>
                        <p>The electronic part was successfully created.</p>
                    </div>
                </div>
                {{-- start show form --}}
                <form method="POST" action="{{url('parts/edit')}}" class="w-10/12">
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                                Name
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                    leading-tight focus:outline-none focus:bg-white cursor-not-allowed bg-gray-50"
                                   id="name" name="name" type="text" placeholder="{{$part->name}}" disabled>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="category">
                                Category
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                    leading-tight focus:outline-none focus:bg-white cursor-not-allowed bg-gray-50"
                                   id="category" name="category" type="text" placeholder="{{ $part->categories->name }}"
                                   disabled>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="stock">
                                Stock
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                    leading-tight focus:outline-none focus:bg-white cursor-not-allowed bg-gray-50"
                                   id="stock" name="stock" type="text" placeholder="{{$part->stock}}

                                " disabled>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                   for="description">
                                Description
                            </label>
                        </div>
                        <div class="md:w-2/3">
                    <textarea class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                    leading-tight focus:outline-none focus:bg-white cursor-not-allowed bg-gray-50" id="description"
                              type="text" name="description" placeholder="{{$part->description}}" rows="5"
                              disabled></textarea>
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-5/6">
                        </div>
                        <div class="md:w-2/3">
                            <a href="/parts/edit/{{ $part->id }}" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none
                    text-white font-bold py-2 px-6 rounded">Edit</a>
                        </div>
                        <div class="md:w-2/3 md:items-center">
                            <a href="/parts/create" class="shadow bg-green-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none
                    text-white font-bold py-2 px-6 rounded" onclick="return ">Add New</a>
                        </div>
                    </div>
                    <br>
                    <br>
                </form>
            </div>

        </div>
    </div>
@endsection
