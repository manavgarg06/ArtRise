const loginForm = document.getElementById("admin");

loginForm.addEventListener("submit", (event) => {
  event.preventDefault(); // prevent the default form submission behavior

  const username = document.getElementById("uname").value;
  const password = document.getElementById("psw").value;
  if(username=="admin" && password=="123")
    window.location.replace("admin.php");
  else
    alert("Wrong ID or Password");
});