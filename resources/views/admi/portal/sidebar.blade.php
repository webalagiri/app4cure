<div class="panel-heading">
        <h3 class="panel-title">All Filters</h3>
</div>

<div class="panel-body">
    <ul class="nav nav-pills nav-stacked category-menu">
        <li class="active"><a href="{{ URL::to('/') }}/admin/{{$DisplayName=Session::get('LoginUserId')}}/dashboard">Dashboard</a></li>
        <li><a href="{{ URL::to('/') }}/admin/customer">Customers</a></li>
        <li><a href="{{ URL::to('/') }}/admin/laboratory">Laboratories</a></li>
        <li><a href="#{{ URL::to('/') }}/admin/customer">Pharmacies </a></li>
        <li><a href="#{{ URL::to('/') }}/admin/customer">Hospitals </a></li>
        <li><a href="#{{ URL::to('/') }}/admin/customer">Doctors </a></li>
        <li><a href="#{{ URL::to('/') }}/admin/customer">Vendors </a></li>



    </ul>

</div>