<?php //print_r($topSpecialists); ?>

<div class="row">
    <h4>Specialists</h4>
    <div class="line line-sm" style="margin: 1px 0px 30px 0px;"></div>
    @if(count($topSpecialists)>0)
        @foreach($topSpecialists as $doctor)
            <div class="col-md-3" style="padding-bottom:20px;">
                <div class=""><img class="img-responsive img-circle" src="{{URL::to('/')}}/viewdoctorimages/{{Crypt::encrypt($doctor->imageUrl)}}"></div>
                <div class="doclistinfo" style="height: 120px;overflow: hidden;">
                    <div class="drn">{{$doctor->first_name}} {{$doctor->last_name}}</div>
                    <div>{{$doctor->education}}</div>
                    @if($doctor->total_experience>0)
                    <div>Experience : {{$doctor->total_experience}} Years</div>
                     @else
                    @endif
                </div>
                <div class="dividersmall" style="margin:7px 0"></div>
                <div>
                    <a href="{{ URL::to('/') }}/doctordetails/{{$doctor->doctor_id}}" target="_blank">
                        <button class="btn btn-primary btn-block">View Profile</button>
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <p style="padding: 20px;">{{ trans('messages.1022') }}</p>
    @endif

</div>
