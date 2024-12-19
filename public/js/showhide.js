function showHidePassword(element) {
    const inputPassword = element.previousElementSibling;
    const icon = element
    
    if (inputPassword.type === 'password') {
        inputPassword.type = 'text';
        icon.classList.remove('bx-show');
        icon.classList.add('bx-hide');
    } else {
        inputPassword.type = 'password';
        icon.classList.remove('bx-hide');
        icon.classList.add('bx-show');
    }
}