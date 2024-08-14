function togglePasswordVisibility(inputFieldId, button) {
    var inputField = document.getElementById(inputFieldId);
    var buttonIcons = button.querySelectorAll('img');

    if (inputField.type === 'password') {
        inputField.type = 'text';
        buttonIcons[0].classList.add('hidden');
        buttonIcons[1].classList.remove('hidden');
    } else {
        inputField.type = 'password';
        buttonIcons[0].classList.remove('hidden');
        buttonIcons[1].classList.add('hidden');
    }
}