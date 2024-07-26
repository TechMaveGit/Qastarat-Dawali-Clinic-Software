<!-- FOOTER-3

   ============================================= -->

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
                    <img class="footer-logo" src="{{ asset('public/assets/video/'.$footer->websitelogo) }}"
                    alt="footer-logo">
                        @else
                        <img class="footer-logo" src="{{ asset('public/assets/images/new-images/logofwhite.png') }}"
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
							<p><a href="{{ url('/#Our_Services') }}">Women heal better</a></p>
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
                            <img src="{{ asset('public/assets/video/'.$footer->logo1) }}" alt="">
                                @else
                                <img src="{{ asset('public/assets/images/new-images/Flag_of_Oman.svg.png') }}" alt="">
                            @endisset
                           
						</div>
						<div class="contact_num">
							<p><a href="https://wa.me/{{ $footer->logo1whatsapp ?? '' }}"><i class="fa-brands fa-whatsapp"></i> +{{ $footer->logo1whatsapp ?? '' }}</a></p>
							<p><a href="tel:+{{ $footer->logo1phone ?? '' }}"><i class="fa-solid fa-phone"></i> +{{ $footer->logo1phone ?? '' }}</a></p>

						</div>
					</div>
					<div class="coonect_box">
						<div class="left_flag">
                            @isset($footer->logo2)
                            <img src="{{ asset('public/assets/video/'.$footer->logo2) }}" alt="">
                                @else
                                <img src="{{ asset('public/assets/images/new-images/Flag_of_the_United_Arab_Emirates.svg.png') }}" alt="">
                            @endisset
                          
						</div>
						<div class="contact_num">
							<p><a href="https://wa.me/{{ $footer->logo2whatsapp ?? '' }}"><i class="fa-brands fa-whatsapp"></i> +{{ $footer->logo2whatsapp ?? '' }}</a></p>
							<p><a href="tel:+{{ $footer->logo2phone ?? '' }}"><i class="fa-solid fa-phone"></i> +{{ $footer->logo2phone ?? '' }}</a></p>

						</div>
					</div>
					<div class="coonect_box">
						<div class="left_flag">
                            @isset($footer->logo3)
                            <img src="{{ asset('public/assets/video/'.$footer->logo3) }}" alt="">
                                @else
                                <img src="{{ asset('public/assets/images/new-images/Flag_of_Saudi_Arabia.svg.png') }}" alt="">
                            @endisset
                           
						</div>
						<div class="contact_num">
							<p><a href="https://wa.me/{{ $footer->logo3whatsapp ?? '' }}"><i class="fa-brands fa-whatsapp"></i> +{{ $footer->logo3whatsapp ?? ''  }}</a></p>
							<p><a href="tel:+{{ $footer->logo3phone ?? '' }}"><i class="fa-solid fa-phone"></i> +{{  $footer->logo3phone ?? '' }}</a></p>

						</div>
					</div>
					<div class="coonect_box">
						<div class="left_flag">
                            @isset($footer->logo4)
                            <img src="{{ asset('public/assets/video/'.$footer->logo4) }}" alt="">
                                @else
                                <img src="{{ asset('public/assets/images/new-images/Flag_of_Bahrain-manama.png') }}" alt="">
                            @endisset
                           
						</div>
						<div class="contact_num">
							<p><a href="https://wa.me/{{ $footer->logo4whatsapp ?? '' }}"><i class="fa-brands fa-whatsapp"></i> +{{ $footer->logo4whatsapp ?? '' }}</a></p>
							<p><a href="tel:+{{ $footer->logo4phone ?? '' }}"><i class="fa-solid fa-phone"></i> +{{ $footer->logo4phone ?? '' }}</a></p>

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
							<input type="email" class="form-control" placeholder="Email Address" required id="s-email">
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
					<li><a href="#"><span class="fa-brands fa-instagram"></span></a></li>
						<li><a href="#"><span class="fa-brands fa-tiktok"></span></a></li>
						<li><a href="#"><span class="fa-brands fa-snapchat"></span></a></li>
						<li><a href="#"><span class="fa-brands fa-x-twitter"></span></a></li>
						<li><a href="#"><span class="fa-brands fa-youtube"></span></a></li>
						
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


<!-- Modal -->

<div class="modal fade add_patient__" id="add_patient" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add A New Patient</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body body-patient">

                <div class="inner_data pt-0">



                    <div class="basic_details_patient">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="title_head">

                                    <h4>Basic Info footer</h4>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label class="form-label">Title</label>

                                    <select class="form-control select2_modal">

                                        <option value="">Mr</option>

                                        <option value="">Mrs</option>

                                        <option value="">Miss</option>

                                        <option value="">Ms</option>

                                        <option value="">Dr</option>

                                        <option value="">Lady</option>

                                        <option value="">Sir</option>

                                        <option value="">Professor</option>

                                        <option value="">Capt</option>

                                        <option value="">Lord</option>



                                    </select>



                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Name</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-4">

                                    <label class="form-label">Date of Birth</label>

                                    <div class="input-group" id="datepicker1">

                                        <input type="text" class="form-control" placeholder="dd M, yyyy"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker1'
                                            data-provide="datepicker">

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label class="form-label">Gender</label>

                                    <select class="form-control select2_modal">

                                        <option>Select</option>

                                        <option>Male</option>

                                        <option>Female</option>

                                    </select>



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

                                    <label for="validationCustom01" class="form-label">Post Code  </label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Street</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Town</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label class="form-label">Country</label>

                                    <select class="form-control select2_modal">

                                        <option value="Afghanistan">Afghanistan</option>

                                        <option value="Åland Islands">Åland Islands</option>

                                        <option value="Albania">Albania</option>

                                        <option value="Algeria">Algeria</option>

                                        <option value="American Samoa">American Samoa</option>

                                        <option value="Andorra">Andorra</option>

                                        <option value="Angola">Angola</option>

                                        <option value="Anguilla">Anguilla</option>

                                        <option value="Antarctica">Antarctica</option>

                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>

                                        <option value="Argentina">Argentina</option>

                                        <option value="Armenia">Armenia</option>

                                        <option value="Aruba">Aruba</option>

                                    </select>



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

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Mobile Phone</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Landline</label>

                                    <input type="text" class="form-control" id="" placeholder="">

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

                            <div class="col-lg-6">

                                <label for="validationCustom01" class="form-label">Select Document</label>

                                <select class="form-control select2_modal">

                                    <option value="Passport">Passport</option>

                                    <option value="Address proof">Address proof</option>



                                </select>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Patient ID</label>

                                    <input type="text" class="form-control" id="" placeholder="">

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

<div class="modal fade edit_patient__" id="edit_patient" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Edit Patient Info.</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body body-patient">

                <div class="inner_data pt-0 edit_patient__cusr">



                    <div class="basic_details">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="title_head">

                                    <h4>Basic Info ddd</h4>

                                </div>



                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label class="form-label">Title</label>

                                            <select class="form-control select2_edit_info">

                                                <option value="">Mr</option>

                                                <option value="">Mrs</option>

                                                <option value="">Miss</option>

                                                <option value="">Ms</option>

                                                <option value="">Dr</option>

                                                <option value="">Lady</option>

                                                <option value="">Sir</option>

                                                <option value="">Professor</option>

                                                <option value="">Capt</option>

                                                <option value="">Lord</option>



                                            </select>



                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label for="validationCustom01" class="form-label">Name</label>

                                            <input type="text" class="form-control" id=""
                                                placeholder="">

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-4">

                                            <label class="form-label">Date of Birth</label>

                                            <div class="input-group" id="datepicker3">

                                                <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                    data-date-format="dd M, yyyy" data-date-container='#datepicker3'
                                                    data-provide="datepicker">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-6">

                                        <div class="mb-3 form-group">

                                            <label class="form-label">Gender</label>

                                            <select class="form-control select2_edit_info">

                                                <option>Select</option>

                                                <option>Male</option>

                                                <option>Female</option>

                                            </select>



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

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Street</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Town</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label class="form-label">Country</label>

                                    <select class="form-control select2_edit_info">

                                        <option value="Afghanistan">Afghanistan</option>

                                        <option value="Åland Islands">Åland Islands</option>

                                        <option value="Albania">Albania</option>

                                        <option value="Algeria">Algeria</option>

                                        <option value="American Samoa">American Samoa</option>

                                        <option value="Andorra">Andorra</option>

                                        <option value="Angola">Angola</option>

                                        <option value="Anguilla">Anguilla</option>

                                        <option value="Antarctica">Antarctica</option>

                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>

                                        <option value="Argentina">Argentina</option>

                                        <option value="Armenia">Armenia</option>

                                        <option value="Aruba">Aruba</option>

                                    </select>



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

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Mobile Phone</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-4">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Landline</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-12">

                                <div class="title_head">

                                    <h4>Other Details</h4>

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Next of Kin</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Insurer</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Policy No</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">GP</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>



                            <div class="col-lg-12">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Additional Info.</label>

                                    <textarea class="form-control" placeholder="" style="height: 100px"></textarea>

                                </div>

                            </div>

                            <div class="col-lg-12">

                                <div class="add_categoryweb">



                                    <div class="row">

                                        <div class="col-lg-12">

                                            <label for="validationCustom01" class="form-label">Tags</label>

                                            <div class="category-container" id="category-container-2">

                                                <input type="text" class="form-control category-input"
                                                    placeholder="To allow future audits">

                                                <button
                                                    class="btn r-04 btn--theme hover--tra-black add_patient add-category"
                                                    type="button"><i class="fa-solid fa-plus"></i> Add</button>

                                            </div>

                                            <div class="categories-list" id="categories-list-2">

                                                <!-- Categories will be displayed here -->

                                            </div>

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

                            <div class="col-lg-6">

                                <label for="validationCustom01" class="form-label">Select Document</label>

                                <select class="form-control select2_edit_info">

                                    <option value="Passport">Passport</option>

                                    <option value="Address proof">Address proof</option>



                                </select>

                            </div>

                            <div class="col-lg-6">

                                <div class="mb-3 form-group">

                                    <label for="validationCustom01" class="form-label">Patient ID</label>

                                    <input type="text" class="form-control" id="" placeholder="">

                                </div>

                            </div>

                        </div>

                    </div>









                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">Update</a>



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

<div class="modal fade edit_patient__" id="create_appointment" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Create Appointment</h1>

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

<div class="modal fade edit_patient__" id="insure_add_edit" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Add or Edit Insurer</h1>

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

                                <label for="validationCustom01" class="form-label">Insurer Name</label>

                                <input type="text" class="form-control" id="" placeholder="">

                            </div>

                        </div>



                        <div class="col-lg-12">

                            <div class="mb-3 form-group">

                                <label for="validationCustom01" class="form-label">Insurance Number</label>

                                <input type="text" class="form-control" id="" placeholder="">

                            </div>

                        </div>



                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">

                        <iconify-icon icon="bi:save"></iconify-icon> Save & Update

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

                            <p class="note">Make sure the note you are selecting has substantial content. If not the

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

<div class="modal fade edit_patient__" id="executive_summary" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

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

                                <label for="validationCustom01" class="form-label">Write Executive Summary</label>

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
                                                placeholder="Type Symptoms here...">

                                            <button
                                                class="btn r-04 btn--theme hover--tra-black add_patient add-category"
                                                type="button"><i class="fa-solid fa-plus"></i> Add</button>

                                        </div>

                                        <div class="categories-list" id="categories-list-1">

                                            <!-- Categories will be displayed here -->

                                        </div>

                                    </div>

                                </div>



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

                                        <label for="validationCustom01" class="form-label">Write</label>

                                        <textarea class="form-control" placeholder="" style="height:150px"></textarea>

                                    </div>

                                </div>

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

                Drugs / Current Meds

            ---------------------------->

<div class="modal fade edit_patient__" id="medicine_add_edit" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Drugs / Current Meds</h1>

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



                        <div class="col-lg-3">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Type a Drug Name</label>

                                    <input type="search" class="form-control" id="" placeholder="">

                                    <button class="btn search_btn">

                                        <iconify-icon icon="prime:search-plus" width="24"></iconify-icon>

                                    </button>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Frequency</label>

                                    <input type="search" class="form-control" id="" placeholder="">



                                </div>

                            </div>

                        </div>

                        <div class="col-lg-2">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Today Date</label>

                                    <input type="text" class="form-control datepickerInput"
                                        placeholder="dd M, yyyy">

                                </div>

                            </div>

                        </div>



                        <div class="col-lg-2">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Duration</label>

                                    <input type="search" class="form-control" id="" placeholder="">



                                </div>

                            </div>

                        </div>



                        <div class="col-lg-2">

                            <div class="inner_element mt-4">

                                <div class="form-group">

                                    <div class="form-check">

                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault2">

                                        <label class="form-check-label" for="flexCheckDefault2">

                                            Stopped

                                        </label>

                                    </div>

                                </div>

                            </div>

                        </div>



                        <div class="col-lg-3">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Stopped Date</label>

                                    <input type="text" class="form-control datepickerInput"
                                        placeholder="dd M, yyyy">

                                </div>

                            </div>

                        </div>



                        <div class="col-lg-3">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Code</label>

                                    <input type="search" class="form-control" id="" placeholder="">



                                </div>

                            </div>

                        </div>



                        <div class="col-lg-2">

                            <div class="inner_element add_medicine_btn">

                                <div class="form-group">

                                    <a href="#" class="add_diagnosis">+ Add</a>

                                </div>

                            </div>

                        </div>







                    </div>



                    <div class="add_data_diagnosis">

                        <table class="table table-striped table-bordered">

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

                            <tr>

                                <td>Asirpin</td>

                                <td>2</td>

                                <td>15 Nov, 2023</td>

                                <td>4</td>

                                <td>Yes</td>

                                <td>16 Nov, 2023</td>

                                <td>0345</td>

                                <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a>
                                </td>

                            </tr>

                            <tr>

                                <td>Calpol 500</td>

                                <td>2</td>

                                <td>15 Nov, 2023</td>

                                <td>4</td>

                                <td>No</td>

                                <td></td>

                                <td></td>

                                <td><a href="#" class="trash_btn"><i class="fa-regular fa-trash-can"></i></a>
                                </td>

                            </tr>

                        </table>

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

                 allergies add

            ---------------------------->

<div class="modal fade edit_patient__" id="allergies_add" tabindex="-1" aria-labelledby="exampleModalLabel"
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

                                        <div class="category-container" id="category-container-3">

                                            <input type="text" class="form-control category-input"
                                                placeholder="Type Symptoms here...">

                                            <button
                                                class="btn r-04 btn--theme hover--tra-black add_patient add-category"
                                                type="button"><i class="fa-solid fa-plus"></i> Add</button>

                                        </div>

                                        <div class="categories-list" id="categories-list-3">

                                            <!-- Categories will be displayed here -->

                                        </div>

                                    </div>

                                </div>



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

                                    <label for="validationCustom01" class="form-label">Type a Diagnosis name</label>

                                    <input type="search" class="form-control" id="" placeholder="">

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

                                    <input type="search" class="form-control" id="" placeholder="">



                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">SNOMED</label>

                                    <input type="search" class="form-control" id="" placeholder="">



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

                                    <a href="#" class="add_diagnosis">+ Add</a>

                                </div>

                            </div>

                        </div>













                    </div>

                    <div class="add_data_diagnosis">

                        <table class="table table-striped table-bordered">

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

                                <td><a href="#" class="trash_btn"><i
                                            class="fa-regular fa-trash-can"></i></a></td>

                            </tr>

                            <tr>

                                <td>Lipid panel</td>

                                <td>15 Nov, 2023</td>

                                <td>Lorem ipsum dolor sit amet.</td>

                                <td></td>

                                <td><span class="badge badge-soft-success ">Active</span></td>

                                <td><i class="fa-regular fa-flag"></i></td>

                                <td><a href="#" class="trash_btn"><i
                                            class="fa-regular fa-trash-can"></i></a></td>

                            </tr>

                        </table>

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

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Date</label>

                                    <div class="input-group" id="datepicker21">



                                        <input type="text" class="form-control" placeholder="dd M, yyyy"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker21'
                                            data-provide="datepicker">

                                    </div>

                                    <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                </div>



                            </div>

                        </div>

                        <div class="col-lg-12">



                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="mb-3 form-group">

                                        <label for="validationCustom01" class="form-label">Write</label>

                                        <textarea class="form-control" placeholder="" style="height:150px"></textarea>

                                    </div>

                                </div>

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

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="">

                        <div class="row top_head_vitals">

                            <div class="col-lg-12">

                                <div class="inner_element search_dr">

                                    <div class="form-group">

                                        <input type="search" class="form-control" id=""
                                            placeholder="Find a user by name or specialty..">

                                        <button class="btn search_btn_dr"><i
                                                class="fa-solid fa-magnifying-glass"></i></button>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-12">

                                <div class="doctor_list">

                                    <h6 class="list_title_dr">List of Available Clinicians</h6>

                                    <ul>

                                        <li>

                                            <div class="booking_card_select">

                                                <input type="checkbox" class="check_dr" name="cbx4"
                                                    id="cbx1">

                                                <label for="cbx1">

                                                    <div class="doctor_dt">

                                                        <div class="image_dr">

                                                            <img src="{{ url('public/assets') }}/images/new-images/avtar.jpg"
                                                                alt="">

                                                        </div>

                                                        <div class="dr_detail">

                                                            <h6 class="dr_name">Abbigail Titmus <span>(MBBS)</span>
                                                            </h6>

                                                            <p class="dr_email"><a
                                                                    href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                            </p>

                                                        </div>

                                                    </div>

                                                </label>

                                            </div>





                                        </li>

                                        <li>

                                            <div class="booking_card_select">

                                                <input type="checkbox" class="check_dr" name="cbx4"
                                                    id="cbx2">

                                                <label for="cbx2">

                                                    <div class="doctor_dt">

                                                        <div class="image_dr">

                                                            <img src="{{ url('public/assets') }}/images/new-images/avtar.jpg"
                                                                alt="">

                                                        </div>

                                                        <div class="dr_detail">

                                                            <h6 class="dr_name">Abbigail Titmus <span>(MBBS)</span>
                                                            </h6>

                                                            <p class="dr_email"><a
                                                                    href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                            </p>

                                                        </div>

                                                    </div>

                                                </label>

                                            </div>





                                        </li>

                                        <li>

                                            <div class="booking_card_select">

                                                <input type="checkbox" class="check_dr" name="cbx4"
                                                    id="cbx3">

                                                <label for="cbx3">

                                                    <div class="doctor_dt">

                                                        <div class="image_dr">

                                                            <img src="{{ url('public/assets') }}/images/new-images/avtar.jpg"
                                                                alt="">

                                                        </div>

                                                        <div class="dr_detail">

                                                            <h6 class="dr_name">Abbigail Titmus <span>(MBBS)</span>
                                                            </h6>

                                                            <p class="dr_email"><a
                                                                    href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                            </p>

                                                        </div>

                                                    </div>

                                                </label>

                                            </div>





                                        </li>

                                        <li>

                                            <div class="booking_card_select">

                                                <input type="checkbox" class="check_dr" name="cbx4"
                                                    id="cbx4">

                                                <label for="cbx4">

                                                    <div class="doctor_dt">

                                                        <div class="image_dr">

                                                            <img src="{{ url('public/assets') }}/images/new-images/avtar.jpg"
                                                                alt="">

                                                        </div>

                                                        <div class="dr_detail">

                                                            <h6 class="dr_name">Abbigail Titmus <span>(MBBS)</span>
                                                            </h6>

                                                            <p class="dr_email"><a
                                                                    href="mailto:abbigail@lymphvision.com">abbigail@lymphvision.com</a>
                                                            </p>

                                                        </div>

                                                    </div>

                                                </label>

                                            </div>





                                        </li>

                                    </ul>





                                </div>



                            </div>

                            <div class="col-lg-12 px-4 mb-3" id="refer_note">

                                <div class="mt-3 form-group">

                                    <textarea class="form-control"
                                        placeholder="Type a short referral message here. This will be entered as a note on EMR and will be emailed to addressees (salutation added automatically). 

            

            This action also gives the addressee access to this medical record. "
                                        style="height:150px"></textarea>

                                </div>

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

                                        <textarea class="form-control" placeholder="" style="height:150px"></textarea>

                                    </div>

                                </div>

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

                Add New Notes

            ---------------------------->

<div class="modal fade edit_patient__" id="add_new_note" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel"><i class="fa-regular fa-square-plus"></i> Add a New
                    Note</h1>

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



                        <div class="">

                            <h6 class="patient_on_ new_entry">New entry on: <span>Avi Singh</span></h6>

                            <p class="entry_by">SAIF ALZAABI | Nov 17, 2023 3:56 pm</p>

                            <div class="row top_head_vitals">

                                <div class="col-lg-12">

                                    <div class="row">

                                        <div class="col-lg-4">

                                            <div class="d-flex">

                                                <div class="inner_element w-100">

                                                    <div class="form-group">

                                                        <select class="form-control select2_note">

                                                            <option value="">Choose a context for this entry...
                                                            </option>

                                                            <option value="">IR-PROCEDURE </option>

                                                            <option value="">NOTES</option>

                                                            <option value="">NURSE NOTES </option>

                                                            <option value="">Follow-Up</option>

                                                            <option value="">Discharge Instruction</option>

                                                            <option value="">List of Visit</option>

                                                        </select>

                                                    </div>





                                                </div>

                                                <div class="add_btn_plus" id="entry_add_btn">

                                                    <a href="#">+</a>

                                                </div>

                                            </div>



                                        </div>

                                        <div class="col-lg-4" id="context_add">

                                            <div class="d-flex">

                                                <div class="inner_element w-100">

                                                    <div class="form-group">

                                                        <input type="text" class="form-control"
                                                            placeholder="Type a new context">

                                                    </div>

                                                </div>

                                                <div class="add_btn_plus">

                                                    <a href="#">+</a>

                                                </div>

                                            </div>



                                        </div>

                                        <div class="col-lg-4">

                                            <div class="d-flex">

                                                <div class="inner_element w-100">

                                                    <div class="form-group">

                                                        <select class="form-control select2_note">

                                                            <option value="">Use canned text</option>

                                                            <option value="">EVLT-GSV</option>

                                                            <option value="">IR-THYROID ABLATION</option>

                                                            <option value="">PRP KNEE INJECTION</option>

                                                            <option value="">ULTRASOUND REPORT</option>

                                                        </select>

                                                    </div>





                                                </div>

                                                <div class="add_btn_plus">

                                                    <a href="#">+</a>

                                                </div>

                                            </div>



                                        </div>

                                        <div class="col-lg-12 mt-4">

                                            <div class="row">

                                                <div class="col-lg-4">

                                                    <div class="voice_recognition">

                                                        <p><a href="#" class="mic_btn"><i
                                                                    class="fa-solid fa-microphone"></i></a> Click the
                                                            icon to start voice recognition.</p>

                                                    </div>

                                                </div>

                                                <div class="col-lg-4">

                                                    <div class="automated_clinic_notes">

                                                        <a href="#">Automated Clinic Notes - <span>Click Here to
                                                                Start!</span></a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>



                                        <div class="col-lg-12">

                                            <div class="mt-2 form-group">

                                                <textarea class="form-control" placeholder="Type your entry here" style="height:100px"></textarea>

                                            </div>

                                            <h6 class="recall">Recall <span>Follow-up on this episode. Patient will be
                                                    notified a week before and clinic staff will be notified on due
                                                    date. </span></h6>

                                        </div>

                                        <div class="col-lg-12">

                                            <div class="row align-items-center mt-3">

                                                <div class="col-lg-1">

                                                    <div class="inner_element w-100">

                                                        <div class="form-group">

                                                            <input type="text" class="form-control"
                                                                placeholder="">

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-lg-4">

                                                    <div class="inner_element w-100">

                                                        <div class="form-group">

                                                            <select class="form-control select2_note">

                                                                <option value="">Days</option>

                                                                <option value="">Weeks</option>

                                                                <option value="">Months</option>

                                                                <option value="">Years</option>

                                                            </select>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-lg-4">

                                                    <div class="inner_element w-100">

                                                        <div class="form-group">

                                                            <input type="text" class="form-control"
                                                                placeholder="Details  -  e.g OPD, CT Scan etc.">

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-lg-3">

                                                    <div class="form-check">

                                                        <input class="form-check-input" type="checkbox"
                                                            value="" id="flexCheckChecked" checked>

                                                        <label class="form-check-label" for="flexCheckChecked">

                                                            Save without a recall reminder

                                                        </label>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-12 mt-3  mb-3">

                                            <div class="row align-items-center">

                                                <div class="col-lg-4">

                                                    <div class="inner_element w-100">

                                                        <div class="form-group">

                                                            <input type="text" class="form-control"
                                                                placeholder="Email">

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-lg-4">

                                                    <div class="inner_element w-100">

                                                        <div class="form-group">

                                                            <input type="text" class="form-control"
                                                                placeholder="Mobile Phone">

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="col-lg-4">

                                                    <div class="form-check">

                                                        <input class="form-check-input" type="checkbox"
                                                            value="" id="flexCheckCheckeda2">

                                                        <label class="form-check-label" for="flexCheckCheckeda2">

                                                            Create an Invoice Item

                                                        </label>

                                                    </div>

                                                </div>

                                                <div class="col-lg-12 mt-3" id="invoice_appoin">

                                                    <div class="inner_element w-100">

                                                        <div class="form-group">

                                                            <select class="form-control select2_note">

                                                                <option value="">Appointment Type</option>

                                                                <option value="">CONSULTATION/Interventional
                                                                    Radiology استشارة أشعة تداخلية</option>

                                                                <option value="">CT / Fluro Guided joint / facet
                                                                    RFA (Radio-Frequency) ablation علاج ألم المفاصل
                                                                    بالتردد الحراري بتوجية الأشعة</option>

                                                                <option value="">Follow up appointment</option>

                                                                <option value="">Hemorrhoids Embolization
                                                                </option>

                                                                <option value="">Image guided MSK inflammation /
                                                                    pain injection - PRP حقن إالتهاب/ألم المفاصل بتوجية
                                                                    الأشعة-بلازما QASTARAT & DAWALI CLINICS</option>

                                                                <option value="">Image guided MSK / pain
                                                                    injection - HA حقن إالتهاب/ألم المفاصل بتوجية
                                                                    الأشعة-حقن زيتية</option>

                                                                <option value="">Image (Ultrasound) guided
                                                                    Occipital Headache nerve block</option>

                                                                <option value="">INTRAVENOUS VITAMIN THERAPY
                                                                </option>

                                                                <option value="">IV DRIP ASCORBIC ACID
                                                                    (Essential dose) فيتامين سي الجرعه الأساسية</option>

                                                                <option value="">IV DRIP DETOX MASTER (ESSENTIAL
                                                                    DOSE)مزيل السميات (الجرعة الأساسية)</option>

                                                                <option value="">IV DRIP ENERGY BOOSTER
                                                                    (ESSENTIAL DOSE) معزز الطاقة الجرعة الأساسية
                                                                </option>

                                                                <option value="">IV DRIP FAT BURNER (ESSENTIAL
                                                                    DOSE) مسرعات حرق الدهون (الجرعة الأساسية)</option>

                                                                <option value="">IV VITAMINE- WOMEN
                                                                    SPECIFICIMMUNITY BOOSTER WITH VITAMIN C</option>

                                                                <option value="">IV VITAMINE- WOMEN SPECIFIC-
                                                                    IRON BOOSTER - ANTI HAIR LOSS COMBINATION </option>

                                                                <option value="">IV Vitamin - Multivatamins w/
                                                                    Iron</option>

                                                                <option value="">PIRIFORMIS MUSCLE INJECTION
                                                                </option>

                                                                <option value="">PRESSURE STOCKING</option>

                                                                <option value="">SPERM DNA FRAGMENTATION
                                                                </option>

                                                                <option value="">Spider / Reticular Veins
                                                                    Sclerotherapy</option>

                                                                <option value="">Ultrasound doppler of VENOUS
                                                                    MAPPING</option>

                                                                <option value="">Ultrasound/General</option>

                                                                <option value="">Ultrasound NERVE MAPPING
                                                                </option>

                                                                <option value="">Varicocele Embolization - قسطرة
                                                                    دوالي الخصية-</option>



                                                            </select>

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

               order imagenairy Exam

            ---------------------------->

<div class="modal fade edit_patient__" id="order_imagenairy" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Order Imaginary Exam</h1>

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

                            <div class="inner_element w-100">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Select Tests</label>

                                    <select class="form-control select2_imaginary_test" name="states[]"
                                        multiple="multiple">

                                        <option value="">X ray</option>

                                        <option value="">Ultrasound</option>

                                        <option value="">endoscopy</option>

                                        <option value="">CT Scan</option>

                                        <option value="">MRI</option>

                                    </select>

                                </div>

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

               order imagenairy Exam

            ---------------------------->

<div class="modal fade edit_patient__" id="consent_form" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Eligibility Forms</h1>

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

                        <div class="col-lg-4">

                            <label class="w-100">

                                <input type="radio" name="product" class="card-input-element" />

                                <div class="form_box card-input">

                                    <div class="form_img">

                                        <img src="{{ url('public/assets') }}/images/new-images/forms.png"
                                            alt="">

                                    </div>

                                    <div class="form_dt">

                                        <h6>PAE Eligiblity</h6>

                                    </div>

                                </div>

                            </label>



                        </div>



                        <div class="col-lg-4">

                            <label class="w-100">

                                <input type="radio" name="product" class="card-input-element" />

                                <div class="form_box card-input">

                                    <div class="form_img">

                                        <img src="{{ url('public/assets') }}/images/new-images/forms.png"
                                            alt="">

                                    </div>

                                    <div class="form_dt">

                                        <h6>PAE Eligiblity</h6>

                                    </div>

                                </div>

                            </label>



                        </div>

                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="pae-eligiblity-form.php" class="btn r-04 btn--theme hover--tra-black add_patient">

                        Next</a>

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
                                            data-provide="datepicker">

                                    </div>

                                    <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                </div>



                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Type an item name</label>

                                    <input type="search" class="form-control" id="" placeholder="">

                                    <button class="btn search_btn">

                                        <iconify-icon icon="prime:search-plus" width="24"></iconify-icon>

                                    </button>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Cost</label>

                                    <input type="search" class="form-control" id="" placeholder="">



                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Code</label>

                                    <input type="search" class="form-control" id="" placeholder="">



                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="inner_element add_medicine_btn">

                                <div class="form-group">

                                    <a href="#" class="add_diagnosis">+ Add</a>

                                </div>

                            </div>

                        </div>





                    </div>

                    <div class="add_data_diagnosis">

                        <table class="table table-striped table-bordered">

                            <tr>

                                <th>Date</th>

                                <th>Item Name</th>

                                <th>Cost </th>

                                <th>Code</th>

                                <th>Action</th>

                            </tr>

                            <tr>

                                <td>15 Nov, 2023</td>

                                <td>Asirpin</td>

                                <td>100</td>

                                <td>CO22</td>

                                <td><a href="#" class="trash_btn"><i
                                            class="fa-regular fa-trash-can"></i></a></td>

                            </tr>

                            <tr>

                                <td>15 Nov, 2023</td>

                                <td>Asirpin</td>

                                <td>100</td>

                                <td>CO22</td>

                                <td><a href="#" class="trash_btn"><i
                                            class="fa-regular fa-trash-can"></i></a></td>

                            </tr>

                        </table>

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

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row top_head_letter">

                        <div class="col-lg-4">

                            <div class="inner_element">

                                <div class="form-group">



                                    <input type="search" class="form-control" id=""
                                        placeholder="Task">



                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="inner_element">

                                <div class="form-group">



                                    <div class="input-group" id="datepicker23">



                                        <input type="text" class="form-control" placeholder="dd M, yyyy"
                                            data-date-format="dd M, yyyy" data-date-container='#datepicker23'
                                            data-provide="datepicker">

                                    </div>

                                    <!-- <input type="text" class="form-control datepickerInput" placeholder="dd M, yyyy"> -->

                                </div>



                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="inner_element">

                                <div class="form-group">



                                    <select class="form-control select2_task">

                                        <option value="">SAIF ALZAABI</option>



                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-12">

                            <div class="mt-3 form-group">

                                <textarea class="form-control" placeholder="" style="height:100px"></textarea>

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

<div class="modal fade edit_patient__" id="attach_document" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Attach Document</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="mb-2 form-group">

                                <label for="validationCustom01" class="form-label">Document Name</label>

                                <input type="search" class="form-control" id="" placeholder="">

                            </div>



                        </div>

                        <div class="col-lg-12">

                            <div class="mb-2 form-group">

                                <label for="validationCustom01" class="form-label">Upload Document</label>

                                <input name="file1" type="file" class="dropify" data-height="100" />

                            </div>



                        </div>

                        <div class="col-lg-12 text-end">

                            <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient">Upload</a>

                        </div>

                    </div>

                    <div class="add_data_diagnosis">

                        <table class="table table-striped table-bordered">

                            <tr>

                                <th>Document</th>

                                <th>Date</th>

                                <th>Action</th>

                            </tr>

                            <tr>

                                <td>

                                    <div class="d-flex document pt-2">

                                        <img src="{{ url('public/assets') }}/images/new-images/documents.png"
                                            class="avatar rounded me-3" alt="shreyu">

                                        <div class="flex-grow-1">

                                            <h5 class="dcument_name">document 1</h5>



                                        </div>



                                    </div>

                                </td>

                                <td>15 Nov, 2023</td>

                                <td><a href="#" class="trash_btn"><i
                                            class="fa-regular fa-trash-can"></i></a></td>

                            </tr>



                        </table>

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

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Diseases Name</label>

                                    <input type="text" class="form-control" placeholder="Diseases Name">

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-12">

                            <div class="mb-1 form-group">

                                <label for="validationCustom01" class="form-label">Describe</label>

                                <textarea class="form-control" placeholder="" style="height:60px"></textarea>

                            </div>

                        </div>

                        <div class="col-lg-12 " id="add_diseases">

                            <div class="diseases_box">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="inner_element">

                                            <div class="form-group">

                                                <label for="validationCustom01"
                                                    class="form-label diseases_title"><span>Diseases Name</span>
                                                    <span><a href="#" id="remove_disease"><i
                                                                class="fa-regular fa-trash-can"></i></a></span></label>

                                                <input type="text" class="form-control"
                                                    placeholder="Diseases Name">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-12">

                                        <div class="mb-1 form-group">

                                            <label for="validationCustom01" class="form-label">Describe</label>

                                            <textarea class="form-control" placeholder="" style="height:60px"></textarea>

                                        </div>

                                    </div>

                                </div>

                            </div>



                        </div>

                        <div class="col-lg-12 text-end">

                            <a href="#" class="diseases_name" id="add_diseases_btn">+ Add More</a>

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

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row">

                        <div class="col-lg-12">

                            <div class="inner_element">

                                <div class="form-group">

                                    <label for="validationCustom01" class="form-label">Surgery Name</label>

                                    <input type="text" class="form-control" placeholder="Diseases Name">

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-12">

                            <div class="mb-1 form-group">

                                <label for="validationCustom01" class="form-label">Describe</label>

                                <textarea class="form-control" placeholder="" style="height:60px"></textarea>

                            </div>

                        </div>

                        <div class="col-lg-12 " id="add_surgery">

                            <div class="diseases_box">

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="inner_element">

                                            <div class="form-group">

                                                <label for="validationCustom01"
                                                    class="form-label diseases_title"><span>Surgery Name</span>
                                                    <span><a href="#" id="remove_surgery"><i
                                                                class="fa-regular fa-trash-can"></i></a></span></label>

                                                <input type="text" class="form-control"
                                                    placeholder="Diseases Name">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-12">

                                        <div class="mb-1 form-group">

                                            <label for="validationCustom01" class="form-label">Describe</label>

                                            <textarea class="form-control" placeholder="" style="height:60px"></textarea>

                                        </div>

                                    </div>

                                </div>

                            </div>



                        </div>

                        <div class="col-lg-12 text-end">

                            <a href="#" class="diseases_name" id="add_surgery_btn">+ Add More</a>

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

                Make an Appointment

            ---------------------------->

<div class="modal fade edit_patient__" id="make_appointment" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog ">

        <div class="modal-content">

            <div class="modal-header">

                <h1 class="modal-title" id="exampleModalLabel">Make an Appointment</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>

            </div>

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row top_head_vitals">

                        <div class="col-lg-12 mt-4">

                            <div class="row">

                                <div class="col-lg-9">

                                    <div class="inner_element">

                                        <div class="form-group">



                                            <input type="text" class="form-control datepickerInput"
                                                placeholder="Click here to find availability">

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

                                            <select class="form-control select2_appointment">

                                                <option value="">Appointment Type</option>

                                                <option value="">CONSULTATION/Interventional Radiology استشارة
                                                    أشعة تداخلية</option>

                                                <option value="">CT / Fluro Guided joint / facet RFA
                                                    (Radio-Frequency) ablation علاج ألم المفاصل بالتردد الحراري بتوجية
                                                    الأشعة</option>

                                                <option value="">Follow up appointment</option>

                                                <option value="">Hemorrhoids Embolization</option>

                                                <option value="">Image guided MSK inflammation / pain injection
                                                    - PRP حقن إالتهاب/ألم المفاصل بتوجية الأشعة-بلازما QASTARAT & DAWALI
                                                    CLINICS</option>

                                                <option value="">Image guided MSK / pain injection - HA حقن
                                                    إالتهاب/ألم المفاصل بتوجية الأشعة-حقن زيتية</option>

                                                <option value="">Image (Ultrasound) guided Occipital Headache
                                                    nerve block</option>

                                                <option value="">INTRAVENOUS VITAMIN THERAPY</option>

                                                <option value="">IV DRIP ASCORBIC ACID (Essential dose) فيتامين
                                                    سي الجرعه الأساسية</option>

                                                <option value="">IV DRIP DETOX MASTER (ESSENTIAL DOSE)مزيل
                                                    السميات (الجرعة الأساسية)</option>

                                                <option value="">IV DRIP ENERGY BOOSTER (ESSENTIAL DOSE) معزز
                                                    الطاقة الجرعة الأساسية</option>

                                                <option value="">IV DRIP FAT BURNER (ESSENTIAL DOSE) مسرعات حرق
                                                    الدهون (الجرعة الأساسية)</option>

                                                <option value="">IV VITAMINE- WOMEN SPECIFICIMMUNITY BOOSTER
                                                    WITH VITAMIN C</option>

                                                <option value="">IV VITAMINE- WOMEN SPECIFIC- IRON BOOSTER -
                                                    ANTI HAIR LOSS COMBINATION </option>

                                                <option value="">IV Vitamin - Multivatamins w/ Iron</option>

                                                <option value="">PIRIFORMIS MUSCLE INJECTION</option>

                                                <option value="">PRESSURE STOCKING</option>

                                                <option value="">SPERM DNA FRAGMENTATION</option>

                                                <option value="">Spider / Reticular Veins Sclerotherapy</option>

                                                <option value="">Ultrasound doppler of VENOUS MAPPING</option>

                                                <option value="">Ultrasound/General</option>

                                                <option value="">Ultrasound NERVE MAPPING </option>

                                                <option value="">Varicocele Embolization - قسطرة دوالي الخصية-
                                                </option>



                                            </select>

                                        </div>

                                    </div>

                                </div>



                                <div class="col-lg-6">

                                    <div class="inner_element">

                                        <div class="form-group">

                                            <select class="form-control select2_appointment">

                                                <option value="">Location</option>

                                                <option value="">CLINIC</option>

                                                <option value="">DUBAI</option>

                                                <option value="">QASTARAT & DAWALI CLINICS</option>

                                            </select>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="inner_element">

                                        <div class="form-group">



                                            <input type="text" class="form-control datepickerInput"
                                                placeholder="17 Nov,2023">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="inner_element">

                                        <div class="form-group">



                                            <input type="text" class="form-control timepicker-custom"
                                                placeholder="12:00">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="inner_element">

                                        <div class="form-group">



                                            <input type="text" class="form-control datepickerInput"
                                                placeholder="17 Nov,2023">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6">

                                    <div class="inner_element">

                                        <div class="form-group">



                                            <input type="text" class="form-control timepicker-custom"
                                                placeholder="12:00">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="inner_element">

                                        <div class="form-group">



                                            <input type="text" class="form-control" placeholder="Cost">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="inner_element">

                                        <div class="form-group">



                                            <input type="text" class="form-control" placeholder="Code">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-4">

                                    <div class="inner_element">

                                        <div class="form-group">

                                            <select class="form-control select2_appointment">

                                                <option value="">Select Clinician</option>

                                                <option value="">SAIF ALZAABI</option>

                                            </select>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <div class="form-check">

                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckChecked" checked>

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

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">

                        Book</a>

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

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row top_head_vitals">

                        <div class="col-lg-12">

                            <div class="row">

                                <div class="col-lg-12">

                                    <div class="inner_element">

                                        <div class="form-group mb-3">

                                            <label for="validationCustom01" class="form-label">Select Date</label>

                                            <input type="text" class="form-control datepickerInput"
                                                placeholder="">

                                        </div>

                                        <div class="form-group">

                                            <label for="validationCustom01" class="form-label">Paste Meeting
                                                URL</label>

                                            <input type="text" class="form-control "
                                                placeholder="Paste Meeting URL">

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

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">

                        Next</a>

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

            <div class="modal-body padding-0">

                <div class="inner_data">

                    <div class="row top_head_vitals">

                        <div class="col-lg-12">

                            <div class="row">

                                <div class="col-lg-12">

                                    <label for="validationCustom01" class="form-label">Select Lab Tests</label>

                                    <select id="sumo-select" multiple>

                                        <option value="1">17 Hydroxyprogesterone</option>

                                        <option value="2">24 Hour Urinary Calcium</option>

                                        <option value="3">5 HIAA</option>

                                        <option value="4">6-TGN</option>

                                        <option value="5">5 HIAA</option>

                                        <option value="6">Acetone</option>

                                        <option value="7">Acetyl Choline Receptor Abs</option>

                                        <option value="8">Acid phosphatase (prostatic)</option>

                                        <option value="9">Activated Protein C Resistance</option>

                                        <option value="10">Active B12</option>

                                        <option value="11">Adalimumab Level</option>

                                        <option value="12">Adenovirus PCR</option>

                                        <option value="13">Adiponectin</option>

                                        <option value="14">Adrenal Antibodies</option>

                                        <option value="15">Adrenocorticotropic Hormone (ACTH)</option>



                                    </select>

                                </div>



                                <div class="col-lg-12">



                                    <div class="add_data_diagnosis mt-3">

                                        <h6 class="selected_testtitle"><span>Selected Tests <i
                                                    class="fa-solid fa-cart-shopping"></i></span> <span><a
                                                    href="all-lab-tests.php">View all Tests</a></span></h6>

                                        <table class="table lab_order_list">



                                            <tr>

                                                <td>17 Hydroxyprogesterone</td>

                                                <td>Turnaround Time : 1 Week</td>

                                                <td><a href="#" class="trash_btn"><i
                                                            class="fa-solid fa-xmark"></i></a></td>

                                            </tr>

                                            <tr>

                                                <td>24 Hour Urinary Calcium</td>

                                                <td>Turnaround Time : 3 days</td>

                                                <td><a href="#" class="trash_btn"><i
                                                            class="fa-solid fa-xmark"></i></a></td>

                                            </tr>

                                            <tr>

                                                <td>5 HIAA</td>

                                                <td>Turnaround Time : 4 Days</td>

                                                <td><a href="#" class="trash_btn"><i
                                                            class="fa-solid fa-xmark"></i></a></td>

                                            </tr>

                                        </table>

                                    </div>

                                </div>





                            </div>

                        </div>







                    </div>

                </div>

                <div class="action text-end bottom_modal">

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient"
                        data-bs-dismiss="modal">

                        Order</a>

                    <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient secondary_btn"
                        data-bs-dismiss="modal">

                        Cancel</a>

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

                    High level

            ---------------------------->

<div class="offcanvas offcanvas-bottom offcanvas-h-custom-50" tabindex="-1" id="high_level"
    aria-labelledby="offcanvasBottomLabel">

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
            class="fa-regular fa-circle-down"></i> Close</button>



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





















<!----------------------------

              Add New Letter

            ---------------------------->

<div class="offcanvas offcanvas-bottom offcanvas-h-custom-90" tabindex="-1" id="new_letter"
    aria-labelledby="offcanvasBottomLabel">

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
            class="fa-regular fa-circle-down"></i> Close</button>



    <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasBottomLabel"> <i class="fa-regular fa-file-lines"></i> New Letter
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

                <p><a href="#" class="mic_btn"><i class="fa-solid fa-microphone"></i></a> Add a voice note
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

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
            class="fa-regular fa-circle-down"></i> Close</button>



    <div class="offcanvas-header">

        <h5 class="offcanvas-title" id="offcanvasBottomLabel"><i
                class="fa-solid fa-temperature-three-quarters"></i> Enter Vitals </h5>

        <!-- <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-regular fa-circle-down"></i></button> -->

    </div>

    <div class="offcanvas-body small p-0">

        <div class="main_box_offcanvas vitals_add_box">

            <div class="row top_head_vitals">

                <div class="col-lg-9 left_side_cnt_mm">

                    <div class="row">

                        <div class="col-lg-3">

                            <div class="inner_element">

                                <div class="form-group">



                                    <input type="text" class="form-control datepickerInput"
                                        placeholder="dd M, yyyy">

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3">

                            <div class="inner_element">

                                <div class="form-group">



                                    <select class="form-control select2_vitals">

                                        <option value="">Choose a measurement...</option>

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

                        </div>

                        <div class="col-lg-3">

                            <div class="inner_element">

                                <div class="form-group">

                                    <input type="text" class="form-control" id=""
                                        placeholder="Value">

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3">

                            <div class="inner_element">

                                <a href="#"
                                    class="btn r-04 btn--theme hover--tra-black add_patient add_vitals_btn">Add
                                    Vitals<i class="fa-solid fa-arrow-right-to-bracket"></i></a>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-12">

                        <div class="add_data_diagnosis">

                            <table class="table table-striped table-bordered">

                                <tr>

                                    <th>Date</th>

                                    <th>Measurement</th>

                                    <th>Value </th>

                                    <th>Action</th>

                                </tr>

                                <tr>

                                    <td>15 Nov, 2023</td>

                                    <td>Height</td>

                                    <td>172</td>



                                    <td><a href="#" class="trash_btn"><i
                                                class="fa-regular fa-trash-can"></i></a></td>

                                </tr>

                                <tr>

                                    <td>15 Nov, 2023</td>

                                    <td>Weight</td>

                                    <td>70</td>



                                    <td><a href="#" class="trash_btn"><i
                                                class="fa-regular fa-trash-can"></i></a></td>

                                </tr>

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



















<!----------------------------

                  invoice canvas modal #invoice page action to open canvas

            ---------------------------->

<div class="offcanvas offcanvas-bottom offcanvas-h-custom-80  centercanvas" tabindex="-1" id="user-invoice"
    aria-labelledby="offcanvasBottomLabel">

    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
            class="fa-regular fa-circle-down"></i> Close</button>



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

                                AED 100.00

                            </td>

                            <td data-th="Supplier Name">

                                AED 100.00

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
                    <h1>New Balance : </h1> <span>AED 100.00</span>
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


<script>
	window.addEventListener('load', function() {
  var loader = document.querySelector('.main_loader');
  loader.style.display = 'none'; // Hide the loader when the page is fully loaded
});
</script>




<!-- EXTERNAL SCRIPTS

                    ============================================= -->

<script src="{{ url('public/assets') }}/js/jquery-3.7.0.min.js"></script>



<script src="{{ url('public/assets') }}/js/bootstrap.min.js"></script>

<script src="{{ url('public/assets') }}/js/modernizr.custom.js"></script>

<script src="{{ url('public/assets') }}/js/jquery.easing.js"></script>

<script src="{{ url('public/assets') }}/js/jquery.appear.js"></script>

<script src="{{ url('public/assets') }}/js/menu.js"></script>

<script src="{{ url('public/assets') }}/js/owl.carousel.min.js"></script>

<script src="{{ url('public/assets') }}/js/pricing-toggle.js"></script>

<script src="{{ url('public/assets') }}/js/jquery.magnific-popup.min.js"></script>

<script src="{{ url('public/assets') }}/js/request-form.js"></script>

<script src="{{ url('public/assets') }}/js/jquery.validate.min.js"></script>

<script src="{{ url('public/assets') }}/js/jquery.ajaxchimp.min.js"></script>

<script src="{{ url('public/assets') }}/js/popper.min.js"></script>

<script src="{{ url('public/assets') }}/js/lunar.js"></script>

<script src="{{ url('public/assets') }}/js/wow.js"></script>

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>



<!-- apex chart cdn -->

<!-- Include ApexCharts library -->

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



<!-- Custom Script -->

<script src="{{ url('public/assets') }}/js/custom.js"></script>



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



<script src="{{ url('public/assets') }}/js/changer.js"></script>

<script defer src="{{ url('public/assets') }}/js/styleswitch.js"></script>

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
</script>





<!-- iconify icons js -->

<script src="{{ url('public/assets') }}/js/iconify-icons.js"></script>



<!-- timepicker js -->

<script src="{{ url('public/assets') }}/js/jquery.timepicker.min.js"></script>

<!-- timepicker js end -->



<!-- form plugin js -->

<script src="{{ url('public/assets') }}/libs/select2/js/select2.min.js"></script>

<script src="{{ url('public/assets') }}/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script src="{{ url('public/assets') }}/libs/spectrum-colorpicker2/spectrum.min.js"></script>

<script src="{{ url('public/assets') }}/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

<script src="{{ url('public/assets') }}/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>

<script src="{{ url('public/assets') }}/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>



<script src="{{ url('public/assets') }}/js/pages/form-advanced.init.js"></script>

<!-- apexcharts -->

<script src="{{ url('public/assets') }}/libs/apexcharts/apexcharts.min.js"></script>



<!-- Vector map-->

<script src="{{ url('public/assets') }}/libs/jsvectormap/js/jsvectormap.min.js"></script>

<script src="{{ url('public/assets') }}/libs/jsvectormap/maps/world-merc.js"></script>



<!-- Required datatable js -->

<script src="{{ url('public/assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="{{ url('public/assets') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>





<!-- Buttons examples -->

<script src="{{ url('public/assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

<script src="{{ url('public/assets') }}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

<script src="{{ url('public/assets') }}/libs/jszip/jszip.min.js"></script>

<script src="{{ url('public/assets') }}/libs/pdfmake/build/pdfmake.min.js"></script>

<script src="{{ url('public/assets') }}/libs/pdfmake/build/vfs_fonts.js"></script>

<script src="{{ url('public/assets') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>

<script src="{{ url('public/assets') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>

<script src="{{ url('public/assets') }}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>



<script src="{{ url('public/assets') }}/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>

<script src="{{ url('public/assets') }}/libs/datatables.net-select/js/dataTables.select.min.js"></script>



<!-- Responsive examples -->

<script src="{{ url('public/assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

<script src="{{ url('public/assets') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>



<!-- Datatable init js -->

<script src="{{ url('public/assets') }}/js/pages/datatables.init.js"></script>

<!-- linecharts init -->

<script src="{{ url('public/assets') }}/js/pages/apexcharts-line.init.js"></script>

<!-- App js -->

<script src="{{ url('public/assets') }}/js/app.js"></script>

<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

<!--  Flatpickr  -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>



<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2209107429444016',
      xfbml      : true,
      version    : 'v20.0'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){    
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>






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
</script>

<script>
    $('.select2_modal').select2({

        dropdownParent: $('.add_patient__')

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
</script>





<!-- add subcat js -->

<script>
    // Updated JavaScript (script.js)

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

<!-- end -->



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

            dateFormat: 'dd M, yy'

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
    $('.comon_selectrtj').select2({

    });
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





@stack('custom-js')

<!-- Display SweetAlert component -->









</body>



</html>
