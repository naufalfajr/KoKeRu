/*
 * Cek ketersedian tag dialog pada browser
 * (firefox, safari, IE).
 * Jika tidak ada maka gunakan dialog Polyfill.
 * Jika menambah dialog baru, tambahakan method
 * registerDialog baru dengan masukan id emelen.
 * Masih belum sempurna untuk layar kecil.
 */
var dialog = document.querySelector("dialog");
if (!dialog.showModal) {
  dialogPolyfill.registerDialog(dialog);
  dialogPolyfill.registerDialog(lightBox);
  dialogPolyfill.registerDialog(dialog_kosong);
}

/*
 * Fungsi untuk menampilkan dialog(modal)
 * dijalankan saat onclick btn pada card.
 * Lightbox adalah gambar yang ditampilkan
 * menggunakan dialog(modal).
 * Lightbox stacking diatas dialog-1
 */
function fireModal() {
  dialog = document.querySelector("#dialog-1");
  dialog.showModal();
  dialog.querySelector(".close").addEventListener("click", function () {
    dialog.close();
    dialog.open = false;
  });
}

function fireLightBox() {
  lightBox = document.querySelector("#lightBox");
  lightBox.showModal();
  lightBox
    .querySelector(".close-lightBox")
    .addEventListener("click", function () {
      lightBox.close();
      lightBox.open = false;
    });
}

// Script Hanya untuk demo
function fireModalKosongDemo() {
  dialog = document.querySelector("#dialog_kosong");
  dialog.showModal();
  dialog.querySelector(".close").addEventListener("click", function () {
    dialog.close();
  });
}
// endOf grup fungsi dialog
