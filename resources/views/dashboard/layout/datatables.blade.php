
    {{-- Data Table CSS --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

    {{-- Data Tables JS --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <style>
    .dataTables_wrapper .dataTables_paginate .paginate_button{
        border: none;
        outline: none;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: none;
        color: black!important;
        border: none;
        outline: none;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
        background: none;
        outline: none;
        border: none;
    }
    </style>
