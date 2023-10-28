$('#weight').on('input', function() {
    limitLength(this, 3);
});

$(document).ready(function() {
    $("#height").on("input", function() {
        $("#heightValue").text($(this).val() + " cm");
    });
    $('#height').on('input', function() {
        const heightValue = $(this).val();
        $('#heightLabel').text('Estatura (' + heightValue + ' cm)');
    });
});

function limitLength(element, maxLength) {
    const value = $(element).val();
    if (value.toString().split('.')[0].length > maxLength) {
        $(element).val(value.slice(0, maxLength));
    }
}

