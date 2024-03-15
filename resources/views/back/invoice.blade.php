@extends('back.layout.main_view')

@push('title')

Invoice | QASTARAT & DAWALI CLINICS 

@endpush

@section('content-section')

@push('custom-css')

	{{-- add here --}}

@endpush



<div class="sub_bnr patient_recordsbanner" style="background-image: url({{ url('public/assets') }}/images/hero-15.jpg);">

   <div class="sub_bnr_cnt">

      <h1>Invoices <span class="blue_theme"> </span> </h1>

      <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">

         <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>

            <li class="breadcrumb-item active" aria-current="page">Invoices</li>

         </ol>

      </nav>

      <!-- <a href="#" class="btn r-04 btn--theme hover--tra-black add_patient" data-bs-toggle="modal" data-bs-target="#add_patient">+ Add New Patient </a>

         -->

   </div>

</div>

<div class="table_head_filtersarea">

   <div class="container">

      <div class="filterinv_data">

         <div class="inv_titlecr">

            <h1>Invoices</h1>

         </div>

         <div class="ftinv_center">

            <div class="form-group">

               <input type="checkbox" id="tests">

               <label for="tests">Don't Auto-Invoice Appointments & Tests</label>

            </div>

            <div class="form-group">

               <input type="checkbox" id="future">

               <label for="future">Show future invoice items</label>

            </div>

         </div>

         <div class="filterbtn_tabletr" >

            <!-- Nav tabs -->

            <ul class="nav nav-pills nav-justified" role="tablist">

               <li class="nav-item waves-effect waves-light">

                  <a class="nav-link ft_buttonshoover active" data-bs-toggle="tab" href="#home-1" role="tab">

                  <span class="d-block "><iconify-icon icon="iconamoon:invoice-light"></iconify-icon></span>

                  <span class=" d-sm-block">All Invoices</span> 

                  </a>

               </li>

               <li class="nav-item waves-effect waves-light">

                  <a class="nav-link ft_buttonshoover" data-bs-toggle="tab" href="#profile-1" role="tab">

                  <span class="d-block "><iconify-icon icon="mdi:invoice-arrow-right-outline"></iconify-icon></span>

                  <span class=" d-sm-block">To Invoice</span> 

                  </a>

               </li>

               <li class="nav-item waves-effect waves-light">

                  <a class="nav-link ft_buttonshoover" data-bs-toggle="tab" href="#messages-1" role="tab">

                  <span class="d-block "><iconify-icon icon="streamline:graph-bar-increase"></iconify-icon></span>

                  <span class=" d-sm-block">Stats</span>   

                  </a>

               </li>

               <li class="nav-item waves-effect waves-light">

                  <a class="nav-link ft_buttonshoover" data-bs-toggle="tab" href="#settings-1" role="tab">

                  <span class="d-block"><iconify-icon icon="tabler:send-off"></iconify-icon></span>

                  <span class=" d-sm-block">Last Unsent Invoices</span>    

                  </a>

               </li>

            </ul>

         </div>

      </div>

   </div>

</div>

<div class="tabcontenttable_area">

   <div class="container">

      <!-- Tab panes -->

      <div class="tab-content  text-muted">

         <div class="tab-pane active" id="home-1" role="tabpanel">

            <div class="row">

               <div class="customblck_card bggredient">

                  <div class="blcard_header">

                     <h3 class="blcard_header_title">All Invoices</h3>

                     <div class="filters_innertable">

                        <h1>Add Filters</h1>

                        <div class="filters_table_">

                           <div class="filterbtn_tabletr">

                              <button type="button" class="ft_buttonshoover">Inv Number</button>

                              <button type="button" class="ft_buttonshoover">Unsent</button>

                              <button type="button" class="ft_buttonshoover">Part-paid</button>

                              <button type="button" class="ft_buttonshoover">Over-due</button>

                           </div>

                        </div>

                     </div>

                  </div>

                  <div class="blcard_body">

                     <div class="datatable-container allinvoice_table custom_table_area">

                        <table id="allinvoice_table" class="display">

                           <thead>

                              <tr>

                                 <th class="sortable ">

                                    <div class="arrow_box">

                                       <span>S.No.</span>

                                    </div>

                                 </th>

                                 <th class="sortable ">

                                    <div class="arrow_box">

                                       <span>Invoice No.</span>

                                    </div>

                                 </th>

                                 <th class="sortable">

                                    <div class="arrow_box">

                                       <span>Patient</span>

                                    </div>

                                 </th>

                                 <th class="sortable">

                                    <div class="arrow_box">

                                       <span>Amount </span>

                                    </div>

                                 </th>

                                 <th class="sortable">

                                    <div class="arrow_box">

                                       <span>Status</span>

                                    </div>

                                 </th>

                                 <th class="sortable">

                                    <div class="arrow_box">

                                       <span>Balance</span>

                                    </div>

                                 </th>

                                 <th class="sortable">

                                    <div class="arrow_box">

                                       <span>Sent</span>

                                    </div>

                                 </th>

                                 <th class="sortable">

                                    <div class="arrow_box">

                                       <span>Action</span>

                                    </div>

                                 </th>

                              </tr>

                           </thead>

                           <tbody>

                              <tr>

                                 <td>1</td>

                                 <td>RUHF5TJ</td>

                                 <td>

                                    <div class="flex-grow-1">Vihan Hudda</div>

                                 </td>

                                 <td>AED 100</td>

                                 <td>

                                    <div class="statusuccess_itgt">

                                       <div class="activecircle">

                                          <div class="mini_circlegreen"></div>

                                       </div>

                                       Paid

                                    </div>

                                 </td>

                                 <td> AED 100.00</td>

                                 <td >

                                    <div class="form-check">

                                       <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">

                                       <label class="form-check-label" for="flexCheckDefault">

                                       </label>

                                    </div>

                                 </td>

                                 <!-- <td>

                                    <div class="customactions_dt">

                                        <ul>

                                          <li>

                                              <div class="comonactionbtn copybtn">

                                              <iconify-icon icon="tabler:note"></iconify-icon>

                                              </div>

                                          </li>

                                          <li>

                                          <div class="comonactionbtn dollarbtn">

                                          <iconify-icon icon="pepicons-pop:dollar"></iconify-icon>

                                              </div>

                                         

                                          </li>

                                          <li>

                                          <div class="comonactionbtn printbtnacti">

                                          <iconify-icon icon="ion:print-outline"></iconify-icon>

                                              </div>

                                         

                                          </li>

                                        </ul>

                                    </div>

                                    </td> -->

                                 <td>

                                    <div class="customactions_dt">

                                       <ul>

                                          <li data-bs-toggle="offcanvas" data-bs-target="#user-invoice" aria-controls="offcanvasBottom">

                                             <div class="comonactionbtn copybtn">

                                                <img src="images/new-images/note.gif" alt="">

                                             </div>

                                          </li>

                                          <li data-bs-toggle="offcanvas" data-bs-target="#user-invoice" aria-controls="offcanvasBottom">

                                             <div class="comonactionbtn dollarbtn">

                                                <img src="images/new-images/speech-bubble.gif" alt="">

                                             </div>

                                          </li>

                                          <li>

                                             <a href="print-invoice.php" target="_blank">

                                                <div class="comonactionbtn printbtnacti">

                                                   <img src="images/new-images/printer.gif" alt="">

                                                </div>

                                             </a>

                                          </li>

                                          <li>

                                             <div class="comonactionbtn printbtnacti">

                                                <img src="images/new-images/trash-bin.gif" alt="">

                                             </div>

                                          </li>

                                       </ul>

                                    </div>

                                 </td>

                              </tr>

                              <tr>

                                 <td>2</td>

                                 <td>AHDF5TJ</td>

                                 <td>

                                    <div class="flex-grow-1">Jansh Brown </div>

                                 </td>

                                 <td>AED 3000</td>

                                 <td>

                                    <div class="statusuccess_itgt">

                                       <div class="activecircle">

                                          <div class="mini_circlegreen"></div>

                                       </div>

                                       Paid

                                    </div>

                                 </td>

                                 <td> AED 00.00</td>

                                 <td >

                                    <div class="form-check">

                                       <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">

                                       <label class="form-check-label" for="flexCheckDefault">

                                       </label>

                                    </div>

                                 </td>

                                 <td>

                                    <div class="customactions_dt">

                                       <ul>

                                          <li data-bs-toggle="offcanvas" data-bs-target="#user-invoice" aria-controls="offcanvasBottom">

                                             <div class="comonactionbtn copybtn">

                                                <img src="images/new-images/note.gif" alt="">

                                             </div>

                                          </li>

                                          <li data-bs-toggle="offcanvas" data-bs-target="#user-invoice" aria-controls="offcanvasBottom">

                                             <div class="comonactionbtn dollarbtn">

                                                <img src="images/new-images/speech-bubble.gif" alt="">

                                             </div>

                                          </li>

                                          <li>

                                             <a href="print-invoice.php" target="_blank">

                                                <div class="comonactionbtn printbtnacti">

                                                   <img src="images/new-images/printer.gif" alt="">

                                                </div>

                                             </a>

                                          </li>

                                          <li>

                                             <div class="comonactionbtn printbtnacti">

                                                <img src="images/new-images/trash-bin.gif" alt="">

                                             </div>

                                          </li>

                                       </ul>

                                    </div>

                                 </td>

                              </tr>

                              <tr>

                                 <td>3</td>

                                 <td>KNBH5TJ</td>

                                 <td>

                                    <div class="flex-grow-1">Prezy Mark </div>

                                 </td>

                                 <td>AED 0</td>

                                 <td>

                                    <div class="statusuccess_itgt">

                                       <div class="activecircle">

                                          <div class="mini_circlegreen"></div>

                                       </div>

                                       Paid

                                    </div>

                                 </td>

                                 <td>AED 15,000.00</td>

                                 <td >

                                    <div class="form-check">

                                       <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">

                                       <label class="form-check-label" for="flexCheckDefault">

                                       </label>

                                    </div>

                                 </td>

                                 <td>

                                    <div class="customactions_dt">

                                       <ul>

                                          <li data-bs-toggle="offcanvas" data-bs-target="#user-invoice" aria-controls="offcanvasBottom">

                                             <div class="comonactionbtn copybtn">

                                                <img src="images/new-images/note.gif" alt="">

                                             </div>

                                          </li>

                                          <li data-bs-toggle="offcanvas" data-bs-target="#user-invoice" aria-controls="offcanvasBottom">

                                             <div class="comonactionbtn dollarbtn">

                                                <img src="images/new-images/speech-bubble.gif" alt="">

                                             </div>

                                          </li>

                                          <li>

                                             <a href="print-invoice.php" target="_blank">

                                                <div class="comonactionbtn printbtnacti">

                                                   <img src="images/new-images/printer.gif" alt="">

                                                </div>

                                             </a>

                                          </li>

                                          <li>

                                             <div class="comonactionbtn printbtnacti">

                                                <img src="images/new-images/trash-bin.gif" alt="">

                                             </div>

                                          </li>

                                       </ul>

                                    </div>

                                 </td>

                              </tr>

                              <tr>

                                 <td>4</td>

                                 <td>KJHN5TJ</td>

                                 <td>

                                    <div class="flex-grow-1">Vihan Hudda</div>

                                 </td>

                                 <td>AED 132</td>

                                 <td>

                                    <div class="statusinactive_itgt">

                                       <div class="activecircle">

                                          <div class="mini_circlegreen"></div>

                                       </div>

                                       Unpaid

                                    </div>

                                 </td>

                                 <td>AED 0.00</td>

                                 <td >

                                    <div class="form-check">

                                       <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">

                                       <label class="form-check-label" for="flexCheckDefault">

                                       </label>

                                    </div>

                                 </td>

                                 <td>

                                    <div class="customactions_dt">

                                       <ul>

                                          <li data-bs-toggle="offcanvas" data-bs-target="#user-invoice" aria-controls="offcanvasBottom">

                                             <div class="comonactionbtn copybtn">

                                                <img src="images/new-images/note.gif" alt="">

                                             </div>

                                          </li>

                                          <li data-bs-toggle="offcanvas" data-bs-target="#user-invoice" aria-controls="offcanvasBottom">

                                             <div class="comonactionbtn dollarbtn">

                                                <img src="images/new-images/speech-bubble.gif" alt="">

                                             </div>

                                          </li>

                                          <li>

                                             <a href="print-invoice.php" target="_blank">

                                                <div class="comonactionbtn printbtnacti">

                                                   <img src="images/new-images/printer.gif" alt="">

                                                </div>

                                             </a>

                                          </li>

                                          <li>

                                             <div class="comonactionbtn printbtnacti">

                                                <img src="images/new-images/trash-bin.gif" alt="">

                                             </div>

                                          </li>

                                       </ul>

                                    </div>

                                 </td>

                              </tr>

                           </tbody>

                        </table>

                     </div>

                     <!-- table end -->

                  </div>

               </div>

            </div>

         </div>

         <div class="tab-pane" id="profile-1" role="tabpanel">

            <div class="row">

               <div class="customblck_card bggredient">

                  <div class="blcard_header">

                     <h3 class="blcard_header_title">To Invoice</h3>

                     <div class="commonselect_slt patient_select_drop">

                        <h2>Select a patient to start.. </h2>

                        <select name="" id="" class="comon_selectrtj">

                           <option value="">MEDICAL LAZER DEVICE</option>

                           <option value="">MEDICAL DEVICE </option>

                           <option value="">MEDICAL LAZER  DEVICE </option>

                        </select>

                     </div>

                  </div>

                  <div class="blcard_body">

                     <div class="toinv_table searchhere_tabletext custom_table_area">

                        <table class="table mobileresponsive_table  dt-responsive">

                           <thead>

                              <tr>

                                 <th scope="col">Item</th>

                                 <th scope="col">Date</th>

                                 <th scope="col">Cost</th>

                                 <th scope="col">Action</th>

                              </tr>

                           </thead>

                           <tbody>

                             <!-- NOTE: We have used data-title in td for mobile responsive table do not relove this data-title from td -->



                              <tr>

                                 <td data-title="Item">

                                    <div class="item_details_tb">

                                       <h2>Treatment </h2>

                                       <span>MEDICAL LAZER  DEVICE | DOB: 1/01/11</span>

                                    </div>

                                 </td>

                                 <td data-title="Date">Oct 21, 2023 </td>

                                 <td data-title="Cost">

                                    <div class="discount_inputvt">

                                       <input type="text" class="form-control comoninpt_border" value="100.00"> 

                                       <input type="text" class="form-control comoninpt_border numericInput" placeholder=" % Discount" oninput="validateInput(this)" onkeypress="return isNumberKey(event)">

                                       <button id="applyButton" onclick="applyFunction(this)">Apply</button>

                                    </div>

                                 </td>

                                 <td data-title="Action">

                                    <div class="dltwh_check">

                                       <div class="deletebtn_prtientgh">

                                          <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>

                                       </div>

                                       <div class="round_custom">

                                          <input type="checkbox"  id="checkbox3" />

                                          <label for="checkbox3"></label>

                                       </div>

                                    </div>

                                 </td>

                              </tr>

                              <tr>

                                 <td data-title="Item">

                                    <div class="item_details_tb">

                                       <h2>Demo </h2>

                                       <span>MEDICAL LAZER  DEVICE | DOB: 1/01/11</span>

                                    </div>

                                 </td>

                                 <td data-title="Date">Oct 21, 2023 </td>

                                 <td data-title="Cost">

                                    <div class="discount_inputvt">

                                       <input type="text" class="form-control comoninpt_border" value="100.00"> 

                                       <input type="text" class="form-control comoninpt_border numericInput" placeholder=" % Discount" oninput="validateInput(this)" onkeypress="return isNumberKey(event)">

                                       <button id="applyButton" onclick="applyFunction(this)">Apply</button>

                                    </div>

                                 </td>

                                 <td data-title="Action">

                                    <div class="dltwh_check">

                                       <div class="deletebtn_prtientgh">

                                          <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>

                                       </div>

                                       <div class="round_custom">

                                          <input type="checkbox"  id="checkbox2" />

                                          <label for="checkbox2"></label>

                                       </div>

                                    </div>

                                 </td>

                              </tr>

                              <tr>

                                 <td data-title="item">

                                    <div class="item_details_tb">

                                       <h2>Demo2 </h2>

                                       <span>MEDICAL LAZER  DEVICE | DOB: 1/01/11</span>

                                    </div>

                                 </td>

                                 <td data-title="Date">Oct 21, 2023 </td>

                                 <td data-title="Cost">

                                    <div class="discount_inputvt">

                                       <input type="text" class="form-control comoninpt_border" value="100.00"> 

                                       <input type="text" class="form-control comoninpt_border numericInput" placeholder=" % Discount" oninput="validateInput(this)" onkeypress="return isNumberKey(event)">

                                       <button id="applyButton" onclick="applyFunction(this)">Apply</button>

                                    </div>

                                 </td>

                                 <td data-title="Action">

                                    <div class="dltwh_check">

                                       <div class="deletebtn_prtientgh">

                                          <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>

                                       </div>

                                       <div class="round_custom">

                                          <input type="checkbox"  id="checkbox1" />

                                          <label for="checkbox1"></label>

                                       </div>

                                    </div>

                                 </td>

                              </tr>

                           </tbody>

                        </table>

                     </div>

                     <!-- table end -->



                     <div class="selected_patient_list">

                        <h2>Selected Items - <div class="alertslted_text">Ensure these belong to the same patient before generating invoice!</div></h2>

                          <ul>

                           <li>

                           <div class="item_details_tb">

                                       <h2>Treatment </h2>

                                       <span>MEDICAL LAZER  DEVICE | DOB: 1/01/11</span>

                                    </div>



                                    <div class="slted_date">Oct 21, 2023 </div>



                                    <div class="selted_inpt">

                                    <div class="discount_inputvt">

                                       <input type="text" class="form-control comoninpt_border" value="100.00"> 

                                    </div>

                                    </div>

                           </li>

                          </ul>



                          <div class="createinvoice_selectitem">

                          <div class="selted_inpt">

                                    <div class="discount_inputvt">

                                       <input type="text" class="form-control comoninpt_border" value="% Discount on Total"> 

                                    </div>

                                    </div>



                                    <div class="cret_buttonart">

                                       <button type="button">Create Invoice With Selected Items</button>

                                    </div>

                          </div>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <div class="tab-pane" id="messages-1" role="tabpanel">

            <div class="row">

            <div class="blcard_header">

                     <div class="stats_charts_title">

                     <h2>Invoice Stats</h2>

                  </div>

                  </div>

                  

               <div class="col-lg-12">

                 



                  <div class="charts_multiarea">

                     <div class="row">

                        <div class="col-lg-6">

                             <div class="total_invoices_graph">

                            

                             <div id="chart"></div>



                             </div>

                        </div>

                        <div class="col-lg-6">

                             <div class="total_invoices_graph">

                             <div id="chart2"></div>

                             </div>

                        </div>

                     </div>

                  </div>

               </div>

            </div>

         </div>

         <div class="tab-pane" id="settings-1" role="tabpanel">



         <div class="row">

               <div class="customblck_card">

               <div class="blcard_header">

                     <h3 class="blcard_header_title">Unsent Invoices</h3>

                  </div>

                  <div class="blcard_body">

                     <div class="searchhere_tabletext unsent_table custom_table_area">

                        <table class="table datatable mobileresponsive_table  unsentinvoice_table">

                           <thead>

                              <tr>

                                 <th scope="col">Patient</th>

                                 <th scope="col">Insurer</th>

                                 <th scope="col">Invoice Date</th>

                                 <th scope="col">Invoice No. </th>

                                 <th scope="col">Invoice Total</th>

                                 <th scope="col">Invoice Item & Cost</th>

                              </tr>

                           </thead>

                           <tbody>

                              <!-- NOTE: We have used data-title in td for mobile responsive table do not relove this data-title from td -->

                              <tr>

                                 <td data-title="Patient">

                                    <div class="user_patien_name_dr">

                                         <p>FATIMA MOHAMED ALMAIL DOB 10/10/1961</p>

                                         <p> UNITED ARAB EMIRATES</p>

                                         <p>0567373310</p>

                                    </div>

                                 </td>

                                 <td data-title="Insurer">Self Pay</td>

                                 <td data-title="Invoice Date">

                                 Nov 26, 2022

                                 </td>

                                 <td data-title="Invoice No.">AHDF5TJ</td>

                                 <td data-title="Invoice Total">

                                 €456.00

                                 </td>

                                 <td data-title="Invoice Item & Cost"> <div class="itm_cst_box">26/11/22 CONSULTATION/Interventional Radiology QASTARAT & DAWALI CLINICS | £500.00</div></td>

                              </tr>



                              <tr>

                              <td data-title="Patient">

                                    <div class="user_patien_name_dr">

                                         <p>FATIMA MOHAMED ALMAIL DOB 10/10/1961</p>

                                         <p> UNITED ARAB EMIRATES</p>

                                         <p>0567373310</p>

                                    </div>

                                 </td>

                                 <td data-title="Insurer">Self Pay</td>

                                 <td data-title="Invoice Date">

                                 Nov 26, 2022

                                 </td>

                                 <td data-title="Invoice No.">AHDF5TJ</td>

                                 <td data-title="Invoice Total">

                                 €206.00

                                 </td>

                                 <td data-title="Invoice Item & Cost"> <div class="itm_cst_box">26/11/22 CONSULTATION/Interventional Radiology QASTARAT & DAWALI CLINICS | £500.00</div></td>

                              </tr>





                              <tr>

                              <td data-title="Patient">

                                    <div class="user_patien_name_dr">

                                         <p>FATIMA MOHAMED ALMAIL DOB 10/10/1961</p>

                                         <p> UNITED ARAB EMIRATES</p>

                                         <p>0567373310</p>

                                    </div>

                                 </td>

                                 <td data-title="Insurer">Self Pay</td>

                                 <td data-title="Invoice Date">

                                 Nov 26, 2022

                                 </td>

                                 <td data-title="Invoice No.">AHDF5TJ</td>

                                 <td data-title="Invoice Total">

                                 €170.00

                                 </td>

                                 <td data-title="Invoice Item & Cost"> <div class="itm_cst_box">26/11/22 CONSULTATION/Interventional Radiology QASTARAT & DAWALI CLINICS | £500.00</div></td>

                              </tr>



                              <tr>

                              <td data-title="Patient">

                                    <div class="user_patien_name_dr">

                                         <p>FATIMA MOHAMED ALMAIL DOB 10/10/1961</p>

                                         <p> UNITED ARAB EMIRATES</p>

                                         <p>0567373310</p>

                                    </div>

                                 </td>

                                 <td data-title="Insurer">Self Pay</td>

                                 <td data-title="Invoice Date">

                                 Nov 26, 2022

                                 </td>

                                 <td data-title="Invoice No.">AHDF5TJ</td>

                                 <td data-title="Invoice Total">

                                 €300.00

                                 </td>

                                 <td data-title="Invoice Item & Cost"> <div class="itm_cst_box">26/11/22 CONSULTATION/Interventional Radiology QASTARAT & DAWALI CLINICS | £500.00</div></td>

                              </tr>

                           </tbody>

                        </table>

                     </div>

                     <!-- table end -->



                     

                  </div>

               </div>

            </div>





         </div>

      </div>

   </div>

</div>





@push('custom-js')

			

<!-- invoice datatable -->

<script>

   $('#allinvoice_table').DataTable({ 

      scrollX: true,

      "pagingType": "simple_numbers",

      "language": {

         "paginate": {

            "previous": '<iconify-icon icon="radix-icons:double-arrow-left"></iconify-icon>',

            "next": '<iconify-icon icon="radix-icons:double-arrow-right"></iconify-icon>'

         }

      }

   });

</script>

<!-- end -->

<!-- unsent invoice data table -->

<script>

   $('.unsentinvoice_table').DataTable({ 

    

      "pagingType": "simple_numbers",

      "language": {

         "paginate": {

            "previous": '<iconify-icon icon="radix-icons:double-arrow-left"></iconify-icon>',

            "next": '<iconify-icon icon="radix-icons:double-arrow-right"></iconify-icon>'

         }

      }

   });

</script>

<!-- end -->







<!-- data table searchbar style js -->

<script>

   $(document).ready(function() {

   

   // Iterate through each DataTable

   $('.datatable-container , .toinv_table , .unsent_table').each(function() {

     const $searchLabel = $(this).find('.dataTables_filter label');

     const $searchInput = $(this).find('.dataTables_filter input');

   

     // Add the search icon (Font Awesome in this example)

     $searchLabel.prepend('<i class="fas fa-search"></i>');

   

      // Update the search filter for each DataTable

   $('.allinvoice_table').each(function() {

     const $searchInput = $(this).find('.dataTables_filter input');

   

     // Add a placeholder text to the input field

     $searchInput.attr('placeholder', 'Search Patient...');

   

   

   });

   

      // Update the search filter for each DataTable

      $('.searchhere_tabletext').each(function() {

     const $searchInput = $(this).find('.dataTables_filter input');

   

     // Add a placeholder text to the input field

     $searchInput.attr('placeholder', 'Search here...');

   

   

   });

     

   });

   });

</script>

<!-- data table searchbar style js end -->





<!-- to invoice table discount input validation -->

<script>

   function validateInput(input) {

     var applyButton = input.nextElementSibling;

     var inputValue = input.value.trim();

   

     // Check if the input value is a valid number

     if (/^\d+$/.test(inputValue)) {

       applyButton.style.display = 'inline-block';

     } else {

       applyButton.style.display = 'none';

     }

   }

   

   function isNumberKey(evt) {

     var charCode = (evt.which) ? evt.which : event.keyCode;

     if (charCode > 31 && (charCode < 48 || charCode > 57)) {

       return false;

     }

     return true;

   }

   

   function applyFunction(button) {

     var input = button.previousElementSibling;

     var value = input.value;

   

     alert('Applying with the value: ' + value);

     // You can add your logic here to handle the applied action

   }

</script>

<!-- to invoice table discount input validation end-->





<!-- createinvoice hide show js -->



<script>

   $(".round_custom label").click(function(){

       $(".selected_patient_list").toggle();

   })

</script>







<!-- stats charts js -->

<script>

    // Wait for the document to be ready

    $(document).ready(function () {

        // Prepare data for the chart

        var invoiceData = [

            { month: 'Jan', count: 15 },

            { month: 'Feb', count: 10 },

            { month: 'Mar', count: 8 },

            { month: 'Apr', count: 12 },

            { month: 'May', count: 20 },

            { month: 'Jun', count: 18 },

            { month: 'Jul', count: 25 },

            { month: 'Aug', count: 22 },

            { month: 'Sep', count: 16 },

            { month: 'Oct', count: 14 },

            { month: 'Nov', count: 18 },

            { month: 'Dec', count: 30 },

        ];



        // Create an array of months and an array of corresponding invoice counts

        var months = invoiceData.map(item => item.month);

        var counts = invoiceData.map(item => item.count);



        // Calculate the total number of invoices for this month

        var totalInvoicesThisMonth = counts.reduce((sum, count) => sum + count, 0);



        // Initialize the chart

        var options = {

            chart: {

                type: 'bar',

            },

            series: [{

                name: 'Invoices',

                data: counts,

            }],

            xaxis: {

                categories: months,

            },

            annotations: {

                position: 'front',

                xaxis: [{

                    x: months.length - 1, // Show the annotation at the last data point (December)

                    label: {

                        text: `Total Invoices: ${totalInvoicesThisMonth}`,

                        style: {

                            color: '#000',

                            background: '#fff',

                            fontSize: '14px',

                            align: 'center', // Center the title

                        }

                    }

                }]

            }

        };



        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();

    });

</script>



<!-- invoice chart end -->





<!-- // Chart 2: Invoice Status (Bar Chart) -->

<script>

  

    $(document).ready(function () {

        var statusData = [

            { status: 'Paid', count: 60 },

            { status: 'Unpaid', count: 27 },

        ];



        var statuses = statusData.map(item => item.status);

        var statusCounts = statusData.map(item => item.count);



        var totalPaid = statusData.find(item => item.status === 'Paid').count;

        var totalUnpaid = statusData.find(item => item.status === 'Unpaid').count;



        var options2 = {

            chart: {

                type: 'bar',

            },

            series: [{

                name: 'Invoice Status',

                data: statusCounts,

                fill: {

                    colors: ['#4CAF50', '#FFC107'], 

                },

                borderColor: {

                    colors: ['#4CAF50', '#FFC107'], 

                },

            }],

            xaxis: {

                categories: statuses,

            },

            dataLabels: {

                enabled: true,

                formatter: function (val) {

                    return val + '%';

                }

            },

            annotations: {

                position: 'front',

                xaxis: [

                    {

                        x: 0,

                        label: {

                            text: `Total Paid: ${totalPaid}`,

                            style: {

                                color: '#000',

                                background: '#fff',

                                fontSize: '14px',

                                align: 'center',

                                offsetY: -10, // Offset to center vertically

                            }

                        }

                    },

                    {

                        x: 1,

                        label: {

                            text: `Total Unpaid: ${totalUnpaid}`,

                            style: {

                                color: '#000',

                                background: '#fff',

                                fontSize: '14px',

                                align: 'center',

                                offsetY: -10, // Offset to center vertically

                            }

                        }

                    }

                ]

            }

        };



        var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);

        chart2.render();

    });

</script>

@endpush

@endsection