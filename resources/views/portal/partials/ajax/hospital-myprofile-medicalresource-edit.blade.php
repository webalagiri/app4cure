<table class="table datatable" style="font-size:13px">
    <thead>
    <tr style="background:#483E55;color:#fff">
        <th style="width:20%">Department Name</th>
        <th style="width:20%">HOD Name</th>
        <th>No. of Assistant Professors</th>
        <th>No. of Consultants Full time</th>
        <th>No. of Consultants Part time</th>
        <th>No. of Visiting Consultants</th>
        <th>No. of Junior Consultants</th>
        <th>No. of Residents</th>
    </tr>
    </thead>
    <tbody class="inc1">
    @if(sizeof($hospitalMedicalResources)>0)
        @foreach($hospitalMedicalResources as $mr)
            <tr id="mr_id_{{$mr->medical_resource_id}}" class="controls1" >
                <td class="item form-group">
                    <input type="hidden" class="mrchange" name="mr_change_id[]" value="0" id="mrvalue10">
                    {{$mr->medical_resource_name}}
                    <input type="hidden"  class="mrvalue form-control" id="mrvalue1" name="medical_resource_name[]" value="{{$mr->medical_resource_name}}" required="required">
                    {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="{{$treat->treatment_id}}_{{$treat->treatment_name}}">--}}
                    <input type="hidden" class="mr_id" name="medical_resource_id[]" value="{{$mr->medical_resource_id}}" id="mrvalue9">
                </td>
                <td  class="item form-group">
                    <input type="text"  class="mrvalue form-control" id="mrvalue2" name="hod_name[]" value="{{$mr->hod_name}}" required="required">
                </td>
                <td  class="item form-group">
                    <input type="number" min="0" class="mrvalue form-control" id="mrvalue3" name="no_assistant_professors[]" value="{{$mr->no_assistant_professors}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number" min="0" class="mrvalue form-control" id="mrvalue4" name="no_consultants_fulltime[]" value="{{$mr->no_consultants_fulltime}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number" min="0" class="mrvalue form-control" id="mrvalue5" name="no_consultants_parttime[]" value="{{$mr->no_consultants_parttime}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number" min="0" class="mrvalue form-control" id="mrvalue6" name="no_visiting_consultants[]" value="{{$mr->no_visiting_consultants}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number" min="0" class="mrvalue form-control" id="mrvalue10" name="no_junior_consultants[]" value="{{$mr->no_junior_consultants}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number" min="0" class="mrvalue form-control" id="mrvalue7" name="no_residents[]" value="{{$mr->no_residents}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>