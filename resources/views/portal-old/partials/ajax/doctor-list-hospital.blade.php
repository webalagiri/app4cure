<?php //print_r($topSpecialists); ?>

<div class="row">

    <div class=" line line-sm"></div>
    @if(count($topSpecialists)>0)
        @foreach($topSpecialists as $hospital)
            <div class="col-md-3">

                <div class=""><img class="img-responsive img-circle" src="{{URL::to('/')}}/viewdoctorimages/{{Crypt::encrypt($hospital->imageUrl)}}"></div>

                <!-- Icons here -->
                <div class="hspic">
                    <div class="row">
                        <div class="col-xs-4"><img src="images/dev/2compare.png"></div>
                        <div class="col-xs-4"><img src="images/dev/2share.png"></div>
                        <div class="col-xs-4"><img src="images/dev/2fav.png"></div>

                    </div>
                </div><!-- /Icons ends -->
                <div class="drn">{{$hospital->name}}</div>
                <div>{{$hospital->location}}</div>
                <div>Since : {{$hospital->year_of_establishment}} Years</div>
                <div>
                    <a href="details/{{$hospital->id}}">
                        <button>View Hospital</button>
                    </a>
                </div>
            </div>
        @endforeach
    @else
        <p>No Hospitals Found</p>
    @endif

</div>
