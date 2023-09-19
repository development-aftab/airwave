@extends('layouts.master')

@push('css')

<link href="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('plugins/components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('plugins/components/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}"
    rel="stylesheet" />

<style>
    .info-box .info-count {
        margin-top: 0px !important;
    }
</style>
@endpush

@section('content')

<section class="dash_heading_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_heading_wrapper">
                    <div class="top_heading">
                        <h1>Add Groups</h1>
                    </div>
                    <div class="search_form">
                        <form action="">
                            <!-- <div class="txt_field">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input class="form-control" type="text" placeholder="Search">
                            </div> -->
                            <!-- <div class="search_btn">
                                <input class="btn btn_primary" type="submit" value="Search">
                            </div> -->
                            <!-- <div class="filter_btn">
                                <a class="btn btn_primary" href="javascript:void(0)">
                                    Add Group
                                </a>
                            </div> -->
                            <!-- <div class="add_sticker_btn">
                                <a class="btn btn_primary" href="javascript:void(0)" data-toggle="modal" data-target="#add_users_modal">Add User</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dash_orderDetails_sec add_groups_sec">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_heading_wrapper">
                    <div class="top_heading">
                        <h1>Recent Emails</h1>
                    </div>
                    <div class="btn_sec">
                        <a class="btn btn_primary" href="#!">View All</a>
                    </div>
                </div>
            </div> -->
            <div class="col-md-5 col-lg-5 col-xs-12">
                <div class="inner_section_add_groups white_box">
                    <form action="">
                        <div class="txt_field_white">
                            <label>Group Name</label>
                            <input class="form-control" type="text" name="group_name" id="" placeholder="John Smith">
                        </div>
                        <div class="txt_field_white">
                            <label>Add Users</label>
                            <select class="select2 m-b-10 select2-multiple" name="user_name" multiple="multiple"
                                data-placeholder="Search">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="inner_section_submit_btn">
                            <input class="btn btn_primary" type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7 col-lg-7 col-sm-12">
                <div class="inner_section_users_list white_box">
                    <div class="search_form">
                        <form action="">
                            <div class="txt_field">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input class="form-control" type="text" placeholder="Search">
                            </div>
                        </form>
                    </div>
                    <div class="inner_section_table">
                        <div class="table-responsive">
                            <table class="table table-fixed sticker_table">
                                <thead>
                                    <tr>
                                        <!-- <th>
                                        <div class="checkbox checkbox-info">
                                            <input id="c1" type="checkbox">
                                            <label for="c1"></label>
                                        </div>
                                    </th> -->
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">
                                            <div class="custom_checkbox">
                                                <input id="chk_00" type="checkbox" onClick="toggle(this)" name="" id="">
                                                <label class="custom_check" for="chk_00"></label>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($x = 0; $x <= 6; $x++) { ?>
                                    <tr>
                                        <td>John Smith</td>
                                        <td>jahmed@datalushq.com</td>
                                        <td>
                                            <div class="custom_checkbox">
                                                <input id="chk_<?php echo $x ?>" type="checkbox" name="user_check"
                                                    id="">
                                                <label class="custom_check" for="chk_<?php echo $x ?>"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="inner_section_submit_btn">
                        <a class="btn btn_primary" href="javescript:void(0)">Remove User</a>
                        <!-- <input class="btn btn_primary" type="submit" value="Remove User"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')

<script src="{{asset('plugins/components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>

<script src="{{asset('js/db1.js')}}"></script>

<script language="JavaScript">
    function toggle(source) {
        checkboxes = document.getElementsByName('user_check');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>

<script>
    jQuery(document).ready(function () {
        $(".select2").select2();
        $('.selectpicker').selectpicker();
    });
</script>

<script>
    jQuery(".upload_csv_input").on("change", function (e) {
        var fileName = e.target.files[0].name;
        // alert(fileName);
        jQuery("#upload_csv_modal .inner_section_upload_field .upload_field .file_name").html(fileName);
    });
</script>

@endpush