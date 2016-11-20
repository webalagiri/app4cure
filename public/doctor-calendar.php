<div id="dp"></div>

<!-- helper libraries -->
<script src="http://javascript.daypilot.org/demo/helpers/jquery-1.9.1.min.js" type="text/javascript"></script>

<!-- daypilot libraries -->
<script src="http://javascript.daypilot.org/demo/js/daypilot-all.min.js?v=215" type="text/javascript"></script>

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
        text: "Apollo"
    });
    dp.events.add(e);
    
</script>

