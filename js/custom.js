function validate() {
  var x, text;

  // Get the value of the input field with classes
  name = document.getElementByClass("name").value;
  email = document.getElementByClass("email").value;
  pwd = document.getElementByClass("pwd").value;

  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  // If x is Not a Number or less than one or greater than 10
  if (name = "", email = "", pwd = "" ) {
    text = "Input fields empty!";
  }
  if(email.match(mailformat)) {
    text = "Email must to be valid!";
  }
  if (str.lenght(pwd) < 8) {
    text = "Your password must contain at least 8 characters"
  }
  document.getElementByClass("error").innerHTML = text;
}
