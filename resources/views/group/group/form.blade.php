@push('css')

<link href="{{asset('plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
    type="text/css" />
{{--<link href="{{asset('plugins/components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />--}}
<link href="{{asset('plugins/components/switchery/dist/switchery.min.css')}}" rel="stylesheet" />
{{--<link href="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" />--}}
<link href="{{asset('plugins/components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}" rel="stylesheet" />
<link href="{{asset('plugins/components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}"
    rel="stylesheet" />

<style>
    .info-box .info-count {
        margin-top: 0px !important;
    }
</style>
@endpush
<div class="row">

<div class="col-md-6">
    <div class="txt_field_white">
        <label for="name" class="col-md-12">{{ 'Name' }}</label>
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <input class="form-control" name="name" type="text" id="name" value="{{ $group->name??''}}" >
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="txt_field_white">
        <label for="status">{{ 'Status' }}</label>
        <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
            <!-- <input class="form-control" name="status" type="text" id="status" value="{{ $group->status??''}}" > -->
            <select class="form-control" name="status" id="status">
                <option value="1">Enable</option>
                <option value="0">Disable</option>
            </select>
            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="txt_field_white">
        <label for="status" class=" ">{{ 'Add user' }}</label>
        <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
        <!-- <div class="txt_field_white">
                            <select multiple class="select2 m-b-10 select2-multiple selectpicker" name="user_name" data-live-search="true" data-live-search-style="contains" title='Select users'>
                                @foreach($user as $users)
            <option value="{{$users->email}}">{{$users->name}}</option>
                                @endforeach
                </select>
            </div> -->
            <select multiple class="select2 m-b-10  selectpicker" name="group_user[]" data-size="5"  data-live-search-style="contains" title='Select Email users'>
                @foreach($user as $users)
                    <option selected value="{{$users->email}}">{{$users->name.' '.$users->email}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="col-md-4">
<div class="form-group">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
</div>
@push('js')

{{--<script src="{{asset('plugins/components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>--}}

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
    jQuery(".upload_csv_input").on("change", function (e) {
        var fileName = e.target.files[0].name;
        // alert(fileName);
        jQuery("#upload_csv_modal .inner_section_upload_field .upload_field .file_name").html(fileName);
    });
</script>
<script>
$(document).ready(function() {
  $('.selectpicker').selectpicker({
    liveSearch: true
  }).on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
    // update selectpicker display after option is unchecked
    $('.selectpickert').selectpicker('refresh');
    if (!isSelected) {
      var options = $(this).find('option:selected');
      $(this).siblings('.dropdown-toggle').children('.filter-option-inner-inner').text(options.toArray().map(option => option.text).join(', '));
      $('.selectpickert').selectpicker('refresh');
    }
  });
});
</script>
@endpush