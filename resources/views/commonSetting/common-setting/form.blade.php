<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="col-md-4 control-label">{{ 'Title' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="title" type="text" id="title" value="{{ $commonsetting->title??''}}" required>
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('footer_text') ? 'has-error' : ''}}">
    <label for="footer_text" class="col-md-4 control-label">{{ 'Footer Text' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="footer_text" type="textarea" id="footer_text" >{{ $commonsetting->footer_text??''}}</textarea>
        {!! $errors->first('footer_text', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="col-md-4 control-label">{{ 'Description (Meta Tag)' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ $commonsetting->description??''}}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('favicon') ? 'has-error' : ''}}">
    <label for="favicon" class="col-md-4 control-label">{{ 'Favicon' }}</label>
    @include('includes.input_type_file_common_setting',['path'=>asset('').$commonsetting->favicon??'','required'=>'required','nameOrId'=>'favicon','accept_type'=>'image/*'])
    {!! $errors->first('favicon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('dashboard_logo') ? 'has-error' : ''}}">
    <label for="dashboard_logo" class="col-md-4 control-label">{{ 'Dashboard Logo' }}</label>
    @include('includes.input_type_file_common_setting',['path'=>asset('').$commonsetting->dashboard_logo??'','required'=>'required','nameOrId'=>'dashboard_logo','accept_type'=>'image/*'])
    {!! $errors->first('dashboard_logo', '<p class="help-block">:message</p>') !!}

</div>
<div class="form-group {{ $errors->has('dashboard_logo_text') ? 'has-error' : ''}}">
    <label for="dashboard_logo_text" class="col-md-4 control-label">{{ 'Dashboard Logo Text' }}</label>
    @include('includes.input_type_file_common_setting',['path'=>asset('').$commonsetting->dashboard_logo_text??'','required'=>'required','nameOrId'=>'dashboard_logo_text','accept_type'=>'image/*'])
    {!! $errors->first('dashboard_logo_text', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
