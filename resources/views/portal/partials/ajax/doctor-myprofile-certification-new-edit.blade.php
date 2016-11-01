<table class="table datatable" style="font-size:13px">
    <thead>
    <tr style="background:#483E55;color:#fff">
        <th>Award Title</th>
        <th>Award Details</th>
        <th>Award Year</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody class="incawards">
    @if(sizeof($awardsDetails)>0)
        @foreach($awardsDetails as $award)
            <tr class="controls" >
                <td><input type="text"  class="awardsvalue form-control awardsvalue1" name="awards_title[]" value="{{$award->awards_title}}"></td>
                <td><input type="text" class="awardsvalue form-control awardsvalue2" name="awards_details[]" value="{{$award->awards_details}}"></td>
                <td>
                    <select name="awards_year[]" class="awardsvalue form-control select awardsvalue3" placeholder="Award Year">
                        <option value="">Select Year</option>
                        @for ($j = 1900; $j <= 2015; $j++)
                            <option class="" @if (($award->awards_year)== $j) selected="selected" @endif>{{$j}}</option>
                        @endfor
                    </select>
                </td>
                <td><input type="hidden" class="form-control awardsvalue4" name="id[]" value="{{$award->id}}">
                    <input type="hidden" class="form-control" name="doctorId" value="{{$award->doctor_id}}">
                    <a  class="delete-award btn btn-danger btn-rounded btn-condensed btn-sm" id="append" name="append" resource="{{$award->id}}"><span class="fa fa-times"></span></a>
                </td>
                <td></td>
            </tr>
        @endforeach
    @else
        No Record Found
    @endif

    </tbody>
</table>