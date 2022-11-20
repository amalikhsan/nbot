<main class="is-flex-shrink-0">
    <section class="mt-6 mb-6">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="container mx-auto">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Foto Ke Teks
                                </p>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <div class="field my-5">
                                        <a data-target="modal-bis" class="js-modal-trigger">
                                            <img src="" style="max-width: 100%; height:200px;margin:auto;" alt="preview" id="img">
                                        </a>
                                        <div class="progresssbk"></div>
                                        <div class="progresss"></div>
                                        <div class="modal" id="modal-bis">
                                            <div class="modal-background"></div>
                                            <div class="modal-content">
                                                <p class="image is-3by4">
                                                    <img src="" id="img1">
                                                </p>
                                            </div>
                                            <button class="modal-close is-large" aria-label="close"></button>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Choose Photo</label>
                                        <div class="control">
                                            <div class="file has-name is-fullwidth">
                                                <label class="file-label">
                                                    <input class="file-input" type="file" name="resume" id="input">
                                                    <span class="file-cta">
                                                        <span class="file-icon">
                                                            <i class="fas fa-upload"></i>
                                                        </span>
                                                        <span class="file-label">
                                                            Pilih Foto
                                                        </span>
                                                    </span>
                                                    <span class="file-name">
                                                    </span>
                                                </label>
                                            </div>
                                            <button id="button">Generate</button>
                                        </div>
                                    </div>
                                    <article class="message is-link">
                                        <div class="message-body">
                                            *Note : Jika menunggu cukup lama, artinya gambar sulit untuk dideteksi.
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="container">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Hasil
                                </p>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <div class="field">
                                        <label class="label">Your Text</label>
                                        <div class="control">
                                            <textarea class="textarea"></textarea>
                                        </div>
                                    </div>
                                    <button class="button is-link w-full" onclick="CopyToCb()">Copy To Clipboard</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://unpkg.com/tesseract.js@v2.0.0-alpha.13/dist/tesseract.min.js"></script>
<script>
    const fileSelector = document.querySelector('input')
    const start = document.querySelector('#button')
    const img = document.querySelector('#img')
    const img1 = document.querySelector('#img1')
    const progress = document.querySelector('.progresss')
    const progressbk = document.querySelector('.progresssbk')
    const textarea = document.querySelector('textarea')
    const input = document.querySelector('#input')
    const file_name = document.querySelector('.file-name')
    img.style.display = "none"
    // first show image on upload
    fileSelector.onchange = () => {
        var file = fileSelector.files[0]
        var imgUrl = window.URL.createObjectURL(new Blob([file], {
            type: 'image/jpg'
        }))
        img.style.display = "block"
        img.src = imgUrl
        img1.src = imgUrl
        file_name.innerHTML = file.name
    }

    // now start text recognition
    start.onclick = () => {
        if (!input.value) {
            return false
        } else {
            textarea.innerHTML = ''
            const rec = new Tesseract.TesseractWorker()
            rec.recognize(fileSelector.files[0])
                .progress(function(response) {
                    if (response.status == 'recognizing text') {
                        const calc = response.progress * 100
                        progressbk.innerHTML = "<strong class='is-link'>" + response.status + "</strong>"
                        progress.innerHTML = "<progress class = 'progress is-info' value='" + calc + "' max = '100' style = 'width:200px;margin:auto;'></progress>"
                    } else {
                        progressbk.innerHTML = "<strong class='is-link'>" + response.status + "</strong>"
                        progress.innerHTML = "<progress class = 'progress is-info' max = '100' style = 'width:200px;margin:auto;'></progress>"
                    }
                })
                .then(function(data) {
                    textarea.innerHTML = data.text
                    progressbk.innerHTML = "<strong class='is-link'>Success</strong>"
                    progress.innerHTML = "<progress class = 'progress is-info' value='100' max = '100' style = 'width:200px;margin:auto;'></progress>"
                })
        }
    }

    function CopyToCb() {
        textarea.select();
        navigator.clipboard.writeText(textarea.value);
    }
</script>