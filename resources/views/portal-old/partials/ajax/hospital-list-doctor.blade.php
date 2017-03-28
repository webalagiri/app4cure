<?php //print_r($topSpecialists); ?>

<div class="row">

    <div class=" line line-sm"></div>
    @if(count($topSpecialists)>0)
        @foreach($topSpecialists as $doctor)
            <div class="col-sm-3 doclistacc">

                <div class="doclistimg">
                    <img class="img-responsive img-circle" src="{{URL::to('/')}}/viewdoctorimages/{{Crypt::encrypt($doctor->imageUrl)}}">
                </div>
                <div class="doclistinfo" style="height: 120px;overflow: hidden;">
                    <div class="drn">{{$doctor->first_name}} {{$doctor->last_name}}</div>
                    <div>{{$doctor->education}}</div>
                    <div>Experience : {{$doctor->total_experience}} Years</div>
                </div>
                <div class="dividersmall" style="margin:7px 0"></div>
                <div>
                    <a href="doctordetails/{{$doctor->doctor_id}}" target="_blank">
                        <button class="btn btn-primary btn-block">View Doctor</button>
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <p>No Specialists Found</p>
    @endif

</div>
