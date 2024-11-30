const fileInput = document.getElementById('fileUpload');
  const fileNameSpan = document.getElementById('fileName');
  const removeFileSpan = document.getElementById('removeFile');
  
  fileInput.addEventListener('change', function () {
    if (fileInput.files.length > 0) {
      const file = fileInput.files[0];
      const fileName = file.name;
  
      // Validasi jika file adalah gambar
      if (!file.type.startsWith('image/')) {
        alert('Harap unggah file gambar.');
        fileInput.value = ''; // Reset input file
        fileNameSpan.textContent = 'No file chosen';
        removeFileSpan.style.display = 'none';
        return;
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
          fileNameSpan.textContent = 'No file chosen';
          removeFileSpan.style.display = 'none';
          return;
        }
  
        // Jika validasi lolos, tampilkan nama file dan opsi pratinjau
        fileNameSpan.textContent = fileName;
        removeFileSpan.style.display = 'inline';
        fileNameSpan.onclick = function () {
          showPreview(previewUrl);
        };
      };
  
      img.src = previewUrl; // Load gambar untuk validasi dimensi
    } else {
      fileNameSpan.textContent = 'No file chosen';
      removeFileSpan.style.display = 'none';
    }
  });
  
  removeFileSpan.addEventListener('click', function () {
    fileInput.value = '';  // Clear file input
    fileNameSpan.textContent = 'No file chosen';
    removeFileSpan.style.display = 'none';  // Hide remove button
  });
  
  function showPreview(url) {
      const modal = document.getElementById('previewImg');
      const previewImage = document.getElementById('previewImage');
      const close = document.getElementById('closeImg')
      
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
      const modal = document.getElementById('previewImg');
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

//about
  const fileInputabout = document.getElementById('fileUploadAbout');
  const fileNameSpanabout = document.getElementById('fileAbout');
  const removeFileSpanabout = document.getElementById('removeFileAbout');

  fileInputabout.addEventListener('change', function () {
    if (fileInputabout.files.length > 0) {
      const file = fileInputabout.files[0];
      const fileName = file.name;
  
      // Validasi jika file adalah gambar
      if (!file.type.startsWith('image/')) {
        alert('Harap unggah file gambar.');
        fileInputabout.value = ''; // Reset input file
        fileNameSpanabout.textContent = 'No file chosen';
        removeFileSpanabout.style.display = 'none';
        return;
      }
  
      const img = new Image();
      const previewUrl = URL.createObjectURL(file);
  
      img.onload = function () {
        const width = img.naturalWidth;
        const height = img.naturalHeight;
  
        // Validasi rasio aspek 1:1
        if (width !== height) {
          alert('Gambar harus memiliki rasio aspek 1:1.');
          fileInputabout.value = ''; // Reset input file
          fileNameSpanabout.textContent = 'No file chosen';
          removeFileSpanabout.style.display = 'none';
          return;
        }
  
        // Jika validasi lolos, tampilkan nama file
        fileNameSpanabout.textContent = fileName;
        removeFileSpanabout.style.display = 'inline';
      };
  
      img.src = previewUrl; // Load gambar untuk validasi dimensi
    } else {
      fileNameSpanabout.textContent = 'No file chosen';
      removeFileSpanabout.style.display = 'none';
    }
  });
  
  removeFileSpanabout.addEventListener('click', function () {
    fileInputabout.value = ''; // Clear file input
    fileNameSpanabout.textContent = 'No file chosen';
    removeFileSpanabout.style.display = 'none'; // Hide remove button
  });

//fitur a

const fileUploadHeroimg = document.getElementById('fileHeroimg');
const fileHeroimg = document.getElementById('fileUploadHeroimg');
const removeFileHeroimg = document.getElementById('removeFileHeroimg');

fileHeroimg.addEventListener('change', function () {
  if (fileHeroimg.files.length > 0) {
    const file = fileHeroimg.files[0];
    const fileName = file.name;

    // Validasi jika file adalah gambar
    if (!file.type.startsWith('image/')) {
      alert('Harap unggah file gambar.');
      fileHeroimg.value = ''; // Reset input file
      fileUploadHeroimg.textContent = 'No file chosen';
      removeFileHeroimg.style.display = 'none';
      return;
    }

    const img = new Image();
    const previewUrl = URL.createObjectURL(file);

    img.onload = function () {
      const width = img.naturalWidth;
      const height = img.naturalHeight;

      // Validasi rasio aspek 1:1
      if (width !== height) {
        alert('Gambar harus memiliki rasio aspek 1:1.');
        fileHeroimg.value = ''; // Reset input file
        fileUploadHeroimg.textContent = 'No file chosen';
        removeFileHeroimg.style.display = 'none';
        return;
      }

      // Jika validasi lolos, tampilkan nama file
      fileUploadHeroimg.textContent = fileName;
      removeFileHeroimg.style.display = 'inline';
    };

    img.src = previewUrl; // Load gambar untuk validasi dimensi
  } else {
    fileUploadHeroimg.textContent = 'No file chosen';
    removeFileHeroimg.style.display = 'none';
  }
});

removeFileHeroimg.addEventListener('click', function () {
  fileHeroimg.value = ''; // Clear file input
  fileUploadHeroimg.textContent = 'No file chosen';
  removeFileHeroimg.style.display = 'none'; // Hide remove button
});


//fitur b

const fileUploadsubhero1_img = document.getElementById('filesubhero1_img');
const filesubhero1_img = document.getElementById('fileUploadsubhero1_img');
const removeFilesubhero1_img = document.getElementById('removeFilesubhero1_img');

filesubhero1_img.addEventListener('change', function () {
  if (filesubhero1_img.files.length > 0) {
    const file = filesubhero1_img.files[0];
    const fileName = file.name;

    // Validasi jika file adalah gambar
    if (!file.type.startsWith('image/')) {
      alert('Harap unggah file gambar.');
      filesubhero1_img.value = ''; // Reset input file
      fileUploadsubhero1_img.textContent = 'No file chosen';
      removeFilesubhero1_img.style.display = 'none';
      return;
    }

    const img = new Image();
    const previewUrl = URL.createObjectURL(file);

    img.onload = function () {
      const width = img.naturalWidth;
      const height = img.naturalHeight;

      // Validasi rasio aspek 1:1
      if (width !== height) {
        alert('Gambar harus memiliki rasio aspek 1:1.');
        filesubhero1_img.value = ''; // Reset input file
        fileUploadsubhero1_img.textContent = 'No file chosen';
        removeFilesubhero1_img.style.display = 'none';
        return;
      }

      // Jika validasi lolos, tampilkan nama file
      fileUploadsubhero1_img.textContent = fileName;
      removeFilesubhero1_img.style.display = 'inline';
    };

    img.src = previewUrl; // Load gambar untuk validasi dimensi
  } else {
    fileUploadsubhero1_img.textContent = 'No file chosen';
    removeFilesubhero1_img.style.display = 'none';
  }
});

removeFilesubhero1_img.addEventListener('click', function () {
  filesubhero1_img.value = ''; // Clear file input
  fileUploadsubhero1_img.textContent = 'No file chosen';
  removeFilesubhero1_img.style.display = 'none'; // Hide remove button
});

// fitur c

const fileUploadsubhero2_img = document.getElementById('filesubhero2_img');
const filesubhero2_img = document.getElementById('fileUploadsubhero2_img');
const removeFilesubhero2_img = document.getElementById('removeFilesubhero2_img');

filesubhero2_img.addEventListener('change', function () {
  if (filesubhero2_img.files.length > 0) {
    const file = filesubhero2_img.files[0];
    const fileName = file.name;

    // Validasi jika file adalah gambar
    if (!file.type.startsWith('image/')) {
      alert('Harap unggah file gambar.');
      filesubhero2_img.value = ''; // Reset input file
      fileUploadsubhero2_img.textContent = 'No file chosen';
      removeFilesubhero2_img.style.display = 'none';
      return;
    }

    const img = new Image();
    const previewUrl = URL.createObjectURL(file);

    img.onload = function () {
      const width = img.naturalWidth;
      const height = img.naturalHeight;

      // Validasi rasio aspek 1:1
      if (width !== height) {
        alert('Gambar harus memiliki rasio aspek 1:1.');
        filesubhero2_img.value = ''; // Reset input file
        fileUploadsubhero2_img.textContent = 'No file chosen';
        removeFilesubhero2_img.style.display = 'none';
        return;
      }

      // Jika validasi lolos, tampilkan nama file
      fileUploadsubhero2_img.textContent = fileName;
      removeFilesubhero2_img.style.display = 'inline';
    };

    img.src = previewUrl; // Load gambar untuk validasi dimensi
  } else {
    fileUploadsubhero2_img.textContent = 'No file chosen';
    removeFilesubhero2_img.style.display = 'none';
  }
});

removeFilesubhero2_img.addEventListener('click', function () {
  filesubhero2_img.value = ''; // Clear file input
  fileUploadsubhero2_img.textContent = 'No file chosen';
  removeFilesubhero2_img.style.display = 'none'; // Hide remove button
});

//fitur d

const fileUploadsubhero3_img = document.getElementById('filesubhero3_img');
const filesubhero3_img = document.getElementById('fileUploadsubhero3_img');
const removeFilesubhero3_img = document.getElementById('removeFilesubhero3_img');

filesubhero3_img.addEventListener('change', function () {
  if (filesubhero3_img.files.length > 0) {
    const file = filesubhero3_img.files[0];
    const fileName = file.name;

    // Validasi jika file adalah gambar
    if (!file.type.startsWith('image/')) {
      alert('Harap unggah file gambar.');
      filesubhero3_img.value = ''; // Reset input file
      fileUploadsubhero3_img.textContent = 'No file chosen';
      removeFilesubhero3_img.style.display = 'none';
      return;
    }

    const img = new Image();
    const previewUrl = URL.createObjectURL(file);

    img.onload = function () {
      const width = img.naturalWidth;
      const height = img.naturalHeight;

      // Validasi rasio aspek 1:1
      if (width !== height) {
        alert('Gambar harus memiliki rasio aspek 1:1.');
        filesubhero3_img.value = ''; // Reset input file
        fileUploadsubhero3_img.textContent = 'No file chosen';
        removeFilesubhero3_img.style.display = 'none';
        return;
      }

      // Jika validasi lolos, tampilkan nama file
      fileUploadsubhero3_img.textContent = fileName;
      removeFilesubhero3_img.style.display = 'inline';
    };

    img.src = previewUrl; // Load gambar untuk validasi dimensi
  } else {
    fileUploadsubhero3_img.textContent = 'No file chosen';
    removeFilesubhero3_img.style.display = 'none';
  }
});

removeFilesubhero3_img.addEventListener('click', function () {
  filesubhero3_img.value = ''; // Clear file input
  fileUploadsubhero3_img.textContent = 'No file chosen';
  removeFilesubhero3_img.style.display = 'none'; // Hide remove button
});

//fitur e

const fileUploadsubhero4_img = document.getElementById('filesubhero4_img');
const filesubhero4_img = document.getElementById('fileUploadsubhero4_img');
const removeFilesubhero4_img = document.getElementById('removeFilesubhero4_img');

filesubhero4_img.addEventListener('change', function () {
  if (filesubhero4_img.files.length > 0) {
    const file = filesubhero4_img.files[0];
    const fileName = file.name;

    // Validasi jika file adalah gambar
    if (!file.type.startsWith('image/')) {
      alert('Harap unggah file gambar.');
      filesubhero4_img.value = ''; // Reset input file
      fileUploadsubhero4_img.textContent = 'No file chosen';
      removeFilesubhero4_img.style.display = 'none';
      return;
    }

    const img = new Image();
    const previewUrl = URL.createObjectURL(file);

    img.onload = function () {
      const width = img.naturalWidth;
      const height = img.naturalHeight;

      // Validasi rasio aspek 1:1
      if (width !== height) {
        alert('Gambar harus memiliki rasio aspek 1:1.');
        filesubhero4_img.value = ''; // Reset input file
        fileUploadsubhero4_img.textContent = 'No file chosen';
        removeFilesubhero4_img.style.display = 'none';
        return;
      }

      // Jika validasi lolos, tampilkan nama file
      fileUploadsubhero4_img.textContent = fileName;
      removeFilesubhero4_img.style.display = 'inline';
    };

    img.src = previewUrl; // Load gambar untuk validasi dimensi
  } else {
    fileUploadsubhero4_img.textContent = 'No file chosen';
    removeFilesubhero4_img.style.display = 'none';
  }
});

removeFilesubhero4_img.addEventListener('click', function () {
  filesubhero4_img.value = ''; // Clear file input
  fileUploadsubhero4_img.textContent = 'No file chosen';
  removeFilesubhero4_img.style.display = 'none'; // Hide remove button
});
