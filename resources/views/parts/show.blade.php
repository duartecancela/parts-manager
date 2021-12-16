@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="container bg-gray-100 mx-auto p-6 rounded-lg max-w-screen-lg">

            {{-- content name --}}
            <div class="border-b-2 border-white mb-8 pb-4">
                <div class="text-center text-3xl py-2">Show Electronic Part </div>
            </div>

            {{-- start create form --}}
            <form method="POST" action="{{url('parts/edit')}}" class="w-10/12">
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                            Name
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                    leading-tight focus:outline-none focus:bg-white focus:border-purple-500 cursor-not-allowed"
                               id="name" name="name" type="text" placeholder="{{$part->name}}"  disabled>
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
                    leading-tight focus:outline-none focus:bg-white focus:border-purple-500 cursor-not-allowed"
                               id="category" name="category" type="text" placeholder="{{ $part->categories->name }}"  disabled>
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
                    leading-tight focus:outline-none focus:bg-white focus:border-purple-500 cursor-not-allowed"
                               id="stock" name="stock" type="text" placeholder="{{$part->stock}}

                            "  disabled>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">
                            Description
                        </label>
                    </div>
                    <div class="md:w-2/3">
                    <textarea class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                    leading-tight focus:outline-none focus:bg-white focus:border-purple-500 cursor-not-allowed" id="description"
                              type="text" name="description" placeholder="{{$part->description}}" rows="5" disabled></textarea>
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-5/6"></div>
                    <div class="md:w-2/3">
                        <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none
                    text-white font-bold py-2 px-6 rounded" type="button">
                            Edit
                        </button>
                    </div>
                    <div class="md:w-2/3 md:items-center">
                        <button class="shadow bg-red-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none
                    text-white font-bold py-2 px-6 rounded" type="button">
                            Delete
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
