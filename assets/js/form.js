// function sendMail(event) {
//   event.preventDefault();
//   let parms = {
//     firstName: document.getElementById("firstName").value,
//     lastName: document.getElementById("lastName").value,
//     companyName: document.getElementById("companyName").value,
//     phone: document.getElementById("phone").value,
//     email: document.getElementById("email").value,
//     message: document.getElementById("message").value,
//   };
//   emailjs.send("service_h8edw2d", "template_ogmu1l8", parms).then(
//     function (response) {
//       console.log("SUCCESS!", response.status, response.text);
//       alert("Message sent successfully");
//     },
//     function (error) {
//       console.log("FAILED...", error);
//       alert("Message not sent");
//     }
//   );
// }
function sendMail(event) {
  event.preventDefault();

  // Collect form data
  const form = document.getElementById("form");
  const formData = new FormData(form);

  // Convert FormData to an object
  const formObject = {};
  formData.forEach((value, key) => {
    formObject[key] = value;
  });

  // Use EmailJS to send the form data
  emailjs.send("service_h8edw2d", "template_ogmu1l8", formObject).then(
    () => {
      alert("Message sent successfully!");
      form.reset();
    },
    (error) => {
      alert("Failed to send message. Please try again.");
      console.error("EmailJS error:", error);
    }
  );
}
