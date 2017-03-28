<table class="table datatable">
    <thead>
    <tr>
        <th>Hospital Name</th>
        <th>Hospital Address</th>
        <th>City</th>
        <th>Country</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody class="inc1">
    @if (Input::old())
        @for ($i = 0; $i < count(Input::old('branch_name')); $i++)
            <tr class="controls1">
                <td><input type="text" class="hospitaltieupvalue form-control hospitaltieupvalue1" id="hospitaltieupvalue1" name="hospital_name[]" value="{{Input::old('hospital_name')[$i]}}"  @if ($errors->has('hospital_name.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="text" class="hospitaltieupvalue form-control hospitaltieupvalue2" id="hospitaltieupvalue2" name="hospital_address[]" value="{{Input::old('hospital_address')[$i]}}" @if ($errors->has('hospital_address.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="text" class="hospitaltieupvalue form-control hospitaltieupvalue3" id="hospitaltieupvalue3"  name="city_name[]" value="{{Input::old('city_name')[$i]}}" @if ($errors->has('city_name.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required" ></td>
                <td>
                    <select class="form-control hospitaltieupvalue4" name="country[]" id="hospitaltieupvalue4" @if ($errors->has('country.'.$i)) style="border-color: red;" @endif  data-validate-length-range="1" data-validate-words="1" required="required">
                        <option value="">Select a country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->name }}" @if ($country->name==Input::old('country')[$i]) selected="selected" @endif>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    @if(Input::old('id')[$i]>0)
                        <input type="hidden" class="form-control hospitaltievalue5" id="hospitaltievalue5" name="id[]" value="{{Input::old('id')[$i]}}">
                        <input type="hidden" class="form-control" name="hcfid" value="{{Input::old('hcfId')}}">
                        <a href="javascript:void(0);" class="delete-tieups btn btn-danger btn-rounded btn-condensed btn-sm" id="append" name="append" resource="{{Input::old('id')[$i]}}"><span class="fa fa-times"></span></a>
                    @else
                        <input type="hidden" class="form-control hospitaltievalue4" id="hospitaltievalue5" name="id[]" value="{{Input::old('id')[$i]}}">
                        <button class="remove_this btn btn-danger btn-rounded btn-condensed btn-sm"><span class="fa fa-times"></span></button>
                    @endif
                </td>
            </tr>
        @endfor
    @elseif(sizeof($hcfHospitals)>0)
        @foreach($hcfHospitals as $hcf)
            <tr class="controls1" >
                <td class="item form-group"><input type="text"  class="hospitaltieupvalue form-control hospitaltieupvalue1" id="hospitaltieupvalue1" name="hospital_name[]" placeholder="Hospital Name" value="{{$hcf->hospital_name}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td class="item form-group"><input type="text" class="hospitaltieupvalue form-control hospitaltieupvalue2" id="hospitaltieupvalue2"  name="hospital_address[]" placeholder="Hospital Address" value="{{$hcf->hospital_address}}" data-validate-length-range="1"  required="required"></td>
                <td>
                    <select class="form-control hospitaltieupvalue3"  name="city_name[]" id="hospitaltieupvalue3" data-validate-length-range="1" data-validate-words="1" required="required">
                        <option value="">Select a City</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" @if ($city->city_name==$hcf->city_name) selected="selected" @endif>{{$city->city_name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select class="form-control hospitaltieupvalue4"  name="country[]" id="hospitaltieupvalue4" data-validate-length-range="1" data-validate-words="1" required="required" disabled="true">
                        <option value="">Select a country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" @if ($country->name==$hcf->name) selected="selected" @endif>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="hidden" class="form-control hospitaltieupvalue5" name="id[]" id="hospitaltieupvalue5" value="{{$hcf->id}}">
                    <input type="hidden" class="form-control" name="hospitalId" id="" value="{{Auth::user()->id}}">
                    <a href="javascript:void(0);" class="delete-tieups btn btn-danger btn-rounded btn-condensed btn-sm" id="append" name="append" resource="{{$hcf->id}}"><span class="fa fa-times"></span></a>
                </td>
            </tr>
        @endforeach
    @else
        @if (Input::old())
            @for ($i = 0; $i < count(Input::old('branch_name')); $i++)
                <tr class="controls1">
                    <td><input type="text" class="hospitaltieupvalue form-control hospitaltieupvalue1" name="hospital_name[]" id="hospitaltieupvalue1" value="{{Input::old('hospital_name')[$i]}}"  @if ($errors->has('hospital_name.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required"></td>
                    <td><input type="text" class="hospitaltieupvalue form-control hospitaltieupvalue2" name="hospital_address[]" id="hospitaltieupvalue2"  value="{{Input::old('hospital_address')[$i]}}" @if ($errors->has('hospital_address.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required"></td>
                    <td><input type="text" class="hospitaltieupvalue form-control hospitaltieupvalue3" name="city_name[]" id="hospitaltieupvalue3" value="{{Input::old('city_name')[$i]}}" @if ($errors->has('city_name.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required"></td>
                    <td>
                        <select class="form-control hospitaltieupvalue4" name="country[]" id="hospitaltieupvalue4" @if ($errors->has('country.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required">
                            <option value="">Select a country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->name }}" @if ($country->name==Input::old('country')[$i]) selected="selected" @endif>{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td></td>
                </tr>
            @endfor
        @else
            <tr class="controls1" >
                <td><input type="text"  class="hospitaltieupvaluehospitaltieupvalue form-control hospitaltieupvalue1" id="hospitaltieupvalue1" name="hospital_name[]" placeholder="Hospital Name" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="text" class="hospitaltieupvalue form-control branchesvalue2" id="hospitaltieupvalue2" name="hospital_address[]" placeholder="Hospital Address" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="text" class="hospitaltieupvalue form-control hospitaltieupvalue3" id="hospitaltieupvalue3" name="city_name[]" placeholder="Hospital City" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td>
                    <select class="form-control hospitaltieupvalue4" name="country[]" id="hospitaltieupvalue4" id="contact_country" data-validate-length-range="1" data-validate-words="1" required="required">
                        <option value="">Select a country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->name }}" >{{ $country->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input class="form-control hospitaltieupvalue5" name="id[]" id="hospitaltieupvalue5" value="0" type="hidden"></td>
            </tr>
        @endif

    @endif





    </tbody>
</table>