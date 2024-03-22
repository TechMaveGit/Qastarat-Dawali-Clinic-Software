<!-- /.content-wrapper -->

    <!-- <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="#">Purchase Now</a>
		  </li>
		</ul>
    </div> -->
	  <!-- &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved. -->
      <p class="footer_bottom">2023-24, All Right Reserved by Qastarat & Dawali Clinics - Developed by <a href="https://techmavesoftware.com/">TechMave Software</a>  .</p>
	</footer>



  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


	<!-- Page Content overlay -->


	<!-- Vendor JS -->
	<script src="{{ asset('public/superAdmin/js/vendors.min.js')}}"></script>
	<script src="{{ asset('public/superAdmin/js/pages/chat-popup.js')}}"></script>
    <script src="{{ asset('public/superAdmin/assets/icons/feather-icons/feather.min.js')}}"></script>

	<script src="{{ asset('public/superAdmin/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_components/date-paginator/moment.min.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_components/date-paginator/bootstrap-datepaginator.min.js')}}"></script>
    <script src="{{ asset('public/superAdmin/assets/vendor_components/datatable/datatables.min.js')}}"></script>

    <script src="{{ asset('public/superAdmin/assets/icons/feather-icons/feather.min.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_plugins/input-mask/jquery.inputmask.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_components/moment/min/moment.min.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
	<script src="{{ asset('public/superAdmin/assets/vendor_plugins/iCheck/icheck.min.js')}}"></script>
	<!-- Rhythm Admin App -->
	<script src="{{ asset('public/superAdmin/js/template.js')}}"></script>
	<script src="{{ asset('public/superAdmin/js/pages/dashboard.js')}}"></script>
	<script src="{{ asset('public/superAdmin/js/pages/data-table.js')}}"></script>
	<script src="{{ asset('public/superAdmin/js/pages/data-table.js')}}"></script>
    <script src="{{ asset('public/superAdmin/js/pages/advanced-form-element.js')}}"></script>
       <!-- sumoselect -->
   <script src="{{ asset('public/superAdmin/js/jquery.sumoselect.min.js')}}"></script>
  <script>
      $('.testselect2').SumoSelect({search: true, searchText: 'Enter here.'});
  </script>
<!-- dropify js -->
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script>
      $('.dropify').dropify();
    </script>

    <!-- county list select 2 -->
    <script>
    // Fetch countries data from Restcountries API
    $.ajax({
      url: 'https://restcountries.com/v3.1/all',
      dataType: 'json',
      success: function (data) {
        // Map the country data to the format expected by Select2
        const countriesData = data.map(country => ({
          id: country.cca2,
          text: country.name.common
        }));

        // Initialize Select2
        $('#countries').select2({
          data: countriesData,
          placeholder: 'Select a country',
        });
      }
    });
  </script>
<!-- custom data table with search icon  -->
<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('.custom_table').DataTable();

        // Add search icon inside the input
        $('.dataTables_filter input').before('<i class="fas fa-search search-icon"></i>');

        // Add click event for the search icon
        $('.search-icon').click(function() {
            var searchValue = $('.custom_table input').val();
            table.search(searchValue).draw();
        });

        // You can also add additional customization or event handling here
    });
</script>

<!-- profile upload js -->
<script>
  $(document).ready(function() {


var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});

$(".upload-button").on('click', function() {
   $(".file-upload").click();
});
});
</script>

<script>
  $(document).ready(function() {
      $('.btn-show-pass').click(function() {
          var passwordInput = $('#password');
          var icon = $(this).find('.eye-pass');

          if (passwordInput.attr('type') === 'password') {
              passwordInput.attr('type', 'text');
              icon.removeClass('flaticon-visibility').addClass('flaticon-invisible');
          } else {
              passwordInput.attr('type', 'password');
              icon.removeClass('flaticon-invisible').addClass('flaticon-visibility');
          }
      });
  });
</script>

<script>
 $(document).ready(function () {
      var today = new Date();
      $('.datepicker').datepicker({
          format: 'dd-mm-yyyy',
          autoclose:false,
          endDate: "today",
          maxDate: today
      }).on('changeDate', function (ev) {
              $(this).datepicker('hide');
          });

 // Add autocomplete="off" to prevent browser autocomplete
 $('.datepicker').attr('autocomplete', 'off');
      $('.datepicker').keyup(function () {
        
          if (this.value.match(/[^0-9]/g)) {
              this.value = this.value.replace(/[^0-9^-]/g, '');
          }
      });
  });
</script>
   
<script type="text/javascript">
  
  $(document).ready(function(){
      $('#image').change(function(e){
          var reader = new FileReader();
          reader.onload = function(e){
              $('#showImage').attr('src',e.target.result);
          }
          reader.readAsDataURL(e.target.files['0']);
      });
  });
</script>
@stack('custom-js')
</body>

</html>
