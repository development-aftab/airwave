<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="txt_field_white {{ $errors->has('name') ? 'has-error' : ''}}">
            <label>{{ 'Name' }}</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $campaign->name??''}}"
                placeholder="Title Here">
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="txt_field_white {{ $errors->has('subject') ? 'has-error' : ''}}">
            <label>{{ 'Subject' }}</label>
            <input class="form-control" type="text" name="subject" id="subject" value="{{ $campaign->subject??''}}"
                placeholder="Subject">
                {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <!-- <div class="col-md-12 col-sm-12">
        <div class="txt_field_white">
            <label>Subject</label>
            <input class="form-control" type="text" name="subject" id="" placeholder="">
        </div>
    </div> -->
    <div class="col-md-12 col-sm-12">
        <div class="txt_field_white {{ $errors->has('body') ? 'has-error' : ''}}">
            <label>Message</label>
            <!-- <div id="editor">{{ $campaign->body??''}}</div> -->
            <textarea class="form-control" rows="5" name="body" type="textarea" id="body" >{{ $campaign->body??''}}</textarea>
            {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="inner_section_submit_btn">
            <!-- <a class="btn btn_primary" href="javescript:void(0)">Remove User</a> -->
            <input class="btn btn_primary" type="submit" value="Create">
        </div>
    </div>
</div>



{{-- <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $campaign->name??''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
    <label for="subject" class="col-md-4 control-label">{{ 'Subject' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="subject" type="text" id="subject" value="{{ $campaign->subject??''}}" >
        {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
    <label for="body" class="col-md-4 control-label">{{ 'Body' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="body" type="textarea" id="body" >{{ $campaign->body??''}}</textarea>
        {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="number" id="status" value="{{ $campaign->status??''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div> 

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div> --}}

@push('js')

<script src="{{asset('plugins/components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
  CKEDITOR.replace('body');
</script>

<script>
    jQuery(document).ready(function () {
        $(".select2").select2();
        $('.selectpicker').selectpicker();
    });
</script>

<script src="{{asset('js/db1.js')}}"></script>

@endpush