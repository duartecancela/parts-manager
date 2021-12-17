@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="container mx-auto bg-gray-200 p-6 rounded-lg max-w-screen-lg">
            {{-- content name --}}
            <div class="border-b-2 border-white mb-8 pb-4">
                <div class="text-center text-3xl py-2">Stock Inputs Parts List</div>
            </div>
            <div class="container flex justify-center mx-auto w-full">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="border-b border-gray-200 shadow">
                            <table class="w-auto
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Date
                                    </th>
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
                                        Supplier
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Storage
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Stock In
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white">
                                @foreach($stockInputs as $stockInput)
                                    <tr>
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$stockInput->created_at}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$stockInput->parts->name}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$stockInput->parts->categories->name}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$stockInput->description}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$stockInput->suppliers->name}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$stockInput->storages->name}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{$stockInput->quantity}}
                                        </td>
                                    </tr>
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
