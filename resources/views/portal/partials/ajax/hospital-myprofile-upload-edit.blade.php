<table class="table datatable" style="font-size:13px">
    <thead style="background:#483E55;color:#fff">
    <tr>
        <th>Upload Title</th>
        <th>Upload Description</th>
        <th>Upload Embed</th>
        <th>Upload Type</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody class="incupload">
    @if (Input::old())
        @for ($i = 0; $i < count(Input::old('upload_title')); $i++)
            <tr class="controlsupload">
                <td>
                    <input type="text" name="upload_title[]" id="uploadvalue1"  class="uploadvalue form-control" value="{{Input::old('upload_title')[$i]}}"  @if ($errors->has('upload_title.'.$i)) style="border-color: red;" @endif >
                    {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="@if (Input::old('treatment_id')[$i]) {{Input::old('treatment_id')[$i]}}@endif">--}}
                </td>
                <td><input type="text"  class="uploadvalue form-control" id="uploadvalue2"  name="upload_description[]" value="{{Input::old('upload_description')[$i]}}"  @if ($errors->has('upload_description.'.$i)) style="border-color: red;" @endif ></td>
                <td><textarea  class="uploadvalue form-control" id="uploadvalue3" name="upload_embed[]"   @if ($errors->has('upload_embed.'.$i)) style="border-color: red;" @endif>{{Input::old('upload_embed')[$i]}}</textarea></td>
                <td>
                    <select name="upload_type[]" class="uploadvalue form-control" id="uploadvalue4">
                        <option>Select Type</option>
                        <option value="{{ Input::old('upload_type')[$i] }}" selected="selected" @if ($errors->has('upload_type.'.$i)) style="border-color: red;" @endif >{{  Input::old('upload_type')[$i]  }}</option>
                    </select>
                <td>
                    @if((Input::old('id')[$i]>0))
                        <input type="hidden" class="uploadvalue form-control" name="id[]" value="@if (Input::old('id')[$i]) {{Input::old('id')[$i]}}@endif" id="uploadvalue5">
                        <input type="hidden" class="form-control" name="hospitalId" value="{{Input::old('hospitalId')}}">
                        <a href="javascript:void(0);"class="delete-upload btn btn-danger btn-rounded btn-condensed btn-sm" id="uploadappend"  name="append" resource="{{Input::old('id')[$i]}}"><span class="fa fa-times"></span></a>
                    @else
                        <input type="hidden" class="form-control" name="id[]" value="{{Input::old('id')[$i]}}" id="uploadvalue5">
                        <button class="remove_this btn btn-danger btn-rounded btn-condensed btn-sm"><span class="fa fa-times"></span></button>
                    @endif
                </td>
            </tr>
        @endfor
    @elseif(sizeof($upload)>0)
        @foreach($upload as $upl)
            <tr class="controlsupload" >

                <td class="item form-group">
                    <input type="text" name="upload_title[]" id="uploadvalue1" class="uploadvalue form-control" value="{{$upl->upload_title}}"   >
                    {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="{{$treat->treatment_id}}_{{$treat->treatment_name}}">--}}
                </td>
                <td  class="item form-group">
                    <input type="text"  class="uploadvalue form-control" id="uploadvalue2" name="upload_description[]" value="{{$upl->upload_description}}">
                </td>
                <td  class="item form-group">
                    <textarea  class="uploadvalue form-control" id="uploadvalue3" name="upload_embed[]" >{{$upl->upload_embed}}</textarea>
                </td>
                <td  class="item form-group">
                    <select name="upload_type" class="uploadvalue form-control" id="uploadvalue4">
                        <option>Select Type</option>
                        <option value="{{ $upl->upload_type_id }}" selected="selected" >{{ $upl->upload_name }}</option>
                    </select>
                </td>
                <td><input type="hidden" class="uploadvalue form-control" name="id[]" value="{{$upl->id}}" id="uploadvalue5">
                    <input type="hidden" class="form-control" name="hospitalId" value="{{Auth::user()->id}}">
                    <a href="javascript:void(0);"class="delete-upload btn btn-danger btn-rounded btn-condensed btn-sm" id="uploadappend"  name="append" resource="{{$upl->id}}"><span class="fa fa-times"></span></a>
                </td>
            </tr>
        @endforeach
    @else
        @if (Input::old())
            @for ($i = 0; $i < count(Input::old('upload_title')); $i++)
                <tr class="controls1">
                    <td>
                        <input type="text" name="upload_title[]" id="uploadvalue1"  class="uploadvalue form-control" value="{{Input::old('upload_title')[$i]}}"  @if ($errors->has('upload_title.'.$i)) style="border-color: red;" @endif >
                        {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="@if (Input::old('treatment_id')[$i]) {{Input::old('treatment_id')[$i]}}@endif">--}}
                    </td>
                    <td><input type="text"  class="uploadvalue form-control" id="uploadvalue2"  name="upload_description[]" value="{{Input::old('upload_description')[$i]}}"  @if ($errors->has('upload_description.'.$i)) style="border-color: red;" @endif ></td>
                    <td><textarea  class="uploadvalue form-control" id="uploadvalue3" name="upload_embed[]"   @if ($errors->has('upload_embed.'.$i)) style="border-color: red;" @endif>{{Input::old('upload_embed')[$i]}}</textarea></td>
                    <td>
                        <select name="upload_type[]" class="uploadvalue form-control" id="uploadvalue4">
                            <option>Select Type</option>
                            <option value="{{ Input::old('upload_type')[$i] }}" selected="selected" @if ($errors->has('upload_type.'.$i)) style="border-color: red;" @endif >{{  Input::old('upload_type')[$i]  }}</option>
                        </select>
                    <td>
                    <td><input type="hidden" class="form-control" name="id[]" value="0" id="uploadvalue5">
                        <input type="hidden" class="form-control" name="hospitalId"  value="{{Auth::user()->id}}">
                    </td>
                </tr>
            @endfor
        @else
            <tr class="controlsupload" >
                <td>
                    <input type="text" name="upload_title[]" id="uploadvalue1"  class="uploadvalue form-control" >
                    {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="@if (Input::old('treatment_id')[$i]) {{Input::old('treatment_id')[$i]}}@endif">--}}
                </td>
                <td><input type="text"  class="uploadvalue form-control" id="uploadvalue2"  name="upload_description[]" ></td>
                <td><textarea  class="uploadvalue form-control" id="uploadvalue3" name="upload_embed[]"  ></textarea></td>
                <td>
                    <select name="upload_type" class="uploadvalue form-control" id="uploadvalue4">
                        <option value="none">Select Type</option>
                        <option value="1" >Audio</option>
                        <option value="2" >Video</option>
                        <option value="3" >Articles</option>
                    </select>
                <td>
                <td><input type="hidden" class="form-control" name="id[]" value="0" id="uploadvalue5" >
                    <input type="hidden" class="form-control" name="hospitalId"  value="{{Auth::user()->id}}">
                </td>
            </tr>
        @endif
    @endif
    </tbody>
</table>