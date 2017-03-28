<table class="table datatable" style="font-size:13px">
    <thead>
    <tr style="background:#483E55;color:#fff">
        <th>Treatment Name</th>
        <th>Price Range From</th>
        <th>Price Range To</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr></thead>
    <tbody class="inctreatment">
    @if (Input::old())
        @for ($i = 0; $i < count(Input::old('treatment_name')); $i++)
            <tr class="controlstreat">
                <td>
                    <input type="text" name="treatment_name[]" id="treatmentsvalue1"  class="form-control ui-autocomplete-input" value="{{Input::old('treatment_name')[$i]}}"  @if ($errors->has('treatment_name.'.$i)) style="border-color: red;" @endif >
                    {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="@if (Input::old('treatment_id')[$i]) {{Input::old('treatment_id')[$i]}}@endif">--}}
                    <input type="hidden" class="treat_id" name="treatment_id[]" value="{{Input::old('treatment_id')[$i]}}" id="treatmentsvalue4">
                </td>
                <td><input type="text"  class="form-control negative" id="treatmentsvalue2"  name="price_range_from[]" value="{{Input::old('price_range_from')[$i]}}"  @if ($errors->has('price_range_from.'.$i)) style="border-color: red;" @endif ></td>
                <td><input type="text"  class="form-control negative" id="treatmentsvalue3"  name="price_range_to[]" value="{{Input::old('price_range_to')[$i]}}" @if ($errors->has('price_range_to.'.$i)) style="border-color: red;" @endif></td>
                <td>
                    @if((Input::old('id')[$i]>0))
                        <input type="hidden" class="form-control" name="id[]" value="@if (Input::old('id')[$i]) {{Input::old('id')[$i]}}@endif" id="treatmentsvalue5">
                        <input type="hidden" class="form-control" name="hospitalId" value="{{Input::old('hospitalId')}}">
                        <a href="javascript:void(0);" class="delete-treat btn btn-danger btn-rounded btn-condensed btn-sm" id="treatappend" name="append" resource="{{Input::old('id')[$i]}}"><span class="fa fa-times"></span></a>
                    @else
                        <input type="hidden" class="form-control" name="id[]" value="{{Input::old('id')[$i]}}" id="treatmentsvalue5">
                        <button class="remove_this btn btn-danger btn-rounded btn-condensed btn-sm"><span class="fa fa-times"></span></button>
                    @endif
                </td>
            </tr>
      @endfor
    @elseif(sizeof($treatmentsList)>0)
        @foreach($treatmentsList as $treat)
            <tr class="controlstreat" >

                <td class="item form-group">
                    <input type="text" name="treatment_name[]" id="treatmentsvalue1" class="treatmentsvalue form-control ui-autocomplete-input" value="{{$treat->treatment_name}}"  required="required" >
                    {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="{{$treat->treatment_id}}_{{$treat->treatment_name}}">--}}
                    <input type="hidden" class="treat_id" name="treatment_id[]" value="{{$treat->treatment_id}}" id="treatmentsvalue4">
                </td>
                <td  class="item form-group">
                    <input type="text"  class="treatmentsvalue form-control negative" id="treatmentsvalue2" name="price_range_from[]" value="{{$treat->price_range_from}}" data-validate-length-range="1" data-validate-words="1" required="required">
                </td>
                <td  class="item form-group">
                    <input type="text"  class="treatmentsvalue form-control negative" id="treatmentsvalue3" name="price_range_to[]" value="{{$treat->price_range_to}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td><input type="hidden" class="form-control" name="id[]" value="{{$treat->treatment_id}}" id="treatmentsvalue5">
                    <input type="hidden" class="form-control" name="hospitalId" value="{{Auth::user()->id}}">
                    <a href="javascript:void(0);"class="delete-treat btn btn-danger btn-rounded btn-condensed btn-sm" id="treatappend"  name="append" resource="{{$treat->treatment_id}}"><span class="fa fa-times"></span></a>
                </td>
            </tr>
        @endforeach
    @else
        @if (Input::old())
            @for ($i = 0; $i < count(Input::old('treatment_name')); $i++)
                <tr class="controlstreat">
                    <td>
                        <input type="text" name="treatment_name[]"  id="treatmentsvalue1" class="form-control ui-autocomplete-input" value="{{Input::old('treatment_name')[$i]}}"  @if ($errors->has('treatment_name.'.$i)) style="border-color: red;" @endif  required="required">
                        {{-- <input type="hidden" id="treatment_id_value" name="treatment_id[]" value="{{Input::old('treatment_id')[$i]}}">--}}
                        <input type="hidden" class="treat_id" name="treatment_id[]" value="{{Input::old('treatment_id')[$i]}}" id="treatmentsvalue4">
                    </td>
                    <td><input type="text"  class="form-control negative" id="treatmentsvalue2" name="price_range_from[]" value="{{Input::old('price_range_from')[$i]}}"  @if ($errors->has('price_range_from.'.$i)) style="border-color: red;" @endif ></td>
                    <td><input  type="text"  class="form-control negative" id="treatmentsvalue3" name="price_range_to[]" value="{{Input::old('price_range_to')[$i]}}" @if ($errors->has('price_range_to.'.$i)) style="border-color: red;" @endif></td>

                    <td><input type="hidden" class="form-control" name="id[]" value="0" id="treatmentsvalue5">
                        <input type="hidden" class="form-control" name="hospitalId"  value="{{Auth::user()->id}}">
                    </td>
                </tr>
            @endfor
        @else
            <tr class="controlstreat" >
                <td>
                    <input type="text" name="treatment_name[]" id="treatmentsvalue1" class="form-control ui-autocomplete-input" required="required">
                    <input type="hidden" class="treat_id" name="treatment_id[]" id="treatmentsvalue4">
                </td>
                <td><input type="text" class="form-control negative" id="treatmentsvalue2" name="price_range_from[]" placeholder="Price Range From" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="text" class="form-control negative" id="treatmentsvalue3" name="price_range_to[]" placeholder="Price Range To" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="hidden" class="form-control" name="id[]" value="0" id="treatmentsvalue5" >
                    <input type="hidden" class="form-control" name="hospitalId"  value="{{Auth::user()->id}}">
                </td>
            </tr>
        @endif
    @endif

    </tbody>
</table>