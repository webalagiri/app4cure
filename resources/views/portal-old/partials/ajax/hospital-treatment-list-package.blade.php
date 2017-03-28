<?php //echo count($treatmentDetails); ?>


    @if(count($treatmentDetails)>0)
        <div class="row">
            <div class="col-sm-6"><b>Treatment Name</b></div>
            <div class="col-sm-6"><b>Price Range</b></div>
            <div class="col-sm-4 hidden"><b>Speciality Name</b></div>
        </div>
        <div class="line-xs"></div>
        @foreach($treatmentDetails as $treatment)
            <div class="row">
                <div class="col-sm-6">{{$treatment->treatment_name}}</div>

                <div class="col-sm-6">@if($treatment->price_range_from=="0.00")
                                         @else
                                          {{$treatment->price_range_from}}-
                                          @endif
                    {{$treatment->price_range_to}}

                </div>

            </div>
            <div class="line-xs"></div>
        @endforeach
    @else
        <div class="row">

            <p style="padding: 20px;"> {{ trans('messages.1023') }} </p>

        </div>

    @endif

