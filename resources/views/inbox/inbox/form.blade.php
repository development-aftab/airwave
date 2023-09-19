<div class="form-group {{ $errors->has('recepient') ? 'has-error' : ''}}">
    <label for="recepient" class="col-md-4 control-label">{{ 'Recepient' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="recepient" type="number" id="recepient" value="{{ $inbox->recepient??''}}" >
        {!! $errors->first('recepient', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
    <label for="subject" class="col-md-4 control-label">{{ 'Subject' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="subject" type="text" id="subject" value="{{ $inbox->subject??''}}" >
        {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
    <label for="body" class="col-md-4 control-label">{{ 'Body' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="body" type="textarea" id="body" >{{ $inbox->body??''}}</textarea>
        {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="status" type="text" id="status" value="{{ $inbox->status??''}}" >
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div>
