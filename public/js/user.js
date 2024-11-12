const addButton = document.getElementById('addUser');
const modal = document.getElementById('addUserModal');
const cancelButton = document.getElementById('cancelUser');
const form = document.getElementById('adduserForm');

function openModal() {
  modal.classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeModal() {
  modal.classList.remove('active');
  document.body.style.overflow = 'auto';
  form.reset();
}

function reset(){
document.querySelectorAll(".form-container input").forEach(input => {
  input.value = "";
});

document.querySelectorAll(".form-container textarea").forEach(textarea => {
textarea.value = "";
});

document.querySelectorAll(".form-container select").forEach(select => {
select.selectedIndex = 0; 
});
}


cancelButton.addEventListener('click', closeModal);
addButton.addEventListener('click', openModal);

modal.addEventListener('click', (e) => {
if (e.target === modal) {
    closeModal();
}
});