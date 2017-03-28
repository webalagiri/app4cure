<table class="table datatable" style="font-size:13px">
    <thead>
    <tr style="background:#483E55;color:#fff">
        <th>Facility Name</th>
        <th>Services Available</th>
        <th>Specifications</th>
        <th>Staff total</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody class="inc1">
    @if(sizeof($medicalFacilities)>0)
        @foreach($medicalFacilities as $med)
            <tr id="med_id_{{$med->medical_facility_id}}" class="controls1" >
                <td class="item form-group">
                    {{$med->medical_facility_name}}

                    <input type="hidden" class="mrchange" name="mr_change_id[]" value="0" id="medicalfacilityvalue10">
                    <input type="hidden" name="medicalfacility_name[]" id="medicalfacilityvalue1" class="medicalfacilityvalue form-control ui-autocomplete-inputt" value="{{$med->medical_facility_name}}"  required="required" >
                    {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="{{$treat->treatment_id}}_{{$treat->treatment_name}}">--}}
                    <input type="hidden" class="med_id" name="medicalfacility_id[]" value="{{$med->medical_facility_id}}" id="medicalfacility4">
                </td>
                <td  class="item form-group">
                    In house
                    <input type="radio" name="options_{{$med->medical_facility_id}}" value="1" id="medicalfacilityvalue2" class="medicalfacilityvalue" @if($med->medical_facility_typestatus_id==1) checked="checked" @endif >
                    Out sourced
                    <input type="radio" name="options_{{$med->medical_facility_id}}" value="2"  id="medicalfacilityvalue2" class="medicalfacilityvalue" @if($med->medical_facility_typestatus_id==2) checked="checked" @endif >
                    NA
                    <input type="radio" name="options_{{$med->medical_facility_id}}" value="3"  id="medicalfacilityvalue2" class="medicalfacilityvalue" @if($med->medical_facility_typestatus_id==3) checked="checked" @endif  @if($med->medical_facility_typestatus_id=="") checked="checked" @endif >

                </td>
                <td  class="item form-group">
                    <input type="text" name="specification" value="{{$med->medical_facility_specification}}" class="form-control medicalfacilityvalue" id="medicalfacilityvalue3">
                </td>
                <td  class="item form-group">
                    <input type="number" name="no_of_staff" value="{{$med->medical_facility_staff}}" class="form-control medicalfacilityvalue" id="medicalfacilityvalue4">
                </td>
                <td><input type="hidden" class="form-control" name="id[]" value="{{$med->medical_facility_id}}" id="medicalfacilityvalue5">
                    <input type="hidden" class="form-control" name="hospitalId" value="{{Auth::user()->id}}">
                    <!--
                    <a href="javascript:void(0);"class="delete-treat btn btn-danger btn-rounded btn-condensed btn-sm" id="treatappend"  name="append" resource="{{$med->medical_facility_id}}"><span class="fa fa-times"></span></a>
                    -->
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>