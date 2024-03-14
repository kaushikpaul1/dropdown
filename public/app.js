function enableRadio() {
    // Enable radio buttons when Sub-Division is selected
    var isSubDivFilled = $('#subdiv').val() !== '';
    $('#municipality').prop('disabled', !isSubDivFilled);
    $('#block').prop('disabled', !isSubDivFilled);
}
function handleRadio(radio) {
    // Enable BM code field
    $('#bmcode').prop('disabled', false);

}
$(document).ready(function() {
    // Disable District and Sub-Division dropdowns initially
    $('#dist, #subdiv').prop('disabled', true);

    // Enable District and Sub-Division dropdowns when State is clicked
    $("#state").click(function() {
        $('#dist, #subdiv').prop('disabled', false);
    });

    // Rest of your existing code...
    
});

