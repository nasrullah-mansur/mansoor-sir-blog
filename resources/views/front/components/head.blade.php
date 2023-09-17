<head>
        
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Title -->
    <title>{{ theme() ? theme()->theme_name : '' }} {{ isset($title) ? '::' . $title : '' }}</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" />
    @stack('page_plugin_css')
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
    @stack('page_css')
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}" />

    @stack('custom_page_css')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ theme() ? asset(theme()->favicon) : '' }}" type="image/x-icon">
  </head>