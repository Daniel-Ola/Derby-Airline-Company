@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - {{ config('app.name') }}</title>
@endsection

@section('subcontent')

    @include('pages.includes.session-flash-message-notification')


    <div class="col-span-12 lg:col-span-8 xl:col-span-6 mt-5">
        <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                Flight Report
            </h2>

            <a href="{{ route('flights.create') }}" class="btn btn-primary shadow-md sm:ml-auto mt-3 sm:mt-0 sm:w-auto">
                Add Flight Schedule
            </a>
        </div>

        <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">

            @forelse($flights as $flight)
                @php
                    $airplane = $flight->airplane;
                    $crewmembers = $flight->crewmembers;
                @endphp
                <div class="report-box-2 intro-y mt-12 sm:mt-5">
                    <div class="box sm:flex">
                        <div class="px-8 py-12 flex flex-col justify-center flex-none">

                            <div class="w-50">
                                @include('pages.includes.flight-icon')
                            </div>

                            <div class="relative text-smalls text-big font-medium mt-12 pl-4 ml-0.5">
                                {{ $flight->flightnum }}
                            </div>
                            <div class="mt-4 text-gray-600 dark:text-gray-600">
                                <div class="mt-5">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                                        <span class="truncate">{{ $flight->flight_status }}</span>
                                    </div>
{{--                                    <div class="flex items-center mt-4">--}}
{{--                                        <div class="w-2 h-2 bg-theme-21 rounded-full mr-3"></div>--}}
{{--                                        <span class="truncate">31 - 50 Years old</span>--}}
{{--                                        <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>--}}
{{--                                        <span class="font-medium xl:ml-auto">33%</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex items-center mt-4">--}}
{{--                                        <div class="w-2 h-2 bg-theme-15 rounded-full mr-3"></div>--}}
{{--                                        <span class="truncate">&gt;= 50 Years old</span>--}}
{{--                                        <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>--}}
{{--                                        <span class="font-medium xl:ml-auto">10%</span>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <a href="{{ route('flights.manage', [$flight->flightnum]) }}" class="btn btn-primary relative justify-start rounded-full mt-12 justify-center">
                                Manage
                            </a>
                        </div>
                        <div class="px-8 py-12 flex flex-col justify-center flex-1 border-t sm:border-t-0 sm:border-l border-gray-300 dark:border-dark-5 border-dashed">
                            <div class="text-gray-600 dark:text-gray-600 text-xs">ORIGIN</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $flight->origin }}</div>
                            </div>
                            <div class="text-gray-600 dark:text-gray-600 text-xs mt-5">DESTINATION</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $flight->dest }}</div>
                            </div>
                            <div class="text-gray-600 dark:text-gray-600 text-xs mt-5">AIRPLANE</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $airplane->manufacturer . ' ' . $airplane->numser }}</div>
                            </div>
                            <div class="text-gray-600 dark:text-gray-600 text-xs mt-5">CREW</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $crewmembers?->count() }}</div>
                            </div>
                            <div class="text-gray-600 dark:text-gray-600 text-xs mt-5">PASSENGERS ON-BOARD</div>
                            <div class="mt-1.5 flex items-center">
                                <div class="text-base">{{ $flight->passengers->count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty

                <div class="report-box-2 intro-y mt-12 sm:mt-5 col-start-2 col-span-1">
                    <div class="box sm:flex">
                        <div class="px-8 py-12 flex flex-col justify-center flex-1 items-stretch">

                            <div class="grid grid-cols-3 w-1/2">
                                <div class="col-start-3 w-full justify-items-center">
                                    @include('pages.includes.flight-icon')
                                </div>
                            </div>

                            <div class="relative text-3xl font-medium mt-12 pl-4 ml-0.5">
                                No Flight Schedule
                            </div>
                            <a href="{{ route('flights.create') }}" class="btn btn-outline-secondary relative justify-start rounded-full mt-12">
                                Create Flight Schedule
                            </a>
                        </div>
                    </div>
                </div>

            @endforelse

            <div class="mt-5">
                {{ $flights->links() }}
            </div>

        </div>

    </div>







@endsection
