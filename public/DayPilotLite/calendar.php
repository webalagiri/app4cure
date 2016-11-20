<!DOCTYPE html>
<html>
<head>
    <title>Calendar</title>

	<!-- helper libraries -->
	<script src="http://localhost/app4cure/public/DayPilotLite/demo/helpers/jquery-1.9.1.min.js" type="text/javascript"></script>
    
	<!-- daypilot libraries -->
        <script src="http://localhost/app4cure/public/DayPilotLite/demo/js/daypilot-all.min.js?v=215" type="text/javascript"></script>

</head>
<body>

<!-- top -->
        

    <div id="main">
        
        <div id="container" >
	        <div id="content">
	            <div>

<div id="dp"></div>

<script type="text/javascript">

    var dp = new DayPilot.Calendar("dp");

    // view
    dp.startDate = "2013-03-25";  // or just dp.startDate = "2013-03-25";
    dp.viewType = "Week";
    
    // event creating
    dp.onTimeRangeSelected = function (args) {
        var name = prompt("New event name:", "Event");
        if (!name) return;
        var e = new DayPilot.Event({
            start: args.start,
            end: args.end,
            id: DayPilot.guid(),
            text: name
        });
        dp.events.add(e);
        dp.clearSelection();
    };
    
    dp.onEventClick = function(args) {
        alert("clicked: " + args.e.id());
    };

    dp.headerDateFormat = "dddd";
    dp.init();

    var e = new DayPilot.Event({
        start: new DayPilot.Date("2013-03-25T12:00:00"),
        end: new DayPilot.Date("2013-03-25T12:00:00").addHours(3).addMinutes(15),
        id: "1",
        text: "Special event"
    });
    dp.events.add(e);
    
</script>

<!-- bottom -->
                </div>
	        </div>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function() {
    var url = window.location.href;
    var filename = url.substring(url.lastIndexOf('/')+1);
    if (filename === "") filename = "index.html";
    $(".menu a[href='" + filename + "']").addClass("selected");
});
        
</script>
<!-- /bottom -->

</body>
</html>

