@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="container bg-gray-100 mx-auto p-6 rounded-lg max-w-screen-lg">

            {{-- content name --}}
            <div class="border-b-2 border-white mb-8 pb-4">
                <div class="text-center text-3xl py-2">Input Electronic Part</div>
            </div>

            {{-- start create form --}}
            <form method="POST" action="{{url('stock_inputs/store')}}" class="w-10/12">
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                            Name
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                    leading-tight focus:outline-none focus:bg-white cursor-not-allowed bg-gray-50"
                               id="name" name="name" type="text" placeholder="{{$part->name}}">
                    </div>
                    <div>
                        <input type="hidden" id="part_id" name="part_id" value="{{$part->id}}">
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
                               id="category" name="category" type="text" placeholder="{{$part->categories->name}}">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="supplier">
                            Supplier
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <select id="supplier" name="supplier" type="text" class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                        leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                            @foreach($suppliers as $supplier)
                                <option value=" {{$supplier->id}}">{{$supplier->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="supplier">
                            Storage
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <select id="storage" name="storage" type="text" class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                        leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                            @foreach($storages as $storage)
                                <option value=" {{$storage->id}}">{{$storage->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="stock">
                            Current Stock
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                    leading-tight focus:outline-none focus:bg-white cursor-not-allowed bg-gray-50"
                               id="stock" name="stock" type="text" placeholder="{{$part->stock}}">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="quantity">
                           Input Quantity
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700
                        leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                               id="quantity" name="quantity" type="number" value="1" min="1" max="100">
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
                    leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="description"
                              type="text" name="description" placeholder="Introduce a input description" rows="5"></textarea>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-3/4">

                    </div>
                    <div class="md:w-2/4">
                        <button value="submit" type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none
                    text-white font-bold py-2 px-6 rounded" onclick="return confirm('Confirm this input?')">
                            Input
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
