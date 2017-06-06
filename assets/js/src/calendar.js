(function(window, $){

    $(document).ready(initCalendar);

    function initCalendar()
    {
        $('#calendar-events').eventCalendar({
            jsonData: window.calendarEvents
        });        
    }
})(window, jQuery);