
    @section('add_footer')
  
    @show

    <script src="{{ asset("js/jquery-3.7.0.min.js") }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @livewireScripts
    @stack('scripts')
  </body>
</html>