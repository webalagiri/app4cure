<table class="table datatable">
    <thead>
    <tr>
        <th>Designation</th>
        <th style="width:201px">Consultation Hospital</th>
        <th style="width:210px">Hospital Address</th>
        <th>Location</th>
        <th style="width:137px">Experience From</th>
        <th style="width:143px">Experience To</th>
    </tr>
    </thead>
    <tbody class="incexp">
    @if(sizeof($experienceDetails)>0)
        @foreach($experienceDetails as $exp)
            <tr class="controls" >
                <td class="item form-group"><input type="text"  class="expvalue form-control expvalue1" id="expvalue1" name="designation[]" placeholder="Branch Name" value="{{$exp->designation}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td class="item form-group"><input type="text" class="expvalue form-control expvalue2" id="expvalue2"  name="consultation_hospital[]" placeholder="Branch Address" value="{{$exp->consultation_hospital}}" data-validate-length-range="1"  required="required"></td>
                <td class="item form-group"><input type="text" class="expvalue form-control expvalue3" id="expvalue3" name="hospital_address[]" placeholder="Branch Location" value="{{$exp->hospital_address}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td class="item form-group"><input type="text" class="expvalue form-control expvalue4" id="expvalue4" name="location[]" placeholder="Branch Location" value="{{$exp->location}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td>
                    <select name="experience_from[]" class="form-control select" id="expvalue6">
                        <option value="">Select Year</option>
                        @for ($j = 1900; $j <= 2015; $j++)
                            <option class="" @if (($exp->experience_from)== $j) selected="selected" @endif>{{$j}}</option>
                        @endfor
                    </select>
                </td>
                <td>
                    <select name="experience_to[]" class="form-control select" id="expvalue7">
                        <option value="">Select Year</option>
                        @for ($j = 1900; $j <= 2015; $j++)
                            <option class="" @if (($exp->experience_to)== $j) selected="selected" @endif>{{$j}}</option>
                        @endfor
                        <option value="10000" @if (($exp->experience_to) == 10000) selected="selected" @endif>Present Year</option>
                    </select>
                </td>
                <td><input type="hidden" class="form-control expvalue5" name="id[]" id="expvalue5" value="{{$exp->id}}">
                    <input type="hidden" class="form-control" name="hospitalId" id="" value="{{Auth::user()->id}}">
                    <a href="javascript:void(0);" class="delete-exp btn btn-danger btn-rounded btn-condensed btn-sm" id="append" name="append" resource="{{$exp->id}}"><span class="fa fa-times"></span></a>
                </td>
            </tr>
        @endforeach
    @else
        No Records Found!
    @endif

    </tbody>
</table>