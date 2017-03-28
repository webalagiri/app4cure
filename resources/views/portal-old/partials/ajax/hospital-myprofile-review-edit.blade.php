<table class="table datatable" style="font-size:13px">
    <thead style="background:#483E55;color:#fff">
    <tr>
        <th>Patient Id</th>
        <th>Patient Name</th>
        <th>Patient Country</th>
        <th>Review Title</th>
        <th>Review Description</th>
    </tr>
    </thead>
    <tbody class="increview">
    @if (Input::old())
        @for ($i = 0; $i < count(Input::old('patient_id')); $i++)
            <tr class="controlsreview">
                <td>
                    <input type="text" name="patient_id[]" id="reviewvalue1"  class="reviewvalue form-control" value="{{Input::old('patient_id')[$i]}}"  @if ($errors->has('patient_id.'.$i)) style="border-color: red;" @endif >
                    {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="@if (Input::old('treatment_id')[$i]) {{Input::old('treatment_id')[$i]}}@endif">--}}
                </td>
                <td><input type="text"  class="reviewvalue form-control" id="reviewvalue2"  name="patient_name[]" value="{{Input::old('patient_name')[$i]}}"  @if ($errors->has('patient_name.'.$i)) style="border-color: red;" @endif ></td>
                <td><input type="text"  class="reviewvalue form-control" id="reviewvalue6"  name="country[]" value="{{Input::old('country')[$i]}}"  @if ($errors->has('country.'.$i)) style="border-color: red;" @endif ></td>
                <td><input type="text"  class="reviewvalue form-control" id="reviewvalue3"  name="review_title[]" value="{{Input::old('review_title')[$i]}}" @if ($errors->has('review_title.'.$i)) style="border-color: red;" @endif></td>
                <td><textarea  class="reviewvalue form-control" id="reviewvalue4" name="review_description[]"   @if ($errors->has('review_description.'.$i)) style="border-color: red;" @endif>{{Input::old('review_title')[$i]}}</textarea></td>
                <td>
                    @if((Input::old('id')[$i]>0))
                        <input type="hidden" class="reviewvalue form-control" name="id[]" value="@if (Input::old('id')[$i]) {{Input::old('id')[$i]}}@endif" id="reviewvalue5">
                        <input type="hidden" class="form-control" name="hospitalId" value="{{Input::old('hospitalId')}}">
                        <a href="javascript:void(0);"class="delete-review btn btn-danger btn-rounded btn-condensed btn-sm" id="reviewappend"  name="append" resource="{{Input::old('id')[$i]}}"><span class="fa fa-times"></span></a>
                    @else
                        <input type="hidden" class="form-control" name="id[]" value="{{Input::old('id')[$i]}}" id="reviewvalue5">
                        <button class="remove_this btn btn-danger btn-rounded btn-condensed btn-sm"><span class="fa fa-times"></span></button>
                    @endif
                </td>
            </tr>
        @endfor
    @elseif(sizeof($reviews)>0)
        @foreach($reviews as $rv)
            <tr class="controlsreview" >
                <td class="item form-group">
                    <input type="text" name="patient_id[]" id="reviewvalue1" class="reviewvalue form-control" value="{{$rv->patient_id}}"   >
                    {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="{{$treat->treatment_id}}_{{$treat->treatment_name}}">--}}
                </td>
                <td  class="item form-group">
                    <input type="text"  class="reviewvalue form-control" id="reviewvalue2" name="patient_name[]" value="{{$rv->patient_name}}">
                </td>
                <td  class="item form-group">
                    <input type="text"  class="reviewvalue form-control" id="reviewvalue6" name="country[]" value="{{$rv->country}}">
                </td>
                <td  class="item form-group">
                    <input type="text"  class="reviewvalue form-control" id="reviewvalue3" name="review_title[]" value="{{$rv->review_title}}">
                </td>
                <td  class="item form-group">
                    <textarea  class="reviewvalue form-control" id="reviewvalue4" name="review_description[]" >{{$rv->review_description}}</textarea>
                </td>
                <td><input type="hidden" class="reviewvalue form-control" name="id[]" value="{{$rv->id}}" id="reviewvalue5">
                    <input type="hidden" class="form-control" name="hospitalId" value="{{Auth::user()->id}}">
                    <a href="javascript:void(0);"class="delete-review btn btn-danger btn-rounded btn-condensed btn-sm" id="reviewappend"  name="append" resource="{{$rv->id}}"><span class="fa fa-times"></span></a>
                </td>
            </tr>
        @endforeach
    @else
        @if (Input::old())
            @for ($i = 0; $i < count(Input::old('patient_id')); $i++)
                <tr class="controlsreview">
                    <td>
                        <input type="text" name="patient_id[]" id="reviewvalue1"  class="reviewvalue form-control" value="{{Input::old('patient_id')[$i]}}"  @if ($errors->has('patient_id.'.$i)) style="border-color: red;" @endif >
                        {{-- <input type="hidden" id="treatment_id_value" name="treatment_id[]" value="{{Input::old('treatment_id')[$i]}}">--}}
                    </td>
                    <td><input type="text"  class="reviewvalue form-control" id="reviewvalue2"  name="patient_name[]" value="{{Input::old('patient_name')[$i]}}"  @if ($errors->has('patient_name.'.$i)) style="border-color: red;" @endif ></td>
                    <td><input type="text"  class="reviewvalue form-control" id="reviewvalue6"  name="country[]" value="{{Input::old('country')[$i]}}"  @if ($errors->has('country.'.$i)) style="border-color: red;" @endif ></td>
                    <td><input type="text"  class="reviewvalue form-control" id="reviewvalue3"  name="review_title[]" value="{{Input::old('review_title')[$i]}}" @if ($errors->has('review_title.'.$i)) style="border-color: red;" @endif></td>
                    <td><textarea  class="reviewvalue form-control" id="reviewvalue4" name="review_description[]"   @if ($errors->has('review_description.'.$i)) style="border-color: red;" @endif>{{Input::old('review_description')[$i]}}</textarea></td>
                    <td><input type="hidden" class="reviewvalue form-control" name="id[]" value="0" id="reviewvalue5">
                        <input type="hidden" class="reviewvalue form-control" name="hospitalId"  value="{{Auth::user()->id}}">
                    </td>
                </tr>
            @endfor
        @else
            <tr class="controlsreview" >
                <td>
                    <input type="text" name="patient_id[]" id="reviewvalue1"  class="reviewvalue form-control" >
                </td>
                <td><input type="text"  class="reviewvalue form-control" id="reviewvalue2"  name="patient_name[]" ></td>
                <td><input type="text"  class="reviewvalue form-control" id="reviewvalue6"  name="country[]" ></td>
                <td><input type="text"  class="reviewvalue form-control" id="reviewvalue3"  name="review_title[]"></td>
                <td><textarea  class="reviewvalue form-control" id="reviewvalue4" name="review_description[]" ></textarea></td>
                <td><input type="hidden" class="reviewvalue form-control" name="id[]" value="0" id="reviewvalue5" >
                    <input type="hidden" class="reviewvalue form-control" name="hospitalId"  value="{{Auth::user()->id}}">
                </td>
            </tr>
        @endif
    @endif
    </tbody>
</table>