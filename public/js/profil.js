function changeProfileImage() {
    const profileImage = document.getElementById('profile-image');
    const fileInput = document.createElement('input');
    fileInput.type = 'file';
    fileInput.accept = 'image/*';
    fileInput.onchange = function() {
        const file = this.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            profileImage.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
    fileInput.click();
}

function editProfile() {
    // Implement profile editing functionality here
    console.log("Edit profile button clicked");
}