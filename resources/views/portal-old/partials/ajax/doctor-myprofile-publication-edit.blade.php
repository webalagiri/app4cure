<table class="table datatable">
    <thead>
    <tr>
        <th>Publication Title</th>
        <th>Publication Details</th>
        <th>Publication Year</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody class="incpublication">
    @if(sizeof($publicationDetails)>0)
        @foreach($publicationDetails as $publication)
            <tr class="controls">
                <td><input type="text" class="pubvalue form-control pubvalue1" name="publication_title[]" value="{{$publication->publication_title}}"></td>
                <td><input type="text" class="pubvalue form-control pubvalue2" name="publication_details[]" value="{{$publication->publication_details}}"></td>
                <td>
                    <select name="publication_year[]" class="pubvalue form-control select pubvalue3" placeholder="Publication From">
                        <option value="">Select Year</option>
                        @for ($j = 1900; $j <= 2015; $j++)
                            <option class="" @if (($publication->publication_year)== $j) selected="selected" @endif>{{$j}}</option>
                        @endfor
                    </select>
                </td>
                <td><input type="hidden" class="form-control pubvalue4" name="id[]" value="{{$publication->id}}">
                    <input type="hidden" class="form-control" name="doctorId" value="{{$publication->doctor_id}}">
                    <a  class="delete-pub btn btn-danger btn-rounded btn-condensed btn-sm" id="append" name="append" resource="{{$publication->id}}"><span class="fa fa-times"></span></a>
                <td></td>
            </tr>
        @endforeach
    @else
        No Record Found !
    @endif
    </tbody>
</table>