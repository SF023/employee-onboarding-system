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

const fullNameRegex = /^[A-Z][a-z]+(?: [A-Z][a-z]+)+$/;


function validateEmail() {
    const email = emailInput.value.trim();

    if (email === "") {
        emailError.innerText = "This field is required!";
        emailInput.style.borderBottom = "1px solid red";
        return false;
    }
    else if (!emailRegex.test(email)) { 
        emailError.innerText = "Please enter a valid email address!";
        emailInput.style.borderBottom = "1px solid red";
        return false;
    } else {
        emailError.innerText = "";
        emailInput.style.borderBottom = "1px solid green";
        return true;
    }
}

function validateFullName() { 
    const fullNameInput = fullName.value.trim();

    if (fullNameInput === "") {
        fullNameError.innerText = "This field is required!";
        fullName.style.borderBottom = "1px solid red";
        return false;
    } 
    else if (!fullNameRegex.test(fullNameInput)) {
        fullNameError.innerText = "Please enter your full name";
        fullName.style.borderBottom = "1px solid red";
        return false;
    } else {
        fullNameError.innerText = "";
        fullName.style.borderBottom = "1px solid green";
        return true;
    }
}

function validatePosition() {
    const positionInput = position.value.trim();

    if (positionInput === ""){
        positionError.innerText = "This field is required!";
        position.style.borderBottom = "1px solid red";
        return false;
    } else {
        positionError.innerText = "";
        position.style.borderBottom = "1px solid green";
        return true;
    }
}

function validateDepartment() {
    const departmentInput = department.value.trim();
    
    if (departmentInput === ""){
        departmentError.innerText = "This field is required!";
        department.style.borderBottom = "1px solid red";
        return false;
    } else {
        departmentError.innerText = "";
        department.style.borderBottom = "1px solid green";
        return true; 
    }
}

function validateStartDate() {
    const startDateInput = startDate.value.trim();

    if (startDateInput === ""){
        startDateError.innerText = "This field is required!";
        startDate.style.borderBottom = "1px solid red";
        return false;
    } else {
        startDateError.innerText = "";
        startDate.style.borderBottom = "1px solid green";
        return true;
    }
}

// validate form when each input loses focus 
emailInput.addEventListener("blur", validateEmail); 
fullName.addEventListener("blur", validateFullName);
position.addEventListener("blur", validatePosition);
department.addEventListener("blur", validateDepartment);
startDate.addEventListener("blur", validateStartDate);

// add event listener to button 
form.addEventListener("submit", (e) => {

    let valid = true;

    if (!validateEmail()) {
        valid = false;
    }

    if (!validateFullName()) {
        valid = false;
    }

    if (!validatePosition()) {
        valid = false;
    }

    if (!validateDepartment()) {
        valid = false;
    }

    if (!validateStartDate()) {
        valid = false;
    }

    if (!valid){
        e.preventDefault();
    }
});