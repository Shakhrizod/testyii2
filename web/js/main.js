
$("#doctors").hide();
$("#patients-direction").click(function() {
    if($(this).is(":checked")) {
        $("#doctors").show();
        $('#patients-doctor_id').attr('required', '');
    } else {
        $("#doctors").hide();
        $('#patients-doctor_id').removeAttr('required');
    }
});