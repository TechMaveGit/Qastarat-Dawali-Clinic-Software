<?php include "header.php" ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">Manage Role</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Permission</li>
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
    <h3 class="box-title">All Roles & Permission</h3>
    <a href="role-add.php" class="waves-effect waves-light btn btn-md btn-primary"><i class="fa-solid fa-plus"></i> Add New Role</a>
    </div>
   
   </div>
   <!-- /.box-header -->
   <div class="box-body pt-0">
       <div class="table-main-box">
         <table id="custom_table" class="custom_table table  table-striped table-hover" style="width:100%">
         <thead class="border-top">
                                <tr>
                                  
                                    <th class="bg-transparent border-bottom-0">Role Name</th>
                                    
                                    <th class="bg-transparent border-bottom-0" style="width: 5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-bottom">
                                 
                                    <td>Admin</td>
                               
                                 
                                    <td>
                                    <ul class="action_icons">
                        <!-- <li >
                            <a href="#" class="waves-effect waves-light btn btn-rounded btn-info-light "><i data-feather="eye"></i></a>
                        </li> -->
                        <li>
                                <a href="role-edit.php" class="waves-effect waves-light btn btn-rounded btn-warning-light"><i data-feather="edit"></i></a>
                            </li>
                            <!-- <li>
                                <a href="#" class="waves-effect waves-light btn btn-rounded btn-danger-light"><i  data-feather="trash-2"></i></a>
                            </li> -->
                        </ul>
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                 
                                 <td>Super Admin</td>
                               
                                
                                 <td>
                                 <ul class="action_icons">
                        <!-- <li >
                            <a href="#" class="waves-effect waves-light btn btn-rounded btn-info-light "><i data-feather="eye"></i></a>
                        </li> -->
                        <li>
                                <a href="role-edit.php" class="waves-effect waves-light btn btn-rounded btn-warning-light"><i data-feather="edit"></i></a>
                            </li>
                            <!-- <li>
                                <a href="#" class="waves-effect waves-light btn btn-rounded btn-danger-light"><i  data-feather="trash-2"></i></a>
                            </li> -->
                        </ul>
                                 </td>
                             </tr>
                             <tr class="border-bottom">
                                 
                                    <td>Driver</td>
                                 
                                
                                    <td>
                                    <ul class="action_icons">
                        <!-- <li >
                            <a href="#" class="waves-effect waves-light btn btn-rounded btn-info-light "><i data-feather="eye"></i></a>
                        </li> -->
                        <li>
                                <a href="role-edit.php" class="waves-effect waves-light btn btn-rounded btn-warning-light"><i data-feather="edit"></i></a>
                            </li>
                            <!-- <li>
                                <a href="#" class="waves-effect waves-light btn btn-rounded btn-danger-light"><i  data-feather="trash-2"></i></a>
                            </li> -->
                        </ul>
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                 
                                    <td>Staff</td>
                                  
                                   
                                    <td>
                                    <ul class="action_icons">
                        <!-- <li >
                            <a href="#" class="waves-effect waves-light btn btn-rounded btn-info-light "><i data-feather="eye"></i></a>
                        </li> -->
                        <li>
                                <a href="role-edit.php" class="waves-effect waves-light btn btn-rounded btn-warning-light"><i data-feather="edit"></i></a>
                            </li>
                            <!-- <li>
                                <a href="#" class="waves-effect waves-light btn btn-rounded btn-danger-light"><i  data-feather="trash-2"></i></a>
                            </li> -->
                        </ul>
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                 
                                 <td>Sub Admin</td>
                                
                           <td>
                                 <ul class="action_icons">
                        <!-- <li >
                            <a href="#" class="waves-effect waves-light btn btn-rounded btn-info-light "><i data-feather="eye"></i></a>
                        </li> -->
                        <li>
                                <a href="role-edit.php" class="waves-effect waves-light btn btn-rounded btn-warning-light"><i data-feather="edit"></i></a>
                            </li>
                            <!-- <li>
                                <a href="#" class="waves-effect waves-light btn btn-rounded btn-danger-light"><i  data-feather="trash-2"></i></a>
                            </li> -->
                        </ul>
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
 <?php include "footer.php" ?>