<?php //print_r($topSpecialists); ?>
<style>
    .poplgi {
        float: left;
        width: 32%;
        margin: 3px;
    }
</style>
<div class="row">

    @if(count($conditions)>0)
        <div class="col-md-12">
            <ul class="list-group">
        @foreach($conditions as $condition)
                  <li class="list-group-item poplgi"><a href="#"><div>{{$condition->condition_name}}</div></a></li>
        @endforeach
            </ul>
        </div>
    @else
        <p style="padding: 20px;">No Condition Found</p>
    @endif

</div>
