@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="container bg-gray-200 mx-auto p-6 rounded-lg max-w-screen-lg">
          <p class="text-3xl my-5">Create Electronic Part</p>

          <form class="w-full max-w-sm">
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                  Name
                </label>
              </div>
              <div class="md:w-2/3">
                <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 
                leading-tight focus:outline-none focus:bg-white focus:border-purple-500" 
                id="name" type="text" value="part name">
              </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                  <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="category">
                    Category
                  </label>
                </div>
                <div class="md:w-2/3">
                    <div class="inline-block relative w-64">
                        <select class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 
                        leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        @foreach($categories as $category)
                          <option>{{$category->name}}</option>
                        @endforeach
                        </select>
                      </div>
                </div>
              </div>
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="description">
                  Description
                </label>
              </div>
              <div class="md:w-2/3">
                <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 
                leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="description" 
                type="text" value="part description">
              </div>
            </div>
            <div class="md:flex md:items-center">
              <div class="md:w-1/3"></div>
              <div class="md:w-2/3">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none 
                text-white font-bold py-2 px-4 rounded" type="button">
                  Create
                </button>
              </div>
            </div>
          </form>
        </div>
    </div>
@endsection