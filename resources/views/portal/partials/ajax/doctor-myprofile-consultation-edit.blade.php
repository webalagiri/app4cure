<table class="table datatable">
    <br/><br/>
    <thead>
    <tr>
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
                <td><input type="text" class="consultvalue form-control consultvalue1" id="consultvalue1" name="consultation_hospital[]" value="{{$consultation->consultation_hospital}}"></td>
                <td><input type="text" class="consultvalue form-control consultvalue2" id="consultvalue2" name="hospital_address[]" value="{{$consultation->hospital_address}}"></td>
                <td><input type="text" class="consultvalue form-control consultvalue3"  id="consultvalue3" name="consultation_days[]" value="{{$consultation->consultation_days}}"></td>
                <td><input type="text" class="consultvalue form-control timepicker pull-right consultvalue4" id="consultvalue4" name="consultation_time_from[]" value="{{$consultation->consultation_time_from}}"></td>
                <td><input type="text" class="consultvalue form-control timepicker pull-right consultvalue5" id="consultvalue5" name="consultation_time_to[]" value="{{$consultation->consultation_time_to}}"></td>
                <td><input type="number" min="0" class="consultvalue form-control negative consultvalue6" id="consultvalue6" name="consultation_fee[]" value="{{$consultation->consultation_fee}}"></td>
                <td><input type="hidden" class="consultvalue form-control consultvalue7" name="id[]" id="consultvalue7" value="{{$consultation->id}}">
                    <input type="hidden" class="form-control" name="doctorId" value="{{$consultation->doctor_id}}">
                    <a class="delete-consult btn btn-danger btn-rounded btn-condensed btn-sm" id="append" name="append" resource="{{$consultation->id}}"><span class="fa fa-times"></span></a>
                </td>
            </tr>
        @endforeach
    @else
        No Record Found
    @endif

    </tbody>
</table>