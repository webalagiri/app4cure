<table class="table datatable" style="font-size:13px">
    <thead>
    <tr style="background:#483E55;color:#fff">
        <th>Qualification</th>
        <th>Institution</th>
        <th>Location</th>
        <th>Country</th>
        <th>Education From</th>
        <th>Education To</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody class="inc">
    @if(sizeof($educationDetails)>0)
        @foreach($educationDetails as $education)
            <tr class="controls" >
                <td class="item form-group"><input type="text"  class="educationsvalue form-control educationsvalue1" id="educationsvalue1" name="branch_name[]" placeholder="Branch Name" value="{{$education->qualification}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td class="item form-group"><input type="text" class="educationsvalue form-control educationsvalue2" id="educationsvalue2"  name="branch_address[]" placeholder="Branch Address" value="{{$education->institution}}" data-validate-length-range="1"  required="required"></td>
                <td class="item form-group"><input type="text" class="educationsvalue form-control educationsvalue3" id="educationsvalue3" name="location[]" placeholder="Branch Location" value="{{$education->location}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td>
                    <select class="form-control educationsvalue4"  name="country[]" id="educationsvalue4" data-validate-length-range="1" data-validate-words="1" required="required" style="width:100px;">
                        <option value="">Select a country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" @if (($education->country)== $country->id) selected="selected" @endif>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="education_from[]" class="form-control educationsvalue6" placeholder="Education From" id="educationsvalue6">
                        <option value="">Select Year</option>
                        @for ($j = 1900; $j <= 2015; $j++)
                            <option class="" @if (($education->education_from)== $j) selected="selected" @endif>{{$j}}</option>
                        @endfor
                    </select>
                </td>
                <td>
                    <select name="education_to[]" class="form-control educationsvalue7" placeholder="Education To" id="educationsvalue7">
                        <option value="">Select Year</option>
                        @for ($j = 1900; $j <= 2015; $j++)
                            <option class="" @if (($education->education_to)== $j) selected="selected" @endif>{{$j}}</option>
                        @endfor
                    </select>
                </td>
                <td><input type="hidden" class="form-control educationsvalue5" name="id[]" id="educationsvalue5" value="{{$education->id}}">
                    <input type="hidden" class="form-control" name="hospitalId" id="" value="{{Auth::user()->id}}">
                    <a href="javascript:void(0);" class="delete-education btn btn-danger btn-rounded btn-condensed btn-sm" id="append" name="append" resource="{{$education->id}}"><span class="fa fa-times"></span></a>
                </td>
            </tr>
        @endforeach
    @else
        No Records Found!
    @endif
    </tbody>
</table>