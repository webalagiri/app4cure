<div class="panel-heading">
    <h3 class="panel-title">All Filters</h3>
</div>

<div class="panel-body">
    <ul class="nav nav-pills nav-stacked category-menu">
        <li class="@if($dashboard_menu==1) active @endif"><a href="{{ URL::to('/') }}/laboratory/dashboard">Dashboard</a></li>
        <li class="@if($schedule_menu==1) active @endif"><a href="{{ URL::to('/') }}/laboratory/labtest">Lab Tests </a></li>
        <li class="@if($appointment_menu==1) active @endif"><a href="#{{ URL::to('/') }}/laboratory/appointment">Appointments</a></li>
    </ul>

</div>