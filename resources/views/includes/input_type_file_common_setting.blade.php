<div class="col-md-6">
    <input class="form-control preview_image" name="{{$nameOrId}}" type="file" id="{{$nameOrId}}" @if(last(request()->segments())!='edit') {{$required??""}}  @endif accept="{{$accept_type??"*"}}" onchange="PreviewImage_1();">
    {!! $errors->first('{{$nameOrId}}', '<p class="help-block">:message</p>') !!}
    @if(isset($path))
        <img src="{{ $path??''}}" style="width: 100px;height: 100px" >
    @endif
</div>
