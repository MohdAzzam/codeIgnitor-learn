const form = document.getElementById('signupForm');
const errorElement = document.getElementById('error');
errorElement.style.display='none';

/**
 * Form validation
 */
form.addEventListener('submit', (e) => {
    let messages=[];
    if (form['firstname'].value === '' || form['firstname'].value ===null) {
        messages.push('First name required');
    }
    if (form['lastname'].value === ''||form['lastname'].value ===null) {
        messages.push('last name required');
    }
    if (form['email'].value === ''||form['email'].value === null) {
        messages.push('Email required');
    }
    if (form['password'].value === ''||form['password'].value === null) {
        messages.push('password required')
    }
    if (form['password'].value !== form['password_confirm'].value || form['password_confirm'].value===null) {
    messages.push('password and confirm password not match')
    }
    if (messages.length > 0) {
        e.preventDefault()
        errorElement.style.display='block';
        errorElement.innerHTML = messages.join('<ol></ol>')
    }


})


