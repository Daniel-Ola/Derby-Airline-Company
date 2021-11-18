@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - {{ config('app.name') }}</title>
@endsection

@section('subcontent')

    @include('pages.includes.session-flash-message-notification');



    <!--    main page-->




@endsection
