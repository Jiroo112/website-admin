const fileInput = document.getElementById('fileUpload');
const profileImage = document.getElementById('profile-image')

  
  fileInput.addEventListener('change', function () {
    if (fileInput.files.length > 0) {
      const file = fileInput.files[0];
      const fileName = file.name;
  
      // Validasi jika file adalah gambar
      if (!file.type.startsWith('image/')) {
        alert('Harap unggah file gambar.');
        fileInput.value = ''; // Reset input file
        return;
      }

      if (file) {
        const reader = new FileReader(); // Buat FileReader untuk membaca file

        // Ketika file selesai dibaca
        reader.onload = function (e) {
            profileImage.src = e.target.result; // Ubah sumber gambar ke hasil baca file
        };

        reader.readAsDataURL(file); // Baca file sebagai URL data
    }
  
      const img = new Image();
      const previewUrl = URL.createObjectURL(file);
  
      img.onload = function () {
        const width = img.naturalWidth;
        const height = img.naturalHeight;
  
        // Validasi rasio aspek 1:1
        if (width !== height) {
          alert('Gambar harus memiliki rasio aspek 1:1.');
          fileInput.value = ''; // Reset input file
          return;
        }
  
        // Jika validasi lolos, tampilkan nama file dan opsi pratinjau
        fileNameSpan.textContent = fileName;
        fileNameSpan.onclick = function () {
          showPreview(previewUrl);
        };
      };
  
      img.src = previewUrl; // Load gambar untuk validasi dimensi
    } else {
    }
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