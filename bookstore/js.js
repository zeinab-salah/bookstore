function openAddForm() {
  document.getElementById("addform").style.display = "block";
  document.getElementById("updateform").style.display = "none";
  document.getElementById("deleteform").style.display = "none";
  document.getElementById("userform").style.display = "none";
  document.getElementById("orderform").style.display = "none";
}
function openUpdateForm() {
  document.getElementById("updateform").style.display = "block";
  document.getElementById("addform").style.display = "none";  
  document.getElementById("deleteform").style.display = "none";
  document.getElementById("userform").style.display = "none";
  document.getElementById("orderform").style.display = "none";
}
function opendeleteForm() {
  document.getElementById("deleteform").style.display = "block";
  document.getElementById("updateform").style.display = "none";
  document.getElementById("addform").style.display = "none";  
  document.getElementById("userform").style.display = "none";
  document.getElementById("orderform").style.display = "none";
}
function openusersForm() {
  document.getElementById("userform").style.display = "block";
  document.getElementById("updateform").style.display = "none";
  document.getElementById("addform").style.display = "none";  
  document.getElementById("deleteform").style.display = "none";
  document.getElementById("orderform").style.display = "none";
}
function openorderForm() {
  document.getElementById("orderform").style.display = "block";
  document.getElementById("updateform").style.display = "none";
  document.getElementById("addform").style.display = "none";  
  document.getElementById("deleteform").style.display = "none";
  document.getElementById("userform").style.display = "none";
}