<div class="col-md-6">
    <select class="form-control" name="status" id="status" required> 
    	<option value="1" @if(isset($status) && $status==1) selected @endif >Active</option>
    	<option value="0" @if(isset($status) && $status==0) selected @endif >In Active</option>
    </select>
    <!-- <input class="form-control" name="status" type="text" id="status" value="{{ $package->status??''}}" > -->
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>