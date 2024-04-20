//log in
function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }



  
function validate()
{
var email = document.login.email.value;
var password = document.login.password.value;

if (email==null || email=="")
{
  alert("Username can't be blank");
  return false;
}
else if (password==null || password=="")
{
  alert("password can't be blank");
  return false;
}
}