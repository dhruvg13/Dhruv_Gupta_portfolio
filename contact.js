const form = document.querySelector("form");
const fullName = document.getElementById("name");
const email = document.getElementById("email");
const subject = document.getElementById("subject");
const mess = document.getElementById("message")

function sendEmail(){
    const bodyMessage = 'Full Name: ${fullName.value}<br> Email: ${email.value}<br> Message: $(mess.value'; 
    Email.send({
        Host : "smtp.elasticemail.com",
        Username : "dhruvgupta486@gmail.com",
        Password : "41776667B35FBC9E87FCEE944734A4D19536",
        To : 'dhruvgupta486@gmail.com',
        From : "dhruvgupta486@gmail.com",
        Subject : subject.value,
        Body : bodyMessage 
    }).then(
      message => {
        if (message == "OK") {
            Swal.fire({
                title: "Success!",
                text: "Message sent successfully!",
                icon: "success"
              });
        }
      }
    );
}

form.addEventListener("submit",(e) => {
    e.preventDefault();

    sendEmail();
})