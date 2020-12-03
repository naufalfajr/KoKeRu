<!------------------------------------------------------------ POP-UP ------------------------------------------------------------>
<section id="popup">
    <!-- dialog pertama yang muncul ketika tombol detail di click -->
    <dialog class="mdl-dialog" id="dialog-1">
        <h4 class="mdl-dialog__title">Bukti Kebersihan dan Kerapihan</h4>
        <div class="mdl-dialog__content">
            <!-- form submit gambar
                                Bisa multiple files -->
            <form action="">
                <div class="mdl-textfield mdl-textfield--floating-label is-focused">
                    <input type="file" id="files" name="bukti" multiple class="mdl-textfield__input">
                    <label for="bukti" class="mdl-textfield__label">Select files:</label>
                </div>
                <div>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                        Submit</button>
                </div>
            </form>
            <!-- Thummbnail Gambar yang telah di upload
                                jika di click akan men-fire lightbox -->
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <img src="https://source.unsplash.com/random" alt="img" class="pls-img-200" onclick="fireLightBox()">
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <img src="https://source.unsplash.com/random" alt="img" class="pls-img-200" onclick="fireLightBox()">
                </div>
            </div>
            <div class=" mdl-grid">
                <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <img src="https://source.unsplash.com/random" alt="img" class="pls-img-200" onclick="fireLightBox()">
                </div>
                <div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <img src="https://source.unsplash.com/random" alt="img" class="pls-img-200" onclick="fireLightBox()">
                </div>
            </div>
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button close">Close</button>
        </div>
    </dialog>
    <!-- Lightbox adalah gambar yang ditampilkan
                        menggunakan dialog(modal) -->
    <dialog class="mdl-dialog" id="lightBox">
        <div class="mdl-dialog__content">
            <img src="https://source.unsplash.com/random" alt="img">
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button close-lightBox">Close</button>
        </div>
    </dialog>

    <!-- Filler,
                        Digunakan untuk mendemostrasikan dialog(modal)
                        jika belum ada foto yang di upload -->
    <dialog class="mdl-dialog" id="dialog_kosong">
        <h4 class="mdl-dialog__title">Bukti Kebersihan dan Kerapihan</h4>
        <div class="mdl-dialog__content">
            <form action="">
                <div class="mdl-textfield mdl-textfield--floating-label is-focused">
                    <input type="file" id="files" name="bukti" multiple class="mdl-textfield__input">
                    <label for="bukti" class="mdl-textfield__label">Select files:</label>
                </div>
                <div>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                        Submit</button>
                </div>
            </form>
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button close">Close</button>
        </div>
    </dialog>
    <!-- endof filler -->
</section>