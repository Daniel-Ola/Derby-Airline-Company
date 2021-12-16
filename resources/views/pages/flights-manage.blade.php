@extends('../layout/' . $layout,
    [
        'breadcrumb' => [
            [
                'title' => 'Flight Management',
                'url' => route('flights.index')
            ],
            [
                'title' => $flight->flightnum,
                'url' => '#'
            ]
        ]
    ]
)

<?php
    $status = $flight->status;
    $disable_functions = ($status == 'completed' || $status == 'in-progress');
?>

@section('subhead')
    <title>Flight Management - {{ config('app.name') }}</title>
@endsection

@section('subcontent')

    @include('pages.includes.session-flash-message-notification')



    <div>

        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="#" class="font-medium">Select Crew Members</a>
                        <div class="text-gray-600 text-xs mt-0.5">Flight {{ $flight->flightnum }}</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <a href="?update_status=waiting" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-dark-5 ml-2 text-gray-500 zoom-in tooltip" title="Waiting">
                            @if($flight->status == 'waiting')
                                <i class="w-3 h-3" data-feather="check-circle"></i>
                            @else
                                <i class="w-3 h-3" data-feather="minus-circle"></i>
                            @endif
                        </a>
                        <a href="?update_status=in-progress" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-dark-5 ml-2 text-gray-500 zoom-in tooltip" title="In progress">
                            @if($flight->status == 'in-progress')
                                <i class="w-3 h-3" data-feather="check-circle"></i>
                            @else
                                <i class="w-3 h-3" data-feather="minus-circle"></i>
                            @endif
                        </a>
                        <a href="?update_status=completed" class="w-8 h-8 rounded-full flex items-center justify-center border dark:border-dark-5 ml-2 text-gray-500 zoom-in tooltip" title="Completed">
                            @if($flight->status == 'completed')
                                <i class="w-3 h-3" data-feather="check-circle"></i>
                            @else
                                <i class="w-3 h-3" data-feather="minus-circle"></i>
                            @endif
                        </a>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5 w-full">


                    <div class="grid grid-cols-12 gap-12 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5 border-dark-3">
                                <form action="{{ route('do.flights.manage', [$flight->flightnum]) }}" method="post">
                                    @csrf
                                    @if(! $has_crew_members)
                                        <div class="mt-3">
                                            <label for="crud-form-1" class="form-label">Pilot</label>
                                            <select data-placeholder="Select Pilot" class="tom-select w-full bg-danger" id="crud-form-1" name="empnum[]">
                                                @forelse($pilots as $pilot)
                                                    @php
                                                        $staff = $pilot->staffs;
                                                    @endphp
                                                    <option value="{{ $staff->empnum }}">{{ $staff->full_name }}</option>
                                                @empty
                                                    <option value="">There are no qualified pilots available</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <label for="crud-form-2" class="form-label">Co-Pilot</label>
                                            <select data-placeholder="Select Pilot" class="tom-select w-full bg-danger" id="crud-form-2"  name="empnum[]">
                                                @forelse($co_pilots as $co_pilot)
                                                    <option value="{{ $co_pilot->empnum }}">{{ $co_pilot->full_name }}</option>
                                                @empty
                                                    <option value="">There are no qualified co-pilots available</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <label for="crud-form-3" class="form-label">Other Crew Members</label>
                                            <select data-placeholder="Select Pilot" class="tom-select w-full bg-danger" id="crud-form-3" multiple name="empnum[]">
                                                @forelse($crews as $crew)
                                                    <option value="{{ $crew->empnum }}">{{ $crew->full_name . ' - ' . $crew->role->title }}</option>
                                                @empty
                                                    <option value>There are no qualified crew member available</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    @else
                                        <input type="hidden" name="has_crews" value="{{ $has_crew_members }}">
                                        <div class="mt-3">
                                            <label for="crud-form-3" class="form-label">Update Crew Members</label>
                                            <select data-placeholder="Update Crew Members" class="tom-select w-full bg-danger" id="crud-form-3" multiple name="empnum[]">
                                                @forelse($other_staffs as $staff)
                                                    <option value="{{ $staff->empnum }}" {{ ! in_array($staff->empnum, $crewMembers) ?: 'selected' }}>
                                                        {{ $staff->full_name . ' - ' . $staff->role->title }}
                                                    </option>
                                                @empty
                                                    <option>There are no qualified crew members available</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    @endif

                                    <div class="col-12 mt-3">
                                        <button class="btn btn-primary py-1 px-2 mr-2" type="submit" {{ $disable_functions ? 'disabled' : '' }}>Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="intro-y col-span-12 md:col-span-6 md:mt-3">
            <div class="box">
                <div class="flex flex-col lg:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <a href="#" class="font-medium">Book flight</a>
                        <div class="text-gray-600 text-xs mt-0.5">
                            Flight {{ $flight->flightnum }} -
                            {{ (! $on_board) ?
                                                'No Booking on this flight yet' :
                                                $on_board['passengers'] . ' of ' . $on_board['capacity'] . ' seats filled'
                            }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap lg:flex-nowrap items-center justify-center p-5 w-full">

                    <div class="grid grid-cols-12 gap-12 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <!-- BEGIN: Form Layout -->
                            <div class="intro-y box p-5 border-dark-3">
                                <form class="validate-forms" method="post" action="{{ route('flights.book', [$flight->flightnum]) }}">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::id() }}" name="user_id" readonly>
                                    <div class="input-form">
                                        <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Flight Number </label>
                                        <input id="validation-form-1" type="text" name="flightnum" class="form-control" value="{{ $flight->flightnum }}" readonly >
                                    </div>
                                    <div class="input-form">
                                        <label for="validation-form-11" class="form-label w-full flex flex-col sm:flex-row"> Surname </label>
                                        <input id="validation-form-11" type="text" name="surname" class="form-control" placeholder="Doe" required>
                                    </div>
                                    <div class="input-form mt-3">
                                        <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Name </label>
                                        <input id="validation-form-2" type="text" name="name" class="form-control" placeholder="John" required>
                                    </div>
                                    <div class="input-form mt-3">
                                        <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Phone Number </label>
                                        <input id="validation-form-3" type="phone" name="phone" class="form-control" placeholder="+44 7911 123456" required>
                                    </div>
                                    <div class="input-form mt-3">
                                        <label for="validation-form-30" class="form-label w-full flex flex-col sm:flex-row"> Email Address </label>
                                        <input id="validation-form-30" type="email" name="email" class="form-control" placeholder="user@mail.com" required>
                                    </div>
                                    <div class="input-form mt-3">
                                        <label for="validation-form-3-eta" class="form-label w-full flex flex-col sm:flex-row"> Passenger Address </label>
                                        <textarea id="validation-form-3-eta" class="form-control" name="address" placeholder="Type your address" minlength="10" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-5" {{ $disable_functions ? 'disabled' : '' }}>Continue</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-12 mt-3 float-right">
            <button class="btn btn-danger py-2 px-3 text-2xl mr-2" type="submit">
                Delete Flight Schedule
            </button>
        </div>



    </div>




@endsection
