<script src="{{asset("assets/vendor/libs/jquery/jquery.js")}}"></script>
<script src="{{asset("assets/vendor/libs/popper/popper.js")}}"></script>
<script src="{{asset("assets/vendor/js/bootstrap.js")}}"></script>
<script src="{{asset("assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js")}}"></script>

<script src="{{asset("assets/vendor/js/menu.js")}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset("assets/vendor/libs/apex-charts/apexcharts.js")}}"></script>

<!-- Main JS -->
<script src="{{asset("assets/js/main.js")}}"></script>

<!-- Page JS -->
<script src="{{asset("assets/js/dashboards-analytics.js")}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
    $(document).ready(function () {
     var url = window.location.href;
     $('.layout-menu .menu-inner').find('.active').removeClass('active');
     $('.layout-menu .menu-inner li a').each(function () {
         if (this.href == url || url.includes(this.href+"?page=")) {
             $(this).parent().addClass('active');
         }
         else if(url.includes("single-section/")){
             $t = document.getElementById('set_this');
             $t.classList.add("active");
         }
         else if(url.includes("single-blog/")){
             $t = document.getElementById('set_this1');
             $t.classList.add("active");
         }
         
     }); 
 });
</script>