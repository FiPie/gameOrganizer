document.addEventListener('DOMContentLoaded', function () {


    var initialLocaleCode = 'en';
    var localeSelectorEl = document.getElementById('locale-selector');
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'UTC',
        editable: true,
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridMonth,timeGridDay,listMonth'
        },
        locale: initialLocaleCode,
        buttonIcons: false, // show the prev/next text
        weekNumbers: true,
        navLinks: true, // can click day/week names to navigate views

        eventLimit: true, // allow "more" link when too many events
        events: '/gameOrganizer/controllers/timetable/read.php',
        selectable: true,
        selectHelper: true,
        displayEventTime: true,
        droppable: true,
        
//        forceEventDuration: false,
//        defaultAllDayEventDuration: '00:01:00',
//        defaultTimedEventDuration: '00:30:00',
//        forceEventDuration: true,

        select: function (info) {
            var title = prompt("Enter Event Title");
            if (title)
            {
                var start = info.startStr;
                var end = info.endStr;
                $.ajax({
                    url: "/gameOrganizer/controllers/timetable/create.php",
                    type: "POST",
                    data: {title: title, start: start, end: end},
                    success: function ()
                    {
                        calendar.rerenderEvents();
                        calendar.refetchEvents();
                        console.log('succes:', title);
                        console.log('Start:', start.slice(0, 19).replace('T', ' '));
                        console.log('End:', end.slice(0, 19).replace('T', ' '));
                        console.log('ID:', info.event.id);  
                    }
                })
            }

        },
        editable: true,

        eventResize: function (info)
        {
            var start = info.event.start.toISOString().slice(0, 19).replace('T', ' ');
            var end = info.event.end.toISOString().slice(0, 19).replace('T', ' ');
            var title = info.event.title;
            var id = info.event.id;
            $.ajax({
                url: "/gameOrganizer/controllers/timetable/update.php",
                type: "POST",
                data: {title: title, start: start, end: end, id: id},
                success: function (response) {
                    calendar.rerenderEvents();
                    calendar.refetchEvents();
                    console.log('succes:', info.event.title);
                    console.log('Start:', info.event.start.toISOString().slice(0, 19).replace('T', ' '));
                    console.log('End:', info.event.end.toISOString().slice(0, 19).replace('T', ' '));
                    console.log('ID:', info.event.id);
                    
                }
            })
        },

        eventDrop: function (info)
        {
            alert(info.event.title + " was dropped on " + info.event.start.toISOString());

            if (!confirm("Are you sure about this change?")) {
                info.revert();
            }
            var start = info.event.start.toISOString().slice(0, 19).replace('T', ' ');
            var end = info.event.end.toISOString().slice(0, 19).replace('T', ' ');
            var title = info.event.title;
            var id = info.event.id;
            if (info.newResource) {
                var recourceid = info.newResource.id;
                $.ajax({
                    url: "/gameOrganizer/controllers/timetable/update.php",
                    type: "POST",
//                    data: 'id=' + id + '&start=' + start + '&end=' + end + '&resourceId=' + recourceid,
                    data: {title: title, start: start, end: end, id: id},
                    success: function (response) {
                        console.log('succes:', info.event.title);
                        console.log('End:', info.event.end.toISOString().slice(0, 19).replace('T', ' '));
                        console.log('ID:', info.event.id);
                        calendar.rerenderEvents();
                        calendar.refetchEvents();
                    }
                });
            } else {
                var recourceid = "";
                console.log('Type Auto:', recourceid);
                $.ajax({
                    type: 'POST',
                    url: '/gameOrganizer/controllers/timetable/update.php',
                    data: {title: title, start: start, end: end, id: id},
                    success: function (response) {
                        console.log('succes:', info.event.title);
                        console.log('Start:', info.event.start.toISOString().slice(0, 19).replace('T', ' '));
                        console.log('End:', info.event.end.toISOString().slice(0, 19).replace('T', ' '));
                        console.log('ID:', info.event.id);
                        console.log('auto:', recourceid);
                        calendar.rerenderEvents();
                        calendar.refetchEvents();
                    },
                });
            }
        },

        eventClick: function (info)
        {
            if (confirm("Are you sure you want to remove it?"))
            {
                var id = info.event.id;

                $.ajax({
                    type: 'POST',
                    url: '/gameOrganizer/controllers/timetable/delete.php',

                    data: {id: id},
                    success: function ()
                    {
                        console.log('deleted ID:', info.event.id);
                        console.log('deleted title:', info.event.title);
                        calendar.rerenderEvents();
                        calendar.refetchEvents();
                    }
                })
            }
        },

    });

    calendar.render();

    // build the locale selector's options
    calendar.getAvailableLocaleCodes().forEach(function (localeCode) {
        var optionEl = document.createElement('option');
        optionEl.value = localeCode;
        optionEl.selected = localeCode == initialLocaleCode;
        optionEl.innerText = localeCode;
        localeSelectorEl.appendChild(optionEl);
    });

    // when the selected option changes, dynamically change the calendar option
    localeSelectorEl.addEventListener('change', function () {
        if (this.value) {
            calendar.setOption('locale', this.value);
        }
    });
});