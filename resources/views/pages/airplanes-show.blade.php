@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - {{ config('app.name') }}</title>
@endsection

@section('subcontent')

    @include('pages.includes.session-flash-message-notification')



    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Item List -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="lg:flex intro-y">
                <div class="relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control py-3 px-4 w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Search item...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-5 mt-5">

                <div class="col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in bg-theme-25 dark:bg-theme-25">
                    <div class="font-medium text-base text-white">{{ $airplane->airplane_model }}</div>
                    <div class="text-theme-34 dark:text-gray-400">Serial Number: {{ $airplane->numser }}</div>
                    <div class="text-theme-34 dark:text-gray-400">Capacity: {{ $airplane->capacity }}</div>
                </div>
                @foreach($planes as $plane)
                    <div class="col-span-12 sm:col-span-4 2xl:col-span-3 box p-5 cursor-pointer zoom-in {{ ($plane->id != $airplane->id)?: 'bg-theme-25 dark:bg-theme-25' }}">
                        <a href="{{ route('airplanes.show', [$plane->id]) }}">
                            <div class="font-medium text-base {{ ($plane->id != $airplane->id)?: 'text-white' }}">{{ $plane->airplane_model }}</div>
                            <div class="{{ ($plane->id == $airplane->id) ? 'text-theme-34 dark:text-gray-400' : 'text-gray-600' }}">Serial Number: {{ $plane->numser }}</div>
                            <div class="{{ ($plane->id == $airplane->id) ? 'text-theme-34 dark:text-gray-400' : 'text-gray-600' }}">Capacity: {{ $plane->capacity }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- END: Item List -->
        <!-- BEGIN: Ticket -->
        <div class="col-span-12 lg:col-span-4">
            <div class="intro-y pr-1">
                <div class="box p-2">
                    <div class="pos__tabs nav nav-tabs justify-center" role="tablist">
                        <a id="details-tab" data-toggle="tab" data-target="#details" href="javascript:;" class="flex-1 py-2 rounded-md text-center active" role="tab" aria-controls="details" aria-selected="true">Details</a>
                        <a id="add-new-machine-tab" data-toggle="tab" data-target="#add-new-machine" href="javascript:;" class="flex-1 py-2 rounded-md text-center" role="tab" aria-controls="add-new-machine" aria-selected="false">Add New Machine</a>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="details" class="tab-pane active" role="tabpanel" aria-labelledby="details-tab">
                    <div class="box p-5 mt-5">
                        <div class="flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                            <div>
                                <div class="text-gray-600">Capacity</div>
                                <div class="mt-1">{{ $airplane->capacity }}</div>
                            </div>
                            <i data-feather="clock" class="w-4 h-4 text-gray-600 ml-auto"></i>
                        </div>
                        <div class="flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                            <div>
                                <div class="text-gray-600">Time</div>
                                <div class="mt-1">{{ \Carbon\Carbon::parse($airplane->create_at)->toDateTimeString() }}</div>
                            </div>
                            <i data-feather="clock" class="w-4 h-4 text-gray-600 ml-auto"></i>
                        </div>
                        <div class="flex items-center border-b border-gray-200 dark:border-dark-5 py-5">
                            <div>
                                <div class="text-gray-600">Pilots</div>
                                <div class="mt-1">{{ $pilots }}</div>
                            </div>
                            <i data-feather="user" class="w-4 h-4 text-gray-600 ml-auto"></i>
                        </div>
                        <div class="flex items-center border-b border-gray-200 dark:border-dark-5 py-5">
                            <div>
                                <div class="text-gray-600">Flight Engagements</div>
                                <div class="mt-1">{{ $flights }}</div>
                            </div>
                            <i data-feather="users" class="w-4 h-4 text-gray-600 ml-auto"></i>
                        </div>
                        <div class="flex items-center pt-5">
                            <div>
                                <div class="text-gray-600">Passengers Engaged</div>
                                <div class="mt-1">{{ $passengers }}</div>
                            </div>
                            <i data-feather="mic" class="w-4 h-4 text-gray-600 ml-auto"></i>
                        </div>
                    </div>
                    <div class="flex mt-5">
                        <form action="{{ route('airplanes.destroy', $airplane) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn w-32 border-primary-3 dark:border-primary-3 text-primary-3 dark:text-primary-3">
                                Delete
                            </button>
                        </form>
                        <a
                            href="javascript:;"
                            class="btn btn-primary w-32 shadow-md ml-auto"
                            data-toggle="modal"
                            data-target="#add-item-modal"
                        >Edit</a>
                    </div>
                </div>
                <div id="add-new-machine" class="tab-pane" role="tabpanel" aria-labelledby="add-new-machine-tab">
                    <div class="box p-5 mt-5">
                        <div class="flex items-center border-b border-gray-200 dark:border-dark-5 pb-5">
                            <div>
                                <div class="text-gray-600">Add New Machine</div>
                            </div>
                        </div>
                        <form action="{{ route('airplanes.store') }}" method="post">
                            @csrf
                            <div class="grid grid-cols-12 gap-4 gap-y-3">
                                <div class="col-span-12">
                                    <label for="pos-form-1" class="form-label">Manufacturer</label>
                                    <input id="pos-form-1" class="form-control w-full mt-2" name="manufacturer" placeholder="Manufacturer" value="" required />
                                </div>
                                <div class="col-span-12">
                                    <label for="pos-form-2" class="form-label">Model Number</label>
                                    <input id="pos-form-2" class="form-control w-full mt-2" name="model_number" placeholder="Model Number" value="" required />
                                </div>
                                <div class="col-span-12">
                                    <label for="pos-form-5" class="form-label">Capacity</label>
                                    <input id="pos-form-5" class="form-control w-full mt-2" name="capacity" placeholder="Capacity" type="number" inputmode="numeric" value="" min="1" required>
                                </div>
                                <div class="col-span-12">
                                    <label for="pos-form-6" class="form-label">Pilot Rating</label>
                                    <select name="pilot_rating_id" id="pos-form-6" class="form-select">
                                        <option selected>Select One</option>
                                        @foreach($rating as $rate)
                                            @php
                                                $rating_value = $rate->rating;
                                            @endphp
                                            <option value="{{ $rate->id }}">
                                                {{ $rating_value }} -
                                                @for($i = 1; $i <= $rating_value; $i++)
                                                    {!! '&#11088;' !!}
                                                @endfor
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer text-right">
                                <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Reset</button>
                                <button type="submit" class="btn btn-primary w-24">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Ticket -->
    </div>



    <!-- BEGIN: Add Item Modal -->
    <div id="add-item-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">
                        {{ $airplane->airplane_model }}
                    </h2>
                    <b><small>Serial Number: {{ $airplane->numser }}</small></b>
                </div>
                <form action="{{ route('airplanes.update', [$airplane]) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12">
                            <label for="pos-form-1" class="form-label">Manufacturer</label>
                            <input id="pos-form-1" class="form-control w-full mt-2" name="manufacturer" placeholder="Manufacturer" value="{{ $airplane->manufacturer }}" />
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-2" class="form-label">Model Number</label>
                            <input id="pos-form-2" class="form-control w-full mt-2" name="model_number" placeholder="Model Number" value="{{ $airplane->model_number }}" />
                        </div>
                        <div class="col-span-12">
                            <label for="pos-form-5" class="form-label">Capacity</label>
                            <input id="pos-form-5" class="form-control w-full mt-2" name="capacity" placeholder="Capacity" type="number" inputmode="numeric" value="{{ $airplane->capacity }}">
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-24">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Add Item Modal -->



@endsection
