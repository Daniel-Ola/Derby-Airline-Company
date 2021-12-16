<?php
use App\Helper;
$helperClass = new Helper();

?>
@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - {{ config('app.name') }}</title>
@endsection

@section('subcontent')

    @include('pages.includes.session-flash-message-notification')



    @if($success = Session::get('success'))
        <div id="success-notification-content" class="toastify-content flex" >
            <i class="text-theme-20" data-feather="check-circle"></i>
            <div class="ml-4 mr-4">
                @foreach ($success as $msg)
                    <div class="font-medium">{{ $msg }}</div>
                @endforeach
                <div class="text-gray-600 mt-1"> Nicely Done Buddy. </div>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div id="failed-notification-content" class="toastify-content flex" >
            <i class="text-theme-21" data-feather="x-circle"></i>
            <div class="ml-4 mr-4">
                @foreach ($errors->all() as $error)
                    <div class="font-medium">{{ $error }}</div>
                @endforeach
                <div class="text-gray-600 mt-1"> Please check the field form. </div>
            </div>
        </div>
    @endif

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Flight Schedule
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Validation -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">
                        Registration Form
                    </h2>
                </div>
                <div id="form-validations" class="p-5">

                    <div class="preview">
                        <!-- BEGIN: Validation Form -->
                        <form class="validate-forms" method="post" action="{{ route('flights.store') }}">
                            @csrf
                            <div class="input-form">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Flight Number </label>
                                <input id="validation-form-1" type="text" name="flightnum" class="form-control" value="{{ $flightnum }}" readonly >
                            </div>
                            <div class="input-form">
                                <label for="validation-form-11" class="form-label w-full flex flex-col sm:flex-row"> Flight Origin </label>
                                <input id="validation-form-11" type="text" name="origin" class="form-control" placeholder="Derby" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Flight Destination </label>
                                <input id="validation-form-2" type="text" name="dest" class="form-control" placeholder="Derby" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Take-Off </label>
                                <div class="relative mx-auto">
                                    <div class="inline-flex border rounded-md p-2 w-1/2">
                                        <select name="takeoff[]" id="" class="px-2 outline-none appearance-none bg-transparent">
                                            @for($h=0; $h <= 12; $h++)
                                                <option value="{{ $h }}">{{ $helperClass->formatNumberLength($h) }}</option>
                                            @endfor
                                        </select>
                                        <span class="px-2">:</span>
                                        <select name="takeoff[]" id="" class="px-2 outline-none appearance-none bg-transparent" required>
                                            @for($m=0; $m <= 60; $m++)
                                                <option value="{{ $m }}">{{ $helperClass->formatNumberLength($m) }}</option>
                                            @endfor
                                        </select>
                                        <select name="takeoff[]" id="" class="px-2 outline-none appearance-none bg-transparent" required>
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>
                                    <input type="text" name="takeoff[]" class="datepicker form-control pl-12s w-1/2 float-left" data-single-mode="true" required>
                                </div>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-3-eta" class="form-label w-full flex flex-col sm:flex-row"> Estimated Time of Arrival </label>
                                <div class="relative mx-auto">
                                    <div class="inline-flex border rounded-md p-2 w-1/2">
                                        <select name="eta[]" id="" class="px-2 outline-none appearance-none bg-transparent" required>
                                            @for($h=0; $h <= 12; $h++)
                                                <option value="{{ $h }}">{{ $helperClass->formatNumberLength($h) }}</option>
                                            @endfor
                                        </select>
                                        <span class="px-2">:</span>
                                        <select name="eta[]" id="" class="px-2 outline-none appearance-none bg-transparent" required>
                                            @for($m=0; $m <= 60; $m++)
                                                <option value="{{ $m }}">{{ $helperClass->formatNumberLength($m) }}</option>
                                            @endfor
                                        </select>
                                        <select name="eta[]" id="" class="px-2 outline-none appearance-none bg-transparent" required>
                                            <option value="AM">AM</option>
                                            <option value="PM">PM</option>
                                        </select>
                                    </div>
                                    <input name="eta[]" type="text" class="datepicker form-control pl-12s w-1/2 float-left" data-single-mode="true" required>
                                </div>
                            </div>
{{--                            <div class="input-form mt-3">--}}
{{--                                <label for="validation-form-4" class="form-label w-full flex flex-col sm:flex-row"> Pilot </label>--}}
{{--                                <select name="pilot_id" id="validation-form-4" class="form-select">--}}
{{--                                    <option hidden disabled selected>Select One</option>--}}
{{--                                    @foreach($pilots as $pilot)--}}
{{--                                        <option value="{{ $pilot->id }}"> {{ ucfirst($pilot->full_name) }} </option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="input-form mt-3">
                                <label for="validation-form-5" class="form-label w-full flex flex-col sm:flex-row"> Aircraft </label>
                                <select name="airplane_id" id="validation-form-5" class="form-select">
                                    <option selected>Select One</option>
                                    @foreach($aircraft as $plane)
                                        <option value="{{ $plane->id }}">
                                            {{ $plane->manufacturer . ' ' . $plane->numser }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Form Validation -->
        </div>
    </div>




@endsection
