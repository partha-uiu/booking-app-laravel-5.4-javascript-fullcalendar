<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Report</title>

        <style>
            * {
                font-weight: lighter;
                font-size: .97em;
            }

            .community-center {
                margin-bottom: 2em;
                text-align: center;
            }

            .community-center .name {
                font-size: 2em;
                margin-bottom: .1em;
            }

            .community-center .location {
                font-size: 1em;
            }

            .page-title {
                font-weight: bold;
                margin-top: 1em;
                margin-bottom: 2em;
            }

            .summary {
                border: 1px solid #000;
                padding: 1em;
                margin-bottom: 2em;
            }

            table {
                width: 100%;
            }

            .table {
                border-collapse: collapse;
                margin-bottom: 4rem;
                border: 1px solid #e1e1e1;
                background-color: #fff;
                border-radius: 3px;
            }

            .table > tbody > tr > td,
            .table > tbody > tr > th,
            .table > tfoot > tr > td,
            .table > tfoot > tr > th,
            .table > thead > tr > td,
            .table > thead > tr > th {
                padding: 0.5rem;
                border-top: 1px solid #e1e1e1;
            }

            .table > thead > tr > th {
                border-bottom: 1px solid #e1e1e1;
            }

            .table tbody tr:not(:first-child) {
                border-top: 1px solid #e1e1e1;
            }

            .table th, .table td {
                vertical-align: middle;
                border: 0;
            }

            .table thead {
                background-color: #f2f2f2;
            }

            .table thead th {
                vertical-align: bottom;
            }

            .print-info {
                margin: .5em 0;
                color: #666;
                text-align: center;
                font-size: .8em;
            }

            .alert {
                padding: .75rem 1.25rem;
                margin-bottom: 1rem;
                border: 1px solid transparent;
                border-radius: .25rem
            }

            .alert-danger {
                color: #ffffff;
                background-color: #F44336;
                border-color: #ea1c0d;
            }

            .text-right {
                text-align: right;
            }

            .text-center {
                text-align: center;
            }

            .text-nowrap {
                white-space: nowrap !important
            }

            small {
                font-size: .8em;
            }
        </style>
    </head>
    <body>
        @yield('content')
    </body>
</html>