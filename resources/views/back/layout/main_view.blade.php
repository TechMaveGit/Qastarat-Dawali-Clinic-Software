@include('back.layout.header')
@yield('content-section')  
<link href="{{ asset('/assets/Common/css/CountrySelect.css')}}" rel="stylesheet">
<script src="{{ asset('/assets/Common/js/CountrySelect.js')}}"></script>
@include('back.layout.footer')