<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield("title")</title>

    @include("dashboard_layout.includes.header-script")
    @yield("page_css")
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        @include("dashboard_layout.includes.header")
        @include("dashboard_layout.includes.main_side_bar")
        @include("dashboard_layout.includes.main_content_view")
        @include("dashboard_layout.includes.footer")
        @include("dashboard_layout.includes.control_side_bar")
    </div>
    <!-- ./wrapper -->
    @include("dashboard_layout.includes.footer-script")
    @yield("page_js")

</body>
</html>

