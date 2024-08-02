@extends('superAdmin.superAdminLayout.main')
@push('title')
    <title>Add New Radiology Test | Super Admin</title>
@endpush
@section('content')
<style>
    .form-control:disabled,
    .form-control:read-only {
        background-color: #ffffff;
        opacity: 1;
    }
</style>

<div class="content-wrapper">
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex">
                <h4 class="page-title lab_name">Add Appointments & services</h4>
                {{-- <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Appointments & services</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><a href="#">Appointments & services</a></li>

              </ol>
          </nav> --}}
            </div>

        </div>
        <section class="content">
            <div class="row">


                <div class="col-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12 mt-2">
                                    <div class="title_head">
                                        <h4>Add Appointments & services</h4>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Test Name <span class="required">*</span></label>
                                        <input type="text" name="test_name[]" id="test_name" class="form-control"
                                            placeholder="">
                                        <div id="selectTypeId" style="color: red; display: none;">Please Add Test Name.
                                        </div>


                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Test Code <span class="required">*</span></label>
                                        <input type="text" name="test_code[]" name="test_code" id="test_code"
                                            class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Turnaround</label>
                                        <input type="text" name="turnaround[]" id="turnaround" class="form-control"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Price <span class="required">*</span></label>
                                        <input type="number" name="price[]" id="price" step="0.01" min="0"
                                            class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Type <span class="required">*</span></label>
                                        <select class="form-control" id="mulipleType" name="type[]"
                                            style="width: 100%;">
                                            <option value="0">Select Any One</option>
                                            @if($patho_types)
                                            @foreach($patho_types as  $value)
                                                <option value="{{$value}}">{{$value}}</option>
                                            @endforeach
                                            @endif
                                            <option value="Other">Other</option>
                                        </select>
                                        <div id="mulipleTypeInput" hidden>
                                            <input class="form-control" name="mulipleTypeOt" id="mulipleTypeOt" placeholder="Enter New Type Here..." />
                                        </div>

                                        <div id="selectType" style="color: red; display: none;">Please Select Any One Type.</div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label">Included Tests</label>
                                        <textarea rows="2" name="included_tests[]" id="included_tests"
                                            class="form-control" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Note</label>
                                        <textarea rows="2" name="note[]" id="note" maxlength="100" class="form-control"
                                            placeholder=""></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="inner_element">
                                        <div class="form-group">
                                            <label class="form-label">Colour Code</label>
                                            {{-- <img style="min-width:16px;min-height:16px;box-sizing:unset;box-shadow:none;background:unset;padding:0 6px 0 0;cursor:pointer;" src="chrome-extension://ohcpnigalekghcmgcdcenkpelffpdolg/img/icon16.png" title="Select with ColorPick Eyedropper - See advanced option: &quot;Add ColorPick Eyedropper near input[type=color] fields on websites&quot;" class="colorpick-eyedropper-input-trigger"> --}}
                                            <input type="color" name="colour[]" id="colourId"
                                                class="colorpicker form-control" colorpick-eyedropper-active="true">
                                        </div>
                                    </div>
                                </div>

                                <br>
                                </br>




                                <div class="col-lg-12">
                                    <div class="add_price_btn">
                                        <a onclick="addNewRate()" class="icon-link">
                                            <i data-feather="plus-circle"></i>
                                            Add Test
                                        </a>
                                    </div>
                                </div>

                                <form action="{{ route('price.addradiologyPrice') }}" method="post" class="mt-4">
                                    @csrf

                                    <div class="col-lg-12" id="test_list">
                                        <table class="table lab_test table-striped table-hover" style="width:100%">
                                            <thead>
                                                <tr>

                                                    <th>Test Name</th>
                                                    <th>Test Code</th>
                                                    <th>Turnaround</th>
                                                    <th>Price</th>
                                                    <th>Included Tests</th>
                                                    <th>Note</th>
                                                    <th>Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="addNewAppendRate">

                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="submit_btn text-end">
                                            <button type="submit" class="waves-effect waves-light btn btn-primary"><i
                                                    class="fa-regular fa-floppy-disk"></i> Save</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">

                            </div>
                        </div>

                    </div>
                    <!-- /.box -->
                </div>

            </div>
        </section>

    </div>
</div>


@push('custom-js')
<script>



    $("#mulipleType").on('change',function(){

        $("#mulipleTypeInput").attr('hidden',true);
        // $("#mulipleType").attr('hidden',false);
        if($(this).val() == "Other"){
            $("#mulipleTypeInput").attr('hidden',false);
            // $("#mulipleType").attr('hidden',true);
        }
    })

    function addNewRate() {
        let test_name = $("#test_name").val();
        let test_code = $("#test_code").val();
        let turnaround = $("#turnaround").val();
        let price = $("#price").val();
        let included_tests = $("#included_tests").val();
        let note = $("#note").val();
        let colourId = $("#colourId").val();
        let mulipleType = $("#mulipleType").val();
        let mulipleTypeOt = $("#mulipleTypeOt").val();

        let isValid = true;

        // Clear previous errors
        $(".error_show").remove();

        if (test_name === '') {
            $("#test_name").after('<span class="error_show text-danger">This Field Is Required !</span>');
            isValid = false;
        }

        if (test_code === '') {
            $("#test_code").after('<span class="error_show text-danger">This Field Is Required !</span>');
            isValid = false;
        }

        if (!mulipleType || mulipleType == '' || mulipleType == '0') {
            $("#mulipleType").after('<span class="error_show text-danger">This Field Is Required !</span>');
            isValid = false;
        }

        if (price == '') {
            $("#price").after('<span class="error_show text-danger">This Field Is Required !</span>');
            isValid = false;
        }
        

        if (mulipleType == 'Other' && mulipleTypeOt === '') {
            $("#mulipleTypeOt").after('<span class="error_show text-danger">This Field Is Required !</span>');
            isValid = false;
        }

        // if (note === '') {
        //     $("#note").after('<span class="error_show text-danger">This Field Is Required !</span>');
        //     isValid = false;
        // }

        // if (colourId === '') {
        //     $("#colourId").after('<span class="error_show text-danger">This Field Is Required !</span>');
        //     isValid = false;
        // }

        if (!isValid) {
            return false;
        }


        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('price.checkPostCode') }}",
            type: 'POST',
            data: {
                testCode: test_code
            },
            success: function (result) {
                if (result.message === 200) {
                    let microtime = Date.now();
                    let addressHtml = `<tr id="address${microtime}">

                                    <td hidden>
                                        <input name="test_name[]" hidden value="${test_name || ''}">
                                        <input name="test_code[]" hidden value="${test_code}">
                                        <input name="turnaround[]" hidden value="${turnaround}">
                                        <input name="price[]" hidden value="${price}">
                                        <input name="included_tests[]" hidden value="${included_tests}">
                                        <input name="note[]" hidden value="${note}">
                                        <input name="mulipleType[]" hidden value="${mulipleType_1}">
                                        <input name="colourId[]" hidden value="${colourId}">

                                    </td>

                                    <td>
                                        ${test_name}
                                    </td>
                                    <td>
                                        ${test_code}
                                    </td>
                                    <td>
                                       ${turnaround}
                                    </td>
                                    <td>
                                        ${price}
                                    </td>
                                    <td>
                                        ${included_tests}
                                    </td>
                                    <td>
                                        ${note}
                                    </td>
                                    <td>
                                        ${mulipleType}
                                    </td>


                                    <td>
                                    <ul class="action_icons">
                                           <li>
                                                <a href="#" id="remove_test" class="waves-effect waves-light btn btn-rounded btn-danger-light" onclick="deleteTabletr('address${microtime}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                                            </li>
                                        </ul>
                                    </td>
                            </tr>`;
                    $("#addNewAppendRate").append(addressHtml);
                    swal.fire({
                        title: 'Success',
                        html: '<strong>Add Test</strong>',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000 // 1000 milliseconds = 1 second
                    });
                    resetAddress();
                } else {
                    swal.fire({
                        title: 'Error',
                        html: '<strong>This test code is already exist</strong>',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 3000 // 1000 milliseconds = 1 second
                    });
                }
            },
        });
    }

    


    function deleteTabletr(tabletr, filenumber = 'none') {

        swal.fire({
            title: 'Success',
            html: '<strong>Test Delete Successfully</strong>',
            icon: 'success',
            showConfirmButton: false,
            timer: 1000 // 1000 milliseconds = 1 second
        });


        $(`#${tabletr}`).remove();
        if (filenumber != 'none') {
            $(`#documentFilesDocsDiv${filenumber}`).remove();
        }
    }



    function resetAddress() {

        //   $('#resetform')[0].reset();
        $("#test_name").val('');
        $("#test_code").val('');
        $("#turnaround").val('');
        $("#price").val('');
        $("#included_tests").val('');
        $("#note").val('');
        $("#mulipleType").val('0');



        document.getElementById('selectTypeId').style.display = 'none';
        document.getElementById('selectType').style.display = 'none';
    }
</script>

<script>
    $(document).ready(function () {
        $("#test_list").hide();
        $("#add_test").click(function () {
            $("#test_list").show();
        })
        $("#remove_test").click(function () {
            $("#test_list").hide();
        })

    })
</script>


<script>
    // Get the input element by its ID
    const phoneInput = document.getElementById('price');

    // Add an event listener for the keypress event
    phoneInput.addEventListener('keypress', function (event) {
        // Get the value of the pressed key
        const key = event.key;

        // Check if the key pressed is a numeric character (0-9)
        if (!isNumeric(key)) {
            // If it's not a numeric character, prevent the default action (typing the character)
            event.preventDefault();
        }
    });

    // Helper function to check if a character is numeric
    function isNumeric(char) {
        return /^\d+$/.test(char);
    }
</script>

<script>
    // Disable the "Select Any One" option using JavaScript
    document.addEventListener('DOMContentLoaded', function () {
        const selectElement = document.querySelector('select[name="type[]"]');
        const selectAnyOneOption = selectElement.querySelector('option[value="11"]');

        if (selectAnyOneOption) {
            selectAnyOneOption.disabled = true;
        }
    });
</script>
@endpush
@endsection