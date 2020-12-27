function previewImg() {
    const gambar = document.querySelector('#gambar');
    const sampulLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    sampulLabel.textContent = gambar.files[0].name;

    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(gambar.files[0]);

    fileSampul.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}