
function copyText(button) {
    var targetId = button.getAttribute('data-copy');
    var targetElement = document.getElementById(targetId);
    var textToCopy = targetElement.getAttribute('data-value');

    var el = document.createElement('textarea');
    el.value = textToCopy;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
}

document.getElementById('upload-file').addEventListener('click', function() {
    // Trigger the file input
    document.getElementById('file').click();
});

document.getElementById('file').addEventListener('change', function() {
    // Get the file name
    var fileName = this.files[0].name;

    // Update the file name text and show the file info
    document.getElementById('fileName').textContent = fileName;
    document.getElementById('file-info').classList.remove('hidden');
    document.getElementById('placeholder').classList.add('hidden');

    // Enable the confirm button
    document.getElementById('confirm-payment').removeAttribute('disabled');
});