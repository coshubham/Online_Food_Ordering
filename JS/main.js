var loader = document.getElementById("preloader");

window.addEventListener("load", function () {
    setTimeout(function () {
        loader.style.display = "none";
    }, 1500);

});

document.getElementById('signupForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission

    // Get form values
    const username = document.getElementById('username').value;
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const password = document.getElementById('password').value;
    const address = document.getElementById('address').value;

    // Log values to the console (you can replace this with actual form handling)
    console.log('Form Submitted', {
        username,
        firstName,
        lastName,
        email,
        phone,
        password,
        address
    });

    // Optionally reset the form
    this.reset();
});


