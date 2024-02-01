@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('admin/css/all.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.rtl.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}"/>

@if(App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('admin/css/ar/framework.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/css/ar/master.css') }}"/>
@else

    <link rel="stylesheet" href="{{ asset('admin/css/en/framework.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/css/en/master.css') }}"/>

@endif
