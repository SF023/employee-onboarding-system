// Get references to form and input fields by their IDs
const form = document.getElementById('form');
const fullName = document.getElementById('fullName');
const emailInput = document.getElementById('email'); //
const position = document.getElementById('position');
const department = document.getElementById('department');
const startDate = document.getElementById('startDate');
const button = document.getElementById('btnRegister');

// get references to error message spans by their IDs
const fullNameError = document.getElementById('fullNameError');
const emailError = document.getElementById('emailError'); //
const positionError = document.getElementById('positionError');
const departmentError = document.getElementById('departmentError');
const startDateError = document.getElementById('startDateError');



// function to valudate email using regex 
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;



function validateEmail() {
    const email = emailInput.value.trim();

    if (!emailRegex.test(email)) {
        emailError.innerText = "Please enter a valid email address";
        emailInput.style.borderBottom = "1px solid red";
        return false;
    } else {
        emailError.innerText = "";
        emailInput.style.borderBottom = "";
        return true;
    }
}



function validateFullName() {
    if (fullName.value.trim() === "") {
        fullNameError.innerText = "Please enter a valid email address";
        fullName.style.borderBottom = "1px solid red";
        return false;
    } else {
        fullNameError = "";
        fullName.style.borderBottom = "";
        return true;
    }
}

emailInput.addEventListener("blur", validateEmail); // validate form when the input loses focus
fullName.addEventListener("blur", validateFullName);
// add event listener to button
button.addEventListener("click", (e) => {

    if (!validateEmail()) {
        e.preventDefault();
    }

    if (!validateFullName()){
        e.preventDefault();
    }
    //let hasError = false;
    
})

