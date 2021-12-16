@extends('../layout/' . $layout, [
    'breadcrumb' => [
        [
            'title' => 'Passengers',
            'url' => route('passengers.index')
        ],
        [
            'title' => 'Index',
            'url' => '#'
        ]
    ]
])

@section('subhead')
    <title>Dashboard - {{ config('app.name') }}</title>
@endsection

@section('subcontent')

    @include('pages.includes.session-flash-message-notification')



    <!-- BEGIN: Transactions -->
    <div class="col-span-12 md:col-span-6 2xl:col-span-12 mt-3">
        <div class="intro-x flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                Passengers
            </h2>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search passengers" onkeyup="searchPassengers()">
        </div>

        <div class="mt-5" id="passengers-search-list">

            <!-- BEGIN: Important Notes -->
            <div class="col-span-12 md:col-span-6 xl:col-span-12 mt-3 2xl:mt-8">
                <div class="mt-5 intro-x">
                    <div class="box ">
                        <div class="tiny-slider" id="important-notes">
                            <div class="p-5">
                                <div class="text-base font-medium truncate">Search for passengers</div>
                                <div class="text-gray-600 text-justify mt-1">Search user by surname or name, search begins after the first 3 letters you enter</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Important Notes -->

        </div>
    </div>
    <!-- END: Transactions -->






@endsection

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>

        function searchPassengers() {
            let e = event;
            let value = e.target.value;
            let request_route = '{{ route('passengers.search') }}/' + value;
            document.getElementById('passengers-search-list').innerHTML = 'Searching ...'
            if (value.length >= 3)
            {

                axios.get(request_route)

                    .then(function (response) {

                        let content = '<div class="col-span-12 md:col-span-6 xl:col-span-12 mt-3 2xl:mt-8">'+
                            '<div class="mt-5 intro-x">'+
                            '<div class="box ">'+
                            '<div class="tiny-slider" id="important-notes">'+
                            '<div class="p-5">'+
                            '<div class="text-base font-medium truncate">No Result(s) found for <b><i><u>'+ value +'</u></i></b></div>'+
                            '<div class="text-gray-600 text-justify mt-1">Search user by surname or name, search begins after the first 3 letters you enter</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>'+
                            '</div>';

                        let data = response.data;

                        if (data.length > 0)
                        {
                            content = '';
                        }

                        data.forEach(function (item) {

                            content += '<div class="intro-x">'+
                                '<div class="box px-5 py-3 mb-3 flex items-center zoom-in">'+
                                '<div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">'+
                                '<img alt="Derby Airline Passenger" src="dist/images/profile-1.jpg">'+
                                '</div>'+
                                '<div class="ml-4 mr-auto">'+
                                '<div class="font-medium">'+ item['name'] + ' ' + item['surname'] +'</div>'+
                                '<div class="text-gray-600 text-xs mt-0.5">'+ item['address'] +'<br>'+ item['phone'] +'</div>'+
                                '</div>'+
                                '<div class="text-theme-20 underline get-flight">'+
                                '<a href="flights/manage/'+ item['flightnum'] +'">'+
                                item['flightnum'] +
                                '</a>'+
                                '</div>'+
                                '</div>'+
                                '</div>'

                        })

                        document.getElementById('passengers-search-list').innerHTML = content;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            }

        }

    </script>


@endpush
