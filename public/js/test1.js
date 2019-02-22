$( document ).ready(function() {
    $('#submit').click(function () {
        var errors = 0;

        $('.validation-error').hide();

        var name = $('#name').val();
        var surname = $('#surname').val();
        var id_number = $('#id_number').val();
        var date_of_birth = $('#date_of_birth').val();
        var idIsValid = false;
        var dobIsValid = false;

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
            displayError('id-group', 'ID No is required');
        } else if (id_number.length < 13 || !parseInt(id_number)) {
            displayError('id-group', 'A Valid ID No is required (13 digits)');
        } else {
            idIsValid = true;
        }

        if (!date_of_birth.length) {
            displayError('dob-group', 'Date of Birth is required');
        } else {
            re = /^\d{2}\/\d{2}\/\d{4}$/;

            if (!re.test(date_of_birth)) {
                displayError('dob-group', 'Date of Birth must be a in a valid format (dd/mm/YYYY)');
            } else {
                var dob = date_of_birth.split('/');

                if (dob[1] == 0 || dob[1] > 12 || dob[0] == 0 || dob[0] > 31) {
                    displayError('dob-group', 'Date of Birth must be a in a valid format (dd/mm/YYYY)');
                } else {
                    dobIsValid = true;
                }
            }
        }

        if (!idIsValid || !dobIsValid) {
            errors++;
        }

        if (!errors) {
            $('#test1_form').submit();
            return true;
        }

        return false;
    });
});

function displayError(elementId, message) {
    $('#'+ elementId).append('<div class="validation-error alert alert-danger">' + message + '</div>');
}
