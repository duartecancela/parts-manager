@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="container mx-auto bg-gray-100 p-6 rounded-lg max-w-screen-lg">
            {{-- content name --}}
            <div class="border-b-2 border-white mb-8 pb-4">
                <div class="text-center text-3xl py-2"> Electronics Parts List</div>
            </div>

            <div class="container flex justify-center mx-auto w-full">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="border-b border-gray-200 shadow">
                            <table>
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Name
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Category
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Description
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Stock
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        View
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Stock In
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Stock Out
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                @foreach($parts as $part)
                                    <tr>
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            <a href="/parts/show/{{ $part->id }}">{{ $part->name }}</a>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$part->categories->name}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$part->description}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$part->stock}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="/parts/show/{{ $part->id }}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">View</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="/stock_inputs/create/{{ $part->id }}" class="px-4 py-1 text-sm text-white bg-green-400 rounded">IN</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="px-4 py-1 text-sm text-white bg-red-400 rounded">OUT</a>
                                        </td>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


