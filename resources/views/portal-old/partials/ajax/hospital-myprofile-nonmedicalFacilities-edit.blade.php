<table class="table datatable" style="font-size:13px">
    <thead>
    <tr>
        <th>Facility Name</th>
        <th>Services Available</th>
        <th>24Hrs</th>
        <th>Specifications</th>
        <th>Staff total</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    </tr>
    </thead>
    <tbody class="inc1">
    @if(sizeof($nonMedicalFacilities)>0)
        @foreach ($nonMedicalFacilities as $otherfc)
            <tr id="nmf_id_{{$otherfc->nonmedical_facility_id}}" class="controls1" >
                <td class="item form-group">
                    {{$otherfc->nonmedical_facility_name}}
                    <input type="hidden" class="mrchange" name="nonmed_change_id[]" value="0" id="othermedicalfacilityvalue10">
                    <input type="hidden" name="othermedicalfacility_name[]" id="othermedicalfacilityvalue1" class="othermedicalfacilityvalue form-control" value="{{$otherfc->nonmedical_facility_name}}" >
                    {{--<input type="hidden" id="treatment_id_value" name="treatment_id[]" value="{{$treat->treatment_id}}_{{$treat->treatment_name}}">--}}
                    <input type="hidden" class="nonmed_id" name="otherfacility_id[]" value="{{$otherfc->nonmedical_facility_id}}" id="othermedicalfacilityvalue9">
                </td>
                <td  class="item form-group">
                    In house
                    <input type="radio" name="options_{{$otherfc->nonmedical_facility_id}}" value="1" id="othermedicalfacilityvalue2" class="othermedicalfacilityvalue" @if($otherfc->nonmedical_facility_typestatus_id==1) checked="checked" @endif>
                    Out sourced
                    <input type="radio" name="options_{{$otherfc->nonmedical_facility_id}}" value="2" id="othermedicalfacilityvalue2" class="othermedicalfacilityvalue" @if($otherfc->nonmedical_facility_typestatus_id==2) checked="checked" @endif>
                    NA
                    <input type="radio" name="options_{{$otherfc->nonmedical_facility_id}}" value="3" id="othermedicalfacilityvalue2" class="othermedicalfacilityvalue" @if($otherfc->nonmedical_facility_typestatus_id==3) checked="checked" @endif @if($otherfc->nonmedical_facility_typestatus_id=="") checked="checked" @endif>

                </td>
                <td  class="item form-group">
                    <input type="checkbox" value="1" name="nonmedical_facility_fulltime" id="othermedicalfacilityvalue3" class="othermedicalfacilityvalue">
                </td>
                <td  class="item form-group">
                    <input type="text" name="specification" value="{{$otherfc->nonmedical_facility_specification}}" class="form-control othermedicalfacilityvalue" id="othermedicalfacilityvalue4">
                </td>
                <td  class="item form-group">
                    <input type="number" name="no_of_staff" value="{{$otherfc->nonmedical_facility_staff}}" class="form-control othermedicalfacilityvalue" id="othermedicalfacilityvalue5">
                </td>
                <td><input type="hidden" class="form-control" name="id[]" value="{{$otherfc->nonmedical_facility_id}}" id="othermedicalfacilityvalue6">
                    <input type="hidden" class="form-control" name="hospitalId" value="{{Auth::user()->id}}">
                    <!--
                    <a href="javascript:void(0);"class="delete-treat btn btn-danger btn-rounded btn-condensed btn-sm" id="treatappend"  name="append" resource="{{$otherfc->nonmedical_facility_id}}"><span class="fa fa-times"></span></a>
                    -->
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>