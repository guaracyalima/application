<!DOCTYPE html>
<html lang="en">
<head>
    <title>Eleja-se</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <link rel="stylesheet" href="{{ asset ('assets/css/app.min.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

</head>
<body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading">
    <div class="ks-page-container">
@include('template.header')
        @include('template.sidebar')
        <div class="ks-column ks-page">
            <div class="ks-page-header">
                <section class="ks-title">
                    <h3>Blank Page</h3>
                </section>
            </div>
            <div class="ks-page-content">
                <div class="ks-page-content-body">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--@include('template.menu_top')--}}
    {{--@include('template.sidebar')--}}


<script
        src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        crossorigin="anonymous"></script>
@yield('js')

<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.js"></script>
<script>
    function this_number(num)
    {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var field = num;
        if (er.test(field.value))
        {
            field.value = "";
        }
    }


</script>
</body>
</html>
