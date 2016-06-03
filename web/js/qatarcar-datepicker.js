$(function() {
    $('input.datepicker').daterangepicker({
        singleDatePicker:   true,
        autoUpdateInput:    true,
        autoApply:          true,
        linkedCalendars:    false,
        opens:              'center',
        locale: {
            format:         "DD-MM-YYYY",
            separator:      " au ",
            firstDay:       1,
            daysOfWeek:     ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
            monthNames:     ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
                "Août", "Septembre", "Octobre", "Novembre", "Décembre"]
        }
    });
});
