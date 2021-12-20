@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="container mx-auto bg-gray-100 p-6 rounded-lg max-w-screen-lg">
            {{-- content name --}}
            <div class="border-b-2 border-white mb-8 pb-4">
                <div class="text-center text-3xl py-2"> About</div>
            </div>

            <div class="container flex justify-center mx-auto w-full">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="bg-white shadow p-10 text-2xl">
                            <p>Electronic Parts Manager is an application prototype for
                                the web application development discipline of the Computer Engineering course at IPBEJA. </p>
                            <br>
                            <div class="flex items-center justify-center ">
                                <a target="_blank" href="https://www.ipbeja.pt/UnidadesOrganicas/ESTIG/Paginas/default.aspx">
                                    <img class="object-contain w-52"
                                         src="https://cms.ipbeja.pt/pluginfile.php/2/course/section/117/IPBejaESTIG.png?time=1533810374189">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




