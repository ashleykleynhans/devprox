$( document ).ready(function() {
    $('#submit').click(function () {
        var errors = 0;

        $('.validation-error').hide();

        var name = $('#name').val();
        var surname = $('#surname').val();
        var id_number = $('#id_number').val();
        var date_of_birth = $('#date_of_birth').val();

        var re = /^[a-zA-Z ]+$/;

        if (!name.length) {
            errors++;
            displayError('name-group', 'Name is required');
        } else if (!re.test(name)) {
            errors++;
            displayError('name-group', 'Only standard alpha characters and spaces are permitted for a Name.');
        }

        if (!surname.length) {
            errors++;
            displayError('surname-group', 'Surname is required');
        } else if (!re.test(surname)) {
            errors++;
            displayError('surname-group', 'Only standard alpha characters and spaces are permitted for a Surname.');
        }

        if (!id_number.length) {
            errors++;
            displayError('id-group', 'ID No is required');
        } else if (id_number.length < 13 || !parseInt(id_number)) {
            errors++;
            displayError('id-group', 'A Valid ID No is required (13 digits)');
        }

        if (!date_of_birth.length) {
            errors++;
            displayError('dob-group', 'Date of Birth is required');
        } else {
            re = /^\d{4}(-\d{2}){2}/;

            if (!re.test(date_of_birth)) {
                errors++;
                displayError('dob-group', 'Date of Birth must be a in a valid format (YYYY-MM-DD)');
            } else {
                var dob = date_of_birth.split('-');

                if (dob[1] == 0 || dob[1] > 12 || dob[2] == 0 || dob[2] > 31) {
                    errors++;
                    displayError('dob-group', 'Date of Birth must be a in a valid format (YYYY-MM-DD)');
                }
            }
        }

        if (!errors) {
            console.log('valid');
            $('#test1_form').submit();
            return true;
        }

        return false;
    });
});

function displayError(elementId, message) {
    $('#'+ elementId).append('<div class="validation-error alert alert-danger">' + message + '</div>');
}
