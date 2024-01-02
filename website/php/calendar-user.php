
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' /> <script src='fullcalendar-6.1.8/fullcalendar-6.1.8/dist/index.global.js'></script> <!-- I got these from fullcalander library and self studied the code in display part from internet .-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: '2023-01-12',
      initialView: 'timeGridWeek',
      nowIndicator: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      selectMirror: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: 'getBookings.php', // PHP script to fetch booked dates
      
    });

    calendar.render();
  });

</script>
<style>
  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }
</style>
</head>
<body>
  <div id='calendar'></div>
</body>

</html>
