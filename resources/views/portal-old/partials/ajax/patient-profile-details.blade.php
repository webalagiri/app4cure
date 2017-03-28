
<div class="col-sm-6">
    <div  class="form-group">
        <div class="col-md-5 col-xs-12  control-label">
            {!! Form::label('name', 'Patient Name:')!!}
        </div>
        <div class="col-md-7 col-xs-7 line-height-30"> {{$patientList[0]->first_name}}  {{$patientList[0]->last_name}}</div>
    </div>
    <div class="clear"></div>

    <div class="form-group">
        <div class="col-md-5 col-xs-12  control-label">
            {!! Form::label('email', 'Patient Email:')!!}
        </div>
        <div class="col-md-7 col-xs-12 line-height-30">  {{$patientList[0]->email}}</div>
    </div><div class="clear"></div>


    <div class="form-group">
        <div class="col-md-5 col-xs-12  control-label">
            {!! Form::label('gender', 'Patient Gender:')!!}
        </div>
        <div class="col-md-7 col-xs-7 line-height-30">
            @if($patientList[0]->gender==1)
                Male
            @else
                Female
            @endif

        </div>
    </div><div class="clear"></div>

</div>
<div class="col-sm-6">
    <div class="form-group">
        <div class="col-md-5 col-xs-12  control-label">
            {!! Form::label('country', 'Patient Country:')!!}
        </div>
        <div class="col-md-7 col-xs-12 line-height-30">  {{$patientList[0]->country}}</div>
    </div><div class="clear"></div>

    <div class="form-group">
        <div class="col-md-5 col-xs-12  control-label">
            {!! Form::label('mobile', 'Patient Mobile:')!!}
        </div>
        <div class="col-md-7 col-xs-7 line-height-30">    {{$patientList[0]->mobile}}</div>
    </div><div class="clear"></div>
    <div class="form-group">
        <div class="col-md-5 col-xs-12  control-label">
            {!! Form::label('age', 'Patient Age:')!!}
        </div>
        <div class="col-md-7 col-xs-7 line-height-30"> {{$patientList[0]->age}}</div>
    </div><div class="clear"></div>
</div>
