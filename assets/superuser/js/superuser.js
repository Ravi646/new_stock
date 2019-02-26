$('.date-picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function(dateText, inst){ 
        function isDonePressed(){
                            return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
                        }
if (isDonePressed()){

                    var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, month, 1));
                    // console.log('Done is pressed')
                        }
            }
}).datepicker("setDate", new Date('1 '+ $('.date-picker').data('year')));
$('.relocate').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
    format: 'YYYY-MM-DD'
    }
});
