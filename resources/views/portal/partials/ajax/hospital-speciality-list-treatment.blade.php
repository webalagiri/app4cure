<?php //print_r($topSpecialists); ?>
<style>
    .poplgi {
        float: left;
        width: 32%;
        margin: 3px;
    }
</style>
<div class="row">
    <h4>Treatments</h4>
    <div class="line line-sm" style="margin: 1px 0px 30px 0px;"></div>
    @if(count($treatments)>0)
        <div class="col-md-12">

            <ul class="list-group">
        @foreach($treatments as $treatment)
                  <li class="list-group-item poplgi"><a href="#"><div>{{$treatment->treatment_name}}</div></a></li>
        @endforeach
            </ul>
        </div>
    @else
        <p style="padding: 20px;"> {{ trans('messages.1021') }}  </p>
    @endif

</div>
