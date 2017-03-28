<table class="table datatable" style="font-size:13px">
    <br/><br/>
    <thead>
    <tr style="background:#483E55;color:#fff">
        <th>Consultation Hospital</th>
        <th>Consultation Address</th>
        <th>Consultation Days</th>
        <th>Consultation To Time</th>
        <th>Consultation From Time</th>
        <th>Consultation Fee</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody class="incconsult">
    @if(sizeof($consultationDetails)>0)
        @foreach($consultationDetails as $consultation)
            <tr class="controls">
                <td><input type="text" class="consultvalue form-control consultvalue1" id="consultvalue1" name="consultation_hospital[]" value="{{$consultation->consultation_hospital}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="text" class="consultvalue form-control consultvalue2" id="consultvalue2" name="hospital_address[]" value="{{$consultation->hospital_address}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="text" class="consultvalue form-control consultvalue3"  id="consultvalue3" name="consultation_days[]" value="{{$consultation->consultation_days}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="text" class="consultvalue form-control timepicker pull-right consultvalue4" id="consultvalue4" name="consultation_time_from[]" value="{{$consultation->consultation_time_from}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="text" class="consultvalue form-control timepicker pull-right consultvalue5" id="consultvalue5" name="consultation_time_to[]" value="{{$consultation->consultation_time_to}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="number" min="0" class="consultvalue form-control negative consultvalue6" id="consultvalue6" name="consultation_fee[]" value="{{$consultation->consultation_fee}}" data-validate-length-range="1" data-validate-words="1" required="required"></td>
                <td><input type="hidden" class="consultvalue form-control consultvalue7" name="id[]" id="consultvalue7" value="{{$consultation->id}}">
                    <input type="hidden" class="form-control" name="doctorId" value="{{$consultation->doctor_id}}"  id="doctorId">
                    <a href="" class="delete-consult btn btn-danger btn-rounded btn-condensed btn-sm" id="append" name="append" resource="{{$consultation->id}}"><span class="fa fa-times"></span></a>
                </td>
            </tr>
        @endforeach
    @else
        No Record Found
    @endif
    </tbody>
</table>