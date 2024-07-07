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
      // alert("Message sent successfully!");
      console.log("Redirecting to thank you page");
      form.reset();
      window.location.href =
        "/thankyou.html"; 
        console.log(window.location.href);// Adjust path as needed
    },
    (error) => {
      alert("Failed to send message. Please try again.");
      console.error("EmailJS error:", error);
    }
  );
}
