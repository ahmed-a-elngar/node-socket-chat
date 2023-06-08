<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<!-- plugins:js -->
<script src="{{ asset('External/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('External/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('External/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('External/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('External/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('External/owl-carousel-2/owl.carousel.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/misc.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/file-upload.js') }}"></script>
<!-- End custom js for this page -->
<script src="{{ asset('js/custom/master.js') }}"></script>
<script src="https://cdn.socket.io/4.5.0/socket.io.min.js"
    integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous">
</script>

@yield('js-scripts')

</body>

</html>
