<div class="panel-heading">
        <h3 class="panel-title">All Filters</h3>
</div>

<div class="panel-body">
    <ul class="nav nav-pills nav-stacked category-menu">
        <li class="@if($dashboard_menu==1) active @endif"><a href="{{ URL::to('/') }}/admin/dashboard">Dashboard</a></li>
        <li class="@if($customer_menu==1) active @endif"><a href="{{ URL::to('/') }}/admin/customer">Customers</a></li>
        <li class="@if($lab_menu==1) active @endif"><a href="{{ URL::to('/') }}/admin/laboratory">Laboratories</a></li>
        <li class="@if($hospital_menu==1) active @endif"><a href="{{ URL::to('/') }}/admin/hospital">Hospitals </a></li>
        <li class="@if($doctor_menu==1) active @endif"><a href="{{ URL::to('/') }}/admin/doctor">Doctors </a></li>
        <li class="@if($pharmacy_menu==1) active @endif"><a href="#{{ URL::to('/') }}/admin/pharmacy">Pharmacies </a></li>
        <li class="@if($vendor_menu==1) active @endif"><a href="#{{ URL::to('/') }}/admin/vendor">Vendors </a></li>



    </ul>

</div>