@php
    
    $dtype = 'doctor';
    if(Auth::guard('doctor')->user()->user_type == "Nurse"){
        $dtype = 'Nurse';
    }else if(Auth::guard('doctor')->user()->user_type == "Receptionist"){
        $dtype = 'receptionist';
    }else if(Auth::guard('doctor')->user()->user_type == "Coordinator"){
        $dtype = 'coordinator';
    }
    $doctorBranch = DB::table('user_branchs')->where(['patient_id'=>Auth::guard('doctor')->user()->id,'branch_type'=>$dtype])->get()->pluck('add_branch')->toArray();
    $allBranch=  DB::table('branchs')->whereIn('id',$doctorBranch)->get();
    
@endphp

<div class="modal fade " id="allergies_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add Allergy</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <div class="col-lg-12">
                            <div class="add_categoryweb">
                                <form id="allergy_form">
                                    @csrf
                                    <input type="hidden" name="patient_id" value="{{ @$id }}" />
                                    <div class="row">

                                        <div class="col-lg-12">

                                            <label for="validationCustom01" class="form-label">Type Allergy</label>

                                            <div class="category-container" id="category-container-3">

                                                <input type="hidden" name="formType" value="general-report" />

                                                <input type="text" name="allergy"
                                                    class="form-control category-input"
                                                    placeholder="Type Allergy here...">
                                                <span id="allergy_nameError"
                                                    style="color: red;font-size:small"></span>

                                                <button type="submit"
                                                    class="btn r-04 btn--theme hover--tra-black add_patient "><i
                                                        class="fa-solid fa-plus"></i> Add</button>

                                            </div>

                                            <!-- <div class="categories-list" id="categories-list-3">



                                        </div> -->

                                        </div>

                                    </div>
                                </form>



                            </div>

                        </div>



                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                            Save</a> -->

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                        data-bs-dismiss="modal">

                        Close</a>

                </div>

            </div>

            <!-- <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary">Save changes</button>

                    </div> -->

        </div>

    </div>

</div>


<!----------------------------
 Add New Notes
---------------------------->
<div class="modal fade edit_patient__" id="add_newnote" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel"><i class="fa-regular fa-square-plus"></i> Pre-prepared
                    Text Snippets </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body padding-0">
                {{-- <form action="{{ route('user.save_patient_note') }}" method="post" /> @csrf --}}
                <form id="savePatientNote" method="POST" enctype="multipart/form-data"> @csrf
                    <div class="inner_data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="created_snippet">
                                    <p class="note_created_snippet">You can store often used blocks of text to speed
                                        up data entry in medical records. </p>

                                    <ul class="created_snippet_list">
                                        @php
                                            $note_name = DB::table('progress_note_contents')
                                                ->orderBy('id', 'DESC')
                                                ->get();
                                        @endphp
                                        @forelse ($note_name as $allnote_name)
                                            @php
                                                $progressNoteCan = DB::table('progress_note_canned_text')
                                                    ->where('id', $allnote_name->progress_note_id)
                                                    ->first();
                                            @endphp
                                            <li data-note-id="{{ $allnote_name->id }}">
                                                <div class="snippet_name">
                                                    <p>{{ $progressNoteCan->canned_name ?? '' }} -
                                                        {{ $allnote_name->note_name ?? '' }} </p>
                                                </div>
                                                <div class="remove_snippet">
                                                    <a href="#"><i class="fa-regular fa-circle-xmark"></i></a>
                                                </div>
                                            </li>
                                        @empty
                                            <li>No notes available</li>
                                        @endforelse
                                    </ul>


                                </div>
                            </div>



                            <div class="">
                                <div class="row top_head_vitals">
                                    <div class="col-lg-12">
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="d-flex">
                                                    <div class="inner_element w-100">
                                                        <div class="form-group">
                                                            <input type="text" name="newContext"
                                                                class="form-control"
                                                                placeholder="Type a new context">
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="d-flex">
                                                    <div class="inner_element w-100">
                                                        <div class="form-group">
                                                            <input type="text" name="snippetText"
                                                                class="form-control"
                                                                placeholder="Give your Snippet Title">
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-lg-12">
                                                <div class="mt-2 form-group">
                                                    <textarea class="form-control" name="snippetDescription" placeholder="Type or paste in your text snippet here.."
                                                        style="height:100px"></textarea>
                                                </div>


                                            </div>




                                        </div>
                                    </div>



                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="action text-end bottom_modal">
                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                            Save</button>
                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">
                            Close</a>
                    </div>
                </form>


            </div>
            <!-- <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="button" class="btn btn-primary">Save changes</button>
     </div> -->
        </div>
    </div>
</div>





<div class="modal fade edit_patient__" id="genrate_report" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Generated Reports </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>

            @if (isset($id))
                <form action="{{ route('user.patient_medical_detail', ['id' => @$id]) }}" method="get"> @csrf

                    <input type="hidden" name="print_form" value="print_form" />
                    <input type="hidden" name="form_type" id="formType" value="print_form" />
                    <input type="hidden" name="form_print_type" id="form_print_type" value="print_form" />

                    <div class="modal-body padding-0">
                        <div class="inner_data">
                            <div class="row top_head_vitals">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-6">


                                            <input type="checkbox" id="select-all">
                                            <label for="select-all">Select All</label>

                                            <div class="report_check_box">

                                                <div class="form-group">
                                                    <input type="checkbox" name="sympotms" value="Sympotms"
                                                        id="a1">
                                                    <label for="a1">Sympotms</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="pastMedicalHistory"
                                                        value="Past Medical History" id="a2">
                                                    <label for="a2">Past Medical History</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="pastSurgicalHistory"
                                                        value="Past Surgical History" id="a3">
                                                    <label for="a3">Past Surgical History</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="oldCurrentMeds"
                                                        value="Old Current Meds" id="a4">
                                                    <label for="a4">Drugs / Current meds</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="allergies" value="Allergies"
                                                        id="a5">
                                                    <label for="a5">Allergies</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="clinicalExam"
                                                        value="ClinicalExam" id="a6">
                                                    <label for="a6">Clinical Exam</label>
                                                </div>

                                                <div class="form-group">
                                                    <input type="checkbox" name="imagingExam" value="ImagingExam"
                                                        id="a7">
                                                    <label for="a7">Annotate Image</label>
                                                    <img src="" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="specialInvestigatior"
                                                        value="SpecialInvestigatior" id="a9">
                                                    <label for="a9">Special Investigation</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="mdtReview" value="MdtReview"
                                                        id="a10">
                                                    <label for="a10">MDT Review</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="diagnosisi" value="Diagnosis"
                                                        id="a11">
                                                    <label for="a11">Diagnosis</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="report_check_box">
                                                
                                                
                                                <div class="form-group">
                                                    <input type="checkbox" name="Eligiblity"
                                                        value="EligiblityStatus" id="a12">
                                                    <label for="a12">Eligiblity Status</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="list" value="List"
                                                        id="a13">
                                                    <label for="a13">List Of Procedures</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="Procedure" value="Procedure"
                                                        id="a22">
                                                    <label for="a22">Procedure</label>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input type="checkbox" name="supportiveTreatement"
                                                        value="SupportiveTreatement" id="a14">
                                                    <label for="a14">Supportive Treatment</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="ListOfPrescribed"
                                                        value="ListOfPrescribed" id="a15">
                                                    <label for="a15">List Of Prescribed Medicines</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="planRecommandation"
                                                        value="PlanRecommandation" id="a16">
                                                    <label for="a16">Future Plans / Recommendations</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="OrderImagingExam"
                                                        value="OrderImagingExam" id="a19">
                                                    <label for="a19">Order Imaging Exam</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="LAB"
                                                        value="LAB" id="a20">
                                                    <label for="a20">Lab</label>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="ListofVisit"
                                                        value="ListofVisit" id="a17">
                                                    <label for="a17">List of Visit</label>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input type="checkbox" name="ProgressNote"
                                                        value="ProgressNote" id="a18">
                                                    <label for="a18">Progress Note</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="text-end bottom_modal">
                            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                                Submit</button>

                            <button type="button" class="modalCloseBtn" data-bs-dismiss="modal"
                                aria-label="Close">
                                Close</button>

                        </div>

                    </div>

                </form>
            @endif
        </div>
    </div>

</div>






<div class="modal fade edit_patient__" id="referalSummary" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">View Referral Patient Summary </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>


            <div class="modal-body padding-0">
                <div class="inner_data">
                    <div class="row top_head_vitals">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="report_check_box">

                                        <textarea class="form-control" id="referalSummaryData" name="patientSummary" placeholder="Summary...."
                                            style="height:150px" readonly></textarea>
                                        <br>

                                        @php
                                            $show = false;
                                            if (isset($patient)) {
                                                if ($patient->check_edit_referal == '1') {
                                                    if (Auth::user()->id != $patient->doctor_id) {
                                                        $show = true;
                                                    }
                                                }
                                            }
                                        @endphp

                                        @if ($show)
                                            <form action="{{ route('referalReplySummary') }}" method="post"> @csrf
                                                <input type="hidden" name="referalName" id="referalId" />
                                                <textarea class="form-control" id="replySummery" name="replySummary" placeholder="Send Reply" style="height:150px"></textarea>
                                                <br>
                                                <div class="action text-end bottom_modal">
                                                    <button type="submit"
                                                        class="btn r-04 btn--theme hover--tra-black add_patient"
                                                        data-bs-dismiss="modal">Save</button>
                                                    <button type="button" class="modalCloseBtn"
                                                        data-bs-dismiss="modal" aria-label="Close"> Close</button>
                                                </div>
                                            </form>
                                        @else
                                            <h1 class="modal-title" id="exampleModalLabel">View Referral Patient
                                                Summary </h1>
                                            <hr style="background: #060606;">
                                            <p><span class="appendReply"></span></p>
                                        @endif


                                        <br>

                                        <i class="fa-solid fa-eye">

                                            <a id="documentLink" href="" target="_blank"
                                                style="color: #007bff; text-decoration: none; background-color: transparent; font-family: fangsong; font-size: 21px;">
                                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i> View Document
                                            </a>

                                        </i>



                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

</div>





<div class="modal fade edit_patient__" id="viewOrderSummary" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">View Order Summary </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>


            <div class="modal-body padding-0">
                <div class="inner_data">
                    <div class="row top_head_vitals">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="report_check_box">

                                        <textarea class="form-control" id="viewOrderSummary_" name="patientSummary" placeholder="Summary...."
                                            style="height:150px"></textarea>

                                        {{-- <textarea id="referalSummaryData"></textarea>
--}}

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

</div>



<div class="modal fade edit_patient__" id="viewOrderCallSummary" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">View Order Summary </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>


            <div class="modal-body padding-0">
                <div class="inner_data">
                    <div class="row top_head_vitals">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="report_check_box">

                                        <textarea class="form-control" id="link" name="patientSummary" style="height:150px" readonly></textarea>

                                        <br>

                                        <input class="form-control" type="text" id="date" readonly>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

</div>


<script>
    function genrate_report(formType) {
        $('#form_print_type').val(formType);
        $('#genrate_report').modal('show');
    }

    function viewDocument(formType, formls) {
        console.log(formType);
        console.log(formls);
        $('#formType_').val(formType);
        $('#formSection_').val(formls);
        $('#attach_document').modal('show');
    }



    function ViewOrderSummary(smy) {
        $('#viewOrderSummary_').val(smy);
        $('#viewOrderSummary').modal('show');
    }

    function ViewOrderCallSummary(link, message) {
        $('#link').val(link);
        $('#date').val(message);
        $('#viewOrderCallSummary').modal('show');
    }


    function ViewSummary(formType, reply_summary,documentUrl, id) {
        // console.log(id);
        $('#referalSummaryData').val(formType);
        if(documentUrl == ''){
            documentUrl = '#';
        }
        $('#documentLink').attr('href', documentUrl);
        $('.appendReply').text(reply_summary);
        $('#referalId').val(id);
        $('#referalSummary').modal('show');
    }

    // function closeModal()  
    // {  alert("pl");
    //     $('#order_imagenairy').modal('hide');
    // }
</script>



<footer id="footer-3" class="pt-100 footer ft-3-ntr">

    <div class="container">

        @php
            $footer = DB::table('footers')->first();
        @endphp
        <!-- FOOTER CONTENT -->

        <div class="row">

            <!-- FOOTER LOGO -->

            <!-- FOOTER LOGO -->
            <div class="col-xl-4">
                <div class="footer-info mb-0">
                    @isset($footer->websitelogo)
                        <img class="footer-logo" src="{{ asset('/assets/video/' . $footer->websitelogo) }}"
                            alt="footer-logo">
                    @else
                        <img class="footer-logo" src="{{ asset('/assets/images/new-images/logofwhite.png') }}"
                            alt="footer-logo">
                    @endisset

                </div>
                <div class="contact_dt_ak">
                    <h6>Headquarter Location:</h6>
                    <p>{{ $footer->HeadquarterLocation ?? '' }}</p>
                    <h6>Mailing address:</h6>
                    <p>{{ $footer->Mailingaddress ?? '' }}</p>
                    <h6>International Call Center:</h6>
                    <p><a href="tel:+{{ $footer->CallCenter ?? '' }}">+{{ $footer->CallCenter ?? '' }}</a></p>
                </div>
            </div>

            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-lg-4 col-xl-2">
                <div class="footer-links fl-1">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Quick login</h6>
                    <ul class="foo-links clearfix">
                        <li>
                            <p><a href="{{ url('/') }}">Patient Login</a></p>
                        </li>
                        <li>
                            <p><a href="#">Staff Login</a></p>
                        </li>

                    </ul>
                    <h6 class="s-17 w-700 mt-3">Services</h6>
                    <!-- Links -->
                    <ul class="foo-links clearfix">
                        <li>
                            <p><a href="#">Women heal better</a></p>
                        </li>
                        <li>
                            <p><a href="#">Men heal better</a></p>
                        </li>
                        <li>
                            <p><a href="#">Women & Men heal better</a></p>
                        </li>
                        <li>
                            <p><a href="#">Regenerative therapies</a></p>
                        </li>
                    </ul>
                    <h6 class="s-17 w-700 mt-3">Legal</h6>
                    <ul class="foo-links clearfix">
                        <li>
                            <p><a href="{{ route('front.terms.page') }}">Terms of use</a></p>
                        </li>
                        <li>
                            <p><a href="{{ route('front.privacy.terms') }}">Privacy Policy</a></p>
                        </li>
                        <li>
                            <p><a href="{{ route('front.cookie.page') }}">Cookie Policy</a></p>
                        </li>

                    </ul>
                </div>
            </div> <!-- END FOOTER LINKS -->







            <!-- FOOTER LINKS -->
            <div class="col-sm-4 col-lg-4 col-xl-3">
                <div class="footer-links fl-3">

                    <!-- Title -->
                    <h6 class="s-17 w-700">Quick Connect</h6>

                    <!-- Links -->
                    <div class="coonect_box">
                        <div class="left_flag">
                            @isset($footer->logo1)
                                <img src="{{ asset('/assets/video/' . $footer->logo1) }}" alt="">
                            @else
                                <img src="{{ asset('/assets/images/new-images/Flag_of_Oman.svg.png') }}"
                                    alt="">
                            @endisset

                        </div>
                        <div class="contact_num">
                            <p><a href="https://wa.me/{{ $footer->logo1whatsapp ?? '' }}"><i
                                        class="fa-brands fa-whatsapp"></i> +{{ $footer->logo1whatsapp ?? '' }}</a>
                            </p>
                            <p><a href="tel:+{{ $footer->logo1phone ?? '' }}"><i class="fa-solid fa-phone"></i>
                                    +{{ $footer->logo1phone ?? '' }}</a></p>

                        </div>
                    </div>
                    <div class="coonect_box">
                        <div class="left_flag">
                            @isset($footer->logo2)
                                <img src="{{ asset('/assets/video/' . $footer->logo2) }}" alt="">
                            @else
                                <img src="{{ asset('/assets/images/new-images/Flag_of_the_United_Arab_Emirates.svg.png') }}"
                                    alt="">
                            @endisset

                        </div>
                        <div class="contact_num">
                            <p><a href="https://wa.me/{{ $footer->logo2whatsapp ?? '' }}"><i
                                        class="fa-brands fa-whatsapp"></i> +{{ $footer->logo2whatsapp ?? '' }}</a>
                            </p>
                            <p><a href="tel:+{{ $footer->logo2phone ?? '' }}"><i class="fa-solid fa-phone"></i>
                                    +{{ $footer->logo2phone ?? '' }}</a></p>

                        </div>
                    </div>
                    <div class="coonect_box">
                        <div class="left_flag">
                            @isset($footer->logo3)
                                <img src="{{ asset('/assets/video/' . $footer->logo3) }}" alt="">
                            @else
                                <img src="{{ asset('/assets/images/new-images/Flag_of_Saudi_Arabia.svg.png') }}"
                                    alt="">
                            @endisset

                        </div>
                        <div class="contact_num">
                            <p><a href="https://wa.me/{{ $footer->logo3whatsapp ?? '' }}"><i
                                        class="fa-brands fa-whatsapp"></i> +{{ $footer->logo3whatsapp ?? '' }}</a>
                            </p>
                            <p><a href="tel:+{{ $footer->logo3phone ?? '' }}"><i class="fa-solid fa-phone"></i>
                                    +{{ $footer->logo3phone ?? '' }}</a></p>

                        </div>
                    </div>
                    <div class="coonect_box">
                        <div class="left_flag">
                            @isset($footer->logo4)
                                <img src="{{ asset('/assets/video/' . $footer->logo4) }}" alt="">
                            @else
                                <img src="{{ asset('/assets/images/new-images/Flag_of_Bahrain-manama.png') }}"
                                    alt="">
                            @endisset

                        </div>
                        <div class="contact_num">
                            <p><a href="https://wa.me/{{ $footer->logo4whatsapp ?? '' }}"><i
                                        class="fa-brands fa-whatsapp"></i> +{{ $footer->logo4whatsapp ?? '' }}</a>
                            </p>
                            <p><a href="tel:+{{ $footer->logo4phone ?? '' }}"><i class="fa-solid fa-phone"></i>
                                    +{{ $footer->logo4phone ?? '' }}</a></p>

                        </div>
                    </div>
                    <!-- <ul class="foo-links clearfix address_ul">
   <li><i class="fa-solid fa-location-dot"></i>
    <p><a href="#">Main Branch Muscat - OMAN</a></p>
   </li>
   <li><i class="fa-solid fa-envelope"></i>
    <p><a href="mailto:admin@qastaratclinics.com">admin@qastaratclinics.com</a></p>
   </li>
   <li><i class="fa-solid fa-phone"></i>
    <p><a href="tel:+971581114000">+971581114000</a></p>
   </li>

  </ul> -->

                </div>
            </div> <!-- END FOOTER LINKS -->




            <!-- FOOTER NEWSLETTER FORM -->
            <div class="col-sm-10 col-md-8 col-lg-4 col-xl-3">
                <div class="footer-form">

                    <!-- Title -->
                    <h6 class="s-17 w-700">{{ $footer->text1 ?? '' }}</h6>

                    <!-- Newsletter Form Input -->
                    <form class="newsletter-form">

                        <div class="input-group r-06">
                            <input type="email" class="form-control" placeholder="Email Address" required
                                id="s-email">
                            <span class="input-group-btn ico-15">
                                <button type="submit" class="btn color--theme">
                                    <span class="flaticon-right-arrow-1 submit_btn"></span>
                                </button>
                            </span>
                        </div>

                        <!-- Newsletter Form Notification -->
                        <label for="s-email" class="form-notification"></label>

                    </form>

                </div>
            </div> <!-- END FOOTER NEWSLETTER FORM -->


        </div> <!-- END FOOTER CONTENT -->

        <hr> <!-- FOOTER DIVIDER LINE -->

        <!-- BOTTOM FOOTER -->
        <div class="bottom-footer">
            <div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">


                <!-- FOOTER COPYRIGHT -->
                <div class="col-lg-8">
                    <div class="footer-copyright">
                        <p class="p-sm">2023-24, All Right Reserved by Qastarat & Dawali Clinics - Developed by <a
                                href="https://techmavesoftware.com/">TechMave Software</a> .</p>
                    </div>
                </div>


                <!-- FOOTER SOCIALS -->
                <div class="col-lg-4">
                    <ul class="bottom-footer-socials ico-20 text-end">
                        <li><a href="https://www.instagram.com/qastarat_clinics?igshid=OGQ5ZDc2ODk2ZA= ="><span
                                    class="fa-brands fa-instagram"></span></a></li>
                        <li><a href="https://www.tiktok.com/@qastaratclinic?is_from_webapp=1&sender_deice=pc"><span
                                    class="fa-brands fa-tiktok"></span></a></li>
                        <li><a href="https://t.snapchat.com/3anKvKfI"><span
                                    class="fa-brands fa-snapchat"></span></a></li>
                        <li><a href="https://twitter.com/QastaratClinics"><span
                                    class="fa-brands fa-x-twitter"></span></a></li>
                        <li><a href="https://www.youtube.com/channel/UCZ7m9sTh7LemaK5xtHG-0gA"><span
                                    class="fa-brands fa-youtube"></span></a></li>

                    </ul>
                </div>
                <!-- <i class="fa-brands fa-x-twitter"></i>
    <i class="fa-brands fa-facebook-f"></i>
    <i class="fa-brands fa-instagram"></i>
    <i class="fa-brands fa-linkedin-in"></i> -->
            </div> <!-- End row -->
        </div> <!-- END BOTTOM FOOTER -->

    </div> <!-- End container -->

</footer> <!-- END FOOTER-3 -->


</div> <!-- END PAGE CONTENT -->






<form id="patientForm" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade add_patient__" id="add_patient" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">



                <div class="modal-header">

                    <h1 class="modal-title" id="exampleModalLabel">Add A New Patient </h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>

                </div>

                <div class="modal-body body-patient">

                    <div class="inner_data pt-0">

                        <div class="basic_details_patient">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Basic Info</h4>
                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Profile
                                                Image</label>

                                            <input type="file" class="form-control" id=""
                                                placeholder=" " name="profile_image" id="profile_image">
                                            <span id="profile_imageError"
                                                style="color: red;font-size:smaller"></span>
                                            <!-- @error('profile_image')
 <span class="alert alert-danger">{{ $message }}</span>
@enderror -->
                                        </div>


                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Title</label>

                                        <select class="form-control select2_modal_" name="sirname">

                                            <option value="mr">Mr</option>

                                            <option value="Mrs">Mrs</option>

                                            <option value="Miss">Miss</option>

                                            <option value="Ms">Ms</option>

                                            <option value="Dr">Dr</option>

                                            <option value="Lady">Lady</option>

                                            <option value="Sir">Sir</option>

                                            <option value="Professor">Professor</option>

                                            <option value="Capt">Capt</option>

                                            <option value="Lord">Lord</option>



                                        </select>
                                        <span id="titleError" style="color: red;"></span>
                                        <!-- @error('sirname')
 <span class="alert alert-danger">{{ $message }}</span>
@enderror -->

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Name</label>

                                        <input type="text" class="form-control" id="" placeholder=" "
                                            name="name">
                                        <span id="nameError" style="color: red;font-size:smaller"></span>
                                        <!-- @error('name')
 <span class="alert alert-danger">{{ $message }}</span>
@enderror -->
                                    </div>

                                </div>



                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        @php
                                            $doctorName = DB::table('doctors')
                                                ->where(['role_id' => '1', 'status' => 'active'])
                                                ->get();
                                        @endphp

                                        <label for="validationCustom01" class="form-label">Select Doctor</label>

                                        <select class="form-control select2_modal_" name="doctor_id" required>

                                            <option value="">Selct Any One</option>

                                            @foreach ($doctorName as $doctorName)
                                                <option value="{{ $doctorName->id }}">{{ $doctorName->name }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>

                                </div>



                                

                                @if (!empty($allBranch))
                                    <div class="col-lg-6">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Select
                                                Branch </label>
                                            <select class="form-control select2_modal_" name="selectBranch"
                                                required>
                                                <option value="">Select Any One</option>
                                                @forelse ($allBranch as $allbranchs)
                                                    <option value="{{ $allbranchs->id }}">
                                                        {{ $allbranchs->branch_name }}</option>
                                                @empty
                                                    <option value="" disabled>No branches available</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label">Date of Birth</label>
                                        <div class="input-group" id="datepicker1">
                                            <input type="text" class="datepicker form-control "
                                                placeholder="dd M, yyyy" data-date-format="dd M, yyyy"
                                                data-date-container='#datepicker1' data-provide="datepicker"
                                                name="birth_date" id="birth_date" data-date-end-date="0d">
                                            <span id="datepickerError"
                                                style="color: red; font-size: smaller"></span>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Gender</label>

                                        <select class="form-control select2_modal_" name="gender">

                                            <option value="">Select</option>

                                            <option value="male">Male</option>

                                            <option value="female">Female</option>

                                            <option value="female">Other</option>

                                        </select>

                                        <span id="genderError" style="color: red;font-size:smaller"></span>
                                        <!-- @error('gender')
 <span class="alert alert-danger">{{ $message }}</span>
@enderror -->
                                    </div>

                                </div>

                            </div>

                        </div>



                        <div class="postalcode_patienadd">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Postal Address</h4>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Post Code</label>

                                        <input type="text" class="form-control" id="" placeholder=""
                                            name="post_code">
                                        <span id="post_codeError" style="color: red;font-size:smaller"></span>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Street</label>

                                        <input type="text" class="form-control" id="" placeholder=""
                                            name="street">
                                        <span id="streetError" style="color: red;font-size:smaller"></span>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Town</label>

                                        <input type="text" class="form-control" id="" placeholder=""
                                            name="town">
                                        <span id="townError" style="color: red;font-size:smaller"></span>
                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Country</label>

                                        @php
                                            $allCountrie = DB::table('countries')->get();
                                        @endphp

                                        <select class="form-control select2_modal_" name="country"
                                            id="Selectcountry" required>
                                            <option value="">Select Any One</option>

                                            @forelse ($allCountrie as $countrie)
                                                <option value="{{ $countrie->Name }}">{{ $countrie->Name }}
                                                </option>
                                            @empty
                                            @endforelse


                                        </select>
                                        <span id="countryError" style="color: red;font-size:smaller"></span>


                                    </div>

                                </div>

                            </div>

                        </div>





                        <div class="phnemailadd_pat">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Phone and Email</h4>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Email Address</label>

                                        <input type="text" class="form-control" id="" placeholder=""
                                            name="email">
                                        <span id="emailError" style="color: red;font-size:smaller"></span>
                                        <!-- @error('email')
 <span class="alert alert-danger">{{ $message }}</span>
@enderror -->
                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Mobile Phone</label>

                                        <input type="text"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            class="form-control" id="" placeholder=""
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                            minlength="0" maxlength="15" name="mobile_no"
                                            pattern="[0-9]{10,15}">
                                        <span id="mobile_noError" style="color: red;font-size:smaller"></span>
                                        <!-- @error('mobile_no')
 <span class="alert alert-danger">{{ $message }}</span>
@enderror -->
                                    </div>

                                </div>



                                <div class="col-lg-4">
                                    <div class="mb-3 form-group position-relative">
                                        <label for="validationCustom01" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="passwordField"
                                                placeholder="Password" name="password">
                                            <div class="input-group-append">
                                                <span class="">
                                                    <i class="toggle-password fa fa-eye-slash"
                                                        onclick="togglePasswordVisibility()"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="documentsadd_pat">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Document Type</h4>

                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Select Id</label>
                                        <select class="form-control select2_modal_" name="document_type"
                                            id="document_type" style="width: 100%;">
                                            <option value="">Select Any One</option>
                                            <option value="CIVIL ID"
                                                {{ old('document_type') == 'CIVIL ID' ? 'selected' : '' }}>CIVIL ID
                                            </option>
                                            <option value="EID"
                                                {{ old('document_type') == 'EID' ? 'selected' : '' }}>EID</option>
                                            <option value="PERSONAL NUMBER"
                                                {{ old('document_type') == 'PERSONAL NUMBER' ? 'selected' : '' }}>
                                                PERSONAL NUMBER</option>
                                            <option value="RESIDENT ID"
                                                {{ old('document_type') == 'RESIDENT ID' ? 'selected' : '' }}>
                                                RESIDENT ID</option>
                                            <option value="PASSPORT, DRIVER's LICENSE, ETC"
                                                {{ old('document_type') == 'PASSPORT, DRIVERs LICENSE, ETC' ? 'selected' : '' }}>
                                                PASSPORT, DRIVER's LICENSE, ETC</option>

                                        </select>
                                        @error('document_type')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Enter Id Number</label>
                                        <input type="text" name="enterIdNumber" id="enterIdNumber"
                                            value="{{ old('enterIdNumber') }}" class="form-control"
                                            placeholder="">
                                        <span class="error text-danger" id="validationMessage"> </span>

                                    </div>
                                </div>


                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Landline</label>


                                        <input type="text"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                            minlength="0" maxlength="15"
                                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            class="form-control" id="landline" placeholder="" minlength="0"
                                            maxlength="15" name="landline" pattern="[0-9]{10,15}">

                                        <span id="landlineError" style="color: red;font-size:smaller"></span>
                                    </div>

                                </div>

                            </div>

                        </div>







                    </div>



                    <div class="action text-end bottom_modal"
                        style="justify-content: right;
                 display: flex;
                 align-items: center;
                 flex-direction: row-reverse;">

                        <div id="ajaxLoader" class="loader_1" style="display: none;"></div>


                        {{-- 
                     <div id="ajaxLoader" style="display: none;">
                         <svg width="100" height="100" viewBox="0 0 100 100">
                             <circle cx="50" cy="50" r="40" stroke="#000" stroke-width="4" fill="none"/>
                         </svg>
                     </div> --}}


                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            <iconify-icon icon="bi:save"></iconify-icon> Save

                        </button>

                    </div>

                </div>



                <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

            </div>

        </div>

    </div>

</form>



<!-- Modal -->

<div class="modal fade edit_patient__" id="edit_patient" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Edit Patient Info.</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="edit_patient_info_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ encrypt(@$id) }}" />
                <div class="modal-body body-patient">

                    <div class="inner_data pt-0 edit_patient__cusr">

                        <div class="basic_details">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Basic Info</h4>



                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Profile
                                                Image</label>

                                            <input type="file" class="form-control" id=""
                                                placeholder=" " name="profile_image" id="profile_image">
                                            <span id="profile_imageError"
                                                style="color: red;font-size:smaller"></span>

                                        </div>




                                    </div>



                                    <div class="row">

                                        <div class="col-lg-6">

                                            <div class="mb-3 form-group">

                                                <label class="form-label">Title <span>*</span></label>

                                                <select class="form-control select2_edit_info"
                                                    name="patient_sirname" id="patient_sirname" required>

                                                    <option value="mr">Mr</option>

                                                    <option value="Mrs">Mrs</option>

                                                    <option value="Miss">Miss</option>

                                                    <option value="Ms">Ms</option>

                                                    <option value="Dr">Dr</option>

                                                    <option value="Lady">Lady</option>

                                                    <option value="Sir">Sir</option>

                                                    <option value="Professor">Professor</option>

                                                    <option value="Capt">Capt</option>

                                                    <option value="Lord">Lord</option>



                                                </select>

                                                <span id="patient_sirnameError" style="color: red;"></span>

                                            </div>

                                        </div>

                                        <div class="col-lg-6">

                                            <div class="mb-3 form-group">

                                                <label for="validationCustom01" class="form-label">Name</label>

                                                <input type="text" class="form-control" id="patient_name"
                                                    placeholder="" name="patient_name">
                                                <span id="patient_nameError"
                                                    style="color: red;font-size:smaller"></span>

                                            </div>

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="mb-4">

                                                <label class="form-label">Date of Birth</label>

                                                <div class="input-group" id="datepicker3">

                                                    <input type="text" class="form-control"
                                                        placeholder="dd M, yyyy" data-date-format="dd M, yyyy"
                                                        data-date-container='#datepicker3'
                                                        data-provide="datepicker" name="patient_birth"
                                                        id="patient_birth">
                                                    <span id="patient_birthError"
                                                        style="color: red;font-size:smaller"></span>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4">

                                            <div class="mb-3 form-group">

                                                <label class="form-label">Gender <span>*</span></label>

                                                <select class="form-control select2_edit_info"
                                                    name="patient_gendar" id="patient_gendar" required>

                                                    <option value="">Select</option>

                                                    <option value="male">Male</option>

                                                    <option value="female">Female</option>

                                                </select>

                                                <span id="patient_gendarError"
                                                    style="color: red;font-size:smaller"></span>


                                            </div>

                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3 form-group">
                                                <label for="validationCustom01" class="form-label">Select
                                                    Branch <span>*</span></label>
                                                <select class="form-control" id="patient_branch" name="selectBranch"
                                                    required>
                                                    <option value="">Select Any One</option>
                                                    @forelse ($allBranch as $allbranchs)
                                                        <option value="{{ $allbranchs->id }}">
                                                            {{ $allbranchs->branch_name }}</option>
                                                    @empty
                                                        <option value="" disabled>No branches available</option>
                                                    @endforelse
                                                </select>
                                                <span id="patient_branchError"
                                                style="color: red;font-size:smaller"></span>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <div class="postal__address">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Postal Address</h4>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Post Code</label>

                                        <input type="text" class="form-control" id="patient_post_code"
                                            placeholder="" name="patient_post_code">
                                        <span id="patient_post_codeError"
                                            style="color: red;font-size:smaller"></span>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Street</label>

                                        <input type="text" class="form-control" id="patient_street"
                                            placeholder="" name="patient_street">
                                        <span id="patient_streetError" style="color: red;font-size:smaller"></span>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Town</label>

                                        <input type="text" class="form-control" id="patient_town"
                                            placeholder="" name="patient_town">
                                        <span id="patient_townError" style="color: red;font-size:smaller"></span>

                                    </div>

                                </div>



                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label class="form-label">Country</label>

                                        @php
                                            $allCountrie = DB::table('countries')->get();
                                        @endphp

                                        <select class="form-control select2_edit_info" id="Selectcountry_"
                                            name="patient_country" required>


                                            @forelse ($allCountrie as $countrie)
                                                <option value="{{ $countrie->Name }}">{{ $countrie->Name }}
                                                </option>
                                            @empty
                                            @endforelse


                                        </select>
                                        <span id="countryError" style="color: red;font-size:smaller"></span>


                                    </div>

                                </div>


                            </div>

                        </div>



                        <div class="phnandemail">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Phone and Email</h4>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Email Address</label>

                                        <input type="email" class="form-control" id="patient_email"
                                            placeholder="" name="patient_email" readonly>
                                        <span id="patient_emailError" style="color: red;font-size:smaller"></span>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Mobile Phone</label>

                                        <input type="text" class="form-control" id="patient_mobile_no"
                                            placeholder="" name="patient_mobile_no">
                                        <span id="patient_mobile_noError"
                                            style="color: red;font-size:smaller"></span>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Landline</label>

                                        <input type="text" class="form-control" id="patient_landline"
                                            placeholder="" name="patient_landline">
                                        <span id="patient_landlineError"
                                            style="color: red;font-size:smaller"></span>

                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Other Details</h4>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Next of Kin </label>

                                        <input type="text" class="form-control" id="patient_kin"
                                            placeholder="" name="patient_kin">
                                        <span id="patient_kinError" style="color: red;font-size:smaller"></span>


                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Policy No</label>

                                        <input type="text" class="form-control" id="patient_policy_no"
                                            placeholder="" name="patient_policy_no">
                                        <span id="patient_policy_noError"
                                            style="color: red;font-size:smaller"></span>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">GP</label>

                                        <input type="text" class="form-control" id="patient_gp" placeholder=""
                                            name="patient_gp">
                                        <span id="patient_gpError" style="color: red;font-size:smaller"></span>

                                    </div>

                                </div>



                                <div class="col-lg-12">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Additional Info.</label>

                                        <textarea class="form-control" placeholder="" style="height: 100px" id="patient_additional_info"
                                            name="patient_additional_info"></textarea>
                                        <span id="patient_additional_infoError"
                                            style="color: red;font-size:smaller"></span>

                                    </div>

                                </div>


                                <div class="col-lg-12">

                                    <div class="add_categoryweb">



                                        <div class="row">

                                            <div class="col-lg-12">

                                                <label for="validationCustom01" class="form-label">Tags</label>

                                                <div class="category-container" id="category-container-2">

                                                    <input type="text" class="form-control category-input"
                                                        placeholder="To allow future audits" name="patient_tags"
                                                        id="patient_tags">

                                                    <button
                                                        class="btn r-04 btn--theme hover--tra-black add_patient add-category"
                                                        type="button"><i class="fa-solid fa-plus"></i>
                                                        Add</button>

                                                </div>
                                                <span id="patient_tagsError"
                                                    style="color: red;font-size:smaller"></span>

                                                <div class="categories-list" id="categories-list-2"
                                                    name="patient_tags_list">

                                                    <!-- Categories will be displayed here -->

                                                </div>
                                                <span id="patient_tags_listError"
                                                    style="color: red;font-size:smaller"></span>

                                            </div>

                                        </div>



                                    </div>

                                </div>

                            </div>

                        </div>





                        <div class="documentsadd_pat">




                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="title_head">

                                        <h4>Document Type</h4>

                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Select Id</label>
                                        <select class="form-control select2_edit_info" name="document_type"
                                            id="Edit_document_type" style="width: 100%;">
                                            <option value="">Select Any One</option>
                                            <option value="CIVIL ID"
                                                {{ old('document_type') == 'CIVIL ID' ? 'selected' : '' }}>CIVIL ID
                                            </option>
                                            <option value="EID"
                                                {{ old('document_type') == 'EID' ? 'selected' : '' }}>EID</option>
                                            <option value="PERSONAL NUMBER"
                                                {{ old('document_type') == 'PERSONAL NUMBER' ? 'selected' : '' }}>
                                                PERSONAL NUMBER</option>
                                            <option value="RESIDENT ID"
                                                {{ old('document_type') == 'RESIDENT ID' ? 'selected' : '' }}>
                                                RESIDENT ID</option>
                                            <option value="PASSPORT, DRIVER's LICENSE, ETC"
                                                {{ old('document_type') == 'PASSPORT, DRIVERs LICENSE, ETC' ? 'selected' : '' }}>
                                                PASSPORT, DRIVER's LICENSE, ETC</option>

                                        </select>
                                        @error('document_type')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Enter Id Number</label>
                                        <input type="text" name="enterIdNumber" id="editEnterIdNumber"
                                            value="{{ old('enterIdNumber') }}" class="form-control"
                                            placeholder="">
                                        <span class="error text-danger" id="editValidationMessage"> </span>

                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit"
                            class="btn r-04 btn--theme hover--tra-black add_patient">Update</button>



                    </div>

                </div>
            </form>
            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>

<!-- Modal -->



<div class="modal fade edit_patient__" id="create_appointment" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Create Appointment </h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="mb-4">

                                <label class="form-label">Select Date</label>

                                <div class="input-group" id="datepicker2">

                                    <input type="text" class="form-control" placeholder="dd M, yyyy"
                                        data-date-format="dd M, yyyy" data-date-container='#datepicker2'
                                        data-provide="datepicker">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">

                        <iconify-icon icon="bi:save"></iconify-icon> Save

                    </a>



                </div>

            </div>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!-- Modal -->

<div class="modal fade edit_patient__" id="send_message" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Send a Message</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <!-- <div class="col-lg-12">

                                 <div class="title_head">

                                     <h4>Schedule Appointment</h4>

                                 </div>

                             </div> -->



                        <div class="col-lg-12">

                            <div class="mb-3 form-group">

                                <label for="validationCustom01" class="form-label">Subject</label>

                                <input type="text" class="form-control" id="" placeholder="">

                            </div>

                        </div>



                        <div class="col-lg-12">

                            <div class="mb-3 form-group">

                                <label for="validationCustom01" class="form-label">Message</label>

                                <textarea class="form-control" placeholder="" style="height: 100px"></textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient send_message"
                        data-bs-dismiss="modal">Send Message <iconify-icon icon="teenyicons:send-outline">

                        </iconify-icon></a>




                </div>

            </div>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!-- Modal Add & Edit Insure-->

<div class="modal fade edit_patient__" id="insure_add_edit" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add or Edit Insurer</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="edit_insurer_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                 <div class="title_head">

                                     <h4>Schedule Appointment</h4>

                                 </div>

                             </div> -->



                            <div class="col-lg-12">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Insurer Name</label>

                                    <input type="text" class="form-control insurer_name" id=""
                                        placeholder="" name="insurer_name">
                                    <span id="insurer_nameError" style="color: red;font-size:small"></span>

                                </div>

                            </div>



                            <div class="col-lg-12">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Insurance Number</label>

                                    <input type="text" class="form-control insurer_number" id=""
                                        placeholder="" name="insurer_number">
                                    <span id="insurer_numberError" style="color: red;font-size:small"></span>
                                </div>

                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black " style="padding: 12px 15px !important;
  font-size: 12px;
  display: inline-flex;
  align-items: center;">

                            <iconify-icon class="mx-2" icon="bi:save"></iconify-icon> Save & Update

                        </button>



                    </div>

                </div>
            </form>
            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!-- Modal Add & Edit Insure-->

<div class="modal fade edit_patient__" id="extract_code" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Extract SNOMED Codes from Notes</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <!-- <div class="col-lg-12">

                                 <div class="title_head">

                                     <h4>Schedule Appointment</h4>

                                 </div>

                             </div> -->



                        <div class="col-lg-12">

                            <div class="mb-2 form-group">

                                <label class="form-label">Select an Entry</label>

                                <select class="form-control select2_extract_code">

                                    <option value=""></option>

                                    <option value="">Note Sat, 21 Oct,2023</option>



                                </select>



                            </div>

                        </div>

                        <div class="col-lg-12">

                            <p class="note">Make sure the note you are selecting has substantial content. If not
                                the

                                action will fail. You can try forcing it by clicking the button again. </p>

                        </div>



                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">

                        Extract</a>



                </div>

            </div>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

             Executive Summary

         ---------------------------->

<div class="modal fade edit_patient__" id="executive_summary" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Executive Summary</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <!-- <div class="col-lg-12">

                                 <div class="title_head">

                                     <h4>Schedule Appointment</h4>

                                 </div>

                             </div> -->



                        <div class="col-lg-12">

                            <div class="mb-3 form-group">

                                <label for="validationCustom01" class="form-label">Write Executive
                                    Summary</label>

                                <textarea class="form-control" placeholder="" style="height: 150px"></textarea>

                            </div>

                        </div>



                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">

                        Save</a>

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                        data-bs-dismiss="modal">

                        Close</a>

                </div>

            </div>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>





<!----------------------------

              Symptoms

         ---------------------------->

<div class="modal fade edit_patient__" id="symptoms_add" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add Symptoms</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">


                        <div class="col-lg-12">

                            <div class="add_categoryweb">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <label for="validationCustom01" class="form-label">Type Symptoms</label>
                                        <form id="symptom_form">
                                            @csrf
                                            <input type="hidden" name="patient_id"
                                                value="{{ @$id }}" />
                                            <div class="category-container" id="category-container-1">

                                                <input type="text" class="form-control category-input"
                                                    placeholder="Type Symptoms here..." name="symptom_name">
                                                <span id="symptom_nameError"
                                                    style="color: red;font-size:small"></span>

                                                <button class="btn r-04 btn--theme hover--tra-black add_patient "
                                                    type="submit"><i class="fa-solid fa-plus"></i> Add</button>

                                            </div>
                                        </form>


                                        <div class="categories-list" id="categories-list-1">






                                        </div>

                                    </div>

                                </div>



                            </div>

                        </div>



                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                     Save</a> -->

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                        data-bs-dismiss="modal">

                        Close</a>

                </div>

            </div>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

         clinical_exam

         ---------------------------->

<div class="modal fade edit_patient__" id="clinical_exam" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Clinical Exam</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="clinical_exam_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">





                            <div class="col-lg-12">





                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Write</label>

                                            <textarea class="form-control" placeholder="" style="height:150px" name="write_text"></textarea>
                                            <span id="write_textError" style="color: red;font-size:small"></span>

                                        </div>

                                    </div>

                                </div>





                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
            </form>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

             Drugs / Current Meds

         ---------------------------->


<style>
    #stoppedDateDiv {
        display: none;
        /* Hide by default */
    }
</style>

<div class="modal fade edit_patient__" id="medicine_add_edit" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Drugs / Current Meds</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <form id="drug_from">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <input type="hidden" name="formName" id="formName" value="" />

                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Type a Drug
                                            Name</label>

                                        <input type="search" class="form-control" id=""
                                            placeholder="" name="drug_name">


                                        <span id="drug_nameError" style="color: red;font-size:small"></span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Frequency</label>

                                        <input type="search" class="form-control" id=""
                                            placeholder="" name="frequency">
                                        <span id="frequencyError" style="color: red;font-size:small"></span>


                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-2">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Today Date</label>

                                        <input type="text" class="form-control basicDate"
                                            placeholder="M, dd yyyy" name="today_date">

                                    </div>

                                </div>

                            </div>



                            <div class="col-lg-2">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Duration</label>

                                        <input type="search" class="form-control" id=""
                                            placeholder="" name="duration">

                                        <span id="durationError" style="color: red;font-size:small"></span>


                                    </div>

                                </div>

                            </div>



                            <div class="col-lg-2">
                                <div class="inner_element mt-4">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="stopped"
                                                id="is_stopped" value="is_stopped">
                                            <label class="form-check-label" for="is_stopped">
                                                Stopped
                                            </label>
                                            <span id="stoppedError" style="color: red;font-size:small"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3" id="stoppedDateDiv">
                                <div class="inner_element">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="form-label">Stopped Date</label>
                                        <input type="text" class="form-control basicDate"
                                            placeholder="M, dd yyyy" name="stopped_date">
                                    </div>
                                </div>
                            </div>

                            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#is_stopped').change(function() {
                                        if ($(this).is(':checked')) {
                                            $('#stoppedDateDiv').show();
                                        } else {
                                            $('#stoppedDateDiv').hide();
                                        }
                                    });
                                });
                            </script>









                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Code</label>

                                        <input type="search" class="form-control" id=""
                                            placeholder="" name="drug_code">

                                        <span id="drug_codeError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>



                            <div class="col-lg-2">

                                <div class="inner_element add_medicine_btn">

                                    <div class="form-group">

                                        <button type="submit" class="add_diagnosis">+ Add</button>

                                    </div>

                                </div>

                            </div>
            </form>
        </div>

        <div class="drug_table_diagnosis">

            <table class="table table-striped table-bordered">

                <thead>
                    <tr>
                        <th>Drug Name</th>
                        <th>Frequency</th>
                        <th>Today Date</th>
                        <th>Duration</th>
                        <th>Stopped</th>
                        <th>Stopped Date</th>
                        <th>Code</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="drug_table_body">



                </tbody>


            </table>

        </div>

    </div>

    <div class="action text-end bottom_modal">

        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
            data-bs-dismiss="modal">

            Close</a>

    </div>

</div>


</div>

</div>

</div>

<!----------------------------

              allergies add

         ---------------------------->









<!----------------------------

          Add or Remove Diagnosis

         ---------------------------->

<div class="modal fade edit_patient__" id="diagnosis" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add or Remove Diagnosis</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="AddRemoveDiagnosis">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                 <div class="title_head">

                                     <h4>Schedule Appointment</h4>

                                 </div>

                             </div> -->





                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Type a Diagnosis
                                            name</label>

                                        <input type="search" class="form-control" id=""
                                            placeholder="">

                                        <button class="btn search_btn">

                                            <iconify-icon icon="prime:search-plus" width="24"></iconify-icon>

                                        </button>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Date</label>

                                        <div class="input-group" id="datepicker20">



                                            <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                data-date-format="dd M, yyyy" data-date-container='#datepicker20'
                                                data-provide="datepicker">

                                        </div>

                                        <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                    </div>



                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Comment</label>

                                        <input type="search" class="form-control" id=""
                                            placeholder="">



                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">SNOMED</label>

                                        <input type="search" class="form-control" id=""
                                            placeholder="">



                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-2">

                                <div class="inner_element mt-4">

                                    <div class="form-group">

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">

                                            <label class="form-check-label" for="flexCheckDefault">

                                                Active

                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <div class="col-lg-2">

                                <div class="inner_element mt-4">

                                    <div class="form-group">

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault1">

                                            <label class="form-check-label" for="flexCheckDefault1">

                                                Flag

                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element mt-4">

                                    <div class="form-group">

                                        <button type="submit" class="add_diagnosis"> Add More</button>

                                    </div>

                                </div>

                            </div>








            </form>




        </div>

        <div class="add_data_diagnosis">

            <table class="table table-striped table-bordered" id="add_data_diagnosis">

                <tr>

                    <th>Diagnosis Name</th>

                    <th>Date</th>

                    <th>Comment</th>

                    <th>SNOMED</th>

                    <th>Status</th>

                    <th>Flag</th>

                    <th>Action</th>

                </tr>

                <tr>

                    <td>Routine venipuncture</td>

                    <td>15 Nov, 2023</td>

                    <td>Lorem ipsum dolor sit amet.</td>

                    <td></td>

                    <td><span class="badge badge-soft-success ">Active</span></td>

                    <td><i class="fa-regular fa-flag"></i></td>

                    <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                </tr>

                <tr>

                    <td>Lipid panel</td>

                    <td>15 Nov, 2023</td>

                    <td>Lorem ipsum dolor sit amet.</td>

                    <td></td>

                    <td><span class="badge badge-soft-success ">Active</span></td>

                    <td><i class="fa-regular fa-flag"></i></td>

                    <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                </tr>

            </table>

        </div>

    </div>

    <div class="action text-end bottom_modal">

        {{-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                     Save</a> --}}

        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
            data-bs-dismiss="modal">

            Close</a>

    </div>

</div>

<!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

</div>

</div>

</div>



<!----------------------------

              Future Plans

         ---------------------------->

<div class="modal fade edit_patient__" id="future_plans" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Future Plans</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="future_plan_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">



                            <div class="col-lg-12">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Date</label>

                                        <div class="input-group">
                                            <input type="date" class="form-control" placeholder="dd M, yyyy"
                                                name="future_date" id="future_date_1" autocomplete="off">
                                        </div>

                                        <span id="future_dateError" style="color: red;font-size:small"></span>
                                        <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                    </div>



                                </div>

                            </div>


                            <script>
                                // Get the input element by its ID
                                var inputDate = document.getElementById('future_date_1');

                                // Get today's date in the format yyyy-mm-dd
                                var today = new Date();
                                var dd = String(today.getDate()).padStart(2, '0');
                                var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                                var yyyy = today.getFullYear();

                                today = yyyy + '-' + mm + '-' + dd;

                                // Set the minimum date of the input to today
                                inputDate.setAttribute('min', today);
                            </script>





                            <div class="col-lg-12">



                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Write</label>

                                            <textarea class="form-control" placeholder="" style="height:150px" name="future_write"></textarea>
                                            <span id="future_writeError"
                                                style="color: red;font-size:small"></span>

                                        </div>

                                    </div>

                                </div>





                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
            </form>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

              procedure list

         ---------------------------->

<div class="modal fade edit_patient__" id="procedure_list" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">List of Procedure</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <!-- <div class="col-lg-12">

                                 <div class="title_head">

                                     <h4>Schedule Appointment</h4>

                                 </div>

                             </div> -->

                        <div class="col-lg-12">

                            <div class="procedure_list_">

                                <h6 class="procedure_main_title">Reception</h6>

                                <h6 class="procedure_sub_title">Pre-Procedure :</h6>

                                <ul class="procedure_list_check mb-3">

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault1">

                                            <label class="form-check-label" for="flexCheckDefault1">

                                                Fee Paid

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault2">

                                            <label class="form-check-label" for="flexCheckDefault2">

                                                4wk Follow-up booked (US + TFT)

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault3">

                                            <label class="form-check-label" for="flexCheckDefault3">

                                                Patient File Prepared

                                                <ul class="patient_file_list">

                                                    <li>Clinical Note</li>

                                                    <li>Ultrasound images</li>

                                                    <li>LAB - CBC/PT/PTT report</li>

                                                    <li>LAB - TSH/T4 report</li>

                                                    <li>FNA report</li>

                                                    <li>Consent Form</li>

                                                    <li>Discharge Prescription</li>

                                                </ul>

                                            </label>

                                        </div>

                                    </li>



                                </ul>

                                <h6 class="procedure_main_title">NURSE</h6>

                                <h6 class="procedure_sub_title">Pre-Procedure :</h6>

                                <ul class="procedure_list_check mb-3">

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault4">

                                            <label class="form-check-label" for="flexCheckDefault4">

                                                Lab cleared

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault5">

                                            <label class="form-check-label" for="flexCheckDefault5">

                                                Consent taken

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault6">

                                            <label class="form-check-label" for="flexCheckDefault6">

                                                Tools kit assigned

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault7">

                                            <label class="form-check-label" for="flexCheckDefault7">

                                                6 hours NPO

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault8">

                                            <label class="form-check-label" for="flexCheckDefault8">

                                                IV cannula left arm

                                            </label>

                                        </div>

                                    </li>



                                </ul>

                                <h6 class="procedure_main_title">NURSE</h6>

                                <h6 class="procedure_sub_title">Post-Procedure :</h6>

                                <ul class="procedure_list_check mb-3">

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault9">

                                            <label class="form-check-label" for="flexCheckDefault9">

                                                60 min Cold applied

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault10">

                                            <label class="form-check-label" for="flexCheckDefault10">

                                                Solu-Medrol injected

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault11">

                                            <label class="form-check-label" for="flexCheckDefault11">

                                                Paracetamol injected

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault12">

                                            <label class="form-check-label" for="flexCheckDefault12">

                                                6 hours NPO

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault13">

                                            <label class="form-check-label" for="flexCheckDefault13">

                                                Ancef injected

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault14">

                                            <label class="form-check-label" for="flexCheckDefault14">

                                                Discharge Prescription

                                                given & explained

                                            </label>

                                        </div>

                                    </li>

                                    <li>

                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault15">

                                            <label class="form-check-label" for="flexCheckDefault15">

                                                Discharge instructions given & explained

                                            </label>

                                        </div>

                                    </li>

                                </ul>

                            </div>

                        </div>



                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">

                        Save</a>

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                        data-bs-dismiss="modal">

                        Close</a>

                </div>

            </div>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

               Patient Refer

         ---------------------------->
<div class="modal fade edit_patient__" id="refer_patient" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Refer to Another Clinician</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <form action="{{ route('referalPatient') }}" method="post" id="refer_form"
                enctype="multipart/form-data"> @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}">
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="">


                            <div class="row top_head_vitals">

                                <div class="col-lg-12">

                                    <div class="inner_element search_dr">

                                        <div class="form-group">
                                            <input type="search" class="form-control" id="searchInput"
                                                oninput="searchDoctors()"
                                                placeholder="Find a user by name or specialty..">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <div class="doctor_list">

                                        <h6 class="list_title_dr">List of Available Clinicians</h6>

                                        <ul>


                                            @php

                                                $doctorList = DB::table('doctors')->where('role_id', '1');

                                                if (auth()->guard('doctor')->user()->role_id == '1') {
                                                    $doctorList = $doctorList->where(
                                                        'id',
                                                        '!=',
                                                        auth()->guard('doctor')->user()->id,
                                                    );
                                                }

                                                $doctorList = $doctorList->get();

                                            @endphp
                                            @forelse ($doctorList as $alldoctorList)
                                                <li>
                                                    <div class="booking_card_select">

                                                        {{-- <input type="checkbox" class="check_dr" value="{{ $alldoctorList->id }}" name="doctorId[]" id="cbx1{{ $alldoctorList->id }}"> --}}
                                                        <input name="patientId" type="hidden"
                                                            value="{{ $alldoctorList->id }}" />
                                                        <input type="checkbox" class="check_dr"
                                                            name="doctorId[]" value="{{ $alldoctorList->id }}"
                                                            id="cbx1{{ $alldoctorList->id }}">
                                                        <label for="cbx1{{ $alldoctorList->id }}">
                                                            <div class="doctor_dt">

                                                                <div class="image_dr">


                                                                    @if (isset($alldoctorList->patient_profile_img))
                                                                        <img src="{{ asset('/assets/profileImage/' . $alldoctorList->patient_profile_img) }}"
                                                                            alt="">
                                                                    @else
                                                                        <img src="{{ asset('/superAdmin/images/newimages/avtar.jpg') }}"
                                                                            alt="">
                                                                    @endif


                                                                </div>
                                                                <div class="dr_detail">
                                                                    <h6 class="dr_name">{{ $alldoctorList->name }}
                                                                        <span>{{ $alldoctorList->title }} </span>
                                                                    </h6>
                                                                    <p class="dr_email"><a
                                                                            href="mailto:{{ $alldoctorList->email }}">{{ $alldoctorList->email }}</a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>



                                <div class="col-lg-12 px-4 mb-3 ok" id="refer_note">

                                    <div class="mt-3 form-group">

                                        <textarea class="form-control" name="patientSummary" placeholder="Summary...." style="height:150px"></textarea>

                                    </div>

                                </div>

                                <div class="col-lg-12 px-4 mb-3" id="refer_note">
                                    <h6 class="" style="font-size: 16px; color: #707883;">Upload Document
                                    </h6>
                                    <div class="mt-3 form-group">

                                        <input type="file" name="uplaodDocument" class="form-control">

                                    </div>
                                </div>

                                <div class="col-lg-12 px-4 mb-3">
                                    <div class="flxref" style="display: flex;">
                                        <input type="checkbox" class="checkeditPt" name="checkViewPatient"
                                            value="1">
                                        <p class="" style="font-size: 16px; color: #707883;">To give edit
                                            permission</p>
                                    </div>
                                </div>


                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient"
                            data-bs-dismiss="modal">

                            Save</button>

                        {{-- <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                                 data-bs-dismiss="modal">

                                 Close</button> --}}

                        <button type="button" class="modalCloseBtn" data-bs-dismiss="modal"
                            aria-label="Close">
                            Close</button>

                    </div>

                </div>
                <form>
                    <!-- <div class="modal-footer">

                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                 <button type="button" class="btn btn-primary">Save changes</button>

                             </div> -->

        </div>

    </div>

</div>




<script>
    function searchDoctors() {
        // Get the search input value
        var searchValue = document.getElementById("searchInput").value.toLowerCase();

        // Get all the doctor names
        var doctorNames = document.querySelectorAll(".dr_name");

        // Loop through each doctor name and check if it matches the search value
        doctorNames.forEach(function(name) {
            var doctorName = name.textContent.toLowerCase();
            var parentDiv = name.parentElement.parentElement;
            if (doctorName.includes(searchValue)) {
                // If the name matches, display the corresponding doctor detail
                parentDiv.style.display = "block";
            } else {
                // If the name doesn't match, hide the corresponding doctor detail
                parentDiv.style.display = "none";
            }
        });
    }
</script>



<!----------------------------

              Special Notes

         ---------------------------->

<div class="modal fade edit_patient__" id="special_notes" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Special Notes</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="special_note_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                 <div class="title_head">

                                     <h4>Schedule Appointment</h4>

                                 </div>

                             </div> -->



                            <div class="col-lg-12">



                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Write Special
                                                Notes</label>

                                            <textarea class="form-control" placeholder="" style="height:150px" name="note_text"></textarea>
                                            <span id="note_textError" style="color: red;font-size:small"></span>

                                        </div>

                                    </div>

                                </div>





                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
            </form>
            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>





<!----------------------------

             Add New Notes

         ---------------------------->

<div class="modal fade edit_patient__" id="add_new_note" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel"><i class="fa-regular fa-square-plus"></i> Add a
                    New
                    Note</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="progress_note_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <div class="">
                                @php
                                    $formattedDate = Carbon\Carbon::now()->format('M d, Y g:i A');
                                    $patient = App\Models\User::where('id', @$id)->first();
                                @endphp

                                <div class="top_snippet_">
                                    <div class="left_bgi">
                                        <h6 class="patient_on_ new_entry">New entry on:
                                            <span>{{ @$patient != null ? @$patient->name : '' }}</span>
                                        </h6>
                                        <p class="entry_by">SAIF ALZAABI | {{ @$formattedDate }}</p>
                                    </div>
                                    <div class="right_bgi">
                                        <div class="add_btn_plus">
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#add_newnote">Add New Snippet</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row top_head_vitals">

                                    <div class="col-lg-12">

                                        <div class="row">

                                            <div class="col-lg-4">

                                                <div class="d-flex">

                                                    <div class="inner_element w-100">

                                                        <div class="form-group">

                                                            <select class="form-control select2_note"
                                                                id="canned_texts" name="canned_texts">



                                                            </select>

                                                            <span id="canned_textsError"
                                                                style="color: red; font-size:small"></span>


                                                        </div>





                                                    </div>

                                                    {{-- <div class="add_btn_plus" id="entry_add_btn">

                                                     <a href="#">+</a>

                                                 </div> --}}

                                                </div>



                                            </div>


                                            <div class="col-lg-4">

                                                <div class="d-flex">

                                                    <div class="inner_element w-100">

                                                        <div class="form-group">

                                                            <select class="form-control select2_note"
                                                                id="note_contents" name="note_contents">
                                                            </select>

                                                        </div>

                                                    </div>


                                                </div>



                                            </div>

                                            <div class="col-lg-12 mt-4">

                                                <div class="row">

                                                    <div class="col-lg-4">

                                                        <div class="voice_recognition">

                                                            {{--
                                                 <button  class="startRecognition" id="startRecognition">Start Voice Recognition</button> --}}


                                                            <p>
                                                                <a href="javascript:void(0)" class="mic_btn"
                                                                    role="button"
                                                                    aria-label="Start/Stop voice recognition">
                                                                    <i class="fa-solid fa-microphone startRecognition_"
                                                                        id="startRecognition_"
                                                                        aria-hidden="true"></i>
                                                                </a>

                                                                <span class="tooltip" role="tooltip"
                                                                    aria-live="assertive"
                                                                    aria-atomic="true">Click
                                                                    the icon to start voice recognition.</span>
                                                            </p>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <div class="automated_clinic_notes">

                                                            <a href="javascript:void(0)"
                                                                id="automated_clinic_note">Automated Clinic Notes -
                                                                <span>Click Here to Start!</span></a>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>



                                            <div class="col-lg-12">

                                                <div class="mt-2 form-group">

                                                    <textarea class="form-control" id="voiceInput" placeholder="Type your entry here" style="height:100px"
                                                        name="prog_voice_recognition"></textarea>
                                                    <span id="prog_voice_recognitionError"
                                                        style="color: red; font-size:small"></span>

                                                </div>
                                                <div class="mt-2 form-group">

                                                    <textarea class="form-control" id="summerynote" placeholder="Type your summary here" style="height:100px"
                                                        name="summerynote"></textarea>
                                                    <span id="summerynoteError"
                                                        style="color: red; font-size:small"></span>

                                                </div>
                                                <h6 class="recall">Recall <span>Follow-up on this episode. Patient
                                                        will be notified a week before and clinic staff will be
                                                        notified
                                                        on due date. </span></h6>

                                            </div>

                                            <div class="col-lg-12">

                                                <div class="row align-items-center mt-3">

                                                    <div class="col-lg-1">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">

                                                                <input type="text" class="form-control"
                                                                    placeholder="" name="prog_day"
                                                                    id="prog_day">
                                                                <span id="prog_dayError"
                                                                    style="color: red; font-size:small"></span>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-5">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">

                                                                <select class="form-control" name="prog_date">

                                                                    <option value="Days">Days</option>

                                                                    <option value="Weeks">Weeks</option>

                                                                    <option value="Months">Months</option>

                                                                    <option value="Years">Years</option>

                                                                </select>



                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-5">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">

                                                                <input type="text" class="form-control"
                                                                    placeholder="Details  -  e.g OPD, CT Scan etc."
                                                                    name="prog_details">

                                                            </div>

                                                        </div>

                                                    </div>

                                                    {{-- <div class="col-lg-3">

                                                     <div class="form-check">

                                                         <input class="form-check-input" type="checkbox"
                                                             value="active" id="prog_recall_reminder"
                                                             name="prog_recall_reminder">

                                                         <label class="form-check-label"
                                                             for="prog_recall_reminder">

                                                             Save without a recall reminder

                                                         </label>

                                                     </div>

                                                 </div> --}}

                                                </div>

                                            </div>

                                            <div class="col-lg-12 mt-3  mb-3">

                                                <div class="row align-items-center">

                                                    <div class="col-lg-4">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">


                                                                <input type="email" class="form-control"
                                                                    placeholder="Email" id="email"
                                                                    name="prog_email"
                                                                    pattern="[a-zA-Z0-9._%+-]+@gmail\.com$"
                                                                    title="Please enter a valid Gmail address">


                                                                <span id="prog_emailError"
                                                                    style="color: red; font-size:small"></span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <div class="inner_element w-100">

                                                            <div class="form-group">

                                                                <input type="number" class="form-control"
                                                                    placeholder="Mobile Phone" step="0.01"
                                                                    min="0" maxlength="15"
                                                                    id="prog_mobile_no" name="prog_mobile_no">
                                                                <span id="prog_mobile_noError"
                                                                    style="color: red; font-size:small"></span>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <script>
                                                        document.getElementById('prog_mobile_no').addEventListener('input', function(e) {
                                                            if (this.value.length > 15) {
                                                                this.value = this.value.slice(0, 15);
                                                            }
                                                        });
                                                    </script>

                                                    {{-- <div class="col-lg-4">

                                                     <div class="form-check">

                                                         <input class="form-check-input" type="checkbox"
                                                             value="active" id="flexCheckCheckeda2"
                                                             id="prog_invoice_item" name="prog_invoice_item">

                                                         <label class="form-check-label"
                                                             for="flexCheckCheckeda2">

                                                             Create an Invoice Item

                                                         </label>
                                                         <span id="prog_invoice_itemError"
                                                             style="color: red; font-size:small"></span>

                                                     </div>

                                                 </div> --}}

                                                    {{-- <div class="col-lg-12 mt-3" id="invoice_appoin">

                                                     <div class="inner_element w-100">

                                                         <div class="form-group">

                                                             <select class="form-control select2_note"
                                                                 name="prog_appointment_type">

                                                                 <option value="">Appointment Type</option>

                                                                 <option
                                                                     value="CONSULTATION/Interventional Radiology">
                                                                     CONSULTATION/Interventional Radiology استشارة
                                                                     أشعة تداخلية</option>

                                                                 <option
                                                                     value="CT / Fluro Guided joint / facet RFA (Radio-Frequency) ablation">
                                                                     CT / Fluro Guided joint / facet RFA
                                                                     (Radio-Frequency) ablation علاج ألم المفاصل
                                                                     بالتردد الحراري بتوجية الأشعة</option>

                                                                 <option value="Follow up appointment">Follow up
                                                                     appointment</option>

                                                                 <option value="Hemorrhoids Embolization">
                                                                     Hemorrhoids Embolization</option>

                                                                 <option
                                                                     value="Image guided MSK inflammation / pain injection - PRP">
                                                                     Image guided MSK inflammation / pain injection -
                                                                     PRP حقن إالتهاب/ألم المفاصل بتوجية الأشعة-بلازما
                                                                     QASTARAT & DAWALI CLINICS</option>

                                                                 <option
                                                                     value="Image guided MSK / pain injection - HA">
                                                                     Image guided MSK / pain injection - HA حقن
                                                                     إالتهاب/ألم المفاصل بتوجية الأشعة-حقن زيتية
                                                                 </option>

                                                                 <option
                                                                     value="Image (Ultrasound) guided Occipital Headache nerve block">
                                                                     Image (Ultrasound) guided Occipital Headache
                                                                     nerve block</option>

                                                                 <option value="INTRAVENOUS VITAMIN THERAPY">
                                                                     INTRAVENOUS VITAMIN THERAPY</option>

                                                                 <option
                                                                     value="IV DRIP ASCORBIC ACID (Essential dose)">
                                                                     IV DRIP ASCORBIC ACID (Essential dose) فيتامين
                                                                     سي الجرعه الأساسية</option>

                                                                 <option
                                                                     value="IV DRIP DETOX MASTER (ESSENTIAL DOSE)">
                                                                     IV DRIP DETOX MASTER (ESSENTIAL DOSE)مزيل
                                                                     السميات (الجرعة الأساسية)</option>

                                                                 <option
                                                                     value="IV DRIP ENERGY BOOSTER (ESSENTIAL DOSE)">
                                                                     IV DRIP ENERGY BOOSTER (ESSENTIAL DOSE) معزز
                                                                     الطاقة الجرعة الأساسية</option>

                                                                 <option
                                                                     value="IV DRIP FAT BURNER (ESSENTIAL DOSE)">IV
                                                                     DRIP FAT BURNER (ESSENTIAL DOSE) مسرعات حرق
                                                                     الدهون (الجرعة الأساسية)</option>

                                                                 <option
                                                                     value="IV VITAMINE- WOMEN SPECIFICIMMUNITY BOOSTER WITH VITAMIN C">
                                                                     IV VITAMINE- WOMEN SPECIFICIMMUNITY BOOSTER
                                                                     WITH VITAMIN C</option>

                                                                 <option
                                                                     value="IV VITAMINE- WOMEN SPECIFIC- IRON BOOSTER - ANTI HAIR LOSS COMBINATION ">
                                                                     IV VITAMINE- WOMEN SPECIFIC- IRON BOOSTER - ANTI
                                                                     HAIR LOSS COMBINATION </option>

                                                                 <option
                                                                     value="IV Vitamin - Multivatamins w/ Iron">IV
                                                                     Vitamin - Multivatamins w/ Iron</option>


                                                             </select>

                                                         </div>

                                                     </div>

                                                 </div> --}}

                                                </div>

                                            </div>



                                        </div>

                                    </div>







                                </div>



                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
            </form>
            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

            order imagenairy Exam

         ---------------------------->

<div class="modal fade edit_patient__" id="order_imagenairy" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Order Imaginary Exam </h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="order_imaginary_exam_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                 <div class="title_head">

                                     <h4>Schedule Appointment</h4>

                                 </div>

                             </div> -->

                            <div class="col-lg-12">

                                <div class="inner_element w-100">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Select Tests</label>

                                        <select class="form-control select2_imaginary_test" name="test_name[]"
                                            multiple="multiple">
                                            

                                        </select>
                                        <span id="testNameError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3 form-group">
                                    <label for="validationCustom01" class="form-label">Write Summary</label>
                                    <textarea class="form-control" placeholder="" style="height:150px"></textarea>
                                </div>
                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
            </form>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

            order imagenairy Exam


            ---------------------------->



<div class="modal fade edit_patient__" id="consent_form" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Eligibility Forms</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="EligibilityForms" action="{{ route('user.slectEligibilityForms') }}" method="POST">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">




                            @if (!empty(@$id) && null != @$id)

                                @php

                                    $ids = decrypt(@$id);
                                    // dd('ids',$ids);
                                    $patient = App\Models\User::select('id')->where('id', $ids)->first();
                                    $Thyroid_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'thyroid_form'])
                                        ->first();

                                    if ($Thyroid_Eligibility_Forms !== null) {
                                        $Thyroid_Eligibility_Forms = $Thyroid_Eligibility_Forms->toArray();
                                    } else {
                                        $Thyroid_Eligibility_Forms = [];
                                    }
                                @endphp

                                <div class="col-lg-3 mb-4">

                                    <label class="w-100">

                                        <input type="radio" name="EligibilityForm" class="card-input-element"
                                            id="ProstateArteryEmbolizationEligibility1" value="GeneralForm" />

                                        <div class="form_box card-input">

                                            <div class="form_img genral_form_bg">
                                                <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="form_dt">
                                                <h6>General Form</h6>
                                            </div>

                                        </div>

                                    </label>



                                </div>
                                @if (!in_array($ids, $Thyroid_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element" id="ThyroidAblation2"
                                                value="ThyroidAblation" />

                                            <div class="form_box card-input">

                                                <div class="form_img form1_bg">
                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">

                                                </div>

                                                <div class="form_dt">
                                                    <h6>Thyroid Ablation</h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif
                                @php

                                    $Prostate_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'prostate_form'])
                                        ->first();

                                    if ($Prostate_Eligibility_Forms !== null) {
                                        $Prostate_Eligibility_Forms = $Prostate_Eligibility_Forms->toArray();
                                    } else {
                                        $Prostate_Eligibility_Forms = [];
                                    }
                                @endphp
                                @if (!in_array($ids, $Prostate_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element"
                                                id="ProstateArteryEmbolizationEligibility3"
                                                value="ProstateArteryEmbolizationEligibility" />

                                            <div class="form_box card-input">

                                                <div class="form_img form2_bg">

                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="form_dt">
                                                    <h6>Prostate Embo</h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif
                                @php

                                    $uterine_embo_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'uterine_embo'])
                                        ->first();

                                    if ($uterine_embo_Eligibility_Forms !== null) {
                                        $uterine_embo_Eligibility_Forms = $uterine_embo_Eligibility_Forms->toArray();
                                    } else {
                                        $uterine_embo_Eligibility_Forms = [];
                                    }
                                @endphp



                                @if (!in_array($ids, $uterine_embo_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element"
                                                id="ProstateArteryEmbolizationEligibility"
                                                value="UterineEmboForm" />

                                            <div class="form_box card-input">

                                                <div class="form_img form3_bg">

                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">

                                                </div>

                                                <div class="form_dt">
                                                    <h6>Uterine Embo</h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif
                                @php

                                    $VaricoceleEmboForm_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'VaricoceleEmboForm'])
                                        ->first();

                                    if ($VaricoceleEmboForm_Eligibility_Forms !== null) {
                                        $VaricoceleEmboForm_Eligibility_Forms = $VaricoceleEmboForm_Eligibility_Forms->toArray();
                                    } else {
                                        $VaricoceleEmboForm_Eligibility_Forms = [];
                                    }
                                @endphp
                                @if (!in_array($ids, $VaricoceleEmboForm_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4 ">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element"
                                                id="ProstateArteryEmbolizationEligibility4"
                                                value="VaricoceleEmboForm" />

                                            <div class="form_box card-input">

                                                <div class="form_img form4_bg">
                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="form_dt">
                                                    <h6>Varicocele Embo (VE)</h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif

                                @php

                                    $PelvicCongEmbo_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'PelvicCongEmbo'])
                                        ->first();

                                    if ($PelvicCongEmbo_Eligibility_Forms !== null) {
                                        $PelvicCongEmbo_Eligibility_Forms = $PelvicCongEmbo_Eligibility_Forms->toArray();
                                    } else {
                                        $PelvicCongEmbo_Eligibility_Forms = [];
                                    }
                                @endphp



                                @if (!in_array($ids, $PelvicCongEmbo_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element"
                                                id="ProstateArteryEmbolizationEligibility5"
                                                value="PelvicCongEmbo" />

                                            <div class="form_box card-input">

                                                <div class="form_img form5_bg">
                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="form_dt">
                                                    <h6>Pelvic Cong Embo (PCE)</h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif

                                @php

                                    $VaricoseAblation_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'VaricoseAblation'])
                                        ->first();

                                    if ($VaricoseAblation_Eligibility_Forms !== null) {
                                        $VaricoseAblation_Eligibility_Forms = $VaricoseAblation_Eligibility_Forms->toArray();
                                    } else {
                                        $VaricoseAblation_Eligibility_Forms = [];
                                    }
                                @endphp
                                @if (!in_array($ids, $VaricoseAblation_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element"
                                                id="ProstateArteryEmbolizationEligibility6"
                                                value="VaricoseAblation" />

                                            <div class="form_box card-input">

                                                <div class="form_img form6_bg">
                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="form_dt">
                                                    <h6>Varicose Ablation (VA)</h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif
                                @php

                                    $HaemorrhoidsEmbo_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'HaemorrhoidsEmbo'])
                                        ->first();

                                    if ($HaemorrhoidsEmbo_Eligibility_Forms !== null) {
                                        $HaemorrhoidsEmbo_Eligibility_Forms = $HaemorrhoidsEmbo_Eligibility_Forms->toArray();
                                    } else {
                                        $HaemorrhoidsEmbo_Eligibility_Forms = [];
                                    }
                                @endphp
                                @if (!in_array($ids, $HaemorrhoidsEmbo_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element"
                                                id="ProstateArteryEmbolizationEligibility7"
                                                value="HaemorrhoidsEmbo" />

                                            <div class="form_box card-input">

                                                <div class="form_img form7_bg">
                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="form_dt">
                                                    <h6>Hemorrhoids Embo (HE)</h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif
                                @php

                                    $KneePain_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'KneePain'])
                                        ->first();

                                    if ($KneePain_Eligibility_Forms !== null) {
                                        $KneePain_Eligibility_Forms = $KneePain_Eligibility_Forms->toArray();
                                    } else {
                                        $KneePain_Eligibility_Forms = [];
                                    }
                                @endphp
                                @if (!in_array($ids, $KneePain_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element"
                                                id="ProstateArteryEmbolizationEligibilityKneePain"
                                                value="KneePain" />

                                            <div class="form_box card-input">

                                                <div class="form_img form8a_bg">
                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="form_dt">
                                                    <h6>Knee Pain</h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif
                                @php

                                    $SpinePain_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'SpinePain'])
                                        ->first();

                                    if ($SpinePain_Eligibility_Forms !== null) {
                                        $SpinePain_Eligibility_Forms = $SpinePain_Eligibility_Forms->toArray();
                                    } else {
                                        $SpinePain_Eligibility_Forms = [];
                                    }
                                @endphp
                                @if (!in_array($ids, $SpinePain_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element"
                                                id="ProstateArteryEmbolizationEligibilitySpinePain"
                                                value="SpinePain" />

                                            <div class="form_box card-input">

                                                <div class="form_img form8b_bg">
                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="form_dt">
                                                    <h6>Spine Pain</h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif
                                @php

                                    $MSKPain_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'msk_pain_report'])
                                        ->first();

                                    if ($MSKPain_Eligibility_Forms !== null) {
                                        $MSKPain_Eligibility_Forms = $MSKPain_Eligibility_Forms->toArray();
                                    } else {
                                        $MSKPain_Eligibility_Forms = [];
                                    }
                                @endphp
                                @if (!in_array($ids, $MSKPain_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element"
                                                id="ProstateArteryEmbolizationEligibilityMSKPain"
                                                value="msk_pain_report" />

                                            <div class="form_box card-input">

                                                <div class="form_img form8c_bg">
                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="form_dt">
                                                    <h6>MSK-ST Pain</h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif
                                @php

                                    $ShoulderPain_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'ShoulderPain'])
                                        ->first();

                                    if ($ShoulderPain_Eligibility_Forms !== null) {
                                        $ShoulderPain_Eligibility_Forms = $ShoulderPain_Eligibility_Forms->toArray();
                                    } else {
                                        $ShoulderPain_Eligibility_Forms = [];
                                    }
                                @endphp
                                @if (!in_array($ids, $ShoulderPain_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element"
                                                id="ProstateArteryEmbolizationEligibilityShoulderPain"
                                                value="ShoulderPain" />

                                            <div class="form_box card-input">

                                                <div class="form_img form8d_bg">
                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="form_dt">
                                                    <h6>Shoulder Pain </h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif
                                @php

                                    $HeadachePain_Eligibility_Forms = App\Models\patient\ThyroidDiagnosis::select(
                                        'patient_id',
                                    )
                                        ->where(['patient_id' => $patient->id, 'form_type' => 'HeadachePain'])
                                        ->first();

                                    if ($HeadachePain_Eligibility_Forms !== null) {
                                        $HeadachePain_Eligibility_Forms = $HeadachePain_Eligibility_Forms->toArray();
                                    } else {
                                        $HeadachePain_Eligibility_Forms = [];
                                    }
                                @endphp
                                @if (!in_array($ids, $HeadachePain_Eligibility_Forms))
                                    <div class="col-lg-3 mb-4">

                                        <label class="w-100">

                                            <input type="radio" name="EligibilityForm"
                                                class="card-input-element"
                                                id="ProstateArteryEmbolizationEligibility"
                                                value="HeadachePain" />

                                            <div class="form_box card-input">

                                                <div class="form_img form8e_bg">
                                                    <img src="{{ asset('/assets/images/new-images/forms1.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="form_dt">
                                                    <h6>Headache Pain </h6>
                                                </div>

                                            </div>

                                        </label>



                                    </div>
                                @endif

                            @endif
                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Next</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
            </form>
            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>





<!----------------------------

           Add a new invoice item

         ---------------------------->

<div class="modal fade edit_patient__" id="invoice_add" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add a new invoice item</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="invoice_item_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">

                            <!-- <div class="col-lg-12">

                                 <div class="title_head">

                                     <h4>Schedule Appointment</h4>

                                 </div>

                             </div> -->



                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Date</label>

                                        <div class="input-group" id="datepicker22">



                                            <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                data-date-format="dd M, yyyy" data-date-container='#datepicker22'
                                                data-provide="datepicker" name="date">

                                        </div>
                                        <span id="DateError" style="color: red;font-size:small"></span>
                                        <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                    </div>



                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Type an item
                                            name</label>

                                        <input type="search" class="form-control" id=""
                                            placeholder="" name="item_name">

                                        <button class="btn search_btn">

                                            <iconify-icon icon="prime:search-plus" width="24"></iconify-icon>

                                        </button>
                                        <span id="ItemNameError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Cost</label>

                                        <input type="search" class="form-control" id=""
                                            placeholder="" name="cost">

                                        <span id="CostError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <label for="validationCustom01" class="form-label">Code</label>

                                        <input type="text" class="form-control" id=""
                                            placeholder="" name="code">

                                        <span id="CodeError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element add_medicine_btn">

                                    <div class="form-group">

                                        <button type="submit" class="add_diagnosis">+ Add</button>

                                    </div>

                                </div>

                            </div>





                        </div>
            </form>

            <div class="add_data_diagnosis">

                <table class="table table-striped table-bordered">
                    <tr>

                        <th>Date</th>

                        <th>Item Name</th>

                        <th>Cost </th>

                        <th>Code</th>

                        <th>Action</th>

                    </tr>
                    <tbody id="invoice_item_table_body"></tbody>


                    <!--        <tr>

                         <td>15 Nov, 2023</td>

                         <td>Asirpin</td>

                         <td>100</td>

                         <td>CO22</td>

                         <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                     </tr>

                     <tr>

                         <td>15 Nov, 2023</td>

                         <td>Asirpin</td>

                         <td>100</td>

                         <td>CO22</td>

                         <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                     </tr> -->

                </table>

            </div>

        </div>

        <div class="action text-end bottom_modal">

            <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-dismiss="modal">

                             save</a> -->

            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                data-bs-dismiss="modal">

                Close</a>

        </div>

    </div>

    <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

</div>

</div>

</div>



<!----------------------------

               Add a new Task

         ---------------------------->

<div class="modal fade edit_patient__" id="new_task" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">New Task on</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="new_task_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row top_head_letter">

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">



                                        <input type="search" class="form-control" id=""
                                            placeholder="Task" name="task_name">

                                        <span id="TaskError" style="color: red;font-size:small"></span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">



                                        <div class="input-group" id="datepicker23">



                                            <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                data-date-format="dd M, yyyy" data-date-container='#datepicker23'
                                                data-provide="datepicker" name="task_date">

                                        </div>
                                        <span id="DateError" style="color: red;font-size:small"></span>
                                        <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                    </div>



                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="inner_element">

                                    <div class="form-group">



                                        <select class="form-control select2_task" name="option_name">

                                            <option value="SAIF ALZAABI">SAIF ALZAABI</option>
                                            <option value="SAIF 123">SAIF 123</option>
                                            <option value="SAIF xyz">SAIF xyz</option>
                                            <option value="SAIF abc">SAIF abc</option>


                                        </select>
                                        <span id="NameError" style="color: red;font-size:small"></span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-12">

                                <div class="mt-3 form-group">

                                    <textarea class="form-control" placeholder="" style="height:100px" name="task_text"></textarea>
                                    <span id="TextError" style="color: red;font-size:small"></span>

                                </div>

                            </div>



                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            save</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
            </form>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

             Discharge Instruction

         ---------------------------->

<div class="modal fade edit_patient__" id="discharge_instruction" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Discharge Instruction</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="mb-3 form-group">

                                <label for="validationCustom01" class="form-label">Write Discharge
                                    Instruction</label>

                                <textarea class="form-control" placeholder="" style="height:150px"></textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">

                        save</a>

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                        data-bs-dismiss="modal">

                        Close</a>

                </div>

            </div>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

          Follow up notes

         ---------------------------->

<div class="modal fade edit_patient__" id="followup_note" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Follow Up Note</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="mb-3 form-group">

                                <label for="validationCustom01" class="form-label">Write Follow Up Note</label>

                                <textarea class="form-control" placeholder="" style="height:150px"></textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">

                        save</a>

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                        data-bs-dismiss="modal">

                        Close</a>

                </div>

            </div>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

          Attach Document

         ---------------------------->
<div class="modal fade attach_document" id="attach_document" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Attach Document</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body padding-0">
                <div class="inner_data">

                    <form id="uploadForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-2 form-group">
                                    <label for="documentName" class="form-label">Document Name</label>
                                    <input type="text" class="form-control" name="documentName"
                                        id="documentName" placeholder="">
                                    <input type="hidden" id="formType_" name="formType">
                                    <input type="hidden" id="formSection_" name="formSection">

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-2 form-group">
                                    <label for="uploadDocument" class="form-label">Upload Document</label>
                                    <input name="file" type="file" class="form-control"
                                        id="uploadDocument" />
                                </div>
                            </div>
                            <div class="col-lg-12 text-end">
                                {{-- <button class="btn r-04 btn--theme hover--tra-black" id="uploadButton">Upload</button> --}}
                                <button class="btn r-04 btn--theme hover--tra-black" type="submit">Save</button>
                                <button class="btn r-04 btn--theme hover--tra-black secondary_btn"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>

                    <!-- <div class="view_attach_document">
                                 <table class="table table-striped table-bordered" id="documentTable">


                                     <thead>
                                         <tr>
                                             <th>Document</th>
                                             <th>Date</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                     </tbody>
                                 </table>
                             </div> -->

                </div>
                {{-- <div class="action text-end bottom_modal">
                             <button class="btn r-04 btn--theme hover--tra-black" id="saveButton" data-bs-dismiss="modal">Save</button>
                             <button class="btn r-04 btn--theme hover--tra-black secondary_btn" data-bs-dismiss="modal">Close</button>
                         </div> --}}
            </div>
        </div>
    </div>
</div>



<!----------------------------

          Past Medical history

         ---------------------------->

<div class="modal fade edit_patient__" id="past_medical" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Past Medical History</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="past_medical_history_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">



                            <div class="col-lg-12 " id="add_diseases">

                                <div class="diseases_box">

                                    <div class="row">

                                        <div class="col-lg-12">

                                            <div class="inner_element">

                                                <div class="form-group">

                                                    <label for="validationCustom01"
                                                        class="form-label diseases_title"><span>Diseases
                                                            Name</span>
                                                    </label>

                                                    <input type="text" class="form-control"
                                                        placeholder="Diseases Name" name="diseases_name[]">
                                                    <span id="diseases_nameError"
                                                        style="color: red;font-size:small"></span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="mb-1 form-group">

                                                <label for="validationCustom01"
                                                    class="form-label">Describe</label>

                                                <textarea class="form-control" placeholder="" style="height:60px" name="describe[]"></textarea>
                                                <span id="describeError"
                                                    style="color: red;font-size:small"></span>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-12 text-end">

                                    
                                    <span><a href="#" id="remove_disease"><i
                                                class="fa-regular fa-trash-can"></i></a></span>
                                </div>

                            </div>
                            


                            <div id="dynamic-sections">
                                <!-- Initially empty; will contain dynamically added sections -->
                            </div>

                            <a href="#" class="diseases_name add_diseases_btn">+ Add More</a>

                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            save</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
            </form>
            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

          Past surgery history

         ---------------------------->

<div class="modal fade edit_patient__" id="past_surgical" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Past Surgical History</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="past_surgical_history_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row">
                            <div class="col-lg-12 " id="add_surgical">
                                <div class="diseases_box">

                                    <div class="col-lg-12">

                                        <div class="inner_element">

                                            <div class="form-group">

                                                <label for="validationCustom01" class="form-label">Surgery
                                                    Name</label>

                                                <input type="text" class="form-control"
                                                    placeholder="Surgery Name" name="surgery_name[]">
                                                <span id="surgery_nameError"
                                                    style="color: red;font-size:small"></span>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-12">

                                        <div class="mb-1 form-group">

                                            <label for="validationCustom01" class="form-label">Describe</label>

                                            <textarea class="form-control" placeholder="" style="height:60px" name="surgery_describe[]"></textarea>
                                            <span id="surgery_describeError"
                                                style="color: red;font-size:small"></span>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-12 text-end">

                                    <a href="#" class="diseases_name add_surgical_btn">+ Add More</a>
                                    <span><a href="#" id="remove_surgical"><i
                                                class="fa-regular fa-trash-can"></i></a></span>
                                </div>
                            </div>

                            <div id="surgical-dynamic-sections">
                                <!-- Initially empty; will contain dynamically added sections -->
                            </div>

                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            save</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
            </form>
            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>

<!----------------------------

             Make an Appointment

         ---------------------------->

<div class="modal fade makeAppoinment" id="make_appointment" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Make an Appointment</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>


            <form id="appointment_form">

                @csrf
                @php
                    $patient_id = isset($id) ? $id : @$id;
                    $patient_id = isset($patient_id) ? decrypt($patient_id) : $patient_id;
                    $doctorId = auth()->guard('doctor')->user()->id;
                @endphp
                <input type="hidden" name="patintValue" value="{{ @$patient_id }}" />
                <input type="hidden" name="doctor_id" value="{{ @$doctorId }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row top_head_vitals">

                            <div class="col-lg-12 mt-4">

                                <div class="row">

                                    <div class="col-lg-9">

                                        <div class="inner_element">

                                            <div class="form-group">

                                                <input type="text" class="form-control datepickerInput"
                                                    placeholder="Click here to find availability"
                                                    name="appointment_date" id="appointment_datenextpre">
                                                {{-- <span id="appointment_dateError"
                                                 style="color: red;font-size:small"></span> --}}
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-3">

                                        <a href="#"
                                            class="btn r-04 btn--theme hover--tra-black add_patient add_appointment"
                                            id="appoin_btn_form">Next</a>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-12" id="book_appointment_box">

                                <div class="row appointment_book">

                                    <h6 class="book_appin_title">Book Appointment</h6>


                                    <div class="col-lg-6">

                                        <div class="inner_element">

                                            <div class="form-group">

                                                <select class="form-control select2_appoin_ttype__"
                                                    name="priority" id="Priority">
                                                    <option value=""> --Priority-- </option>
                                                    <option value="bg-danger">High</option>
                                                    <option value="bg-success">Medium</option>
                                                    <option value="bg-primary">Low</option>

                                                </select>
                                                <span id="clinicianError"
                                                    style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="inner_element">

                                            <div class="form-group">


                                                @php
                                                    $pathology_price_list = DB::table('pathology_price_list')->get();
                                                @endphp


                                                <select class="form-control select2_appoin_ttype__"
                                                    name="appointment_type" required>

                                                    <option value=""> --Select Appoinment  ss Type-- </option>
                                                    @foreach ($pathology_price_list as $allpathology_price_list)
                                                        @if (!empty($allpathology_price_list))
                                                            <option
                                                                value="{{ $allpathology_price_list->test_name }}">
                                                                {{ $allpathology_price_list->test_name }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>


                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div class="inner_element">

                                            <div class="form-group">

                                                <select class="form-control select2_appoin_ttype__"
                                                    name="location" id="location" required>
                                                    <option value=""> --Select Location Type-- </option>
                                                    @forelse ($allBranch as $allallBranch)
                                                        <option value="{{ $allallBranch->id }}">
                                                            {{ $allallBranch->branch_name }}</option>
                                                    @empty
                                                    @endforelse


                                                </select>
                                                <span id="locationError"
                                                    style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-lg-6">

                                        <div class="inner_element">

                                            <div class="form-group">
                                                @php
                                                    $Clinician = DB::table('doctors')
                                                        ->where('status', 'active')
                                                        ->get();
                                                @endphp

                                                <select class="form-control select2_appoin_ttype__"
                                                    name="doctor_id" required>
                                                    <option value=""> --Select Clinician Type-- </option>
                                                    @forelse ($Clinician as $allClinician)
                                                        <option value="{{ $allClinician->id }}">
                                                            {{ $allClinician->name }}</option>
                                                    @empty
                                                    @endforelse


                                                </select>
                                                <span id="locationError"
                                                    style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>




                                    <input type="hidden" id="event_id" name="event_id" value="">

                                    <div class="col-lg-6">

                                        <div class="inner_element">

                                            <div class="form-group">



                                                <input type="text"
                                                    class="form-control "
                                                    placeholder="YYYY-MM-DD" name="start_date" readonly id="appo_start_date">
                                                <span id="start_dateError"
                                                    style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-3">

                                        <div class="inner_element">

                                            <div class="form-group">



                                                <input type="time" class="form-control" placeholder="12:00"
                                                    name="start_time">

                                                <span id="start_timeError"
                                                    style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    
                                    <div class="col-lg-3">

                                        <div class="inner_element">

                                            <div class="form-group">



                                                <input type="time" class="form-control" placeholder="12:00"
                                                    name="end_time">
                                                <span id="end_timeError"
                                                    style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>




                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="checked"
                                                id="flexCheckChecked" name="confirmation">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Send appointment confirmation immediately
                                            </label>
                                        </div>
                                    </div>

                                </div>

                            </div>





                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient"
                            id="book_app">

                            Book</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
            </form>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>



<!----------------------------

             start a video call

         ---------------------------->


<div class="modal fade edit_patient__" id="video_meeting" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Start a Video call</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>



            <form id="video_call_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row top_head_vitals">

                            <div class="col-lg-12">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="inner_element">

                                            <div class="form-group mb-3">

                                                <label for="validationCustom01" class="form-label">Select
                                                    Date</label>

                                                <input type="datetime-local" class="form-control"
                                                    id="birthdaytime" name="meeting_date">

                                                {{-- 
                                                <input type="datetimepickerInput" class="form-control"
                                                    placeholder="" name="meeting_date">
                                                     --}}
                                                <span id="meeting_dateError"
                                                    style="color: red;font-size:small"></span>
                                            </div>

                                            <div class="form-group">

                                                <label for="validationCustom01" class="form-label">Paste Meeting
                                                    URL</label>

                                                <input type="text" class="form-control "
                                                    placeholder="Paste Meeting URL" name="meeting_url">
                                                <span id="meeting_urlError"
                                                    style="color: red;font-size:small"></span>
                                            </div>

                                        </div>

                                    </div>

                                    <!-- <div class="col-lg-3">

                                 <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient add_appointment" id="appoin_btn_form">Next</a>

                             </div> -->

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Close</a>

                    </div>

                </div>
            </form>
            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>


<!----------------------------

             Lab Test

         ---------------------------->

<div class="modal fade edit_patient__" id="lab_test" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Order Lab Test</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>
            <form id="order_lab_test_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />
                <div class="modal-body padding-0">

                    <div class="inner_data">

                        <div class="row top_head_vitals">

                            <div class="col-lg-12">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <label for="validationCustom01" class="form-label">Select Lab
                                            Tests</label>

                                        <select id="sumo-select" multiple name="lab_test_names[]">
                                            
                                        </select>
                                        <span id="LabTestNamesError" style="color: red;"></span>
                                    </div>



                                    <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Write
                                                Summary</label>
                                            <textarea class="form-control" placeholder="" style="height:150px" name="test_summery"></textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>







                        </div>

                    </div>

                    <div class="action text-end bottom_modal">

                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Order</button>

                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">

                            Cancel</a>

                    </div>

                </div>
            </form>

            <!-- <div class="modal-footer">

                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                         <button type="button" class="btn btn-primary">Save changes</button>

                     </div> -->

        </div>

    </div>

</div>

<!----------------------------

                 High level

         ---------------------------->

<div class="offcanvas offcanvas-bottom offcanvas-h-custom-50" tabindex="-1" id="high_level"
    aria-labelledby="offcanvasBottomLabel">

    {{-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
         class="fa-regular fa-circle-down"></i> Close</button> --}}

    <button type="button" class="modalCloseBtn" data-bs-dismiss="modal" aria-label="Close">
        Close</button>



    <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasBottomLabel">High level summary on this patient</h5>

        <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-regular fa-circle-down"></i></button> -->

    </div>

    <div class="offcanvas-body small">

        <div class="main_box_offcanvas">

            <div class="row">



                <div class="col-lg-12">

                    <div class="mb-3 form-group">

                        <label for="validationCustom01" class="form-label">Write</label>

                        <textarea class="form-control" placeholder="" style="height: 100px"></textarea>

                    </div>

                </div>



            </div>

        </div>

    </div>

    <div class="offcanvas-footer">

        <div class="frmbtn_areasubmit">

            <!-- <button type="submit" class="btn btn-primary  edit__green">Edit</button> -->

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient"
                data-bs-dismiss="offcanvas">Save</button>

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                data-bs-dismiss="offcanvas">Close</button>

        </div>

    </div>

</div>

<script>
    const micIcon = document.getElementById('startRecognition');
    const tooltip = document.querySelector('.tooltip');

    let recognition;

    micIcon.addEventListener('click', toggleRecognition);

    function toggleRecognition() {
        if (!recognition) {
            recognition = new webkitSpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true;
            recognition.onresult = handleRecognitionResult;
            recognition.onerror = handleError;
            recognition.onend = handleRecognitionEnd;
            micIcon.classList.remove('fa-microphone');
            micIcon.classList.add('fa-times');
            tooltip.textContent = 'Voice recognition is on';
            recognition.start();
        } else {
            recognition.stop();
            recognition = null;
            micIcon.classList.remove('fa-times');
            micIcon.classList.add('fa-microphone');
            tooltip.textContent = 'Click the icon to start voice recognition.';
        }
    }

    function handleRecognitionResult(event) {
        const transcript = Array.from(event.results)
            .map(result => result[0].transcript)
            .join('');

        voiceInput.value = transcript;
    }

    function handleError(event) {
        console.error('Speech recognition error:', event.error);
        tooltip.textContent = 'Speech recognition error. Please try again.';
    }

    function handleRecognitionEnd() {
        recognition = null;
        micIcon.classList.remove('fa-times');
        micIcon.classList.add('fa-microphone');
        tooltip.textContent = 'Click the icon to start voice recognition.';
    }
</script>





















<!----------------------------

           Add New Letter

         ---------------------------->

<div class="offcanvas offcanvas-bottom offcanvas-h-custom-90" tabindex="-1" id="new_letter"
    aria-labelledby="offcanvasBottomLabel">

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
            class="fa-regular fa-circle-down"></i> Close</button>



    <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasBottomLabel"> <i class="fa-regular fa-file-lines"></i> New
            Letter
        </h5>

        <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-regular fa-circle-down"></i></button> -->

    </div>

    <div class="offcanvas-body small">

        <div class="main_box_offcanvas">

            <h6 class="patient_on_">On Patient <span>Avi Singh</span></h6>

            <div class="row top_head_letter">

                <div class="col-lg-4">

                    <div class="inner_element">

                        <div class="form-group">

                            <label class="form-label">Select a Note</label>

                            <select class="form-control select2_note">

                                <option value="">&nbsp;</option>

                                <option value="">Note Sat, 21 Oct,2023</option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="inner_element">

                        <div class="form-group">

                            <label class="form-label">Address this letter to</label>

                            <select class="form-control select2_note">

                                <option value="">&nbsp;</option>

                                <option value="">&nbsp;</option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="inner_element mt-4">

                        <div class="form-group">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault4">

                                <label class="form-check-label" for="flexCheckDefault4">

                                    Import text from the selected episode

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="diagnosis_main_box new_letter_box">

                <div class="inner_element">

                    <div class="form-group">

                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" value=""
                                id="flexCheckDefault5">

                            <label class="form-check-label" for="flexCheckDefault5">

                                To Patient

                            </label>

                        </div>

                    </div>

                </div>

                <div class="inner_element">

                    <div class="form-group">

                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" value=""
                                id="flexCheckDefault6" disabled>

                            <label class="form-check-label" for="flexCheckDefault6">

                                To NOK

                            </label>

                        </div>

                    </div>

                </div>

                <div class="inner_element">

                    <div class="form-group">

                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" value=""
                                id="flexCheckDefault7" disabled>

                            <label class="form-check-label" for="flexCheckDefault7">

                                To GP

                            </label>

                        </div>

                    </div>

                </div>

                <div class="inner_element mt-1">

                    <div class="form-group">

                        <p class="add_contact" id="add_address_new">Contact not in list? <a href="#">Add
                                New</a></p>

                    </div>

                </div>



            </div>

            <div class="row top_head_letter add_contact_details" id="add_address_new_form">

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Title</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">First Name</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Last Name</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Designation</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Address</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Email Address</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Phone</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Mobile</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Fax</label>

                            <input type="search" class="form-control" id="" placeholder="">



                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element mt-4">

                        <div class="form-group">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault11">

                                <label class="form-check-label" for="flexCheckDefault11">

                                    This is patient's GP

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-12">

                    <div class="action_save_address">

                        <!-- <button type="submit" class="btn btn-primary  edit__green">Edit</button> -->

                        <button type="submit"
                            class="btn r-04 btn--theme hover--tra-black add_patient">Save</button>

                        <button type="submit"
                            class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            id="cancel_btn_address">Cancel</button>

                    </div>

                </div>

            </div>

            <div class="row top_head_letter">

                <div class="col-lg-5">

                    <div class="inner_element">

                        <div class="form-group">

                            <label class="form-label">Click here to select people to copy in</label>

                            <select class="form-control select2_note">

                                <option value="">&nbsp;</option>

                                <option value="">&nbsp;</option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="col-lg-5">

                    <div class="inner_element">

                        <div class="form-group">

                            <label class="form-label">Paste Canned Text Snippest</label>

                            <select class="form-control select2_note">

                                <option value="">EVLT-GSV</option>

                                <option value="">IR-THYROID ABLATION</option>

                                <option value="">PRP KNEE INJECTION</option>

                                <option value="">PRP KNEE INJECTION</option>

                            </select>

                        </div>

                    </div>

                </div>

                <div class="col-lg-2">

                    <div class="inner_element">

                        <div class="form-group">

                            <a href="#" class="paste_btn">Paste this Template</a>

                        </div>

                    </div>

                </div>



            </div>



            <div class="payg_">

                <p><a href="#" class="mic_btn"><i class="fa-solid fa-microphone"></i></a> Add a voice
                    note
                </p>

            </div>



            <div class="row top_head_letter">

                <div class="col-lg-12">

                    <div class="mt-3 form-group">

                        <textarea class="form-control" placeholder="" style="height:200px"></textarea>

                    </div>

                </div>

                <div class="col-lg-12 mt-3 mb-3">

                    <div class="form-group">

                        <input type="search" class="form-control sign_input" id=""
                            placeholder="Signature Text - e.g Yours Sincerely, Your Name, Designation, Electronically Signed  etc. ">

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <div class="form-check" id="sign_btn_upload">

                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault8">

                                <label class="form-check-label" for="flexCheckDefault8">

                                    Include Signature Image

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault9">

                                <label class="form-check-label" for="flexCheckDefault9">

                                    Include Diagnoses & Drugs

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="inner_element">

                        <div class="form-group">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" value=""
                                    id="flexCheckDefault10">

                                <label class="form-check-label" for="flexCheckDefault10">

                                    Cc Patient

                                </label>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-12 mt-3" id="sign_upload">

                    <div class="inner_element">

                        <div class="form-group">

                            <label for="validationCustom01" class="form-label">Upload Signature Image</label>

                            <input name="file1" type="file" class="dropify" data-height="100" />

                        </div>

                    </div>

                </div>

            </div>



        </div>

    </div>

    <div class="offcanvas-footer">

        <div class="frmbtn_areasubmit">

            <!-- <button type="submit" class="btn btn-primary  edit__green">Edit</button> -->

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient"
                data-bs-dismiss="offcanvas">Save</button>

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                data-bs-dismiss="offcanvas">Close</button>

        </div>

    </div>

</div>







<!----------------------------

                 Add Vitals

         ---------------------------->

<div class="offcanvas offcanvas-bottom offcanvas-h-custom-80" tabindex="-1" id="add_vitals"
    aria-labelledby="offcanvasBottomLabel">

    {{-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
         class="fa-regular fa-circle-down"></i> Close </button> --}}

    <button type="button" class="modalCloseBtn" data-bs-dismiss="modal" aria-label="Close">
        Close</button>



    <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasBottomLabel"><i
                class="fa-solid fa-temperature-three-quarters"></i> Enter Vitals </h5>

        <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-regular fa-circle-down"></i></button> -->

    </div>

    <div class="offcanvas-body small p-0">

        <div class="main_box_offcanvas vitals_add_box">

            <div class="row top_head_vitals">

                <div class="col-lg-9 left_side_cnt_mm">
                    <form id="add_measurement">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{ @$id }}">
                        <div class="row">

                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">



                                        <input type="text" class="form-control datepickerInput"
                                            placeholder="dd M, yyyy" name="date">
                                        <span id="dateError" style="color: red;font-size:small"></span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">



                                        <select class="form-control select2_vitals" name="measurement">

                                            <option value="">Choose a measurement...</option>

                                            <option value="Weight">Weight</option>

                                            <option value="Height">Height</option>

                                            <option value="BMI">BMI</option>

                                            <option value="Waist Circumference">Waist Circumference</option>

                                            <option value="SBP">SBP</option>

                                            <option value="DBP">DBP</option>

                                            <option value="Temperature">Temperature</option>

                                            <option value="Pulse">Pulse</option>

                                            <option value="GCS">GCS</option>

                                            <option value="MMS">MMS</option>

                                            <option value="Visceral Fat">Visceral Fat</option>

                                            <option value="Resting Heart Rate">Resting Heart Rate</option>

                                            <option value="Thigh circumference">Thigh circumference</option>

                                            <option value="MUAC circumference">MUAC circumference</option>

                                            <option value="Waist circumference">Waist circumference</option>

                                            <option value="Neck circumference">Neck circumference</option>

                                        </select>
                                        <span id="measurementError" style="color: red;font-size:small"></span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <div class="form-group">

                                        <input type="text" class="form-control" id=""
                                            placeholder="Value" name="value">
                                        <span id="valueError" style="color: red;font-size:small"></span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-3">

                                <div class="inner_element">

                                    <button type="submit"
                                        class="btn r-04 btn--theme hover--tra-black add_patient add_vitals_btn">Add
                                        Vitals<i class="fa-solid fa-arrow-right-to-bracket"></i></button>

                                </div>

                            </div>

                        </div>
                    </form>
                    <div class="col-lg-12">

                        <div class="add_data_diagnosis">

                            <table class="table table-striped table-bordered" id="measurement_table">

                                <tr>

                                    <th>Date</th>

                                    <th>Measurement</th>

                                    <th>Value </th>

                                    <th>Action</th>

                                </tr>
                                <tbody id="measurement_table_body"></tbody>





                                <!-- <tr>

                         <td>15 Nov, 2023</td>

                         <td>Height</td>

                         <td>172</td>



                         <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                     </tr>

                     <tr>

                         <td>15 Nov, 2023</td>

                         <td>Weight</td>

                         <td>70</td>



                         <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a></td>

                     </tr> -->

                            </table>

                        </div>

                    </div>

                </div>



                <div class="col-lg-3 right_side_cnt_mm">

                    <div class="inner_element">

                        <div class="form-group">



                            <select class="form-control select2_vitals">

                                <option value="">&nbsp;</option>

                                <option value="">Weight</option>

                                <option value="">Height</option>

                                <option value="">BMI</option>

                                <option value="">Waist Circumference</option>

                                <option value="">SBP</option>

                                <option value="">DBP</option>

                                <option value="">Temperature</option>

                                <option value="">Pulse</option>

                                <option value="">GCS</option>

                                <option value="">MMS</option>

                                <option value="">Visceral Fat</option>

                                <option value="">Resting Heart Rate</option>

                                <option value="">Thigh circumference</option>

                                <option value="">MUAC circumference</option>

                                <option value="">Waist circumference</option>

                                <option value="">Neck circumference</option>

                            </select>

                        </div>

                    </div>



                    <div id="line_chart_basic" class="apex-charts" dir="ltr"></div>

                </div>

            </div>



        </div>

    </div>

    <div class="offcanvas-footer">

        <div class="frmbtn_areasubmit">

            <!-- <button type="submit" class="btn btn-primary  edit__green">Edit</button> -->

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient"
                data-bs-dismiss="offcanvas">Save</button>

            <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                data-bs-dismiss="offcanvas">Close</button>

        </div>

    </div>

</div>













<!---- prescription_day model ---->

<div class="modal fade edit_patient__" id="prescription_day" tabindex="-1"
    aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Prescription a day</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="prescription_day_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />

                <div class="modal-body padding-0">
                    <div class="inner_data">
                        <div class="row">
                            <!-- <div class="col-lg-12">
   <div class="title_head">
    <h4>Schedule Appointment</h4>
   </div>
  </div> -->

                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01"
                                                class="form-label">Prescription</label>
                                            <textarea class="form-control" placeholder="" style="height:150px" name="prescription"></textarea>
                                            <span id="prescriptionError"
                                                style="color: red;font-size:small"></span>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="action text-end bottom_modal">
                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                            Save</button>
                        <button type="button" class="modalCloseBtn" data-bs-dismiss="modal"
                            aria-label="Close">
                            Close</button>
                    </div>
                </div>
            </form>
            <!-- <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 <button type="button" class="btn btn-primary">Save changes</button>
</div> -->
        </div>
    </div>
</div>


<!------Order Special Invistigation model ---->

<div class="modal fade edit_patient__" id="order_supportive_surface" tabindex="-1"
    aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel"> Order Special Invistigation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="order_supportive_surface_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />

                <div class="modal-body padding-0">
                    <div class="inner_data">
                        <div class="row">
                            <!-- <div class="col-lg-12">
   <div class="title_head">
    <h4>Schedule Appointment</h4>
   </div>
  </div> -->

                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Write Special
                                                Invistigation</label>
                                            <textarea class="form-control" placeholder="" style="height:150px" name="invistigation"></textarea>
                                            <span id="invistigationError"
                                                style="color: red;font-size:small"></span>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="action text-end bottom_modal">
                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                            Save</button>
                        <button type="button" class="modalCloseBtn" data-bs-dismiss="modal"
                            aria-label="Close">
                            Close</button>
                    </div>
                </div>
            </form>
            <!-- <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 <button type="button" class="btn btn-primary">Save changes</button>
</div> -->
        </div>
    </div>
</div>




<!------Order Order Procedure model ---->
<div class="modal fade edit_patient__" id="order_procedure" tabindex="-1"
    aria-labelledby="exampleModalLabel" style="display: none;" data-select2-id="order_procedure"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel"> Order Procedure</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="order_procedure_form">
                @csrf
                <input type="hidden" name="patient_id" value="{{ @$id }}" />

                <div class="modal-body padding-0">
                    <div class="inner_data">
                        <div class="row">
                            <!-- <div class="col-lg-12">
   <div class="title_head">
    <h4>Schedule Appointment</h4>
   </div>
  </div> -->
                            <div class="col-lg-12">
                                <div class="inner_element">
                                    <div class="mb-3 form-group">
                                        <label for="validationCustom01" class="form-label">Select
                                            Procedure</label>
                                        <select class="form-control select2_procedure" name="procedure">
                                            <option value="Consent Form">Consent Form</option>
                                            <option value="Pre-Procedure Order">Pre-Procedure Order</option>
                                            <option value="Procedure Record">Procedure Record</option>
                                            <option value="Discharge Order">Discharge Order</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Type your entry
                                                here</label>
                                            <textarea class="form-control" placeholder="" style="height:100px" name="entry"></textarea>
                                            <span id="entryError" style="color: red;font-size:small"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Write
                                                Summary</label>
                                            <textarea class="form-control" placeholder="" style="height:100px" name="summary"></textarea>
                                            <span id="summaryError" style="color: red;font-size:small"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="action text-end bottom_modal">
                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">
                            Save</button>
                        <button type="button" class="modalCloseBtn" data-bs-dismiss="modal"
                            aria-label="Close">
                            Close</button>
                    </div>
                </div>
            </form>
            <!-- <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 <button type="button" class="btn btn-primary">Save changes</button>
</div> -->
        </div>
    </div>
</div>


<!----------------------------

               invoice canvas modal #invoice page action to open canvas

         ---------------------------->

<div class="offcanvas offcanvas-bottom offcanvas-h-custom-80  centercanvas" tabindex="-1" id="user-invoice"
    aria-labelledby="offcanvasBottomLabel">

    {{-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
         class="fa-regular fa-circle-down"></i> Close</button> --}}

    <button type="button" class="modalCloseBtn" data-bs-dismiss="modal" aria-label="Close">
        Close</button>



    <div class="offcanvas-body small p-0">

        <div class="invoicenotedet_box">

            <div class="invoice_notebox_header">

                <div class="invuser_nametopay">

                    <h1>Jansh Brown | Invoice Number RUHF5TJ</h1>

                </div>



                <div class="fullypaid_invbox">

                    <button type="button" class="ft_buttonshoover">Mark Fully Paid</button>

                </div>

            </div>



            <div class="invuserinvoice_middle">

                <table class="rwd-table">

                    <thead>

                        <tr>

                            <th>Inv Total</th>

                            <th>Balance</th>

                            <th>Amount Paid</th>

                            <th>Date Paid</th>

                            <th>Payment Method</th>

                        </tr>

                    </thead>

                    <tbody>



                        <tr>

                            <td data-th="Supplier Code">

                                {{env('SHOW_CURRENCY')}} 100.00

                            </td>

                            <td data-th="Supplier Name">

                                {{env('SHOW_CURRENCY')}} 100.00

                            </td>

                            <td data-th="Invoice Number">

                                <div class="amountpaid_input input_width"><input type="text"
                                        class="form-control comoninpt_border"></div>

                            </td>

                            <td data-th="Invoice Date ">

                                <div class="invdate_input input_width"><input type="text"
                                        class="form-control datepickerInput comoninpt_border"
                                        placeholder="20/11/2023"><iconify-icon
                                        icon="solar:calendar-linear"></iconify-icon></div>

                            </td>

                            <td data-th="Due Date">

                                <div class="paymenttype_select">

                                    <select name="" id="">

                                        <option value="">BACS</option>

                                        <option value="">Cheque</option>

                                        <option value="">Cash</option>

                                        <option value="">Card</option>

                                        <option value="">Credit</option>

                                    </select>

                                </div>

                            </td>



                        </tr>



                    </tbody>

                </table>

            </div>



            <div class="newbalance_area">

                <div class="balance_amount_number">
                    <h1>New Balance : </h1> <span>{{env('SHOW_CURRENCY')}} 100.00</span>
                </div>



                <div class="type_noteforinv_user">

                    <div class="custom_textareadet">

                        <label for="exampleFormControlTextarea1" class="form-label">Add Note</label>

                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            placeholder="Type any notes related to this invoice here..."></textarea>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="offcanvas-footer">

        <div class="frmbtn_areasubmit">

            <!-- <button type="submit" class="btn btn-primary  edit__green">Edit</button> -->

            <a href="invoicing.php">

                <button type="submit"
                    class="btn cmncanvasft_buttons r-04 btn--theme hover--tra-black add_patient">Save Note</button>

            </a>

            <a href="invoicing.php">

                <button type="submit"
                    class="btn cmncanvasft_buttons r-04 btn--theme hover--tra-black  secondary_btn">Save</button>

            </a>

        </div>

    </div>

</div>

<!-- invoice canvas modal end -->

<!----------------------------
           supportive Treatment
         ---------------------------->
<div class="modal fade edit_patient__" id="supportive_treatment" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Supportive Treatment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="supportivetreatment" method="POST">
                @csrf
                <input type="hidden" value="{{ @$id }}" name="patient_id" />

                <div class="modal-body padding-0">
                    <div class="inner_data">
                        <div class="row">
                            <!-- <div class="col-lg-12">
                                         <div class="title_head">
                                         <h4>Schedule Appointment</h4>
                                         </div>
                                         </div> -->

                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="supportiveTitle"
                                                name="supportiveTitle" placeholder="">
                                            <span id="supportiveTitleError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Sub Title</label>
                                            <input type="text" class="form-control" id="supportiveSubTitle"
                                                name="supportiveSubTitle" placeholder="">
                                            <span id="supportiveSubTitleError" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3 form-group">
                                            <label for="validationCustom01" class="form-label">Write supportive
                                                Treatment</label>
                                            <textarea class="form-control" placeholder="" style="height:100px" id="supportiveTreatment" name="Treatment"></textarea>
                                            <span id="supportiveTreatmentError" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="action text-end bottom_modal">
                        <button type="submit" class="btn r-04 btn--theme hover--tra-black add_patient">

                            Save</button>
                        <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                            data-bs-dismiss="modal">
                            Close</a>
                    </div>
                </div>
            </form>
            <!-- <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
        </div>
    </div>
</div>

<!----------------------------
  Symptoms
---------------------------->

<div class="modal fade edit_patient__" id="symptoms_add2" tabindex="-1" aria-labelledby="exampleModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLabel">Severity Symptoms Scale </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    fdprocessedid="0d6mcr"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body padding-0">
                <div class="inner_data">
                    <div class="row">
                        <!-- <div class="col-lg-12">
   <div class="title_head">
    <h4>Schedule Appointment</h4>
   </div>
  </div> -->

                        <div class="col-lg-12">
                            <div class="add_categoryweb">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="validationCustom01" class="form-label">Type Symptoms</label>
                                        <div class="category-container" id="category-container-1">
                                            <input type="text" class="form-control category-input"
                                                placeholder="Type Symptoms here..." fdprocessedid="b2lsu">
                                            <button
                                                class="btn r-04 btn--theme hover--tra-black add_patient add-category"
                                                type="button" fdprocessedid="30sk7"><i
                                                    class="fa-solid fa-plus"></i> Add</button>
                                        </div>
                                        <div class="categories-list" id="categories-list-1">
                                            <!-- Categories will be displayed here -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 form-group">
                                <label for="validationCustom01" class="form-label">Write Summary</label>
                                <textarea class="form-control" placeholder="" style="height:150px"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="action text-end bottom_modal">
                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">
                        Save</a>
                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                        data-bs-dismiss="modal">
                        Close</a>
                </div>
            </div>
            <!-- <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 <button type="button" class="btn btn-primary">Save changes</button>
</div> -->
        </div>
    </div>
</div>





<!-- EXTERNAL SCRIPTS

                 ============================================= -->

<script src="{{ asset('/assets/js/jquery-3.7.0.min.js')}}"></script>



<script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>

<script src="{{ asset('/assets/js/modernizr.custom.js')}}"></script>

<script src="{{ asset('/assets/js/jquery.easing.js')}}"></script>

<script src="{{ asset('/assets/js/jquery.appear.js')}}"></script>

<script src="{{ asset('/assets/js/menu.js')}}"></script>

<script src="{{ asset('/assets/js/owl.carousel.min.js')}}"></script>

<script src="{{ asset('/assets/js/pricing-toggle.js')}}"></script>

<script src="{{ asset('/assets/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{ asset('/assets/js/request-form.js')}}"></script>

<script src="{{ asset('/assets/js/jquery.validate.min.js')}}"></script>

<script src="{{ asset('/assets/js/jquery.ajaxchimp.min.js')}}"></script>

<script src="{{ asset('/assets/js/popper.min.js')}}"></script>

<script src="{{ asset('/assets/js/lunar.js')}}"></script>

<script src="{{ asset('/assets/js/wow.js')}}"></script>

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>



<!-- apex chart cdn -->

<!-- Include ApexCharts library -->

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



<!-- Custom Script -->

<script src="{{ asset('/assets/js/custom.js')}}"></script>



<!-- <script>
    $(document).on({

        "contextmenu": function(e) {

            console.log("ctx menu button:", e.which);





            e.preventDefault();

        },

        "mousedown": function(e) {

            console.log("normal mouse down:", e.which);

        },

        "mouseup": function(e) {

            console.log("normal mouse up:", e.which);

        }

    });
</script> -->



<script>
    $(function() {
        $(".switch").click(function() {
            $("body").toggleClass("theme--dark");
            if ($("body").hasClass("theme--dark")) {
                $(".switch").text("Light Mode");
            } else {
                $(".switch").text("Dark Mode");
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        if ($("body").hasClass("theme--dark")) {
            $(".switch").text("Light Mode");
        } else {
            $(".switch").text("Dark Mode");
        }
    });
</script>
<script>
    $(function() {
        $('#sign_upload').hide();
    })
    var check = $('#flexCheckDefault8').val();
    $('#flexCheckDefault8').change(function() {
        if (this.checked) {
            $('#sign_upload').show();
        } else {
            $('#sign_upload').hide();
        }

    });
</script>
<script>
    $(function() {
        $('#invoice_appoin').hide();
    })
    var check = $('#flexCheckCheckeda2').val();
    $('#flexCheckCheckeda2').change(function() {
        if (this.checked) {
            $('#invoice_appoin').show();
        } else {
            $('#invoice_appoin').hide();
        }

    });
</script>
<script>
    $(function() {
        $('#refer_note').hide();
    })
    var check = $('.check_dr').val();
    $('.check_dr').change(function() {
        if (this.checked) {
            $('#refer_note').show();
        } else {
            $('#refer_note').hide();
        }

    });
</script>
<!-- book appointment form toggle -->
<script>
    $(document).ready(function() {
        $('#book_appointment_box').hide();

        $('#appoin_btn_form').click(function() {
            $('#book_appointment_box').toggle();
        });
    });
</script>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->

<!--

                 <script>
                     var _gaq = _gaq || [];

                     _gaq.push(['_setAccount', 'UA-XXXXX-X']);

                     _gaq.push(['_trackPageview']);



                     (function() {

                         var ga = document.createElement('script');
                         ga.type = 'text/javascript';
                         ga.async = true;

                         ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                             '.google-analytics.com/ga.js';

                         var s = document.getElementsByTagName('script')[0];
                         s.parentNode.insertBefore(ga, s);

                     })();
                 </script>

                 -->

<script>
    window.addEventListener('load', function() {
        var loader = document.querySelector('.main_loader');
        loader.style.display = 'none'; // Hide the loader when the page is fully loaded
    });
</script>


<script src="{{ asset('/assets/js/changer.js')}}"></script>

<script defer src="{{ asset('/assets/js/styleswitch.js')}}"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>	 -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script>
    $('.service_slider').owlCarousel({
        loop: true,
        margin: 15,
        dots: false,
        nav: false,
        items: 3,
        center: true,
        autoplay: true,
    })
</script>
<script>
    $('.doctor_slider').owlCarousel({
        loop: true,
        margin: 15,
        dots: false,
        nav: false,
        items: 4,
        autoplay: true,
    })
</script>
<script>
    let profile = document.querySelector(".profile");
    let menu = document.querySelector(".menu__");

    profile.onclick = function() {
        menu.classList.toggle("active");
    };


    $("#appointment_datenextpre").change(function(){
        $("#appo_start_date").val($(this).val());
    });
</script>


<!-- iconify icons js -->

<script src="{{ asset('/assets/js/iconify-icons.js')}}"></script>



<!-- timepicker js -->

<script src="{{ asset('/assets/js/jquery.timepicker.min.js')}}"></script>

<!-- timepicker js end -->



<!-- form plugin js -->

<script src="{{ asset('/assets/libs/select2/js/select2.min.js')}}"></script>

<script src="{{ asset('/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<script src="{{ asset('/assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>

<script src="{{ asset('/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>

<script src="{{ asset('/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js')}}"></script>

<script src="{{ asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>



<script src="{{ asset('/assets/js/pages/form-advanced.init.js')}}"></script>

<!-- apexcharts -->

{{-- <script src="{{ asset('/assets/libs/apexcharts/apexcharts.min.js')}}"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>

<!-- Vector map-->

<script src="{{ asset('/assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>

<script src="{{ asset('/assets/libs/jsvectormap/maps/world-merc.js')}}"></script>



<!-- Required datatable js -->

<script src="{{ asset('/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<script src="{{ asset('/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>





<!-- Buttons examples -->

<script src="{{ asset('/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>

<script src="{{ asset('/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{ asset('/assets/libs/jszip/jszip.min.js')}}"></script>

<script src="{{ asset('/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>

<script src="{{ asset('/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>

<script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>

<script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>

<script src="{{ asset('/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>



<script src="{{ asset('/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>

<script src="{{ asset('/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>



<!-- Responsive examples -->

<script src="{{ asset('/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>

<script src="{{ asset('/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>



<!-- Datatable init js -->

<script src="{{ asset('/assets/js/pages/datatables.init.js')}}"></script>

<!-- linecharts init -->

{{-- <script src="{{ asset('/assets/js/pages/apexcharts-line.init.js')}}"></script> --}}

<!-- App js tinymce.min-->

<script src="{{ asset('/assets/js/app.js')}}"></script>

<!-- tinymce editor -->
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

{{--
<script src="{{ asset('/assets/js/tinymce.min.js"></script>
<script src="{{ asset('/assets/js/model.min.js"></script>
<script src="{{ asset('/assets/js/theme.min.js"></script>
<script src="{{ asset('/assets/js/icons.min.js"></script>

<script src="{{ asset('/assets/js/skin.min.css"></script>
<script src="{{ asset('/assets/js/content.min.css"></script>
<script src="{{ asset('/assets/js/css/content.min.css"></script> --}}

<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

<!--  Flatpickr  -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
<script>
    $("#timePicker").flatpickr({
        enableTime: true,
        noCalendar: true,
        time_24hr: true,
        dateFormat: "H:i",
    });
</script>
<!-- Dropify Js  -->
<script>
    $('.dropify').dropify();
</script>

<!-- Select 2 js without searchbar -->
<script>
    $('.select2_without_search').select2({
        minimumResultsForSearch: -1 // for no searchbar

    });

    $('.select2_with_search').select2({});
    $('.referalcls').select2({});
</script>
<script>
    $('.select_diagnosis').select2({
        dropdownParent: $('#diagnosis')
    });
</script>
<script>
    $('.select_symptoms').select2({
        dropdownParent: $('#symptoms_add')
    });
</script>


<script>
    $('.select2_modal_').select2({
        dropdownParent: $('.add_patient__')
    });

    $('.select2_referal').select2();


    $('.select2_appointment').select2({
        dropdownParent: $('.edit_patient__')
    });

    $('.select2_modal').select2({
        dropdownParent: $('.event-modal')
    });

    $('.select2_modal_fir').select2({
        dropdownParent: $('.event-modal')
    });

    $('.select2_modal_patient').select2({
        dropdownParent: $('.event-modal')
    });

    $('.select2_modalapponiment').select2({
        dropdownParent: $('.event-modal')
    });
</script>


<script>
    $('.select2_edit_info').select2({
        dropdownParent: $('#edit_patient')
    });

    $('.select2_extract_code').select2({
        dropdownParent: $('#extract_code')
    });
    $('.select2_note').select2({
        dropdownParent: $('#new_letter'),
        minimumResultsForSearch: -1
    });
    $('.select2_task').select2({
        dropdownParent: $('#new_task'),
        minimumResultsForSearch: -1
    });
    $('.select2_vitals').select2({
        dropdownParent: $('#add_vitals'),
        minimumResultsForSearch: -1
    });
    $('.select2_appointment').select2({
        dropdownParent: $('#make_appointment'),
        minimumResultsForSearch: -1
    });
    $('.select2_appointment').select2({
        dropdownParent: $('#event-modal'),
        minimumResultsForSearch: -1
    });
    $('.select2_note').select2({
        dropdownParent: $('#add_new_note'),
        minimumResultsForSearch: -1
    });
    $('.paymenttype_select select').select2({
        dropdownParent: $('#user-invoice')
    });
    $('.select2_imaginary_test').select2({
        dropdownParent: $('#order_imagenairy'),
        minimumResultsForSearch: -1
    });
    $('.select2_procedure').select2({
        dropdownParent: $('#order_procedure'),
        minimumResultsForSearch: -1
    });
</script>



<script>
    $(document).ready(function() {
        $('#text_area').hide();
        $('.text_area_show').click(function() {
            $('#text_area').show();
        });
        $('.text_area_hide').click(function() {
            $('#text_area').hide();
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#text_pae').hide();
        $('#pae_yes').click(function() {
            $('#text_pae').show();
        });
        $('#pae_no').click(function() {
            $('#text_pae').hide();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#eligibility_text_area').hide();
        $('#eligibility_other').click(function() {
            $('#eligibility_text_area').show();
        });
        $('.hide_eligibility_textarea').click(function() {
            $('#eligibility_text_area').hide();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#Nephrology_textarea').hide();
        $('#PevicRehab_textarea').hide();

        $('#Nephrology_checkbox').click(function() {
            $('#Nephrology_textarea').show();
            $('#PevicRehab_textarea').hide();
        });

        $('#PevicRehab_checkbox').click(function() {
            $('#Nephrology_textarea').hide();
            $('#PevicRehab_textarea').show();
        });
    });
</script>

<!-- jQuery and jQuery UI JS -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
    $(document).ready(function() {
        // Initialize jQuery UI datepicker
        $('.datepickerInput').datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0,
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('#add_address_new_form').hide();
        $('#add_address_new').click(function() {
            $('#add_address_new_form').toggle();
        })
        $('#cancel_btn_address').click(function() {
            $('#add_address_new_form').hide();
        })
    });
</script>
<script>
    $(document).ready(function() {
        $('#context_add').hide();
        $('#entry_add_btn').click(function() {
            $('#context_add').toggle();
        })

    });
</script>



<script>
    $(function() {
        // Initialize the timepicker
        $('.timepicker-custom').timepicker({
            'step': 1,
            'timeFormat': 'h:i A' // Use 'h:i A' for AM/PM format
        });
    });
</script>

<!-- three dot dropdown js -->

<script>
    $(document).ready(function() {
        // jQuery code to handle the dropdown animation
        $(".customdotdropdown").hover(
            function() {
                // Close any open dropdowns
                $(".dropdown-content").stop().slideUp("fast");

                // Open the current dropdown
                $(this).find(".dropdown-content").stop().slideDown("fast");
            },
            function() {
                // Hover out - close the dropdown
                $(this).find(".dropdown-content").stop().slideUp("fast");
            }
        );

        // Close the dropdown on outside click
        $(document).on("click", function(event) {
            var dropdown = $(".customdotdropdown");
            if (!dropdown.is(event.target) && dropdown.has(event.target).length === 0) {
                $(".dropdown-content").slideUp("fast");
            }
        });
    });
</script>


<!-- comon select call -->
<script>
    $('.comon_selectrtj').select2({});
</script>

<script>
    $(document).ready(function() {
        $('#symptom_input').hide();
        $('#add_symptom').click(function() {
            $('#symptom_input').show();
        })

        $('#remove_symptom').click(function() {
            $('#symptom_input').hide();
        })
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sumoselect/3.4.9/jquery.sumoselect.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize SumoSelect with search
        $('#sumo-select').SumoSelect({
            search: true,
            dropdownParent: $('#lab_test')
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Initialize SumoSelect with search
        $('#sumo-select4').SumoSelect({
            search: true,
            dropdownParent: $('#order_imagenairy')
        });
    });
</script>
<script>
    // $(document).ready(function() {
    // $('#add_diseases').hide()
    // $('#add_diseases_btn').click(function(){
    // 	$('#add_diseases').show();
    // })
    // $('#remove_disease').click(function(){
    // 	$('#add_diseases').hide();
    // })
    // });
</script>
<script>
    // $(document).ready(function() {
    // $('#add_surgery').hide()
    // $('#add_surgery_btn').click(function(){
    // 	$('#add_surgery').show();
    // })
    // $('#remove_surgery').click(function(){
    // 	$('#add_surgery').hide();
    // })
    // });
</script>

<!-- Annotate image js  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/konva/8.1.1/konva.min.js"></script>

<!-- Example for including Fabric.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>

<script>
    // Function to toggle textarea based on checkbox state
    function toggleTextarea(checkboxId, textareaId) {
        var checkbox = document.getElementById(checkboxId);
        var textarea = document.getElementById(textareaId);

        checkbox.addEventListener('change', function() {
            textarea.disabled = !checkbox.checked;

            if (!checkbox.checked) {
                textarea.value = '';
            }
        });
    }

    // Apply the function to each instance
    toggleTextarea('enableTextarea1', 'myTextarea1');
    toggleTextarea('enableTextarea2', 'myTextarea2');
    toggleTextarea('enableTextarea3', 'myTextarea3');
    toggleTextarea('enableTextarea4', 'myTextarea4');
</script>

<script>
    $(document).ready(function() {
        $('#eligibile1_textarea').hide();
        $('#eligibile2_textarea').hide();
        $('#eligibile3_textarea').hide();
        $('#eligibile4_textarea').hide();
        $('#eligibile5_textarea').hide();
        $('#eligibile6_textarea').hide();
        $('#eligibile7_textarea').hide();
        $('#eligibile8_textarea').hide();



        $('#non_eligibile1_checkbox').click(function() {
            $('#eligibile1_textarea').hide();
        });
        $('#eligibile1_checkbox').click(function() {
            $('#eligibile1_textarea').show();
        });


        $('#non_eligibile2_checkbox').click(function() {
            $('#eligibile2_textarea').hide();
        });
        $('#eligibile2_checkbox').click(function() {
            $('#eligibile2_textarea').show();
        });


        $('#non_eligibile3_checkbox').click(function() {
            $('#eligibile3_textarea').hide();
        });
        $('#eligibile3_checkbox').click(function() {
            $('#eligibile3_textarea').show();
        });


        $('#non_eligibile4_checkbox').click(function() {
            $('#eligibile4_textarea').hide();
        });
        $('#eligibile4_checkbox').click(function() {
            $('#eligibile4_textarea').show();
        });


        $('#non_eligibile5_checkbox').click(function() {
            $('#eligibile5_textarea').hide();
        });
        $('#eligibile5_checkbox').click(function() {
            $('#eligibile5_textarea').show();
        });


        $('#non_eligibile6_checkbox').click(function() {
            $('#eligibile6_textarea').hide();
        });
        $('#eligibile6_checkbox').click(function() {
            $('#eligibile6_textarea').show();
        });


        $('#non_eligibile7_checkbox').click(function() {
            $('#eligibile7_textarea').hide();
        });
        $('#eligibile7_checkbox').click(function() {
            $('#eligibile7_textarea').show();
        });



        $('#non_eligibile8_checkbox').click(function() {
            $('#eligibile8_textarea').hide();
        });
        $('#eligibile8_checkbox').click(function() {
            $('#eligibile8_textarea').show();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#abnormal_c2").hide();
        $("#abnormal_c4").hide();

        $("#clinic_exam_1").click(function() {
            $("#abnormal_c2").hide();
        });
        $("#clinic_exam_2").click(function() {
            $("#abnormal_c2").show();
        });

        $("#clinic_exam_3").click(function() {
            $("#abnormal_c4").hide();
        });
        $("#clinic_exam_4").click(function() {
            $("#abnormal_c4").show();
        });
    })
</script>


<!-- add_diseases_btn start-->
<script>
    $(document).ready(function() {
        let counter = 1;

        $(document).on('click', '.add_diseases_btn', function(e) {
            e.preventDefault();

            let newSection = $('#add_diseases').clone();

            newSection.attr('id', 'add_diseases_' + counter);
            newSection.find('input[type="text"]').val('');
            newSection.find('textarea').val('');

            $('#dynamic-sections').append(newSection);
            counter++;
        });

        $(document).on('click', '#remove_disease', function(e) {
            e.preventDefault();
            if (counter != 1) {
                $(this).closest('.col-lg-12').parent().remove();
                counter--;
            }

        });
    });
</script>
<!-- add_diseases_btn end here -->
<!-- add_surgical_btn start-->

<script>
    $(document).ready(function() {
        let counter = 1;

        $(document).on('click', '.add_surgical_btn', function(e) {
            e.preventDefault();

            let newSection = $('#add_surgical').clone();

            newSection.attr('id', 'add_surgicals_' + counter);
            newSection.find('input[type="text"]').val('');
            newSection.find('textarea').val('');

            $('#surgical-dynamic-sections').append(newSection);
            counter++;
        });

        $(document).on('click', '#remove_surgical', function(e) {
            e.preventDefault();
            if (counter != 1) {
                $(this).closest('.col-lg-12').parent().remove();
                counter--;
            }

        });
    });
</script>
<!-- add_surgical_btn end here -->

<script>
    // Initialize CKEditor 4
    // voiceInput fields
    CKEDITOR.replace('voiceInput')
        .catch(function(error) {
            console.error(error);
        });
    // summary fields
    CKEDITOR.replace('summerynote')
        .catch(function(error) {
            console.error(error);
        });
</script>

<script>
    $(document).ready(function() {

        // $('.datepickerInputDate').datepicker({
        //     dateFormat: 'YYYY-MM-DD'
        // });


        $('.datepickerInputDate').attr('autocomplete', 'off');


        $('.start_date, .end_date').change(function() {
            var startDate = $('.start_date').datepicker('getDate');
            var endDate = $('.end_date').datepicker('getDate');

            if (startDate != null && endDate != null && startDate > endDate) {
                alert('Start date must be before end date!');
                $('.start_date').val('');
                $('.end_date').val('');
            }
        });

        $('#event-modal').on('hidden.bs.modal', function(e) {
            // location.reload();
        });
        //   date format
        $(function() {
            $(".end_date").datepicker({
                dateFormat: 'yy-mm-dd'
            });
            $(".start_date").datepicker({
                dateFormat: 'yy-mm-dd'
            }).bind("change", function() {
                var minValue = $(this).val();
                minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
                minValue.setDate(minValue.getDate() + 1);
                $(".end_date").datepicker("option", "minDate", minValue);
            })
        });

        $("#dp1711718991197").datepicker({
            startDate: new Date()
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('#book_app').prop('disabled', true);
        $('#appoin_btn_form').click(function(event) {
            event.preventDefault();
            $('#book_app').prop('disabled', false);
        });


        let patient_id = $('input[name="patient_id"]').val();
        $('#appointment_form').submit(function(e) {
            e.preventDefault();

            let isValid = validateFormAppointment();

            if (true) {

                $.ajax({
                    url: '{{ route('user.calendar.event') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(result) {
                        $('#appointment_form')[0].reset();
                        // Call the function every second
                        setInterval(function() {
                            $('[id*="Error"]').text('');
                        }, 1000);

                        if (result != '') {
                            document.querySelector('.select2_appoin_ttype__').selectedIndex = 0;
                            swal.fire({
                                title: 'Success',
                                html: 'Appointment Booked successfully!',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // 1000 milliseconds = 1 second
                            });

                            $('#appointment_form')[0].reset();
                            $('#make_appointment').modal('hide');



                        } else {

                            swal.fire("Error!", "Enter valid Appointment Details!",
                                "error");

                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }
        });


        function validateFormAppointment() {
            let isValid = true;
            // Validate date
            let date = $('input[name="appointment_date"]').val();
            if (date === '') {
                isValid = false;

                $('#appointment_dateError').text('Date  is required');
                $('input[name="appointment_date"]').addClass('error');
            }
            // Validate appointment_type
            let appointment_type = $('select[name="appointment_type"]').val();
            if (appointment_type === '') {
                isValid = false;

                $('#appointment_typeError').text('Appointment Type  is required');
                $('select[name="appointment_type"]').addClass('error');
            }
            // Validate location
            let location = $('select[name="location"]').val();
            if (location === '') {
                isValid = false;

                $('#locationError').text('location   is required');
                $('select[name="location"]').addClass('error');
            }
            // Validate start_date
            let start_date = $('input[name="start_date"]').val();
            if (start_date === '') {
                isValid = false;

                $('#start_dateError').text('Start Date  is required');
                $('input[name="start_date"]').addClass('error');
            }
            // Validate start_time
            let start_time = $('input[name="start_time"]').val();
            if (start_time === '') {
                isValid = false;

                $('#start_timeError').text('Start Date  is required');
                $('input[name="start_time"]').addClass('error');
            }
            // Validate end_date
            let end_date = $('input[name="end_date"]').val();
            if (end_date === '') {
                isValid = false;

                // $('#end_dateError').text('End Date  is required');
                // $('input[name="end_date"]').addClass('error');
            }
            // Validate end_time
            let end_time = $('input[name="end_time"]').val();
            if (end_time === '') {
                isValid = false;

                $('#end_timeError').text('End Time is required');
                $('input[name="end_time"]').addClass('error');
            }
            // Validate app_cost
            let app_cost = $('input[name="app_cost"]').val();
            if (app_cost === '') {
                isValid = false;

                $('#app_costError').text('Cost  is required');
                $('input[name="app_cost"]').addClass('error');
            }
            // Validate app_code
            // let app_code = $('input[name="app_code"]').val();
            // if (app_code === '') {
            //     isValid = false;

            //     $('#app_codeError').text('Code  is required');
            //     $('input[name="app_code"]').addClass('error');
            // }
            // Validate clinician
            let clinician = $('select[name="clinician"]').val();
            if (clinician === '') {
                isValid = false;

                $('#clinicianError').text('Clinician   is required');
                $('select[name="clinician"]').addClass('error');
            }


            return isValid;
        }

    });
</script>
@stack('custom-js')


<!-- common module script start here -->
<!-- Add a New Note module start -->
<!-- Add a new progress notes form data into database-->
<script>
    $(document).ready(function() {
        let patient_id = $('input[name="patient_id"]').val();
        $('#progress_note_form').submit(function(e) {

            e.preventDefault();

            let isValid = validateFormProgressNote();

            if (isValid) {
                CKEDITOR.instances['voiceInput'].updateElement();
                $.ajax({
                    url: '{{ route('user.patient_progress_list_save') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(result) {
                        $('#progress_note_form')[0].reset();
                        // Call the function every second
                        setInterval(function() {
                            $('[id*="Error"]').text('');
                        }, 1000);

                        if (result != '') {

                            swal.fire(

                                'Success',

                                ' Progress Note Added successfully!',

                                'success'

                            )
                            fetchAndDisplayPatientProgressNote(patient_id);
                            location.reload();
                        } else {

                            swal.fire("Error!", "Enter valid Progress Note Details!",
                                "error");

                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }
        });


        function validateFormProgressNote() {
            let isValid = true;
            // Validate note_contents
            // let note_contents = $('select[name="note_contents"]').val();
            // if (note_contents === '') {
            //     isValid = false;

            //     $('#note_contentsError').text('Note Content  is required');
            //     $('select[name="note_contents"]').addClass('error');
            // }
            // Validate new_text
            // let new_text = $('input[name="new_text"]').val();
            // if (new_text === '') {
            //   isValid = false;

            //   ('#new_textError').text('New context  is required');
            //   $('input[name="new_text"]').addClass('error');
            // }
            // Validate prog_voice_recognition
            // let prog_voice_recognition = $('textarea[name="prog_voice_recognition"]').val();
            // if (prog_voice_recognition === '') {
            //     isValid = false;

            //     $('#prog_voice_recognitionError').text('voice_recognition  is required');
            //     $('textarea[name="prog_voice_recognition"]').addClass('error');
            // }
            // Validate prog_day
            // let prog_day = $('input[name="prog_day"]').val();
            // if (prog_day === '') {
            //   isValid = false;

            //   $('#prog_dayError').text('Day  is required');
            //   $('input[name="prog_day"]').addClass('error');
            // }
            // Validate date
            //  let date = $('input[name="date"]').val();
            // if (date === '') {
            //   isValid = false;

            //   $('#dateError').text('Date  is required');
            //   $('input[name="date"]').addClass('error');
            // }
            // Validate prog_email
            //  let prog_email = $('input[name="prog_email"]').val();
            // if (prog_email === '') {
            //   isValid = false;

            //   $('#prog_emailError').text('email  is required');
            //   $('input[name="prog_email"]').addClass('error');
            // }

            return isValid;
        }

    });
</script>
<!-- Function to fetch And Display Patient Progress Note data -->
<script>
    function fetchAndDisplayPatientProgressNote(patient_id) {

        // let patient_id = $('input[name="patient_id"]').val();
        $.ajax({
            url: '{{ route('user.patient_progress_list') }}',
            type: 'GET',
            data: {
                patient_id: patient_id
            },
            dataType: 'json',
            success: function(data) {

                if (data && data.hasOwnProperty('note_contents')) {
                    let cannedNotes = data.note_contents;
                    cannedNotes.forEach(function(note) {
                        let newOption = $('<option>', {
                            value: note.id,
                            text: note.note_name
                        });


                        let optionExists = $('#note_contents option[value="' + note.id + '"]')
                            .length > 0;

                        if (!optionExists) {

                            $('#note_contents').append(newOption);
                        } else {

                            $('#note_contents option[value="' + note.id + '"]').text(note
                                .note_name);
                        }
                    });


                }
                if (data && data.hasOwnProperty('canned_texts')) {
                    let canned_texts = data.note_contents.canned_texts ? data.note_contents.canned_texts :
                        '';
                    let id = data.canned_texts.id ? data.canned_texts.id : '';
                    let canned_textsobj = data.canned_texts;
                    canned_textsobj.forEach(function(note) {
                        let newOption = $('<option>', {
                            value: note.id,
                            text: note.canned_name
                        });


                        let optionExists = $('#canned_texts option[value="' + note.id + '"]')
                            .length > 0;

                        if (!optionExists) {

                            $('#canned_texts').append(newOption);
                        } else {

                            $('#canned_texts option[value="' + note.id + '"]').text(note
                                .canned_name);
                        }
                    });
                }


            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Call the function on clcik class proress_notes
    $(document).ready(function() {
        let patient_id1 = $('input[name="patient_id"]').val();
        $(".proress_notes").on('click', function() {

            fetchAndDisplayPatientProgressNote(patient_id1);
        });

    });
</script>



<!-- Function to fetch And Display Predefine Note List -->
<script>
    function fetchAndDisplayPredefineNoteList(patient_id, canned_texts, note_contents) {

        // let patient_id = $('input[name="patient_id"]').val();
        $.ajax({
            url: '{{ route('user.patient_progress_predefine_notes_list') }}',
            type: 'GET',
            data: {
                patient_id: patient_id,
                canned_texts_id: canned_texts,
                note_contents_id: note_contents
            },
            dataType: 'json',
            success: function(data) {
                // Get the existing CKEditor instance

                var editorContent = '';
                if (data && data.describe && data.describe.describe && data.describe.describe.length > 0) {

                    editorContent = data.describe.describe;
                    CKEDITOR.instances['voiceInput'].setData(editorContent);
                } else {
                    CKEDITOR.instances['voiceInput'].setData(editorContent);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Call the function on clcik class invoice_item
    $(document).ready(function() {
        let patient_id1 = $('input[name="patient_id"]').val();

        $("#automated_clinic_note").on('click', function() {
            let isValid = validatePatientPredefineNote();
            if (isValid) {
                let canned_texts = $('#canned_texts').val();
                let note_contents = $('#note_contents').val();
                fetchAndDisplayPredefineNoteList(patient_id1, canned_texts, note_contents);
            }
        });

        function validatePatientPredefineNote() {
            let isValid = true;
            // Validate canned_texts
            let canned_texts = $('select[name="canned_texts"]').val();
            if (canned_texts === '') {
                isValid = false;

                $('#canned_textsError').text('Field  is required');
                $('select[name="canned_texts"]').addClass('error');
            }
            // Validate note_contents
            let note_contents = $('select[name="note_contents"]').val();
            if (note_contents === '') {
                isValid = false;

                $('#note_contentsError').text('Field  is required');
                $('select[name="note_contents"]').addClass('error');
            }

            return isValid;
        }

    });
</script>


<!-- Add Order Procedure form data into database start -->
<script>
    $(document).ready(function() {
        let patient_id = $('input[name="patient_id"]').val();
        $('#order_procedure_form').submit(function(e) {

            e.preventDefault();

            let isValid = validateFormProcedure();

            if (isValid) {

                $.ajax({
                    url: '{{ route('user.add_patient_procedure') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(result) {
                        $('#order_procedure_form')[0].reset();
                        // $('#add_patient').modal('hide');

                        if (result != '') {

                            swal.fire(

                                'Success',

                                'Order Procedure Added successfully!',

                                'success'

                            )
                            // Call the function every second
                            setInterval(function() {
                                $('[id*="Error"]').text('');
                            }, 1000);
                            location.reload();
                        } else {

                            swal.fire("Error!", "Enter Order Procedure Details!", "error");

                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }
        });


        function validateFormProcedure() {
            let isValid = true;

            // Validate entry
            let entry = $('textarea[name="entry"]').val();
            if (entry === '') {
                isValid = false;

                $('#entryError').text('Entry   is required');
                $('textarea[name="entry"]').addClass('error');
            }
            // Validate summary
            let summary = $('textarea[name="summary"]').val();
            if (summary === '') {
                isValid = false;

                $('#summaryError').text('Summary   is required');
                $('textarea[name="summary"]').addClass('error');
            }
            // Validate procedure
            let procedure = $('select[name="procedure"]').val();
            if (procedure === '') {
                isValid = false;

                $('#procedureError').text('Procedure   is required');
                $('select[name="procedure"]').addClass('error');
            }

            return isValid;
        }

    });
</script>
<!-- Add Order Procedure form data into database end -->
<!-- add_supportive treatment start  -->
<script>
    $(document).ready(function() {
        let patient_id = $('input[name="patient_id"]').val();
        $('#supportivetreatment').submit(function(e) {
            e.preventDefault();

            let isValid = validateFormsupportivetreatment();

            if (isValid) {

                $.ajax({
                    url: '{{ route('user.add_patient_supportive_treatment') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(result) {
                        $('#supportivetreatment')[0].reset();
                        // Call the function every second
                        setInterval(function() {
                            $('[id*="Error"]').text('');
                        }, 1000);

                        if (result != '') {

                            swal.fire(

                                'Success',

                                'Supportive Treatment Added successfully!',

                                'success'

                            ).then(function() {
                                location.reload();
                            });

                        } else {

                            swal.fire("Error!",
                                "Enter valid Supportive Treatment Details!",
                                "error");

                        }
                    },
                    error: function(error) {
                        swal.fire("Error!",
                            "Enter valid Supportive Treatment Details!",
                            "error");
                    }
                });
            }
        });


        function validateFormsupportivetreatment() {
            let isValid = true;
            // data-bs-dismiss="modal"
            // Validate Title
            let supportiveTitle = $('select[name="supportiveTitle"]').val();
            if (supportiveTitle === '') {

                isValid = false;

                $('#supportiveTitleError').text('Please select a Title');
                $('select[name="supportiveTitle"]').addClass('error');
            }

            // Validate supportiveSubTitle
            let supportiveSubTitle = $('input[name="supportiveSubTitle"]').val();
            if (supportiveSubTitle === '') {
                isValid = false;

                $('#supportiveSubTitleError').text('SubTitle is required');
                $('input[name="supportiveSubTitle"]').addClass('error');
            }



            // Validate Treatment
            let Treatment = $('textarea[name="Treatment"]').val();
            if (Treatment === '') {
                isValid = false;

                $('#supportiveTreatmentError').text('Treatment  is required');
                $('textarea[name="Treatment"]').addClass('error');
            }


            return isValid;
        }
        //disabled future date

        $('#future_date').datepicker({
            format: 'dd M, yyyy',
            autoclose: true,
            minDate: new Date()
        });




    });
</script>
<!-- add_supportive treatment end  -->
<!-- Add prescription_day_form data into database start-->
<script>
    $(document).ready(function() {
        let patient_id = $('input[name="patient_id"]').val();
        $('#prescription_day_form').submit(function(e) {

            e.preventDefault();

            let isValid = validateFormPrescription();

            if (isValid) {

                $.ajax({
                    url: '{{ route('user.add_patient_prescription') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(result) {
                        $('#prescription_day_form')[0].reset();
                        // $('#add_patient').modal('hide');

                        if (result != '') {

                            swal.fire(

                                'Success',

                                'Prescription day Added successfully!',

                                'success'

                            )
                            // Call the function every second
                            setInterval(function() {
                                $('[id*="Error"]').text('');
                            }, 1000);
                            location.reload();
                        } else {

                            swal.fire("Error!", "Enter valid Prescription day Details!",
                                "error");

                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }
        });


        function validateFormPrescription() {
            let isValid = true;
            // Validate prescription
            let prescription = $('textarea[name="prescription"]').val();
            if (prescription === '') {
                isValid = false;

                $('#prescriptionError').text('prescription   is required');
                $('textarea[name="prescription"]').addClass('error');
            }

            return isValid;
        }

    });
</script>
<!-- Add prescription_day_form data into database end-->

<!-- Add  Future Plans form data into database end-->
<script>
    $(document).ready(function() {
        let patient_id = $('input[name="patient_id"]').val();
        $('#future_plan_form').submit(function(e) {

            e.preventDefault();

            let isValid = validateFormFuturePlan();

            if (isValid) {

                $.ajax({
                    url: '{{ route('user.future_plan_add') }}',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(result) {
                        $('#future_plan_form')[0].reset();
                        // $('#add_patient').modal('hide');

                        if (result != '') {

                            swal.fire(

                                'Success',

                                'Future Plans Added successfully!',

                                'success'

                            )
                            // Call the function every second
                            setInterval(function() {
                                $('[id*="Error"]').text('');
                            }, 1000);
                            location.reload();
                        } else {

                            swal.fire("Error!", "Enter valid Future Plans Details!",
                                "error");

                        }
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            }
        });


        function validateFormFuturePlan() {
            let isValid = true;
            // Validate future_date
            let future_date = $('input[name="future_date"]').val();
            if (future_date === '') {
                isValid = false;

                $('#future_dateError').text(' Date  is required');
                $('input[name="future_date"]').addClass('error');
            }
            // Validate text
            let text = $('textarea[name="future_write"]').val();
            if (text === '') {
                isValid = false;
                $('#future_writeError').text('Write is required');
                $('textarea[name="future_write"]').addClass('error');
            }

            return isValid;
        }

    });
</script>
<!-- Add  Future Plans form data into database end is_stopped-->

<script>
    $(document).ready(function() {


        


        $('#document_type').change(function() {
            $('#enterIdNumber').val('');
            //  $('#validationMessage').hide();
            var selectedOption = $(this).val();
            var fileInputHtml = '<label for="customFile" class="form-label">' + selectedOption +
                ' File</label>' +
                '<input type="file" class="form-control" id="customFile" name="customFile" required>';

            $('#fileInputContainer').html(fileInputHtml);
        });
        $("#insure_add_edit .add_patient").click(function(e) {
            e.preventDefault();
            setTimeout(function() {
                location.reload();
            }, 3000);
        });


    });
</script>



<script>
    $(document).ready(function() {

            function setupCategorySection(containerID, inputClass, addButtonClass, listID) {

                var categories = [];



                $(containerID).on('click', addButtonClass, function() {

                    var category = $(inputClass, containerID).val();

                    if (category.trim() !== '') {

                        categories.push(category);

                        var categoryItem = $('<div class="category">' + category +

                            '<i class="remove-category fas fa-times"></i></div>');

                        $(listID).append(categoryItem);

                        $(inputClass, containerID).val('');

                    }

                });



                $(inputClass, containerID).keypress(function(event) {

                    if (event.which === 13) {

                        var category = $(inputClass, containerID).val();

                        if (category.trim() !== '') {

                            categories.push(category);

                            var categoryItem = $('<div class="category">' + category +

                                '<i class="remove-category fas fa-times"></i></div>');

                            $(listID).append(categoryItem);

                            $(inputClass, containerID).val('');

                        }

                    }

                });



                $(listID).on('click', '.remove-category', function() {

                    var category = $(this).parent().text().trim();

                    categories = categories.filter(function(item) {

                        return item !== category;

                    });

                    $(this).parent().remove();

                });

            }



            setupCategorySection('#category-container-1', '.category-input', '.add-category', '#categories-list-1');

            setupCategorySection('#category-container-2', '.category-input', '.add-category', '#categories-list-2');

            setupCategorySection('#category-container-3', '.category-input', '.add-category', '#categories-list-3');

        });
</script>


<script>
    function togglePasswordVisibility2() {
        var passwordInput = document.getElementById("staffpassword");
        var passwordToggle = document.getElementById("passwordToggle");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggle.innerHTML =
                '<iconify-icon class="eyeiconpassword" icon="mdi:eye-off-outline" onclick="togglePasswordVisibility2()"></iconify-icon>';
        } else {
            passwordInput.type = "password";
            passwordToggle.innerHTML =
                '<iconify-icon class="eyeiconpassword" icon="mdi:eye-outline" onclick="togglePasswordVisibility2()"></iconify-icon>';
        }
    }


    $('.select2_appoin_ttype__').select2({
        dropdownParent: $('.makeAppoinment')
    });


    $(".basicDate").flatpickr({
        enableTime: true,
        dateFormat: "F, d Y"
    });
</script>






<script>
    $(document).ready(function() {
        const selectAllCheckbox = $('#select-all');
        const checkboxes = $('.report_check_box input[type="checkbox"]');

        // Ensure all checkboxes are checked by default
        checkboxes.prop('checked', true);

        // Toggle check all checkboxes when "Select All" is changed
        selectAllCheckbox.on('change', function() {
            checkboxes.prop('checked', this.checked);
        });

        // Update "Select All" checkbox state based on individual checkbox changes
        checkboxes.on('change', function() {
            if (!this.checked) {
                selectAllCheckbox.prop('checked', false);
            } else if ($('.report_check_box input[type="checkbox"]:not(:checked)').length === 0) {
                selectAllCheckbox.prop('checked', true);
            }
        });
    });
</script>



<script>
    function addDrugs() {

        $('#formName').val('general-report')
        $('#medicine_add_edit').modal('show');
    }
</script>



<script>
    $(document).ready(function() {
        $('#savePatientNote').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route('user.save_patient_note') }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function(result) {
                    $('#savePatientNote')[0].reset();
                    if (result !== '') {

                        // Display the success message using SweetAlert2
                        Swal.fire({
                            title: 'Success',
                            html: 'Text Snippets Added successfully!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000 // Display the message for 1 second (1000 milliseconds)
                        }).then(() => {
                            // Reload the page immediately after the message is closed
                            location.reload();
                        });

                        // swal.fire({
                        //     title: 'Success',
                        //     html: 'Text Snippets Added successfully!',
                        //     icon: 'success',
                        //     showConfirmButton: false,
                        //     timer: 1000 // 1000 milliseconds = 1 second
                        // }).then(() => {
                        //     // Use setTimeout to reload the page after 1 second (1000 milliseconds)
                        //     setTimeout(() => {
                        //         location.reload();
                        //     }, 1000); // 1 second = 1000 milliseconds
                        // });
                    } else {
                        swal.fire("Error!", "Enter valid Text Snippets!", "error");
                    }
                },
                error: function(error) {
                    console.error(error);
                    swal.fire("Error!", "An error occurred. Please try again.", "error");
                }
            });
        });
    });
</script>



<script>
    $(document).ready(function() {
        $('.created_snippet_list').on('click', '.remove_snippet a', function(e) {
            e.preventDefault();

            let listItem = $(this).closest('li');
            let noteId = listItem.data('note-id');
            let csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '{{ route('note.delete') }}', // Update this with your Laravel route
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    note_id: noteId
                },
                success: function(response) {
                    // Optionally, you can remove the deleted item from the UI
                    listItem.remove();
                    swal.fire({
                        title: 'Success',
                        text: 'Note deleted successfully!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000 // Display the message for 1 second (1000 milliseconds)
                    }).then(() => {
                        // Reload the page immediately after the message is closed
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {

                }
            });
        });
    });
</script>







<script>
    $(document).ready(function() {
        $('#uploadForm').on('submit', function(e) {
            e.preventDefault();
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            var formData = new FormData(this);

            var title = $('#documentName').val();
            var fileInput = $('#uploadDocument')[0];

            var uploadFile = fileInput.files[0];
            var currentDate = new Date().toLocaleDateString();


            $.ajax({
                type: 'POST',
                url: "{{ route('save-document') }}",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {

                        Swal.fire({
                            title: 'Success',
                            html: 'Document Added Successfully',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1000 // 1000 milliseconds = 1 second
                        }).then(() => {
                            // Reload the page after the SweetAlert has finished
                            location.reload();
                        });




                    } else {
                        alert('File upload failed: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    alert('File upload error: ' + error);
                }
            });
        });
    });


    $(document).on('click', '.trash_btn', function() {
        $(this).closest('tr').remove();
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        $("#Edit_document_type").change(function(){
            $("#editEnterIdNumber").val('');
            $("#editValidationMessage").text('');
            validateInput('editEnterIdNumber','Edit_document_type','editValidationMessage');
        })

        $("#document_type").change(function(){
            $("#enterIdNumber").val('');
            $("#validationMessage").text('');
            validateInput('enterIdNumber','document_type','validationMessage');
        })

        function validateInput(valpoint,selectId,vmsg) {
            const selectedType = $(`#${selectId}`).val();
            const idNumber = $(`#${valpoint}`).val();

            let maxLength = 0;
            let message = '';

            switch (selectedType) {
                case 'CIVIL ID':
                    maxLength = 9;
                    message = 'CIVIL ID must be exactly 9 digits';
                    break;
                case 'EID':
                    maxLength = 15;
                    message = 'EID must be exactly 15 digits';
                    break;
                case 'PERSONAL NUMBER':
                case 'RESIDENT ID':
                    maxLength = 11;
                    message = selectedType + ' must be exactly 11 digits';
                    break;
                case 'PASSPORT, DRIVER\'s LICENSE, ETC':
                    maxLength = Infinity;
                    message = '';
                    break;
            }

            if (maxLength !== Infinity && idNumber.length > maxLength) {
                $(`#${valpoint}`).val(idNumber.slice(0, maxLength));
            }
            // console.log(idNumber.length,maxLength,message);
            $(`#${valpoint}`).attr('maxlength',maxLength);
            $(`#${valpoint}`).attr('minlength',maxLength);
            if (maxLength !== Infinity && idNumber.length !== maxLength) {
                $(`#${vmsg}`).text(message);
            } else {
                $(`#${vmsg}`).text('');
            }
        }
    });
</script>


<script>
    $(document).ready(function() {
        $('.alergyDelete').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patient.allergy.delete', ':id') }}'.replace(
                            ':id', allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            swal.fire({
                                title: 'Success',
                                text: 'Allergy has been deleted.',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
    });

    $(document).ready(function() {
        $('.pastMedicalHistoryDelete').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patient.past.medical.delete', ':id') }}'
                            .replace(':id', allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'Past medical history has been deleted.',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });

                        }
                    });
                }
            });
        });
    });


    $(document).ready(function() {
        $('.patientPastSurgical').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patient.past.surgical', ':id') }}'.replace(
                            ':id', allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'Past surgical history has been deleted',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }

                    });
                }
            });
        });
    });


    $(document).ready(function() {
        $('.orderProcedure').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patient.order.procedure', ':id') }}'.replace(
                            ':id', allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'Order Procedure has been deleted',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }

                    });
                }
            });
        });
    });



    $(document).ready(function() {
        $('.removeNotes').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patient.progress.note', ':id') }}'.replace(
                            ':id', allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'Progress Note has been deleted',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }

                    });
                }
            });
        });
    });




    $(document).ready(function() {
        $('.removeFuturePlan').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patient.future.plans', ':id') }}'.replace(
                            ':id', allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'Patient Future Plans has been deleted',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }

                    });
                }
            });
        });
    });


    $(document).ready(function() {
        $('.patientRemoveDrug').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patientRemoveDrug', ':id') }}'.replace(':id',
                            allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'Patient Drugs has been deleted',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }

                    });
                }
            });
        });
    });


    $(document).ready(function() {
        $('.patientListOf').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('list.of.procedure', ':id') }}'.replace(':id',
                            allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'List of procedure has been deleted',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }

                    });
                }
            });
        });
    });


    $(document).ready(function() {
        $('.supportiveTrea').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patient.supportive.treatments', ':id') }}'
                            .replace(':id', allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'Supportive treatments has been deleted',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }

                    });
                }
            });
        });
    });

    $(document).ready(function() {
        $('.prescriptionsMedicines').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patient.prescribed.medicines', ':id') }}'
                            .replace(':id', allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'Prescribed medicines has been deleted',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }

                    });
                }
            });
        });
    });


    $(document).ready(function() {
        $('.removeReferalPatient').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patient.referrals', ':id') }}'.replace(':id',
                            allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'Patient referrals has been deleted',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }

                    });
                }
            });
        });
    });



    $(document).ready(function() {
        $('.removeMbtReview').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patient.mbt', ':id') }}'.replace(':id',
                            allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'Patietn Mbt Review has been deleted',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }

                    });
                }
            });
        });
    });



    $(document).ready(function() {
        $('.removeEligibilityStatus').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('patient.eligibility.status', ':id') }}'
                            .replace(':id', allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal.fire({
                                title: 'Success',
                                text: 'Patietn eligibility status has been deleted',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }

                    });
                }
            });
        });
    });



    $(document).ready(function() {
        $('.reportDelete').on('click', function() {
            const allergyId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure you want to delete this",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('deleteReport', ':id') }}'.replace(':id',
                            allergyId),
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            swal.fire({
                                title: 'Success',
                                text: 'Generate report has been deleted.',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1000 // Display the message for 1 second (1000 milliseconds)
                            }).then(() => {
                                // Reload the page immediately after the message is closed
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
    });


    document.addEventListener('DOMContentLoaded', (event) => {       
        const startRecognitionButton = document.getElementById('startRecognition_');

        let recognition;
        let recognizing = false;

        if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            recognition = new SpeechRecognition();

            recognition.continuous = true; // Enable continuous recognition
            recognition.interimResults = true; // Enable interim results
            recognition.lang = 'en-US';

            recognition.onstart = () => {
                recognizing = true;
                startRecognitionButton.classList.add('listening');
                startRecognitionButton.setAttribute('aria-label', 'Stop voice recognition');
                startRecognitionButton.innerHTML +=
                    '<i class="fa-solid fa-times stopRecognition_" id="stopRecognition_" aria-hidden="true" style="margin-left: 10px;"></i>';
            };

            recognition.onend = () => {
                recognizing = false;
                startRecognitionButton.classList.remove('listening');
                startRecognitionButton.setAttribute('aria-label', 'Start voice recognition');
                const stopRecognitionIcon = document.getElementById('stopRecognition_');
                if (stopRecognitionIcon) {
                    stopRecognitionIcon.remove(); // Remove the stop recognition icon if it exists
                }
            };

            recognition.onerror = (event) => {
                console.error('Speech recognition error', event);
            };

            recognition.onresult = (event) => {
                let interimTranscript = '';
                let finalTranscript = '';

                for (let i = 0; i < event.results.length; i++) {
                    if (event.results[i].isFinal) {
                        finalTranscript += event.results[i][0].transcript;
                    } else {
                        interimTranscript += event.results[i][0].transcript;
                    }
                }

                // Replace 'voiceInput' with the correct CKEditor instance name
                CKEDITOR.instances['voiceInput'].setData(finalTranscript + interimTranscript);
            };

            startRecognitionButton.addEventListener('click', () => {
                if (recognizing) {
                    recognition.stop();
                    return;
                }
                recognition.start();
            });
        }else{
            // 'Web Speech API is not supported in this browser.';
        }
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const annotationTitleInput = document.getElementById('annotationTitle');
        const wordLimitMessage = document.getElementById('wordLimitMessage');
        const wordLimit = 5;

        annotationTitleInput.addEventListener('input', function() {
            const words = this.value.split(/\s+/);
            if (words.length > wordLimit) {
                wordLimitMessage.textContent = 'Word limit exceeded!';
                wordLimitMessage.classList.add('text-danger');
                wordLimitMessage.classList.remove('text-muted');
                this.value = words.slice(0, wordLimit).join(' ');
            } else {
                wordLimitMessage.textContent = `Word limit: ${wordLimit} words`;
                wordLimitMessage.classList.remove('text-danger');
                wordLimitMessage.classList.add('text-muted');
            }
        });
    });
</script>



<script>
    $(document).ready(function() {
        // Initialize jQuery UI datetimepicker
        $('.datetimepickerInput').datetimepicker({
            dateFormat: 'yy-mm-dd',
            minDate: 0,
        });
    });
</script>


</body>

</html>
