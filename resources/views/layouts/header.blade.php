<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800">
        <div class="container mx-auto flex flex-wrap items-center justify-between max-w-screen-lg">
            <a href="{{route('home')}}" class="flex">
                <svg class="h-10 mr-3" viewBox="0 0 52 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.87695 53H28.7791C41.5357 53 51.877 42.7025 51.877 30H24.9748C12.2182 30 1.87695 40.2975 1.87695 53Z" fill="#76A9FA"/><path d="M0.000409561 32.1646L0.000409561 66.4111C12.8618 66.4111 23.2881 55.9849 23.2881 43.1235L23.2881 8.87689C10.9966 8.98066 1.39567 19.5573 0.000409561 32.1646Z" fill="#A4CAFE"/><path d="M50.877 5H23.9748C11.2182 5 0.876953 15.2975 0.876953 28H27.7791C40.5357 28 50.877 17.7025 50.877 5Z" fill="#1C64F2"/></svg>
                <span class="self-center text-lg font-semibold whitespace-nowrap dark:text-white">Electronics Parts Manager</span>
            </a>
            <button data-collapse-toggle="mobile-menu" type="button" class="md:hidden ml-3 text-gray-500 hover:bg-gray-100focus:outline-none focus:ring-2 focus:ring-gray-200 rounded-lg text-sm p-2 inline-flex items-center dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="hidden md:block w-full md:w-auto" id="mobile-menu">
                <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-base md:font-medium">
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="text-gray-700 hover:bg-gray-50
                        border-b border-gray-100 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:hover:text-white
                        md:p-0 font-medium flex items-center justify-between w-full md:w-auto dark:text-gray-400
                        dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700
                        md:hover:text-blue-700">Manage Parts <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100
                        rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('parts.create')}}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2
                                    dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Create</a>
                                </li>
                                <li>
                                    <a href="{{ route('parts') }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2
                                    dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">List</a>
                                </li>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('stock_inputs') }}" class="text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent
                        md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white
                        dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Stock In</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent
                        md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white
                        dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Stock Out</a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-700 hover:bg-gray-50 md:hover:bg-transparent md:border-0 block pl-3
                        pr-4 py-2 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700
                        dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                </ul>
            </div>
        </div>
</nav>
