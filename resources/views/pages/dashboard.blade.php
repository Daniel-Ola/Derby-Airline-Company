@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - {{ config('app.name') }}</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 2xl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            General Report
                        </h2>
                        <a href="" class="ml-auto flex items-center text-theme-30 dark:text-theme-25"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="navigation" class="report-box__icon text-theme-24 dark:text-theme-25"></i>
                                        <div class="ml-auto">
                                            <div class="report-box__indicator bg-theme-20 tooltip cursor-pointer" title="<?php echo $flights->count() ?> flight(s) this month"> <?php echo $flights->count() ?> <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                        </div>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?php echo $flights->count() ?></div>
                                    <div class="text-base text-gray-600 mt-1">Flights</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="user-check" class="report-box__icon text-theme-29"></i>
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6"><?php echo $staff_count; ?></div>
                                    <div class="text-base text-gray-600 mt-1">Staffs</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="users" class="report-box__icon text-theme-15"></i>
{{--                                        <div class="ml-auto">--}}
{{--                                            <div class="report-box__indicator bg-theme-20 tooltip cursor-pointer" title="12% Higher than last month"> 12% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $passengers->count() }}</div>
                                    <div class="text-base text-gray-600 mt-1">Passengers</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="navigation" class="report-box__icon text-theme-20"></i>
{{--                                        <div class="ml-auto">--}}
{{--                                            <div class="report-box__indicator bg-theme-20 tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-feather="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="text-3xl font-medium leading-8 mt-6">{{ $airplanes->count() }}</div>
                                    <div class="text-base text-gray-600 mt-1">Airplanes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <!-- BEGIN: Weekly Best Sellers -->
                <div class="col-span-12 xl:col-span-4 mt-6">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Weekly Pilot Ratings
                        </h2>
                    </div>
                    <div class="mt-5">
                        @forelse($pilots as $pilot)
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
{{--                                        <img alt="Tinker Tailwind HTML Admin Template" src="dist/images/profile-8.jpg">--}}
                                        <i data-feather="user" class="report-box__icon text-theme-15"></i>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">{{ $pilot->name . ' ' . $pilot->surname }}</div>
                                        <div class="text-gray-600 text-xs mt-0.5">28 May 2021</div>
                                    </div>
                                    <div class="py-1 px-2 rounded-full text-xs bg-theme-20 text-white cursor-pointer font-medium">137 Sales</div>
                                </div>
                            </div>
                        @empty
                            No Pilots
                        @endforelse
{{--                        <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-32 dark:border-dark-5 text-theme-33 dark:text-gray-600">View More</a>--}}
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 mt-6">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
{{--                            Flights in Progress--}}
                            Active Flight Schedules
                        </h2>
                    </div>
                    <div class="mt-5">
                        @forelse($activeFlights as $flight)
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
{{--                                        <img alt="Flight Schedule" src="dist/images/profile-8.jpg">--}}
                                        <i data-feather="navigation" class="report-box__icon text-theme-24 dark:text-theme-25"></i>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">
                                            {{ $flight->origin . ' to ' . $flight->dest }}
{{--                                            <i>{{ $flight->ORIGIN }}</i> to <i>{{ $flight->DEST }}</i>--}}
                                        </div>
                                        <div class="text-gray-600 text-xs mt-0.5">{{ $flight->status }}</div>
                                    </div>
                                    <div
                                        class="py-1 px-2 rounded-full text-xs bg-theme-20 text-white cursor-pointer font-medium truncate"
                                        title="{{$flight->passengers->count()}} Passengers">
                                        {{$flight->passengers->count()}} Passengers
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-secondary show mb-2" role="alert">No active flight list at this time</div>
                        @endforelse
{{--                        <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-32 dark:border-dark-5 text-theme-33 dark:text-gray-600">View More</a>--}}
                    </div>
                </div>
                <div class="col-span-12 xl:col-span-4 mt-6">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Available Airplanes
                        </h2>
                    </div>

                    <div class="mt-5">
                        @forelse($airplanes as $plane)
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
    {{--                                    <img alt="Tinker Tailwind HTML Admin Template" src="dist/images/profile-8.jpg">--}}
                                        <i data-feather="navigation" class="report-box__icon text-theme-24 dark:text-theme-25"></i>
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">{{ $plane->manufacturer }}</div>
                                        <div class="text-gray-600 text-xs mt-0.5">{{ $plane->model_number }}</div>
                                    </div>
                                    <div class="py-1 px-2 rounded-full text-xs bg-theme-20 text-white cursor-pointer font-medium">137 Sales</div>
                                </div>
                            </div>
                        @empty
                            none
                        @endforelse
{{--                        <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-32 dark:border-dark-5 text-theme-33 dark:text-gray-600">View More</a>--}}
                    </div>
                </div>
                <!-- END: Weekly Best Sellers -->
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Passengers On-Board
                        </h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <button class="btn box flex items-center text-gray-700 dark:text-gray-300"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </button>
                            <button class="ml-3 btn box flex items-center text-gray-700 dark:text-gray-300"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF </button>
                        </div>
                    </div>
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                            <tr>
                                <th class="whitespace-nowrap">DISPLAY PICTURE</th>
                                <th class="whitespace-nowrap">NAME</th>
                                <th class="text-center whitespace-nowrap">PHONE</th>
                                <th class="text-center whitespace-nowrap">FLIGHT NUMBER</th>
                                <th class="text-center whitespace-nowrap">ETA</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($passengersOnBoard as $passenger_on_board)
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
{{--                                                <img alt="Tinker Tailwind HTML Admin Template" class="tooltip rounded-full" src="dist/images/preview-10.jpg" title="Uploaded at 28 May 2021">--}}
                                                <i data-feather="user-check" class="report-box__icon text-theme-29"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-nowrap">{{ $passenger_on_board->name . ' ' . $passenger_on_board->surname }}</a>
                                        <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">Passenger</div>
                                    </td>
                                    <td class="text-center">{{ $passenger_on_board->phone }}</td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-theme-20"> {{ $passenger_on_board->flightnum }} </div>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="#">
                                                {{ \Carbon\Carbon::parse($passenger_on_board->created_at)->toDateTimeString() }}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty

                                <tr class="intro-x">
                                    <td colspan="5" class="w-100">
                                        There are no passengers on board
                                    </td>
                                </tr>

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>
    </div>
@endsection
