<table class="table datatable" style="font-size:13px">
    <thead>
    <tr style="background:#483E55;color:#fff">
        <th>Paramedical Resource</th>
        <th>Matrons</th>
        <th>Charge Nurses</th>
        <th>Senior Nurses</th>
        <th>Register Staff Nurses</th>
        <th>Nursing Assistants</th>
        <th>Physio</th>
        <th>Occupational Therapy</th>
        <th>ODP</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody class="inc1">

    @if(sizeof($paramedicalResources)>0)
        @foreach($paramedicalResources as $param)
            <tr  id="pmr_id_{{$param->paramedical_resource_id}}" class="controls1" >
                <td class="item form-group">
                    <input type="hidden" class="mrchange" name="pmr_change_id[]" value="0" id="mrvalue12">
                    {{$param->paramedical_resource_name}}
                    <input type="hidden"  class="pmrvalue form-control" id="pmrvalue1" name="paramedical_resource_name[]" value="{{$param->paramedical_resource_name}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                    {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="{{$treat->treatment_id}}_{{$treat->treatment_name}}">--}}
                    <input type="hidden" class="pmr_id" name="paramedical_resource_id[]" value="{{$param->paramedical_resource_id}}" id="pmrvalue11">
                </td>
                <td  class="item form-group">
                    <input type="number"  class="pmrvalue form-control" id="pmrvalue2" name="no_matrons[]" value="{{$param->no_matrons}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number"  class="pmrvalue form-control" id="pmrvalue3" name="no_charge_nurses[]" value="{{$param->no_charge_nurses}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number"  class="pmrvalue form-control" id="pmrvalue4" name="no_senior_nurses[]" value="{{$param->no_senior_nurses}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number"  class="pmrvalue form-control" id="pmrvalue5" name="no_registered_staff_nurses[]" value="{{$param->no_registered_staff_nurses}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number"  class="pmrvalue form-control" id="pmrvalue6" name="no_nursing_assistants[]" value="{{$param->no_nursing_assistants}}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number"  class="pmrvalue form-control" id="pmrvalue7" name="no_physio[]" value="{{$param->no_physio }}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number"  class="pmrvalue form-control" id="pmrvalue8" name="occupational_therapy[]" value="{{$param->occupational_therapy }}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td  class="item form-group">
                    <input type="number"  class="pmrvalue form-control" id="pmrvalue9" name="odp[]" value="{{$param->odp }}" data-validate-length-range="1" data-validate-words="1" required="required"/>
                </td>
                <td><input type="hidden" class="form-control" name="id[]" value="{{$param->paramedical_resource_id}}" id="mrvalue10">
                    <input type="hidden" class="form-control" name="hospitalId" value="{{Auth::user()->id}}">
                    <!--
                    <a href="javascript:void(0);"class="delete-treat btn btn-danger btn-rounded btn-condensed btn-sm" id="treatappend"  name="append" resource="{{$param->paramedical_resource_id}}"><span class="fa fa-times"></span></a>
                    -->
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>