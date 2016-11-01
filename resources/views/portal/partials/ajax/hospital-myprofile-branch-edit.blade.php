<table class="table datatable" >
<thead>
<tr>
    <th>Branch Name</th>
    <th>Branch Address</th>
    <th>Branch Location</th>
    <th>Branch Country</th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>
</thead>
<tbody class="inc">
@if (Input::old())
    @for ($i = 0; $i < count(Input::old('branch_name')); $i++)
        <tr class="controls">
            <td><input type="text" class="branchesvalue form-control branchesvalue1" id="branchesvalue1" name="branch_name[]" value="{{Input::old('branch_name')[$i]}}"  @if ($errors->has('branch_name.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required"></td>
            <td><input type="text" class="branchesvalue form-control branchesvalue2" id="branchesvalue2" name="branch_address[]" value="{{Input::old('branch_address')[$i]}}" @if ($errors->has('branch_address.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required"></td>
            <td><input type="text" class="branchesvalue form-control branchesvalue3" id="branchesvalue3"  name="location[]" value="{{Input::old('location')[$i]}}" @if ($errors->has('location.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required" ></td>
            <td>
                <select class="form-control branchesvalue4" name="country[]" id="branchesvalue4" @if ($errors->has('country.'.$i)) style="border-color: red;" @endif  data-validate-length-range="1" data-validate-words="1" required="required">
                    <option value="">Select a country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->name }}" @if ($country->name==Input::old('country')[$i]) selected="selected" @endif>{{ $country->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                @if(Input::old('id')[$i]>0)
                    <input type="hidden" class="form-control branchesvalue5" id="branchesvalue5" name="id[]" value="{{Input::old('id')[$i]}}">
                    <input type="hidden" class="form-control" name="hospitalId" value="{{Input::old('hospitalId')}}">
                    <a href="javascript:void(0);" class="delete-row btn btn-danger btn-rounded btn-condensed btn-sm" id="append" name="append" resource="{{Input::old('id')[$i]}}"><span class="fa fa-times"></span></a>
                @else
                    <input type="hidden" class="form-control branchesvalue5" id="branchesvalue5" name="id[]" value="{{Input::old('id')[$i]}}">
                    <button class="remove_this btn btn-danger btn-rounded btn-condensed btn-sm"><span class="fa fa-times"></span></button>
                @endif
            </td>
        </tr>
    @endfor
@elseif(sizeof($branchList)>0)
    @foreach($branchList as $branch)
        <tr class="controls" >
            <td class="item form-group"><input type="text"  class="branchesvalue form-control branchesvalue1" id="branchesvalue1" name="branch_name[]" placeholder="Branch Name" value="{{$branch->branch_name}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
            <td class="item form-group"><input type="text" class="branchesvalue form-control branchesvalue2" id="branchesvalue2"  name="branch_address[]" placeholder="Branch Address" value="{{$branch->branch_address}}" data-validate-length-range="1"  required="required"></td>
            <td class="item form-group"><input type="text" class="branchesvalue form-control branchesvalue3" id="branchesvalue3" name="location[]" placeholder="Branch Location" value="{{$branch->location}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
            <td>
                <select class="form-control branchesvalue4"  name="country[]" id="branchesvalue4" data-validate-length-range="1" data-validate-words="1" required="required">
                    <option value="">Select a country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->name }}" @if ($country->name==$branch->country) selected="selected" @endif>{{ $country->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="hidden" class="form-control branchesvalue5" name="id[]" id="branchesvalue5" value="{{$branch->id}}">
                <input type="hidden" class="form-control" name="hospitalId" id="" value="{{Auth::user()->id}}">
                <a href="javascript:void(0);" class="delete-row btn btn-danger btn-rounded btn-condensed btn-sm" id="append" name="append" resource="{{$branch->id}}"><span class="fa fa-times"></span></a>
            </td>
        </tr>
    @endforeach
@else
    @if (Input::old())
        @for ($i = 0; $i < count(Input::old('branch_name')); $i++)
            <tr class="controls">
                <td><input type="text" class="branchesvalue form-control branchesvalue1" name="branch_name[]" id="branchesvalue1" value="{{Input::old('branch_name')[$i]}}"  @if ($errors->has('branch_name.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="text" class="branchesvalue form-control branchesvalue2" name="branch_address[]" id="branchesvalue2"  value="{{Input::old('branch_address')[$i]}}" @if ($errors->has('branch_address.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="text" class="branchesvalue form-control branchesvalue3" name="location[]" id="branchesvalue3" value="{{Input::old('location')[$i]}}" @if ($errors->has('location.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td>
                    <select class="form-control branchesvalue4" name="country[]" id="branchesvalue4" @if ($errors->has('country.'.$i)) style="border-color: red;" @endif data-validate-length-range="1" data-validate-words="1" required="required">
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
        <tr class="controls" >
            <td><input type="text"  class="branchesvalue form-control branchesvalue1" id="branchesvalue1" name="branch_name[]" placeholder="Branch Name" data-validate-length-range="1" data-validate-words="1" required="required"></td>
            <td><input type="text" class="branchesvalue form-control branchesvalue2" id="branchesvalue2" name="branch_address[]" placeholder="Branch Address" data-validate-length-range="1" data-validate-words="1" required="required"></td>
            <td><input type="text" class="branchesvalue form-control branchesvalue3" id="branchesvalue3" name="location[]" placeholder="Branch Location" data-validate-length-range="1" data-validate-words="1" required="required"></td>
            <td>
                <select class="form-control branchesvalue4" name="country[]" id="branchesvalue4" id="contact_country" data-validate-length-range="1" data-validate-words="1" required="required">
                    <option value="">Select a country</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->name }}" >{{ $country->name }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input class="form-control branchesvalue5" name="id[]" id="branchesvalue5" value="0" type="hidden"></td>
        </tr>
    @endif
@endif
</tbody>
    </table>
