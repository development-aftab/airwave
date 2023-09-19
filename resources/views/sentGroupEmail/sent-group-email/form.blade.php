<div class="col-md-6 txt_field_white">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>
<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <!-- <input class="form-control" name="group_id" type="number" id="group_id" value="{{ $sentgroupemail->group_id??''}}" > -->
    <select name="group_id" class="form-control" required>
            <option value="">Select Group</option>
        @foreach($send_group as $group)
        @if($group->count<=0)
        @continue
        @endif
        <option value="{{$group->id}}">{{$group->name??''}}</option>
        @endforeach
        </select>
        {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6 txt_field_white">
    <label for="from" class="control-label">{{ 'From' }}</label>
<div class="form-group {{ $errors->has('from') ? 'has-error' : ''}}">
        <input class="form-control" name="from" type="text" id="from" value="contact@airwavedefender.com" readonly >
        {!! $errors->first('from', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6 txt_field_white">
    <label for="subject" class="control-label">{{ 'Subject' }}</label>
<div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
        <input class="form-control" name="subject" type="text" id="subject" value="{{ $sentgroupemail->subject??''}}" >
        {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6 txt_field_white">
    <label for="email_type" class="control-label">{{ 'Email Type' }}</label>
<div class="form-group {{ $errors->has('email_type') ? 'has-error' : ''}}">
        <!-- <input class="form-control" name="email_type" type="text" id="email_type" value="{{ $sentemail->email_type??''}}" required> -->
        <select name="email_type" id="email_type" class="form-control" required>
            <option value="">Select Email Type</option>
            <option value="1">Raw</option>
            <option value="2">Html</option>
        </select>
        {!! $errors->first('email_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-12 txt_field_white">
    <label for="body" class="control-label">{{ 'Body' }}</label>
<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
        <textarea class="form-control" rows="5" name="body" type="textarea" id="body" >{{ $sentgroupemail->body??''}}</textarea>
        {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-4">
<div class="form-group">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
@push('js')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
  CKEDITOR.replace('body');
</script>
@endpush
