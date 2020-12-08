/*
 * Cek ketersedian tag dialog pada browser
 * (firefox, safari, IE).
 * Jika tidak ada maka gunakan dialog Polyfill.
 * Jika menambah dialog baru, tambahakan method
 * registerDialog baru dengan masukan id emelen.
 * Masih belum sempurna untuk layar kecil.
 */
if (document.querySelector("dialog")) {
  var dialog = document.querySelector("dialog");
  if (!dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
    dialogPolyfill.registerDialog(lightBox);
    dialogPolyfill.registerDialog(dialog_kosong);
  }
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

//Script untuk menampilkan tanggal
setInterval(Tanggal, 1000);

function Tanggal() {
  let d = new Date();
  var hari;
  switch (d.getDay()) {
      case 0:
        hari = "Minggu";
        break;
      case 1:
        hari = "Senin";
        break;
      case 2:
        hari = "Selasa";
        break;
      case 3:
        hari = "Rabu";
        break;
      case 4:
        hari = "Kamis";
        break;
      case 5:
        hari = "Jumat";
        break;
      case 6:
        hari = "Sabtu";
        break;
  }
  var bulan;
  switch (d.getMonth()) {
    case 0:
      bulan = "Januari";
      break;
    case 1:
      bulan = "Februari";
      break;
    case 2:
      bulan = "Maret";
      break;
    case 3:
      bulan = "April";
      break;
    case 4:
      bulan = "Mei";
      break;
    case 5:
      bulan = "Juni";
      break;
    case 6:
      bulan = "Juli";
      break;
    case 7:
      bulan = "Agustus";
      break;
    case 8:
      bulan = "September";
      break;
    case 9:
      bulan = "Oktober";
      break;
    case 10:
      bulan = "November";
      break;
    case 11:
      bulan = "Desember";
      break;
  }
  document.getElementById("date").innerHTML=
  hari + ", " + d.getDate() + " " + bulan + " " + d.getFullYear() + " " +
  d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
}

// endOf grup fungsi

/*
 * Menghapus kelas is-invalid dari div mdl-textfield
 */
$("#email").on("focusin", function () {
  $("#formEmail").removeClass("is-invalid");
});
$("#password").on("select", function () {
  $("#formPassword").removeClass("is-invalid");
});
