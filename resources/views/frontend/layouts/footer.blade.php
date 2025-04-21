{{-- @extends('layouts.side') --}}
    <!-- Essential javascripts for application to work-->
    @section('add_footer')
    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script>
      $(document).ready(function() {
          $('#expensesTable').DataTable({
              "paging": true,        // تفعيل الصفحات
              "searching": true,     // تفعيل البحث
              "ordering": true,      // تفعيل الترتيب
              "info": true,          // عرض معلومات الجدول
              "language": {
                  "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/ar.json" // تعريب الواجهة
              }
          });
      });
  </script>
    @show


    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    {{-- <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script> --}}
  </body>
</html>