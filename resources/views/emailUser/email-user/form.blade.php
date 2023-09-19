<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="txt_field_white {{ $errors->has('group_id') ? 'has-error' : ''}}">
            <label>{{ 'Group' }}</label>
            <select class="form-control" name="group_id" id="group_id">
                <option value="">Select Group</option>
                @foreach($groups as $key=>$group)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
            </select>
            {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="txt_field_white {{ $errors->has('name') ? 'has-error' : ''}}">
            <label>{{ 'Name' }}</label>
            <input class="form-control" name="name" type="text" id="name" value="{{ $emailuser->name??''}}"
                placeholder="Name">
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="txt_field_white {{ $errors->has('email') ? 'has-error' : ''}}">
            <label>{{ 'Email' }}</label>
            <input class="form-control" name="email" type="text" id="email" value="{{ $emailuser->email??''}}"
                placeholder="Email">
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="txt_field_white {{ $errors->has('status') ? 'has-error' : ''}}">
            <label>{{ 'Status' }}</label>
            <select class="form-control" name="status" id="status">            
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <!-- <div class="col-md-12 col-sm-12">
        <div class="txt_field_white">
            <label>Subject</label>
            <input class="form-control" type="text" name="subject" id="" placeholder="">
        </div>
    </div> -->
    <div class="col-md-12 col-sm-12">
        <div class="inner_section_submit_btn">
            <!-- <a class="btn btn_primary" href="javescript:void(0)">Remove User</a> -->
            <input class="btn btn_primary" type="submit" value="{{ $submitButtonText??'Create' }}">
        </div>
    </div>
</div>


{{--<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="col-md-4 control-label">{{ 'Group' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="group_id" type="text" id="group_id" value="{{ $emailuser->group_id??''}}" >
        <select class="form-control" name="group_id" id="group_id">
            <option value="">Select Group</option>
            @foreach($groups as $key=>$group)
                <option value="{{$group->id}}">{{$group->name}}</option>
            @endforeach
        </select>
        {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $emailuser->name??''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $emailuser->email??''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="col-md-4 control-label">{{ 'Status' }}</label>
    <div class="col-md-6">
       <input class="form-control" name="status" type="number" id="status" value="{{ $emailuser->status??''}}" >
        <select class="form-control" name="status" id="status">            
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText??'Create' }}">
    </div>
</div> --}}