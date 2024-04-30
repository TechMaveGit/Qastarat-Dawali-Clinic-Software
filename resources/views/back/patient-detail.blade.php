@extends('back.layout.main_view')

@push('title')

Home | QASTARAT & DAWALI CLINICS

@endpush

@section('content-section')

@push('custom-css')

	{{-- add here --}}

@endpush





<div class="sub_bnr" style="background-image: url({{ asset('public/assets/images/hero-15.jpg') }});">

<div class="sub_bnr_cnt">

        <h1>Patient <span class="blue_theme"> Details</span> </h1>

        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{ route('patient.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('patient.dashboard') }}">Patient</a></li>
                <li class="breadcrumb-item active" aria-current="page">Patient Details</li>

            </ol>

        </nav>

        {{-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal" data-bs-target="#add_patient">+ Add New Patient </a> --}}

    </div>



</div>





<div class="patient-detail">

    <div class="container">

        <div class="row">

            <div class="col-lg-5">

                <div class="left_side">

                    <div class="profile_action">

                        <div class="left_side_pr_icon">

                        <a href="{{ route('user.patient_medical_detail',['id'=>@$id]) }}" class="action_btn_tooltip">

                            <iconify-icon icon="ph:folder-duotone"></iconify-icon>

                            <span class="toolTip">View Medical Record</span>

                        </a>

                        <a href="#" class="action_btn_tooltip patient_edit" data-bs-toggle="modal" data-bs-target="#edit_patient">

                            <iconify-icon icon="material-symbols:edit"></iconify-icon>

                            <span class="toolTip">Edit Patient Info .</span>

                        </a>

                        {{-- <a href="#" class="action_btn_tooltip" data-bs-toggle="modal" data-bs-target="#create_appointment">

                            <iconify-icon icon="formkit:date"></iconify-icon>

                            <span class="toolTip">Make an Appointment</span>

                        </a> --}}

                        <!-- <a href="#" class="action_btn_tooltip">

                            <iconify-icon icon="ph:envelope-open-light" data-bs-toggle="modal" data-bs-target="#send_message"></iconify-icon>

                            <span class="toolTip">Send a Message</span>

                        </a> -->

                        <a href="{{ route('user.patient') }}" class="action_btn_tooltip">

                            <iconify-icon icon="iconamoon:search-light"></iconify-icon>

                            <span class="toolTip">Find Another Patient</span>

                        </a>

                        </div>

                        {{-- <div class="right_side_pr_icon">

                            <a href="#" class="action_btn_tooltip" onclick="removePatient({{ @$id }})">

                                <iconify-icon icon="material-symbols:delete-outline"></iconify-icon>

                                <!-- <span class="toolTip">Find Another Patient</span> -->

                            </a>

                        </div> --}}

                    </div>

                    <input type="hidden" name="patient_id" value="{{ @$id }}"/>

                    <div class="profile_img">

                        @isset($patient->patient_profile_img)
                        <img src="{{ asset('public/assets/patient_profile/' . $patient->patient_profile_img) }}" alt="">
                        @else
                        <img src="{{ asset('public/assets/images/team-13.jpg') }}" alt="temp_img">
                        @endisset

                    
                        <div class="patient_dt_profile">

                            <h5 class="patient_name__">{{ @$patient->sirname.' '. @$patient->name }} </h5>
                            @php
                            if(!empty(@$patient->birth_date) ){
                              $birthDate = \Carbon\Carbon::createFromFormat('d M, Y', @$patient->birth_date);
                            $patientBirthDate=  $birthDate->diffInYears(\Carbon\Carbon::now());
                            }else{
                              $patientBirthDate=null;
                            }

                            @endphp
                            <p class="patient_age__">{{ @$patientBirthDate }} Years , <span class="patient_id__">{{ @$patient->patient_id }}</span></p>

                        </div>

                    </div>



                    <div class="patient_dt_line">

                        <ul>

                            <li>

                                <div class="title___">

                                  <h6>Date of Birth</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_dob"> {{ @$patient->birth_date  }}</h6>

                                </div>

                            </li>

                            <li>

                                <div class="title___">

                                  <h6>Gender</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_gendar">{{ @$patient->gendar  }}</h6>

                                </div>

                            </li>

                            <li>

                                <div class="title___">

                                  <h6>Email Address</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_email">{{ @$patient->email  }}</h6>

                                </div>

                            </li>

                            <li>

                                <div class="title___">

                                  <h6>Mobile Phone</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_mobile">{{ @$patient->mobile_no  }}</h6>

                                </div>

                            </li>

                            <li>

                                <div class="title___">

                                  <h6>Landline</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_landline">{{ @$patient->landline  }}</h6>

                                </div>

                            </li>

                            <li>

                                <div class="title___">

                                  <h6>Street Address</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_street">{{ @$patient->street  }}</h6>

                                </div>

                            </li>

                            <li>

                                <div class="title___">

                                  <h6>City/Town</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_town">{{ @$patient->town  }}</h6>

                                </div>

                            </li>

                            <li>

                                <div class="title___">

                                  <h6>County/State</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_state">{{ @$patient->country  }}</h6>

                                </div>

                            </li>

                            <li>

                                <div class="title___">

                                  <h6>Post Code</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_post_code">{{ @$patient->post_code  }}</h6>

                                </div>

                            </li>

                            <li>

                                <div class="title___">

                                  <h6>Country</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_country">{{ @$patient->country  }}</h6>

                                </div>

                            </li>

                            <li>

                                <div class="title___">

                                  <h6>Next of Kin</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_kin">{{ @$patient->kin  }}</h6>

                                </div>

                            </li>

                            {{-- <li>

                                <div class="title___">

                                  <h6>Insurer</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_insurer">{{ @$Patient_insurer->insurer_name  }}</h6>

                                </div>

                            </li> --}}

                            <li>

                                <div class="title___">

                                  <h6>Policy No</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_policy_no">{{ @$patient->policy_no  }}</h6>

                                </div>

                            </li>

                            <li>

                                <div class="title___">

                                  <h6>GP</h6>

                                </div>

                                <div class="data_pt">

                                 <h6 id="data_pt_gp">{{ @$patient->gp  }}</h6>

                                </div>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>



            <div class="col-lg-7">

                <div class="appointments___list">

                    <h3 class="sub_title__">Appointments</h3>

                    <ul>
                        @foreach ($Patient_appointments as $Patient_appointment)



                        <li>

                            <div class="appoin_title">

                               <h6>{{ $Patient_appointment->appointment_type }}</h6>

                            </div>

                            <div class="appoin_date">

                                <p>{{ $Patient_appointment->date }} <span class="appoin_time">{{ $Patient_appointment->start_time }}</span></p>

                            </div>

                        </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>























@push('custom-js')
<script>

    $(document).ready(function(){
    //
      $('#edit_patient').on('hidden.bs.modal', function (e) {
        location.reload();
      });
    });
  </script>
			  <!-- Edit Patient Info. form data into database-->
              <script>
                $(document).ready(function() {
                  let patient_id = $('input[name="patient_id"]').val();
                    $('#edit_patient_info_form').submit(function(e) {

                        e.preventDefault();

                        let isValid = validateFormPatientInfoEdit();
                        let formData = new FormData(this);
                        let categoriesListContent = $('#categories-list-2').html();

                        // Append categoriesListContent
                        formData.append('patient_tags_list', categoriesListContent);
                        if (isValid) {

                            $.ajax({
                                url: '{{ route("user.patient-info-update") }}',
                                type: 'POST',
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function(result) {


                                    if(result!=''){

                                        swal.fire(

                                            'Success',

                                            'Patient Info  Updated successfully!',

                                            'success'

                                        )

                                        fetchAndDisplayPatientInfoData(patient_id);
                                        location.reload();
                                        }else{

                                        swal.fire("Error!", "Enter valid Patient Info  Details!", "error");

                                        }
                                },
                                error: function(xhr, status, error) {

                                if (xhr.status == 422) {

                                    var errors = JSON.parse(xhr.responseText);
                                    console.log('validation-error',errors);
                                    var errorMessage = 'Validation error(s):<br>';

                                    $.each(errors.error, function(key, value) {
                                        errorMessage += value + '<br>';
                                    });

                                    swal.fire('Error!', errorMessage, 'error');
                                } else if (xhr.status == 404) {
                                    swal.fire('Error!', 'The requested resource was not found.', 'error');
                                } else if (xhr.status == 500) {
                                    swal.fire('Error!', 'Internal server error. Please try again later.', 'error');
                                } else {
                                    swal.fire('Error!', 'hhhh An error occurred. Please try again later.', 'error');
                                }
                            }
                            });
                        }
                    });


             function validateFormPatientInfoEdit() {
                        let isValid = true;

            // Validate patient_sirname
            let patient_sirname = $('select[name="patient_sirname"]').val();
            if (patient_sirname === '') {

                isValid = false;

                $('#patient_sirnameError').text('Please select a title');
                $('select[name="patient_sirname"]').addClass('error');
            }

            // Validate patient_name
            let patient_name = $('input[name="patient_name"]').val();
            if (patient_name === '') {
                isValid = false;

                $('#patient_nameError').text('Name is required');
                $('input[name="patient_name"]').addClass('error');
            }

            // // Validate patient_birth
            let patient_birth = $('input[name="patient_birth"]').val();
            if (patient_birth === '') {
                isValid = false;

                $('#patient_birthError').text('Date of Birth is required');
                $('input[name="patient_birth"]').addClass('error');
            }

            // // Validate patient_gendar
            let patient_gendar = $('select[name="patient_gendar"]').val();
            if (patient_gendar === '' || patient_gendar === 'Select') {
                isValid = false;

                $('#patient_gendarError').text('Please select a gender');
                $('select[name="patient_gendar"]').addClass('error');
            }

             // Validate patient_post_code
            let patient_post_code = $('input[name="patient_post_code"]').val();
            if (patient_post_code === '') {
                isValid = false;

                $('#patient_post_codeError').text('Post Code is required');
                $('input[name="patient_post_code"]').addClass('error');
            }
             // Validate patient_email
             let patient_email = $('input[name="patient_email"]').val();
            if (patient_email === '') {
                isValid = false;

                $('#patient_emailError').text('Email  is required');
                $('input[name="patient_email"]').addClass('error');
            }
             // Validate patient_street
             let patient_street = $('input[name="patient_street"]').val();
            if (patient_street === '') {
                isValid = false;

                $('#patient_streetError').text('Street is required');
                $('input[name="patient_street"]').addClass('error');
            }
              // Validate patient_town
              let patient_town = $('input[name="patient_town"]').val();
            if (patient_town === '') {
                isValid = false;

                $('#patient_townError').text('Town is required');
                $('input[name="patient_town"]').addClass('error');
            }
              // Validate patient_country
              let patient_country =$('select[name="patient_country"]').val();
            if (patient_country === '') {
                isValid = false;

                $('#patient_countryError').text('country is required');
                $('input[name="patient_country"]').addClass('error');
            }
             // Validate patient_mobile_no
             let patient_mobile_no =$('input[name="patient_mobile_no"]').val();
            if (patient_mobile_no === '') {
                isValid = false;

                $('#patient_mobile_noError').text('Mobile number is required');
                $('input[name="patient_mobile_no"]').addClass('error');
            }
            // Validate patient_landline
            let patient_landline =$('input[name="patient_landline"]').val();
            if (patient_landline === '') {
                isValid = false;

                $('#patient_landlineError').text('landline number is required');
                $('input[name="patient_landline"]').addClass('error');
            }
             // Validate patient_additional_info
             let patient_additional_info =$('textarea[name="patient_additional_info"]').val();
            if (patient_additional_info === '') {
                isValid = false;

                $('#patient_additional_infoError').text('Additional Info is required');
                $('textarea[name="patient_additional_info"]').addClass('error');
            }
              // Validate patient_document_type
              let patient_document_type =$('input[name="patient_document_type"]').val();
            if (patient_document_type === '') {
                isValid = false;

                $('#patient_document_typeError').text('document type  is required');
                $('input[name="patient_document_type"]').addClass('error');
            }
                  // Validate patient_edit_id
              let patient_edit_id =$('input[name="patient_edit_id"]').val();
            if (patient_edit_id === '') {
                isValid = false;

                $('#patient_edit_idError').text('Patient ID  is required');
                $('input[name="patient_edit_id"]').addClass('error');
            }

            return isValid;
                    }

                });


              </script>
              <!-- Function to fetch and populate patient data -->
          <script>
            function fetchAndDisplayPatientInfoData(patient_id) {

              // let patient_id = $('input[name="patient_id"]').val();
                $.ajax({
                    url: '{{ route("user.patient-info-edit") }}',
                    type: 'GET',
                    data:{patient_id:patient_id},
                    dataType: 'json',
                    success: function(data) {
                       if (data && data.hasOwnProperty('patient_info')) {
                        let selectedSirname = data.patient_info.sirname ? data.patient_info.sirname : '';
                        let name = data.patient_info.name ? data.patient_info.name : '';
                        let id = data.patient_info.id ? data.patient_info.id : '';
                        let email = data.patient_info.email ? data.patient_info.email : '';
                        let patient_profile_img = data.patient_info.patient_profile_img ? data.patient_info.patient_profile_img : '';
                        let role = data.patient_info.role ? data.patient_info.role : '';
                        let post_code = data.patient_info.post_code ? data.patient_info.post_code : '';
                        let mobile_no = data.patient_info.mobile_no ? data.patient_info.mobile_no : '';
                        let birth_date = data.patient_info.birth_date ? data.patient_info.birth_date : '';
                        let selectedGendar = data.patient_info.gendar ? data.patient_info.gendar : '';
                        let street = data.patient_info.street ? data.patient_info.street : '';
                        let town = data.patient_info.town ? data.patient_info.town : '';
                        let selectedCountry = data.patient_info.country ? data.patient_info.country : '';
                        let landline = data.patient_info.landline ? data.patient_info.landline : '';
                        let selectedDocument_type = data.patient_info.document_type ? data.patient_info.document_type : '';
                        let patient_id = data.patient_info.patient_id ? data.patient_info.patient_id : '';
                        let kin = data.patient_info.kin ? data.patient_info.kin : '';
                        let gp = data.patient_info.gp ? data.patient_info.gp : '';
                        let tags = data.patient_info.tags ? data.patient_info.tags : '';
                        let additional_info = data.patient_info.additional_info ? data.patient_info.additional_info : '';
                        let policy_no = data.patient_info.policy_no ? data.patient_info.policy_no : '';

                        $('#patient_sirname option').each(function() {
                            if ($(this).val() === selectedSirname) {
                                $(this).prop('selected', true);
                            }
                        });
                        $('#patient_sirname').val(selectedSirname).trigger('change.select2');
                        $("#patient_name").val(name);
                        $("#patient_birth").val(birth_date);
                        $('#patient_gendar option').each(function() {
                            if ($(this).val() === selectedGendar) {
                                $(this).prop('selected', true);
                            }
                        });
                        $('#patient_gendar').val(selectedGendar).trigger('change.select2');
                        $("#patient_post_code").val(post_code);
                        $("#patient_street").val(street);
                        $("#patient_town").val(town);
                        $('#patient_country option').each(function() {
                            if ($(this).val() === selectedCountry) {
                                $(this).prop('selected', true);
                            }
                        });
                        $('#patient_country').val(selectedCountry).trigger('change.select2');
                        $("#patient_email").val(email);
                        $("#patient_mobile_no").val(mobile_no);
                        $("#patient_landline").val(landline);
                        $("#patient_kin").val(kin);
                        $("#patient_policy_no").val(policy_no);
                        $("#patient_gp").val(gp);
                        $("#patient_additional_info").val(additional_info);

                        $('#patient_document_type option').each(function() {
                            if ($(this).val() === selectedDocument_type) {
                                $(this).prop('selected', true);
                            }
                        });
                        $('#patient_document_type').val(selectedDocument_type).trigger('change.select2');
                        $("#patient_edit_id").val(patient_id);
                        $("#categories-list-2").html(tags);
                        // set patient info

                        let dob = new Date(birth_date);
                        let now = new Date();
                        let ageDiff = now - dob;
                        let ageDate = new Date(ageDiff);
                        let calculatedAge = Math.abs(ageDate.getUTCFullYear() - 1970);

                        $(".patient_name__").text(selectedSirname + ' ' + name);
                        $(".patient_age__").html(calculatedAge + ' Years ' + '<span class="patient_id__">'+ patient_id +'</span>');
                        $("#data_pt_dob").text(birth_date);
                        $("#data_pt_gendar").text(selectedGendar);

                        $("#data_pt_mobile").text(mobile_no);
                        $("#data_pt_landline").text(landline);
                        $("#data_pt_street").text(street);
                        $("#data_pt_town").text(town);
                        $("#data_pt_state").text(selectedCountry);
                        $("#data_pt_post_code").text(post_code);
                        $("#data_pt_country").text(selectedCountry);
                        $("#data_pt_kin").text(kin);
                        $("#data_pt_policy_no").text(policy_no);
                        $("#data_pt_gp").text(gp);



                        }
                        if (data && data.hasOwnProperty('patient_insurer'))
                         {

                            let patient_insurer = data.patient_insurer;
                            patient_insurer.forEach(function (note) {
                            let newOption = $('<option>', {
                                value: note.id,
                                text: note.insurer_name
                            });

                            let optionExists = $('#patient_insurer option[value="' + note.id + '"]').length > 0;

                            if (!optionExists) {
                                $('#patient_insurer').append(newOption);
                            } else {
                                $('#patient_insurer option[value="' + note.id + '"]').text(note.insurer_name);
                            }

                            if (note.status === 'active') {
                                $('#patient_insurer').val(note.id);
                            }
                        });



                        }



                    },
                    error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    if (xhr.status == 409) {
                        swal.fire('Error!', 'The email is already in use. Please use a different email.', 'error');
                    } else if (xhr.status == 404) {
                        swal.fire('Error!', 'The requested resource was not found.', 'error');
                    } else if (xhr.status == 500) {
                        swal.fire('Error!', 'Internal server error. Please try again later.', 'error');
                    } else {
                        swal.fire('Error!', 'An error occurred. Please try again later.', 'error');
                    }
                }
                });
            }

            // Call the function on clcik class add_insurer
            $(document).ready(function() {
              let patient_id1 = $('input[name="patient_id"]').val();
              $(".patient_edit").on('click',function(){

                fetchAndDisplayPatientInfoData(patient_id1);
              });

            });
          </script>
<script>

    function removePatient(patient_id) {
      var label = "Patient Details";
      swal.fire({
          title: "Are you sure?",
          text: "Do you want to Delete!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#dc3545",
          confirmButtonText: "Yes, Delete it!",
          cancelButtonText: "No, Cancel It",
          closeOnConfirm: false,
          closeOnCancel: false
      }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  type: "POST",
                  url: "{{ route('user.patient_delete') }}",
                  data: {
                      "patient_id": patient_id,
                      "_token": "{{ csrf_token() }}"
                  },
                  dataType: 'json',
                  success: function(result) {
                      swal.fire({
                          icon: 'success',
                          title: 'Deleted!',
                          text: 'Patient Deleted',
                          timer: 1000
                      }).then(function() {
                     window.location.href = '{{ route("user.patient") }}';
                      });
                  },
                  error: function(data) {

                  }
              });
          } else {
              swal.fire("Cancelled", label + " safe :)", "error");
          }
      });
  }

   </script>
@endpush

@endsection
