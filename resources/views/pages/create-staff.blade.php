@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - {{ config('app.name') }}</title>
@endsection

@section('subcontent')

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
            Staff Registration
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
                        <form class="validate-forms" method="post" action="{{ route('staffs.store') }}">
                            @csrf
                            <div class="input-form">
                                <label for="validation-form-1" class="form-label w-full flex flex-col sm:flex-row"> Surname </label>
                                <input id="validation-form-1" type="text" name="surname" class="form-control" placeholder="Legend" >
                            </div>
                            <div class="input-form">
                                <label for="validation-form-11" class="form-label w-full flex flex-col sm:flex-row"> Name </label>
                                <input id="validation-form-11" type="text" name="name" class="form-control" placeholder="John" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-2" class="form-label w-full flex flex-col sm:flex-row"> Phone </label>
                                <input id="validation-form-2" type="phone" name="phone" class="form-control" placeholder="+44 7911 123456" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-3" class="form-label w-full flex flex-col sm:flex-row"> Salary </label>
                                <input id="validation-form-3" type="number" name="salary" class="form-control" placeholder="2000" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-4" class="form-label w-full flex flex-col sm:flex-row"> Staff Role </label>
                                <select name="staff_role_id" id="validation-form-4" class="form-select" >
                                    <option hidden disabled selected>Select One</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}"> {{ ucfirst($role->title) }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-5" class="form-label w-full flex flex-col sm:flex-row"> Pilot Rating <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Optional, Required only for pilots</span> </label>
                                <select name="pilot_rating_id" id="validation-form-5" class="form-select">
                                    <option selected>Select One</option>
                                    @foreach($rating as $rate)
                                        @php
                                            $rating_value = $rate->rating;
                                        @endphp
                                        <option value="{{ $rating_value }}">
                                            {{ $rating_value }} -
                                            @for($i = 1; $i <= $rating_value; $i++)
                                                {!! '&#11088;' !!}
                                            @endfor
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-form mt-3">
                                <label for="validation-form-6" class="form-label w-full flex flex-col sm:flex-row"> Address </label>
                                <textarea id="validation-form-6" class="form-control" name="address" placeholder="Type your address" minlength="10" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5">Register</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Form Validation -->
        </div>
    </div>


@endsection
