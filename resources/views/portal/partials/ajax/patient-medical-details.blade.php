<div class="col-sm-6">
    <div class="form-group">
        <div class="col-md-5 col-xs-12  control-label">
            {!! Form::label('name', 'Treatment Name:')!!}
        </div>
        <div class="col-md-7 col-xs-12 line-height-30">{{$medicalProfile[0]->treatment_name}}</div>
    </div><div class="clear"></div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <div class="col-md-5 col-xs-12  control-label">
            {!! Form::label('name', 'Treatment Details:')!!}
        </div>
        <div class="col-md-7 col-xs-7 line-height-30">{{$medicalProfile[0]->treatment_details}}</div>
    </div><div class="clear"></div>
</div>