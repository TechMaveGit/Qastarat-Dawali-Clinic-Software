@extends('front.layout.main_view')

@push('title')
    Home | QASTARAT & DAWALI CLINICS
@endpush

@section('content-section')
    <section id="hero-15" class="bg--scroll sectionhomebanner hero-section">
        <div class="container">
            <!-- <div id="owl-carousel" class="service_slider owl-carousel owl-theme"></div> -->
            <div class="row d-flex align-items-center">

                <!-- HERO TEXT -->
                @php
                    $home=DB::table('homes')->first();
                    $sentence = $home->subTitle;
                    $words = str_word_count($sentence, 1);  

                    if (count($words) >= 2) {
                       
                        $lastTwoWords = implode(' ', array_slice($words, -2));
                        
                        $remainingWords = implode(' ', array_slice($words, 0, -2));
                    } else {
                        $lastTwoWords="";
                    }
                @endphp
                <div class="col-md-12">
                    <div class="hero-15-txt wow fadeInRight">

                        <div class="ContentLoginbanner">

                            <h6>  <br>
                                {{ $home->title ?? '' }}</h6>
                            <h2 class="bnr_title">{{ isset($lastTwoWords) ? $remainingWords : $sentence  }} <span>..{{ $lastTwoWords ?? '' }}</span></h2>

                            
                        </div>

                    </div>
                </div> <!-- END HERO TEXT -->

            </div>

            <!-- End row -->

        </div> <!-- End container -->
        <!-- <div class="bnner_bottom_img">
               <img src="images/new-images/bnner_bottom_img.png" alt="">
              </div> -->
    </section> <!-- END HERO-15 -->

  <!-- STATISTIC-1
			============================================= -->
<div id="statistic-1" class="statistic-section division">
	<div class="container">

		<!-- STATISTIC-1 WRAPPER -->
		<div class="statistic-1-wrapper">
			<div class="row justify-content-md-center row-cols-1 row-cols-md-3">

				<!-- STATISTIC BLOCK #1 -->
				<div class="col-lg-auto">
					<div id="sb-1-1" class="wow fadeInUp">
						<div class="statistic-block">

							<!-- Digit -->
							<div class="statistic-block-digit text-center">
								<h2 class="s-46 statistic-number"><span class="count-element">{{ $home->reasonalClinics ?? '' }}</span></h2>
							</div>

							<!-- Text -->
							<div class="statistic-block-txt color--grey">
								<p class="p-md">Reasonal Clinics</p>
							</div>

						</div>
					</div>
				</div> <!-- END STATISTIC BLOCK #1 -->

				<!-- STATISTIC BLOCK #2 -->
				<div class="col-lg-auto">
					<div id="sb-1-2" class="wow fadeInUp">
						<div class="statistic-block">

							<!-- Digit -->
							<div class="statistic-block-digit text-center">
								<h2 class="s-46 statistic-number"><span class="count-element">{{ $home->gccCountries ?? '' }}</span></h2>
							</div>

							<!-- Text -->
							<div class="statistic-block-txt color--grey">
								<p class="p-md">GCC Countries</p>
							</div>

						</div>
					</div>
				</div> <!-- END STATISTIC BLOCK #2 -->
					<!-- STATISTIC BLOCK #2 -->
					<div class="col-lg-auto">
					<div id="sb-1-2" class="wow fadeInUp">
						<div class="statistic-block">

							<!-- Digit -->
							<div class="statistic-block-digit text-center">
								<h2 class="s-46 statistic-number"><span class="count-element">{{ $home->satellietesCenters ?? '' }}</span></h2>
							</div>

							<!-- Text -->
							<div class="statistic-block-txt color--grey">
								<p class="p-md">Satellietes Centers</p>
							</div>

						</div>
					</div>
				</div> <!-- END STATISTIC BLOCK #2 -->
				<!-- STATISTIC BLOCK #2 -->
				<div class="col-lg-auto">
					<div id="sb-1-2" class="wow fadeInUp">
						<div class="statistic-block">

							<!-- Digit -->
							<div class="statistic-block-digit text-center">
								<h2 class="s-46 statistic-number"><span class="count-element">{{ $home->populationServed ?? '' }}</span>M</h2>
							</div>

							<!-- Text -->
							<div class="statistic-block-txt color--grey">
								<p class="p-md">Population served</p>
							</div>

						</div>
					</div>
				</div> <!-- END STATISTIC BLOCK #2 -->
				<!-- STATISTIC BLOCK #3 -->
				<div class="col-lg-auto">
					<div id="sb-1-3" class="wow fadeInUp">
						<div class="statistic-block">

							<!-- Digit -->
							<div class="statistic-block-digit text-center">
								<!-- <h2 class="s-46 statistic-number">
												<span class="count-element">93</span>
											</h2> -->
								<h2 class="s-46 statistic-number"><span class="count-element">{{ $home->yearsExperience ?? '' }}</span>+</h2>
							</div>

							<!-- Text -->
							<div class="statistic-block-txt color--grey">
								<p class="p-md">Years of experience</p>
							</div>

						</div>
					</div>
				</div> <!-- END STATISTIC BLOCK #3 -->

			</div> <!-- End row -->
		</div> <!-- END STATISTIC-1 WRAPPER -->

	</div> <!-- End container -->
</div> <!-- END STATISTIC-1 -->

    <!-- DIVIDER LINE -->
    <hr class="divider">
        @php
            $aboutUs=DB::table('aboutUs')->first();
        @endphp
    <section id="about_us-1" class="about_us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="abt_cnt">
                        <h6 class="sub_title_sec">About Us</h6>
                        <h1 class="sec_title">{{ $aboutUs->title ?? '' }}</h1>
                        <p class="cnt_para">{{ $aboutUs->subTitle ?? '' }}.</p>

                        <!-- <ul class="important_point">
                <li>Solid Solutions</li>
                <li>Core Features</li>
                <li>Unlimited Revisions</li>
                <li>24/7 Online Support</li>
               </ul>
               <a href="#" class="btn r-04 btn--theme hover--tra-black">Know More <i class="fa-solid fa-arrow-right-long"></i></a> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- <div class="abt_img_bx">
             <img src="" alt="">
            </div> -->
                    <div class="abt_img_bx img-block video-preview wow fadeInUp">

                        <!-- Play Icon -->
                        @isset($aboutUs->video_url)
                        <a class="video-popup2" href="{{ $aboutUs->video_url ?? '#' }}">
                            <div class="video-btn video-btn-xl bg--theme">
                                <div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
                            </div>
                        </a>
                        @elseif ($aboutUs->videoFile)
                         <?php
                                
                                $videoUrl = asset('/assets/video/' . $aboutUs->videoFile);
                            ?>
                        <a class="video-popup" href="{{ $videoUrl ?? '#'  }}">
                            <div class="video-btn video-btn-xl bg--theme">
                                <div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
                            </div>
                        </a>
                        @else
                        <a class="video-popup2" href="{{ $videoUrl }}">
                            <div class="video-btn video-btn-xl bg--theme">
                                <div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
                            </div>
                        </a>
                        @endisset
                       

                        <!-- Preview Image -->
                        @isset($aboutUs->imageUpload)
                        <img class="img-fluid" src="{{ asset('/assets/video/'.$aboutUs->imageUpload) }}"
                        alt="video-preview">
                            @else
                            <img class="img-fluid" src="{{ asset('/assets/video/new-images/17a8091499.png') }}"
                            alt="video-preview">
                        @endisset
                       

                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="unique_treatment" class="about_us unique_treatments">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- <div class="abt_img_bx">
             <img src="" alt="">
            </div> -->
                    @php
                    $treatment=DB::table('treatments')->first();
                    @endphp
                    <div class=" img-block video-preview leftvideoContainer wow fadeInUp">

                        <!-- Play Icon -->
                        @if($treatment->video_url)
                            <a class="video-popup" href="{{ $treatment->video_url ?? '#' }}">
                                <div class="video-btn video-btn-xl bg--theme">
                                    <div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
                                </div>
                            </a>
                      
                      @endif
                       

                        <div class="videothumbnailImage">
                            <!-- Preview Image -->
                            @isset($treatment->imageUpload)
                            <img class="img-fluid img_fg"
                                src="{{ asset('/assets/video/'.$treatment->imageUpload) }}" alt="video-preview">
                                @else
                                <img class="img-fluid img_fg"
                                src="{{ asset('/assets/images/new-images/about_us.png') }}" alt="video-preview">
                            @endisset
                            
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="abt_cnt">
                        <h6 class="sub_title_sec">Our Treatments</h6>
                        <h1 class="sec_title">{{ $treatment->title ?? '' }}</h1>
                        <p class="cnt_para">{{ $treatment->subTitle ?? '' }}. </p>
                       

                        <!--
               <a href="#" class="btn r-04 btn--theme hover--tra-black">Know More <i class="fa-solid fa-arrow-right-long"></i></a> -->
                    </div>
                </div>

            </div>

            <div class="treatmetsTabs_Container">

                <div class="row">
                    <div class="treatments_ghu">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">{{ $treatment->Womenhealbetter ?? '' }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">{{ $treatment->Menhealbetter ?? '' }} </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">{{ $treatment->Menwomenhealbetter ?? '' }}</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-disabled" type="button" role="tab"
                                    aria-controls="pills-disabled" aria-selected="false"> {{ $treatment->regenerativetherapies ?? '' }} </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <!-- <ul class="important_point">
               
                <li>Gynecological catheters details</li>
                <li>Catheterization of uterine fibroids details</li>
                <li>Fumigation of benign breast tumors Details</li>
                <li>Pelvic varicose catheterization details</li>
                <li>Migratory endothelial catheter details</li>
                <li>Catheterization to reopen the fallopian tube details</li>
               </ul> -->

                                <div class="main-div bgpnikCircles_main">
                                    <div class="center">
                                        <div class="textcircle">
                                            {{ $treatment->Womenhealbetter ?? '' }}
                                        </div>

                                    </div>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="pink-custom-tooltip"
                                        data-bs-title="{{ $treatment->Womenhealbettercontent1 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Womenhealbettercontent1 ?? '' }}
                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-custom-class="pink-custom-tooltip"
                                        data-bs-title="{{ $treatment->Womenhealbettercontent2 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Womenhealbettercontent2 ?? '' }}
                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-custom-class="pink-custom-tooltip"
                                        data-bs-title="{{ $treatment->Womenhealbettercontent3 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Womenhealbettercontent3 ?? '' }}
                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="pink-custom-tooltip"
                                        data-bs-title="{{ $treatment->Womenhealbettercontent4 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Womenhealbettercontent4 ?? '' }}

                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="left" data-bs-custom-class="pink-custom-tooltip"
                                        data-bs-title="{{ $treatment->Womenhealbettercontent5 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Womenhealbettercontent5 ?? '' }}

                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="left" data-bs-custom-class="pink-custom-tooltip"
                                        data-bs-title="{{ $treatment->Womenhealbettercontent6 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Womenhealbettercontent6 ?? '' }}
                                        </div>
                                    </button>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab" tabindex="0">

                                <div class="main-div bgblueCircles_main">
                                    <div class="center">
                                        <div class="textcircle">
                                            {{ $treatment->Menhealbetter ?? '' }}
                                        </div>
                                    </div>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="blue-custom-tooltip"
                                        data-bs-title="{{ $treatment->Menhealbettercontent1 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Menhealbettercontent1 ?? '' }}
                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-custom-class="blue-custom-tooltip"
                                        data-bs-title="{{ $treatment->Menhealbettercontent2 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Menhealbettercontent2 ?? '' }}
                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-custom-class="blue-custom-tooltip"
                                        data-bs-title="{{ $treatment->Menhealbettercontent3 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Menhealbettercontent3 ?? '' }}

                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="blue-custom-tooltip"
                                        data-bs-title="{{ $treatment->Menhealbettercontent4 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Menhealbettercontent4 ?? '' }}

                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="left" data-bs-custom-class="blue-custom-tooltip"
                                        data-bs-title="{{ $treatment->Menhealbettercontent5 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Menhealbettercontent5 ?? '' }}

                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="left" data-bs-custom-class="blue-custom-tooltip"
                                        data-bs-title="{{ $treatment->Menhealbettercontent6 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Menhealbettercontent6 ?? '' }}
                                        </div>
                                    </button>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="main-div bgblackCircles_main">
                                    <div class="center">
                                        <div class="textcircle">
                                            {{ $treatment->Menwomenhealbetter ?? '' }}

                                        </div>
                                    </div>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="black-custom-tooltip"
                                        data-bs-title="{{ $treatment->Menwomenhealbettercontent1 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Menwomenhealbettercontent1 ?? '' }}
                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-custom-class="black-custom-tooltip"
                                        data-bs-title=" {{ $treatment->Menwomenhealbettercontent2 ?? '' }}">
                                        <div class="textcircle">
                                             {{ $treatment->Menwomenhealbettercontent2 ?? '' }}
                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-custom-class="black-custom-tooltip"
                                        data-bs-title=" {{ $treatment->Menwomenhealbettercontent3 ?? '' }}">
                                        <div class="textcircle">
                                             {{ $treatment->Menwomenhealbettercontent3 ?? '' }}

                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="black-custom-tooltip"
                                        data-bs-title="{{ $treatment->Menwomenhealbettercontent4 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Menwomenhealbettercontent4 ?? '' }}

                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="left" data-bs-custom-class="black-custom-tooltip"
                                        data-bs-title="{{ $treatment->Menwomenhealbettercontent5 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Menwomenhealbettercontent5 ?? '' }}

                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="left" data-bs-custom-class="black-custom-tooltip"
                                        data-bs-title="{{ $treatment->Menwomenhealbettercontent6 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->Menwomenhealbettercontent6 ?? '' }}
                                        </div>
                                    </button>


                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-disabled" role="tabpanel"
                                aria-labelledby="pills-disabled-tab" tabindex="0">
                                <div class="main-div bgyellowCircles_main">
                                    <div class="center">
                                        <div class="textcircle">
                                            {{ $treatment->regenerativetherapies ?? '' }}

                                        </div>
                                    </div>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="yellow-custom-tooltip"
                                        data-bs-title=" {{ $treatment->regenerativetherapiescontent1 ?? '' }}">
                                        <div class="textcircle">
                                             {{ $treatment->regenerativetherapiescontent1 ?? '' }}
                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-custom-class="yellow-custom-tooltip"
                                        data-bs-title="{{ $treatment->regenerativetherapiescontent2 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->regenerativetherapiescontent2 ?? '' }}
                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="right" data-bs-custom-class="yellow-custom-tooltip"
                                        data-bs-title=" {{ $treatment->regenerativetherapiescontent3 ?? '' }}">
                                        <div class="textcircle">
                                             {{ $treatment->regenerativetherapiescontent3 ?? '' }}

                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="yellow-custom-tooltip"
                                        data-bs-title="{{ $treatment->regenerativetherapiescontent4 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->regenerativetherapiescontent4 ?? '' }}

                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="left" data-bs-custom-class="yellow-custom-tooltip"
                                        data-bs-title="{{ $treatment->regenerativetherapiescontent5 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->regenerativetherapiescontent5 ?? '' }}

                                        </div>
                                    </button>

                                    <button type="button" class="circle" data-bs-toggle="tooltip"
                                        data-bs-placement="left" data-bs-custom-class="yellow-custom-tooltip"
                                        data-bs-title="{{ $treatment->regenerativetherapiescontent6 ?? '' }}">
                                        <div class="textcircle">
                                            {{ $treatment->regenerativetherapiescontent6 ?? '' }}
                                        </div>
                                    </button>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services" id="service_section">
        <div class="container">
            <div class="row">
                @php
                $service=DB::table('services')->first();
                @endphp
                <div class="col-lg-12">
                    <div class="center_section">
                        <h6 class="center_sub_title">{{ $service->title ?? '' }}</h6>
                        <h1 class="center_title">{{ $service->subTitle ?? '' }}</h1>
                    </div>
                </div>
                <div class="col-lg-12">

                    <div class="customservices_container">
                        <div class="row prt-boxes-spacing-25px">
                            <div class="col-lg-4 prt-box-col-wrapper">
                                <div class="featured-imagebox featured-imagebox-service style1">
                                    <div class="featured-thumbnail">
                                        @isset($service->image1)
                                        <img width="620" height="332" class="img-fluid"
                                            src="{{ asset('/assets/video/'.$service->image1) }}"
                                            alt="img">
                                            @else
                                            <img width="620" height="332" class="img-fluid"
                                            src="{{ asset('/assets/images/new-images/qs-service1.png') }}"
                                            alt="img">
                                        @endisset
                                        
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3><a href="#">{{ $service->image1title }}</a></h3>
                                        </div>
                                        <div class="featured-desc">
                                            <p>{{ $service->image1subtitle }}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 prt-box-col-wrapper">
                                <div class="featured-imagebox featured-imagebox-service style1">
                                    <div class="featured-thumbnail">
                                        @isset($service->image2)
                                        <img width="620" height="332" class="img-fluid"
                                        src="{{ asset('/assets/video/'.$service->image2) }}"
                                        alt="img">
                                            @else
                                            <img width="620" height="332" class="img-fluid"
                                            src="{{ asset('/assets/images/new-images/medical-report.png') }}"
                                            alt="img">
                                        @endisset
                                       
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3><a href="#">{{ $service->image2title ?? '' }}</a>
                                            </h3>
                                        </div>
                                        <div class="featured-desc">
                                            <p>{{ $service->image2subtitle ?? '' }}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 prt-box-col-wrapper">
                                <div class="featured-imagebox featured-imagebox-service style1">
                                    <div class="featured-thumbnail">
                                        @isset($service->image3)
                                        <img width="620" height="332" class="img-fluid"
                                        src="{{ asset('/assets/video/'.$service->image3) }}"
                                        alt="img">
                                            @else
                                            <img width="620" height="332" class="img-fluid"
                                            src="{{ asset('/assets/images/new-images/bvgfhn.png') }}"
                                            alt="img">
                                        @endisset
                                       
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3><a href="#">{{ $service->image3title ?? ''  }}</a></h3>
                                        </div>
                                        <div class="featured-desc">
                                            <p>{{ $service->image3subtitle ?? ''  }}</p>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="why_us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="why_us_cnt">
                        @php
                        $software=DB::table('softwares')->first();
                        @endphp
                        <h6 class="sub_title_sec">{{ $software->title ?? '' }}</h6>
                        <h1 class="sec_title"> {{ $software->subTitle ?? '' }}.</h1>
                        {{-- <p class="cnt_para">Qastarat & Dawali Clinics is a healthcare platform that provides virtual
                            medical
                            consultations and manages health records. Testing ensures seamless user experience and data
                            security.</p> --}}
                            <ul class="why_us_point">
                                <li><span class="why_us_count">1</span> <span>{{ $software->list1 ?? '' }}</span> </li>
                                <li><span class="why_us_count">2</span> <span>{{ $software->list2 ?? '' }}</span> </li>
                                <li><span class="why_us_count">3</span> <span>{{ $software->list3 ?? '' }}</span> </li>
                                <li><span class="why_us_count">4</span> <span>{{ $software->list4 ?? '' }}</span></li>
                                <li><span class="why_us_count">5</span> <span>{{ $software->list5 ?? '' }}</span></li>
                                <li><span class="why_us_count">6</span> <span>{{ $software->list6 ?? '' }}</span></li>
                                <li><span class="why_us_count">7</span> <span>{{ $software->list7 ?? '' }}</span></li>
                                <li><span class="why_us_count">8</span> <span>{{ $software->list8 ?? '' }}</span></li>
                                <li><span class="why_us_count">9</span> <span>{{ $software->list9 ?? '' }}</span></li>
        
        
                            </ul>
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
        </div>
        <div class="why_us_img">
            @isset($software->imageUpload)
            <img src="{{ asset('/assets/video/'.$software->imageUpload) }}" alt="">
                @else
                <img src="{{ asset('/assets/images/new-images/lab-4-min.jpg') }}" alt="">
            @endisset
            
        </div>
    </section>

    <section class="prt-row map-section clearfix" id="Our_Branches">
        <div class="container">
            <!-- row -->
                        @php
                        $branches=DB::table('branches')->first();
                        @endphp
            <div class="row">
                <div class="col-lg-12">
                    <div class="center_section">
                        <h6 class="center_sub_title">{{ $branches->title ?? '' }}</h6>
                        <h1 class="center_title">{{ $branches->subTitle ?? '' }}</h1>
                    </div>
                </div>

            </div>
            <div class="row align-items-center pt-20">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="fid-map-items position-relative mt-60 res-1199-mt-30 res-767-mt-0">
                        @isset($branches->imageUpload)
                        <img class="img-fluid" src="{{ asset('/assets/video/'.$branches->imageUpload) }}"
                        alt="image" width="590" height="296">
                            @else
                            <img class="img-fluid" src="{{ asset('/assets/images/new-images/maphvr.png') }}"
                            alt="image" width="590" height="296">
                        @endisset
                       

                        <div class="locationstooltip_itemBox">
                            <div class="customTooltipContainer active locationitem1">
                                <div class="Tooltip_dot"></div>
                                <div class="TooltipContent">
                                    Muscat
                                </div>
                            </div>

                            <div class="customTooltipContainer locationitem2">
                                <div class="Tooltip_dot"></div>
                                <div class="TooltipContent">
                                    Dubai
                                </div>
                            </div>

                            <div class="customTooltipContainer locationitem3">
                                <div class="Tooltip_dot"></div>
                                <div class="TooltipContent">
                                    Riyadh
                                </div>
                            </div>

                            <div class="customTooltipContainer locationitem4">
                                <div class="Tooltip_dot"></div>
                                <div class="TooltipContent">
                                    Manama
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="featured-bord-left">
                        <div class="featured-icon-box style4">

                            <div class="LocatiosIcon">
                                <iconify-icon icon="pepicons-pop:phone-circle"></iconify-icon>
                            </div>
                            <div class="featured-content">
                                <h3> {{ $branches->title1 ?? '' }} </h3>
                                <ul class="contact_list_icon">
                                    <li>
                                        <div class="dt_contact">
                                            <a href="tel:+{{ $branches->title1phonenumber ?? '' }}">+{{ $branches->title1phonenumber ?? '' }}</a> <a href="tel:+{{ $branches->title1tollfreenumber ?? '' }}"> <span
                                                    class="tollfree">TollFree:</span> +{{ $branches->title1tollfreenumber ?? '' }}</a>
                                        </div>

                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="featured-icon-box style4">

                            <div class="LocatiosIcon">
                                <iconify-icon icon="pepicons-pop:phone-circle"></iconify-icon>
                            </div>
                            <div class="featured-content">
                                <h3>{{ $branches->title2 ?? '' }}</h3>
                                <ul class="contact_list_icon">
                                    <li>

                                        <div class="dt_contact">
                                            <a href="tel:+{{ $branches->title2phonenumber ?? '' }}">+{{ $branches->title2phonenumber ?? '' }}</a>
                                        </div>

                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="featured-icon-box style4">

                            <div class="LocatiosIcon">
                                <iconify-icon icon="lucide:mails"></iconify-icon>
                            </div>
                            <div class="featured-content">
                                <h3> {{ $branches->title3 ?? '' }} </h3>
                                <ul class="contact_list_icon">
                                    <li>

                                        <div class="dt_contact">
                                            <a href="emailto:{{ $branches->title3email ?? '' }}">{{ $branches->title3email ?? '' }}</a>
                                        </div>

                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="featured-icon-box style4">

                            <div class="LocatiosIcon">
                                <iconify-icon icon="lucide:mails"></iconify-icon>
                            </div>
                            <div class="featured-content">
                                <h3> {{ $branches->title4 ?? '' }} </h3>
                                <ul class="contact_list_icon">
                                    <li>

                                        <div class="dt_contact">
                                            <a href="emailto:{{ $branches->title4email ?? '' }}">{{ $branches->title4email ?? '' }}</a>
                                        </div>

                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="animation-shadow animate-2"></div>
    </section>

    <!-- <section class="our_branch" id="our_branches">
        <div class="container">
         <div class="row">
          <div class="col-lg-12">
           <div class="center_section">
            <h6 class="center_sub_title">Our Branches</h6>
            <h1 class="center_title">We are presence here...</h1>
           </div>
          </div>
          <div class="col-lg-12 text-center">
           <img src="images/new-images/qs-map.png" alt="" class="map_img">
          </div>
         </div>
        </div>
       </section> -->

    <section class="our_doctors" id="Qastarat_Team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center_section">
                        <h6 class="center_sub_title">Our Teams</h6>
                        <h1 class="center_title"> </h1>
                    </div>
                </div>
            </div>
            <div id="owl-carousel" class="doctor_slider owl-carousel owl-theme">
                @php
                    $TeamMembers=DB::table('TeamMembers')->get();
                @endphp
                @forelse ($TeamMembers as $Member)
                <div class="item">
                    <div class="single-doctors-card">
                        <div class="doctors-image">
                            <a href="#">
                                @isset($Member->image_url)
                                <img src="{{ asset('/assets/video/'.$Member->image_url) }}" alt="image">
                                    @else
                                    <img src="{{ asset('/assets/images/new-images/dr-safi.png') }}" alt="image">
                                @endisset
                                
                            </a>
    
                            <ul class="social">
                                        <li>
                                            <a href="{{ $Member->social_fb ?? '#' }}" target="_blank">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $Member->social_twitter ?? '#' }}" target="_blank">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $Member->social_instagram ?? '#' }}" target="_blank">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $Member->social_linkedin ?? '#' }}" target="_blank">
                                                <i class="fa-brands fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                    </ul>
                        </div>
                        <div class="doctors-content">
                            <h3>
                                <a href="#">{{ $Member->name ?? '' }}</a>
                            </h3>
                            <div class="doctor_dt_ghi">
                                <h6>{{ $Member->title ?? '' }}</h6>
                                <!-- <h6>Consultant <span>Interventional Radiologist</span></h6>
                                <h6>American Board of Radiology certified Fellow, Royal College of Physicians  & Surgeons
                                </h6> -->
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    
                @endforelse
               
                
            </div>
        </div>
    </section>
    <section class="contact_us_home_section">
        <div class="container">
            <div class="row">
                @php
                     $contactUs=DB::table('contactUs')->first();
                @endphp
                <div class="col-lg-6">
                    <div class="contact_us_home">
                        <h6 class="sub_title_sec">{{ $contactUs->title ?? '' }}</h6>
                        <h1 class="sec_title">{{ $contactUs->subTitle ?? '' }} </h1>
                        <p class="cnt_para">{{ $contactUs->content1 ?? '' }}.</p>
                        <h6>{{ $contactUs->content2 ?? '' }}</h6>
                        <p class="contact_imp_para"><{{ $contactUs->content3 ?? '' }} </p>
                        <!-- <h6 class="contact_sub_title">Main Branch Muscat - OMAN</h6>
            <ul class="contact_list_icon">
             <li>
              <div class="icon">
               <i class="fa-solid fa-phone"></i>
              </div>
              <div class="dt_contact">
               <a href="tel:+96892000230">+96892000230</a> <a href="tel:+96892000230"> <span
                 class="tollfree">TollFree:</span> +96892000230</a>
              </div>
       
             </li>
       
            </ul>
       
            <h6 class="contact_sub_title">Worldwide Patients , Please contact us directly at</h6>
            <ul class="contact_list_icon">
             <li>
              <div class="icon">
               <i class="fa-solid fa-phone"></i>
              </div>
              <div class="dt_contact">
               <a href="tel:+971581114000">+971581114000</a>
              </div>
       
             </li>
       
            </ul>
            <h6 class="contact_sub_title">our nurse coordinator can be contacted at: </h6>
            <ul class="contact_list_icon">
             <li>
              <div class="icon">
               <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="dt_contact">
               <a href="emailto:nurse@qastaratclinics.com">nurse@qastaratclinics.com</a>
              </div>
       
             </li>
       
            </ul>
            <h6 class="contact_sub_title">our clinic admin coordinator can be contacted at:</h6>
            <ul class="contact_list_icon">
             <li>
              <div class="icon">
               <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="dt_contact">
               <a href="emailto:admin@qastaratclinics.com">admin@qastaratclinics.com</a>
              </div>
       
             </li>
       
            </ul> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact_ushome_img">
                        @isset($contactUs->imageUpload)
                        <img src="{{ asset('/assets/video/'.$contactUs->imageUpload) }}" alt="">
                            @else
                            <img src="{{ asset('/assets/images/new-images/contact-us-qs.png') }}" alt="">
                        @endisset
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQs-2
          ============================================= -->
          @php
          $faq=DB::table('faq_images')->first();
          $allfaq=DB::table('faq')->get();
         @endphp
    <section id="faqs-2" class="faqs-section faq_section"
        style="background-image: url({{ asset('/assets/video/'.$faq->imageUpload) }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center_section">
                        <h6 class="center_sub_title">{{ $faq->title ?? '' }}</h6>
                        <h1 class="center_title">{{ $faq->subTitle ?? '' }} </h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-lg-11 col-xl-10">

                    <!-- QUESTIONS ACCORDION -->
                    <div class="accordion-wrapper">
                        <ul class="accordion">



                           @forelse ($allfaq as $allfaq)
                               
                            <!-- QUESTIONS CATEGORY #1 -->
                            <li class="accordion-item @if ($loop->first)  @endif">

                                <!-- CATEGORY HEADER -->
                                <div class="accordion-thumb">
                                    <h4 class="s-28 w-700">{{ $allfaq->list1 ?? '' }}</h4>
                                </div>

                                <!-- CATEGORY ANSWERS -->
                                <div class="accordion-panel">

                                    <!-- QUESTION #1 -->
                                    <div class="accordion-panel-item mb-35">

                                        <!-- Answer -->
                                        <div class="faqs-2-answer color--grey">

                                            <!-- Text -->
                                            <p>{{ $allfaq->list1subtitle ?? '' }}</p>

                                        </div>

                                    </div> <!-- END QUESTION #1 -->

                                </div> <!-- END CATEGORY ANSWERS -->

                            </li> <!-- END QUESTIONS CATEGORY #1 -->



                            

                            @empty
                               
                            @endforelse



                        </ul>
                    </div> <!-- END QUESTIONS ACCORDION -->

                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END FAQs-2 -->


    <!-- Modal -->
    <div class="modal commonModal_login fade" id="modelpatientLogin" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <iconify-icon icon="entypo:cross"></iconify-icon>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="FormpatientLoginContainer">

                        <h6 class="role_title"><span>Heal Better</span> <br> Your Treatment without surgical cuts! </h6>
                        <form class="form_container loginFormcontainer" id="patientLoginForm" method="POST">
								@csrf
                            <div class="input_container">
                                <label class="input_label" for="email_field"></label>
                                <iconify-icon icon="mage:email" class="icon"></iconify-icon>
                                <input placeholder="Enter Email" title="Inpit title" name="email"
                                    type="text" class="input_field" id="email_field">
									
                            </div>
							<span class="text-danger" style="font-size: 14px" id="emailError"></span>
							
                            <div class="input_container">
                                <label class="input_label" for="password_field">&nbsp;</label>
                                <iconify-icon icon="mdi:password-minus-outline" class="icon"></iconify-icon>
                                <input placeholder="Enter Password" title="Input title" name="password"
                                    type="password" class="input_field" id="password_field">
                                <!-- Eye icon to toggle password visibility -->
                                <iconify-icon class="eyeiconpassword" icon="mdi:eye-outline"
                                    onclick="togglePasswordVisibility()"></iconify-icon>

                            </div>
							<span class="text-danger" style="font-size: 14px" id="passwordError"></span>
                            <button type="submit" class="sign-in_btn">
                                <span>Log In</span>
							</button>

                            {{-- <button title="Sign In" type="submit" class="sign-in_ggl">

                                <span>Not Registered? Request an access</span>
                            </button> --}}

                            <a href="{{ route('patient.forget.password') }}" class="note">Forgot password?
                            </a>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end -->

    <!-- modal staff login -->
    <div class="modal commonModal_login fade" id="modelStaffLogin" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <iconify-icon icon="entypo:cross"></iconify-icon>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="FormpatientLoginContainer">

                        <h6 class="role_title"><span></span> <br> IR Clinic & Patient Management Simplified!  </h6>
                        <form class="form_container loginFormcontainer" id="StaffLoginForm" method="POST">
								@csrf
                            <div class="input_container">
                                <label class="input_label" for="staffemail"></label>
                                <iconify-icon icon="fa6-regular:user" class="icon"></iconify-icon>
                                <input placeholder="Enter Email" title="Inpit title" name="email"
                                    type="text" class="input_field" id="staffemail">
                            </div>
							<span class="text-danger" style="font-size: 14px" id="staffemailError"></span>
                            <div class="input_container">
                                <label class="input_label" for="staffpassword">&nbsp;</label>
                                <iconify-icon icon="mdi:password-minus-outline" class="icon"></iconify-icon>
                                <input placeholder="Enter Password" title="Input title" name="password"
                                    type="password" class="input_field" id="staffpassword">
                                <!-- Eye icon to toggle password visibility -->
                                <iconify-icon class="eyeiconpassword" icon="mdi:eye-outline"
                                    onclick="togglePasswordVisibility2()"></iconify-icon>
                            </div>
							<span class="text-danger" style="font-size: 14px" id="staffpasswordError"></span>
                            <button type="submit" class="sign-in_btn">
                                <span>Log In</span>
							</button>

                         

                            <a href="{{ route('doctor.forget.password') }}" class="note">Forgot password?
                            </a>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end -->

    
@endsection