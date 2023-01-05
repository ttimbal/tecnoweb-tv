<div>
    <div id="calendar">
    </div>
    <script>
        calendar();

        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('component.initialized', (component) => {
            })
            Livewire.hook('element.updated', (el, component) => {
                console.log(component)
            })
        });

        window.addEventListener('contentChanged', event => {
            console.log(event)
            calendar();
        });

        function calendar() {


            const calendarEl = document.getElementById('calendar');

            const eventsToLoad = @json($events);
            console.log(eventsToLoad)
            const events = [];
            const weekday = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sabado","Domingo"];
            eventsToLoad.forEach((item) => {
                let start_date = new Date(item.start_date);

                let end_date = new Date(item.end_date);
                console.log(start_date)
                while (start_date <= end_date) {
                    const shortDate = start_date.toISOString().substring(0, 10);
                    if (item.start_date <= shortDate) {
                        const day = weekday[start_date.getDay()];
                        console.log(day)
                        for (let i = 0; i < item.days.length; i++) {
                            if (item.days[i].name === day) {
                                events.push({
                                    title: item.name,
                                    start: shortDate + 'T' + item.start_time,
                                    end: shortDate + 'T' + item.end_time,
                                    id: item.id
                                })
                            }
                        }
                    }
                    start_date.setDate(start_date.getDate() + 1)
                    console.log(start_date.toLocaleDateString())
                    console.log(start_date.toISOString())
                }


            });

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    start: 'timeGridWeek,dayGridMonth,timeGridDay',
                    //start: 'dayGridMonth,timeGridWeek,timeGridDay custom1',
                    center: 'title',
                    end: 'prev,next'
                    //end: 'custom2 prevYear,prev,next,nextYear'
                },
                /*        footerToolbar: {
                            start: 'custom1,custom2',
                            center: '',
                            end: 'prev,next'
                        },*/
                initialDate: '2023-01-04',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                dayMaxEvents: true,
                selectable: true,
                events,
                /*events: [
                    {
                        title: 'Conference',
                        start: '2023-01-04',
                        end: '2023-01-04'
                    },
                    {
                        title: 'Meeting',
                        start: '2023-01-04T10:35:00',
                        end: '2023-01-04T12:30:00',
                        test: '2023-01-04T12:30:00',
                    },
                ],*/
                dateClick: function (info) {
                    //alert('clicked ' + info.dateStr);
                },
                select: function (info) {
                    Livewire.emit('createEvent', info)
                    //alert('selected ' + info.startStr + ' to ' + info.endStr);
                },
                eventClick: function (info) {
                    // $('#createModal').modal('toggle');

                    Livewire.emit('eventClicked', info)
                    //alert(JSON.stringify(info))
                    /*alert('Event: ' + info.event.title);
                    alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    alert('View: ' + info.view.type);*/

                    // change the border color just for fun
                    //info.el.style.borderColor = 'red';
                },
                customButtons: {
                    custom1: {
                        text: 'custom 1',
                        click: function () {
                            alert('clicked custom button 1!');
                        }
                    },
                    custom2: {
                        text: 'custom 2',
                        click: function () {
                            alert('clicked custom button 2!');
                        }
                    }
                },

            });

            calendar.render();
        }
    </script>

</div>

