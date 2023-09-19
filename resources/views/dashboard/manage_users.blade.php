@extends('layouts.master')

@push('css')
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
                        <h1>Manage Users</h1>
                    </div>
                    <div class="search_form">
                        <form action="">
                            <div class="txt_field">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input class="form-control" type="text" placeholder="Search">
                            </div>
                            <!-- <div class="search_btn">
                                <input class="btn btn_primary" type="submit" value="Search">
                            </div> -->
                            <div class="filter_btn">
                                <a class="btn btn_primary" href="javascript:void(0)" data-toggle="modal" data-target="#upload_csv_modal">
                                    Upload CSV
                                </a>
                            </div>
                            <div class="add_sticker_btn">
                                <a class="btn btn_primary" href="javascript:void(0)" data-toggle="modal" data-target="#add_users_modal">Add User</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dash_orderDetails_sec">
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
            <div class="col-md-12 col-lg-12 col-xs-12">
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
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Joined Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php for ($x = 0; $x <= 6; $x++) { ?>
                                <tr>
                                    <td>
                                        <div class="custom_checkbox">
                                            <input id="chk_<?php echo $x ?>" type="checkbox" name="" id="">
                                            <label class="custom_check" for="chk_<?php echo $x ?>"></label>
                                        </div>
                                    </td>
                                    <td>John Smith</td>
                                    <td>jahmed@datalushq.com</td>
                                    <td>2022-11-02  |  07:29:24</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle action_btn" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit_users_modal">Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#delete_confirm_modal">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <!-- <tr>
                                    <td>
                                        <div class="custom_checkbox">
                                            <input id="chk_2" type="checkbox" name="" id="">
                                            <label class="custom_check" for="chk_2"></label>
                                        </div>
                                    </td>
                                    <td>John Smith</td>
                                    <td>jahmed@datalushq.com</td>
                                    <td>2022-11-02  |  07:29:24</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle action_btn" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom_checkbox">
                                            <input id="chk_3" type="checkbox" name="" id="">
                                            <label class="custom_check" for="chk_3"></label>
                                        </div>
                                    </td>
                                    <td>John Smith</td>
                                    <td>jahmed@datalushq.com</td>
                                    <td>2022-11-02  |  07:29:24</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle action_btn" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom_checkbox">
                                            <input id="chk_4" type="checkbox" name="" id="">
                                            <label class="custom_check" for="chk_4"></label>
                                        </div>
                                    </td>
                                    <td>John Smith</td>
                                    <td>jahmed@datalushq.com</td>
                                    <td>2022-11-02  |  07:29:24</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle action_btn" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="custom_checkbox">
                                            <input id="chk_5" type="checkbox" name="" id="">
                                            <label class="custom_check" for="chk_5"></label>
                                        </div>
                                    </td>
                                    <td>John Smith</td>
                                    <td>jahmed@datalushq.com</td>
                                    <td>2022-11-02  |  07:29:24</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle action_btn" type="button"
                                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
<script src="{{asset('js/db1.js')}}"></script>

<script>
    jQuery(".upload_csv_input").on("change", function(e){
        var fileName = e.target.files[0].name;
        // alert(fileName);
        jQuery("#upload_csv_modal .inner_section_upload_field .upload_field .file_name").html(fileName);
    });
</script>

@endpush