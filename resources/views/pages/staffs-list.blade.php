@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - {{ config('app.name') }}</title>
@endsection

@section('subcontent')

    <?php
        if ($message = Session::get('message')) {
    ?>

    <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert">
        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <i data-feather="x" class="w-4 h-4"></i>
        </button>
    </div>
    <?php
        }
    ?>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('staffs.create') }}" class="btn btn-primary shadow-md mr-2">Add New Staff</a>

            <div class="hidden md:block mx-auto text-gray-600"> &nbsp; </div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <form action="" method="get">
                        <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search..." name="search" value="{{ request()->get('search') }}" required>
                        <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                    </form>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->

        @forelse($staffs as $staff)
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
                <div class="box">
                    <div class="flex items-start px-5 pt-5">
                        <div class="w-full flex flex-col lg:flex-row items-center">
                            <div class="w-16 h-16 image-fit">
                                <img alt="Staff Image" class="rounded-full" src="dist/images/profile-8.jpg">
                            </div>
                            <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                                <a href="" class="font-medium">{{ $staff->full_name }}</a>
                                <div class="text-gray-600 text-xs mt-0.5">{{ ucfirst($staff->role) }}</div>
                            </div>
                        </div>
                        <div class="absolute right-0 top-0 mr-5 mt-3 dropdown">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-300"></i> </a>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                    <a  href="{{ route('staffs.edit', $staff->id) }}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="edit-2" class="w-4 h-4 mr-2"></i>
                                        Edit
                                    </a>
                                    <a href="{{ route('staffs.destroy', $staff->id) }}"
                                       onclick="event.preventDefault(); document.getElementById('form{{ $staff->id }}').submit() "
                                       class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="trash" class="w-4 h-4 mr-2"></i>
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center lg:text-left p-5">
                        <div class="truncate">{{ $staff->address }}</div>
                        <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5"> <i data-feather="phone" class="w-3 h-3 mr-2"></i>
                            {{ $staff->phone }}
                        </div>
                        <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1">
                            <div class="flex-1">
                                <i data-feather="briefcase" class="w-3 h-3 mr-2"></i>
                                {!! $staff->staff_salary !!}
                            </div>
                            <div class="flex-1">


                                @php
                                    $rating = $staff->pilot_rating;
                                    if ($rating) {
                                @endphp
                                    <i data-feather="star" class="w-3 h-3 mr-2"></i>
                                    {{ $rating }}
                                    @for($i = 0; $i < $rating; $i++)
                                        {!! '&#11088;' !!}
                                    @endfor
                                @php
                                    }
                                @endphp

                            </div>
                        </div>
                    </div>
                    <div class="text-center lg:text-right p-5 border-t border-gray-200 dark:border-dark-5">
                        <a href="{{ route('staffs.edit', $staff->id) }}" class="btn btn-primary py-1 px-2 mr-2"> <i data-feather="edit" class="w-3 h-3 mr-2"></i> Edit</a>
                        <a
                            href="{{ route('staffs.destroy', $staff->id) }}"
                            class="btn btn-danger py-1 px-2"
                            onclick="event.preventDefault(); document.getElementById('form{{ $staff->id }}').submit() "
                        >
                            <i data-feather="trash-2" class="w-3 h-3 mr-2"></i>
                            Delete
                        </a>
                        <form action="{{ route('staffs.destroy', $staff->id) }}" hidden id="form{{ $staff->id }}" method="post">
                            @csrf @method('DELETE')
                            <input type="text" readonly value="{{ $staff->id }}" name="staff">
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
                <div class="alert alert-danger alert-dismissible show flex items-center mb-2" role="alert">
                    <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>
                    <p>
                        There are no staffs, proceed to
                        <a href="{{ route('staffs.create') }}" class="underline mr-2 text-red-600">Add New Staff</a>
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <i data-feather="x" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        @endforelse


        <!-- END: Users Layout -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            {{ $staffs->links() }}
        </div>
        <!-- END: Pagination -->
    </div>


@endsection
