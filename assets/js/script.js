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
            
            function loadDynamicContentModal(idruang) {
              $('#demo-modal').load('functions/popup.php?idruang=' + idruang,
              function() {
                $('#modal-mdl').modal({
                  show : true
                });
              });  
            }

            function loadLightBox(bukti) {
              $('#light-box-img').attr("src","assets/img/"+bukti);
              $('#modal-mdl').modal('hide');
              $('#light-box').modal('show');  
            }

            function loadLightBoxManager(bukti) {
              $('#light-box-img').attr("src","../assets/img/"+bukti);
              $('#modal-mdl').modal('hide');
              $('#light-box').modal('show');  
            }

            function loadModal() {
              $('#light-box').modal('hide');
              $('#modal-mdl').modal('show');
            }
            
            // function fireLightBox() {
            //   lightBox = document.querySelector("#lightBox");
            //   lightBox.showModal();
            //   lightBox
            //   .querySelector(".close-lightBox")
            //   .addEventListener("click", function () {
            //     lightBox.close();
            //     lightBox.open = false;
            //   });
            // }
            
            // // Script Hanya untuk demo
            // function fireModalKosongDemo() {
            //   dialog = document.querySelector("#dialog_kosong");
            //   dialog.showModal();
            //   dialog.querySelector(".close").addEventListener("click", function () {
            //     dialog.close();
            //   });
            // }
            
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
                                                    document.getElementById("date").innerHTML =
                                                    hari +
                                                    ", " +
                                                    d.getDate() +
                                                    " " +
                                                    bulan +
                                                    " " +
                                                    d.getFullYear() +
                                                    " " +
                                                    d.getHours() +
                                                    ":" +
                                                    d.getMinutes() +
                                                    ":" +
                                                    d.getSeconds();
                                                  }
                                                  
                                                  //Script Ajax Edit Jobdesk
                                                  function getXMLHTTPRequest() {
                                                    if (window.XMLHttpRequest) {
                                                      //code for odern browsers
                                                      return new XMLHttpRequest();
                                                    } else {
                                                      //code for IE browser
                                                      return new ActiveXObject("Microsoft.XMLHTTP");
                                                    }
                                                  }

                                                  function edit_jobdesk(idruang) {
                                                    var xmlhttp = getXMLHTTPRequest();
                                                    //get input value
                                                    var ruang = encodeURI(idruang);
                                                    var idcs = encodeURI(document.getElementById('cs').value);
                                                    //validate
                                                    if(ruang != "" && cs != ""){
                                                      //set url and inner
                                                      var url = "functions/edit_jobdesk.php?idruang=" + ruang + "&idcs=" + idcs;
                                                      //alert(url)
                                                      var inner = 'edit_response';
                                                      //open request
                                                      xmlhttp.open('GET', url, true);
                                                      xmlhttp.onreadystatechange = function() {
                                                        document.getElementById(inner).innerHTML = '<img src="../assets/ajax-loader.gif" />';
                                                        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {
                                                          document.getElementById(inner).innerHTML = xmlhttp.responseText;
                                                        }
                                                        return false;
                                                      }
                                                      xmlhttp.send(null);
                                                    }else{
                                                      alert("Please fill all the fields");
                                                    }
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
                                                  