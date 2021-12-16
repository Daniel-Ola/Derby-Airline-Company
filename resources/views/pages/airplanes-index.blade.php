@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - {{ config('app.name') }}</title>
@endsection

@section('subcontent')

    @include('pages.includes.session-flash-message-notification')




    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Item List -->
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="lg:flex intro-y border-primary-3">
                <div class="relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control py-3 px-4 w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Search item...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0 absolute right-0">
                    <a href="javascript:;" data-toggle="modal" data-target="#add-item-modal" class="btn btn-primary shadow-md mr-2">Add New</a>
                </div>
            </div>


            <!-- BEGIN: Add Item Modal -->
            <div id="add-item-modal" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">
                                Add New Machine
                            </h2>
                        </div>
                        <div class="grid p-4">
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
            <!-- END: Add Item Modal -->



            <div class="grid grid-cols-12 gap-5 mt-5">
                @foreach($planes as $plane)
                    <div class="col-span-12 sm:col-span-3 lg:col-span-3 2xl:col-span-3 box p-5 cursor-pointer zoom-in">
                        <a href="{{ route('airplanes.show', [$plane->id]) }}">
                            <div class="font-medium text-base">{{ $plane->airplane_model }}</div>
                            <div class="text-gray-600">Serial Number: {{ $plane->numser }}</div>
                            <div class="text-gray-600">Capacity: {{ $plane->capacity }}</div>
                            <div class="text-gray-600">Rating: {{ $plane->pilot_rating_id }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>




@endsection
