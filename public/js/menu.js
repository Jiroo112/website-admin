console.log("ok");

const addButton = document.getElementById('addMenu');
const modal = document.getElementById('addMenuModal');
const cancelButton = document.getElementById('cancelMenu');
const form = document.getElementById('addmenuForm');

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

const fileInput = document.getElementById('fileUpload');
  const fileNameSpan = document.getElementById('fileName');
  const removeFileSpan = document.getElementById('removeFile');
  
  fileInput.addEventListener('change', function () {
    if (fileInput.files.length > 0) {
      fileNameSpan.textContent = fileInput.files[0].name;
      removeFileSpan.style.display = 'inline';
      const file = this.files[0];
          fileName.textContent = file.name;
          const previewUrl = URL.createObjectURL(file);
          fileName.onclick = function() {
              showPreview(previewUrl);
          };
    } else {
      fileNameSpan.textContent = 'No file chosen';
    }
  });
  
  removeFileSpan.addEventListener('click', function () {
    fileInput.value = '';  // Clear file input
    fileNameSpan.textContent = 'No file chosen';
    removeFileSpan.style.display = 'none';  // Hide remove button
  });
  
  function showPreview(url) {
      const modal = document.getElementById('previewModal');
      const previewImage = document.getElementById('previewImage');
      const close = document.getElementById('closeModal')
      
      previewImage.src = url;
      modal.style.display = 'flex';

      close.addEventListener('click', ()=>{
          modal.style.display = 'none';
      })
      
      modal.onclick = function(e) {
          if (e.target === modal) {
              closePreview();
          }
      };
  }

  function closePreview() {
      const modal = document.getElementById('previewModal');
      modal.style.display = 'none';
  }
  const editFileNameSpan = document.getElementById('editFileName');
  const editRemoveFileSpan = document.getElementById('editRemoveFile');

   // Add file input handler
   const editFileInput = document.getElementById('editFileUpload');
   if (editFileInput) {
       editFileInput.addEventListener('change', function() {
           const editFileNameSpan = document.getElementById('editFileName');
           const editRemoveFileSpan = document.getElementById('editRemoveFile');
           
           if (this.files.length > 0) {
               editFileNameSpan.textContent = this.files[0].name;
               editRemoveFileSpan.style.display = 'inline';
               
               // Preview for new file
               const file = this.files[0];
               const previewUrl = URL.createObjectURL(file);
               editFileNameSpan.onclick = () => showPreview(previewUrl);
           } else {
               editFileNameSpan.textContent = 'No file chosen';
               editRemoveFileSpan.style.display = 'none';
           }
       });

  editRemoveFileSpan.addEventListener('click', function () {
  editFileInput.value = '';  // Clear file input
  editFileNameSpan.textContent = 'No file chosen';
  editRemoveFileSpan.style.display = 'none';  // Hide remove button
  });
}