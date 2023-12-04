function isEmpty(input) {
    return $.trim(input) === '';
}

function validateFields(rules) {
    for (const rule of rules) {
        if (!rule.check()) {
            Swal.fire('Error', rule.message, 'error');
            return false;
        }
    }
    return true;
}
