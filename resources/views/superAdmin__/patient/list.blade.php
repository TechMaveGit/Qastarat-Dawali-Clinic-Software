@extends('superAdmin.superAdminLayout.main')
@section('content')
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">All Patients</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Patients</li>
                </ol>
            </nav>
        </div>
          
		</div>
        <section class="content">
        <div class="row">
        <div class="col-12">

<div class="box">
   <div class="box-header with-border">
    <div class="top_area">
    <h3 class="box-title">All Patients</h3>
    <a href="{{ route('patient.create') }}" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add Patient</a>
    </div>
   
   </div>
   <!-- /.box-header -->
   <div class="box-body pt-0">
       <div class="table-main-box">
         <table id="custom_table" class="custom_table table  table-striped table-hover" style="width:100%">
           <thead>
               <tr>
                   <th>Patient Id</th>
                   <th>Patient Name</th>
                   <th>Mobile No.</th>
                   <th>Email Address</th>
                   <th>Postal Code</th>
                   <th>Action</th>
                   
               </tr>
           </thead>
           <tbody>
               <tr>
                   <td>MA760607</td>
                   <td>
                   <div class="patent_detail__">
                    <div class="patient_profile">
                        <img src="images/newimages/avtar.jpg" alt="">
                    </div>
                    <div class="patient_name__dt_">
                        <h6>MOHAMMED ALI AL BADI</h6>
                    </div>
                    </div>
                   </td>
                   <td>9034683478</td>
                   <td>medicallazer@gmail.com</td>
                   <td>04662</td>
                   <td>
                     <div class="btn-group">
                        <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#">View Details</a> -->
                        <a class="dropdown-item" href="{{ route('patient.edit',['patient'=>1]) }}">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                   </td>
              
               </tr>

               <tr>
                   <td>MA760608</td>
                   <td>
                   <div class="patent_detail__">
                    <div class="patient_profile">
                        <img src="images/newimages/avtar.jpg" alt="">
                    </div>
                    <div class="patient_name__dt_">
                        <h6>Sammer Zubair</h6>
                    </div>
                    </div>
                   </td>
                   <td>9034683478</td>
                   <td>medicallazer@gmail.com</td>
                   <td>04662</td>
                   <td>
                     <div class="btn-group">
                        <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#">View Details</a> -->
                        <a class="dropdown-item" href="{{ route('patient.edit',['patient'=>1]) }}">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                   </td>
              
               </tr>
               <tr>
                   <td>MA760609</td>
                   <td>
                   <div class="patent_detail__">
                    <div class="patient_profile">
                        <img src="images/newimages/avtar.jpg" alt="">
                    </div>
                    <div class="patient_name__dt_">
                        <h6>Rihan Abdula</h6>
                    </div>
                    </div>
                   </td>
                   <td>9034683478</td>
                   <td>medicallazer@gmail.com</td>
                   <td>04662</td>
                   <td>
                     <div class="btn-group">
                        <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#">View Details</a> -->
                        <a class="dropdown-item" href="{{ route('patient.edit',['patient'=>1]) }}">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                   </td>
              
               </tr>
               <tr>
                   <td>MA760610</td>
                   <td>
                   <div class="patent_detail__">
                    <div class="patient_profile">
                        <img src="images/newimages/avtar.jpg" alt="">
                    </div>
                    <div class="patient_name__dt_">
                        <h6>Safi Khan</h6>
                    </div>
                    </div>
                   </td>
                   <td>9034683478</td>
                   <td>medicallazer@gmail.com</td>
                   <td>04662</td>
                   <td>
                     <div class="btn-group">
                        <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#">View Details</a> -->
                        <a class="dropdown-item" href="{{ route('patient.edit',['patient'=>1]) }}">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                   </td>
              
               </tr>
               <tr>
                   <td>MA760611</td>
                   <td>
                   <div class="patent_detail__">
                    <div class="patient_profile">
                        <img src="images/newimages/avtar.jpg" alt="">
                    </div>
                    <div class="patient_name__dt_">
                        <h6>Jannat</h6>
                    </div>
                    </div>
                   </td>
                   <td>9034683478</td>
                   <td>medicallazer@gmail.com</td>
                   <td>04662</td>
                   <td>
                     <div class="btn-group">
                        <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#">View Details</a> -->
                        <a class="dropdown-item" href="{{ route('patient.edit',['patient'=>1]) }}">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                   </td>
              
               </tr>
               <tr>
                   <td>MA760612</td>
                   <td>
                   <div class="patent_detail__">
                    <div class="patient_profile">
                        <img src="images/newimages/avtar.jpg" alt="">
                    </div>
                    <div class="patient_name__dt_">
                        <h6>Jhon</h6>
                    </div>
                    </div>
                   </td>
                   <td>9034683478</td>
                   <td>medicallazer@gmail.com</td>
                   <td>04662</td>
                   <td>
                     <div class="btn-group">
                        <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#">View Details</a> -->
                        <a class="dropdown-item" href="{{ route('patient.edit',['patient'=>1]) }}">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                   </td>
              
               </tr>
               <tr>
                   <td>MA760613</td>
                   <td>
                   <div class="patent_detail__">
                    <div class="patient_profile">
                        <img src="images/newimages/avtar.jpg" alt="">
                    </div>
                    <div class="patient_name__dt_">
                        <h6>Zahir Khan</h6>
                    </div>
                    </div>
                   </td>
                   <td>9034683478</td>
                   <td>medicallazer@gmail.com</td>
                   <td>04662</td>
                   <td>
                     <div class="btn-group">
                        <a class="hover-primary dropdown-toggle no-caret" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu">
                        <!-- <a class="dropdown-item" href="#">View Details</a> -->
                        <a class="dropdown-item" href="{{ route('patient.edit',['patient'=>1]) }}">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                     
                   </td>
              
               </tr>
        
           </tbody>
   
       </table>
       </div>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->      
</div>
        </div>
        </section>
        
      </div>
 </div>
@endsection