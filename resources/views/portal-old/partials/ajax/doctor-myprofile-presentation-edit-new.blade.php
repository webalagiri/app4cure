<table class="table datatable" style="font-size:13px">
    <thead>
    <tr style="background:#483E55;color:#fff">
        <th>Presentation Title</th>
        <th>Presentation Details</th>
        <th>Presentation Year</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody class="incpresent">
    @if(sizeof($presentationDetails)>0)
        @foreach($presentationDetails as $presentation)
            <tr class="controls">
                <td><input type="text" class="presentvalue form-control presentvalue1" id="presentvalue1" name="presentation_title[]" value="{{$presentation->presentation_title}}"></td>
                <td><input type="text" class="presentvalue form-control presentvalue2" id="presentvalue2" name="presentation_details[]" value="{{$presentation->presentation_details}}"></td>
                <td>
                    <select name="presentation_year[]" class="presentvalue form-control select presentvalue3" id="presentvalue3" placeholder="Presentation year">
                        <option value="">Select Year</option>
                        @for ($j = 1900; $j <= 2015; $j++)
                            <option class="" @if (($presentation->presentation_year)== $j) selected="selected" @endif>{{$j}}</option>
                        @endfor
                    </select>
                </td>
                <td><input type="hidden" class="form-control presentvalue4" name="id[]" value="{{$presentation->id}}">
                    <input type="hidden" class="form-control" name="doctorId" value="{{$presentation->doctor_id}}">
                    <a class="delete-present btn btn-danger btn-rounded btn-condensed btn-sm" id="append" name="append" resource="{{$presentation->id}}"><span class="fa fa-times"></span></a>
                <td></td>
            </tr>
        @endforeach
    @else
        No Records Found
    @endif
    </tbody>
</table>