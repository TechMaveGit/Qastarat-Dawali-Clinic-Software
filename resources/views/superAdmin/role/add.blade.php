@extends('superAdmin.superAdminLayout.main')
<!-- Content Wrapper. Contains page content -->
@push('title')
    <title>Create Role & Permission | Super Admin</title>
@endpush
@section('content')
<div class="content-wrapper">
	  <div class="container-full">
	<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex">
        <h4 class="page-title">Manage Role</h4>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('super-admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Permission</li>
                </ol>
            </nav>
        </div>
          
		</div>
        <section class="content">
        <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <div class="box-header box_h">
                                <div class="top_section_title">
                                    <h5>Add Role</h5>
                                </div>
                            </div>
                        <div class="box-body">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputEmail1">Role Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
     

                                <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Select Users</label>
                                    <select multiple="" class="form-control testselect2" style="width: 100%;">
                                        <option value="">Jhon</option>
                                        <option value="">Saif</option>
                                        <option value="">Amir</option>
                                        <option value="">Junaid Khan</option>

                                    </select>
                                </div>
                                </div>


                                


                            </div>

                        </div>
                        <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="submit_btn text-end">
                                <a href="user-permission.php"><button type="button" class="waves-effect waves-light btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Save</button></a>
                            </div>
                        </div>
                    </div>
                  </div>
                    </div>

                </div>

                <div class="col-lg-12">
            <div class="box">
               <div class="box-header box_h">
                    <div class="top_section_title">
                        <h5>Usages</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
               
                    <th>Menu / Action</th>
                    <th>Usages</th>
                
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                    <td class="text-">Driver</td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck1a">
                        <label class="form-check-label" for="autoSizingCheck1a">
                           
                            </label>
                    </div>
                    </td>
                    </tr>
                   
                    <tr>
                    <td class="text-">Internal Staff</td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck1b">
                        <label class="form-check-label" for="autoSizingCheck1b">
                      
                            </label>
                    </div>
                    </td>
                    </tr>
                   
                  


                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="box">
               <div class="box-header box_h">
                    <div class="top_section_title">
                        <h5>Administration</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
               
                    <th>Menu / Action</th>
                    <th>Add</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                    <td class="text-">Manage Role</td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck2a">
                        <label class="form-check-label" for="autoSizingCheck2a">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck2b">
                        <label class="form-check-label" for="autoSizingCheck2b">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck2c">
                        <label class="form-check-label" for="autoSizingCheck2c">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck2d">
                        <label class="form-check-label" for="autoSizingCheck2d">
                           
                            </label>
                    </div>
                    </td>
                    </tr>
                   
                    <tr>
                    <td class="text-">User Access Role</td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck2e">
                        <label class="form-check-label" for="autoSizingCheck2e">
                      
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck2f">
                        <label class="form-check-label" for="autoSizingCheck2f">
                      
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck2g">
                        <label class="form-check-label" for="autoSizingCheck2g">
                      
                            </label>
                    </div>
                    </td>
                    <td>
                  
                    </td>
                    </tr>
                   
                    <tr>
                    <td class="text-">System Configuration</td>
                    <td>
                
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck2f">
                        <label class="form-check-label" for="autoSizingCheck2f">
                      
                            </label>
                    </div>
                    </td>
                    <td>
                    
                    </td>
                    <td>
                  
                    </td>
                    </tr>


                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="box">
               <div class="box-header box_h">
                    <div class="top_section_title">
                        <h5>Person</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
               
                    <th>Menu / Action</th>
                    <th>Add</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                    <td class="text-">Person</td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck4a">
                        <label class="form-check-label" for="autoSizingCheck4a">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck4b">
                        <label class="form-check-label" for="autoSizingCheck4b">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck4c">
                        <label class="form-check-label" for="autoSizingCheck4c">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck4d">
                        <label class="form-check-label" for="autoSizingCheck4d">
                           
                            </label>
                    </div>
                    </td>
                    </tr>
                   
                    <tr>
                    <td class="text-">Document</td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck4e">
                        <label class="form-check-label" for="autoSizingCheck4e">
                      
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck4f">
                        <label class="form-check-label" for="autoSizingCheck4f">
                      
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck4g">
                        <label class="form-check-label" for="autoSizingCheck4g">
                      
                            </label>
                    </div>
                    </td>
                    <td>
                  
                    </td>
                    </tr>
                   
                   


                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="box">
               <div class="box-header box_h">
                    <div class="top_section_title">
                        <h5>Clients</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
               
                    <th>Menu / Action</th>
                    <th>Add</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                    <td class="text-">Client</td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck5a">
                        <label class="form-check-label" for="autoSizingCheck5a">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck5b">
                        <label class="form-check-label" for="autoSizingCheck5b">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck5c">
                        <label class="form-check-label" for="autoSizingChec5ck">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck5d">
                        <label class="form-check-label" for="autoSizingCheck5d">
                           
                            </label>
                    </div>
                    </td>
                    </tr>
                   
                    <tr>
                    <td class="text-">Cost Center</td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck5e">
                        <label class="form-check-label" for="autoSizingCheck5e">
                      
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck5f">
                        <label class="form-check-label" for="autoSizingCheck5f">
                      
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck5g">
                        <label class="form-check-label" for="autoSizingCheck5g">
                      
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck5h">
                        <label class="form-check-label" for="autoSizingCheck5h">
                      
                            </label>
                    </div>
                    </td>
                    </tr>
                   
                    <tr>
                    <td class="text-">Cost Center</td>
                    <td>
                
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck5i">
                        <label class="form-check-label" for="autoSizingCheck5i">
                      
                            </label>
                    </div>
                    </td>
                    <td>
                
                    </td>
                    <td>
                   
                    </td>
                    </tr>


                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="box">
               <div class="box-header box_h">
                    <div class="top_section_title">
                        <h5>Vehicle</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
               
                    <th>Menu / Action</th>
                    <th>Add</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                    <td class="text-">Vehicle</td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck6a">
                        <label class="form-check-label" for="autoSizingCheck6a">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck6b">
                        <label class="form-check-label" for="autoSizingCheck6b">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck6c">
                        <label class="form-check-label" for="autoSizingCheck6c">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck6d">
                        <label class="form-check-label" for="autoSizingCheck6d">
                           
                            </label>
                    </div>
                    </td>
                    </tr>
                   
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="box">
               <div class="box-header box_h">
                    <div class="top_section_title">
                        <h5>Inspection</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
               
                    <th>Menu / Action</th>
                    <th>Add</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                    <td class="text-">Inspection</td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck7a">
                        <label class="form-check-label" for="autoSizingCheck7a">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                 
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck7b">
                        <label class="form-check-label" for="autoSizingCheck7b">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                 
                    </td>
                    </tr>
                   
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="box">
               <div class="box-header box_h">
                    <div class="top_section_title">
                        <h5>Induction</h5>
                    </div>
                </div>
                <div class="box-body box_body_h">
                <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                    <thead>
                    <tr>
               
                    <th>Menu / Action</th>
                    <th>Add</th>
                    <th>Edit</th>
                    <th>View</th>
                    <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                    <td class="text-">Induction</td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck7c">
                        <label class="form-check-label" for="autoSizingCheck7c">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck7d">
                        <label class="form-check-label" for="autoSizingCheck7d">
                           
                            </label>
                    </div>
                    </td>
                    <td>
                 
                    </td>
                    <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="autoSizingCheck7e">
                        <label class="form-check-label" for="autoSizingCheck7e">
                           
                            </label>
                    </div>
                    </td>
                    </tr>
                    <tr>
                    <td class="text-">Induction Driver</td>
                    <td>
                
                    </td>
            