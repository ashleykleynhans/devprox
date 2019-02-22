$( document ).ready(function() {
    $('#submit').click(function () {
        $('.validation-error').hide();

        var name = $('#name').val();
        var surname = $('#surname').val();
        var id_number = $('#id_number').val();
        var date_of_birth = $('#date_of_birth').val();

        var re = /^[a-zA-Z ]+$/;

        if (!name.length) {
            displayError('name-group', 'Name is required');
        } else if (!re.test(name)) {
            displayError('name-group', 'Only standard alpha characters and spaces are permitted for a Name.');
        }

        if (!surname.length) {
            displayError('surname-group', 'Surname is required');
        } else if (!re.test(surname)) {
            displayError('surname-group', 'Only standard alpha characters and spaces are permitted for a Surname.');
        }

        if (!id_number.length) {
            displayError('id-group', 'ID No is required');
        } else if (id_number.length < 13 || !parseInt(id_number)) {
            displayError('id-group', 'A Valid ID No is required (13 digits)');
        }

        if (!date_of_birth.length) {
            displayError('dob-group', 'Date of Birth is required');
        } else {
            re = /^\d{4}(-\d{2}){2}/;

            if (!re.test(date_of_birth)) {
                displayError('dob-group', 'Date of Birth must be a in a valid format (YYYY-MM-DD)');
            } else {
                var dob = date_of_birth.split('-');

                if (dob[1] == 0 || dob[1] > 12 || dob[2] == 0 || dob[2] > 31) {
                    displayError('dob-group', 'Date of Birth must be a in a valid format (YYYY-MM-DD)');
                }
            }
        }

        return false;
    });
});

function displayError(elementId, message) {
    $('#'+ elementId).append('<div class="validation-error alert alert-danger">' + message + '</div>');
}
