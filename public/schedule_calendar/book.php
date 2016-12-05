<?php include_once('functions.php'); ?>
<?php 
if(isset($_REQUEST['doctorid']))
{
	$doctorid=$_REQUEST['doctorid'];
}
else
{
	$doctorid='0';
}	
?>
<link type="text/css" rel="stylesheet" href="style.css"/>
<style>
#calender_section_top ul li {
    width: 73px !important;
}
#calender_section_bot ul li {
    width: 73px !important;
}
.date_popup_wrap {
    position: absolute;
    width: 210px !important;
    height: 115px !important;
    z-index: 9999;
    top: -115px;
    left: -55px;
    background: none !important;
    color: #666 !important;
}
.date_window {
    margin-top: 20px;
    margin-bottom: 2px;
    padding: 5px;
    font-size: 16px;
    margin-left: 9px;
    margin-right: 14px;
    background: #fff;
    border: 2px solid #ccc;
}

</style>
<script src="jquery.min.js"></script>
<div id="calendar_div">
	<?php echo getCalender($doctorid); ?>
</div>
