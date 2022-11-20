<!-- Tombol klik -->
<?php
error_reporting(0);
if (isset($_POST["kirim"])) {
    $text = htmlspecialchars($_POST["tulisan"]);
    $font = htmlspecialchars($_POST["font"]);
    $trans = htmlspecialchars($_POST["trans"]);
    $ff = "font-family:" . $font . ";";
    $tt = "text-transform:" . $trans . ";";
    if (
        strlen($text) == null
        && strlen($font) == null
    ) {
        echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Lengkapi Text',
                    text: 'Text Tidak Boleh Bosong!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    location='index.php?page=bot1'
                }
                })
                </script>
                ";
        return false;
    } else if (strlen($text) > 1850) {
        echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Text Melebihi Batas',
                    text: 'text tidak boleh Lebih Dari 1850 Karakter!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Okay'
                }).then((result) => {
                if (result.isConfirmed) {
                    location='index.php?page=bot1'
                }
                })
            </script>
            ";
        return false;
    }
}
?>
<!-- Start Main -->
<main class="is-flex-shrink-0">
    <section class="mt-6 mb-6">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="card mb-3">
                        <header class="card-header">
                            <p class="card-header-title">
                                Form
                            </p>
                            <button class="card-header-icon" aria-label="more options">
                                <span class="icon">
                                    <i class="far fa-paper-plane" aria-hidden="true"></i>
                                </span>
                            </button>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <form action="" method="post">
                                    <div class="field">
                                        <label class="label">Choose Font</label>
                                        <div class="control">
                                            <div class="select">
                                                <select id="font" onchange="IsiFont()" name="font" required>
                                                    <option value="gaegu" <?= $font == "gaegu" ? 'selected' : '' ?>>gaegu (default)</option>
                                                    <option value="indie flower" <?= $font == "indie flower" ? 'selected' : '' ?>>indie flower</option>
                                                    <option value="Caveat" <?= $font == "Caveat" ? 'selected' : '' ?>>Caveat</option>
                                                    <option value="Comfortaa" <?= $font == "Comfortaa" ? 'selected' : '' ?>>Comfortaa</option>
                                                    <option value="Cookie" <?= $font == "Cookie" ? 'selected' : '' ?>>Cookie</option>
                                                    <option value="Gloria Hallelujah" <?= $font == "Gloria Hallelujah" ? 'selected' : '' ?>>Gloria Hallelujah</option>
                                                    <option value="Macondo" <?= $font == "Macondo" ? 'selected' : '' ?>>Macondo</option>
                                                    <option value="Pacifico" <?= $font == "Pacifico" ? 'selected' : '' ?>>Pacifico</option>
                                                    <option value="Patrick Hand" <?= $font == "Patrick Hand" ? 'selected' : '' ?>>Patrick Hand</option>
                                                    <option value="Sacramento" <?= $font == "Sacramento" ? 'selected' : '' ?>>Sacramento</option>
                                                    <option value="rici" <?= $font == "rici" ? 'selected' : '' ?>>rici font</option>
                                                    <option value="amal" <?= $font == "amal" ? 'selected' : '' ?>>amal font</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Text Transform</label>
                                        <div class="control">
                                            <div class="select">
                                                <select id="trans" onchange="IsiTrans()" name="trans" required>
                                                    <option value="none" <?= $trans == "none" ? 'selected' : '' ?>>none (default)</option>
                                                    <option value="uppercase" <?= $trans == "uppercase" ? 'selected' : '' ?>>uppercase</option>
                                                    <option value="capitalize" <?= $trans == "capitalize" ? 'selected' : '' ?>>capitalize</option>
                                                    <option value="lowercase" <?= $trans == "lowercase" ? 'selected' : '' ?>>lowercase</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">Text (Max 1850 Character)</label>
                                        <div class="control">
                                            <textarea class="textarea" style="<?= $ff ?><?= $tt ?>" id="ex" onkeyup="DataTulis()" placeholder="Masukkan teks yang akan ditulis.." name="tulisan" required><?= $text ?></textarea>
                                        </div>
                                    </div>
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button type="button" role="button" class="button is-primary" onclick="suaraClick()" id="suara"><i class='fas fa-microphone mr-2'></i>Voice (Beta)</button>
                                        </div>
                                        <div class="control ml-auto">
                                            <button class="button is-link" type="submit" name="kirim" onclick="generateText()">Generate</button>
                                        </div>
                                        <div class="control">
                                            <button class="button is-link is-light" type="reset" onclick="location='index.php?page=bot tulis'">Reset</button>
                                        </div>
                                    </div>
                                    <article class="message is-primary">
                                        <div class="message-body">
                                            *Note : Jika memakai voice dan ingin menggunakan enter, selesaikan perekaman voice terlebih dahulu.
                                        </div>
                                    </article>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Preview
                            </p>
                            <button class="card-header-icon" aria-label="more options">
                                <span class="icon">
                                    <i class="far fa-images" aria-hidden="true"></i>
                                </span>
                            </button>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <figure class="p-0">
                                    <div id="capture">
                                        <div style="position:relative;overflow-y:hidden;display:block;">
                                            <img src="screenshot/kertas.jpg" id="img">
                                            <div style="position:absolute;top:0;width:100%;height:99%;" id="div">
                                                <p style="font-size:16px;text-align:left;overflow:hidden;<?= $ff ?><?= $tt ?>" id="p"><?= nl2br($text) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                Download (Picture / Pdf)
                            </p>
                            <button class="card-header-icon" aria-label="more options">
                                <span class="icon">
                                    <i class="far fa-images" aria-hidden="true"></i>
                                </span>
                            </button>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <figure class="p-0">
                                    <div id="capture">
                                        <?php if (isset($_POST["kirim"])) : ?>
                                            <div id="blok"></div>
                                        <?php endif; ?>
                                    </div>
                                </figure>
                                <a id="download" class="button is-link">Download Picture</a>
                                <a id="pdf" class="button is-link">Download Pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- End Main -->
<script src="asset/js/htmltocanvas.js"></script>
<script src="asset/js/pdf.js"></script>
<script>
    window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    const recognition = new SpeechRecognition();

    function DataTulis() {
        var ex = document.getElementById("ex");
        var p = document.getElementById("p");
        p.innerText = ex.value;
    }

    function IsiFont() {
        var font = document.getElementById("font");
        var ex = document.getElementById("ex");
        var p = document.getElementById("p");
        p.style.fontFamily = font.value + ",gaegu";
        ex.style.fontFamily = font.value + ",gaegu";
    }

    function IsiTrans() {
        var trans = document.getElementById("trans");
        var ex = document.getElementById("ex");
        var p = document.getElementById("p");
        p.style.textTransform = trans.value;
        ex.style.textTransform = trans.value;
    }


    function suaraClick() {
        var convert_text = document.getElementById("ex");
        var p = document.getElementById("p");
        var suara = document.getElementById("suara");
        suara.classList.remove("is-primary");
        suara.classList.add("is-danger");
        suara.removeAttribute("onclick");
        suara.setAttribute("onclick", "suaraStop()");
        suara.innerHTML = "<i class='fas fa-microphone-slash mr-2'></i>Stop";
        recognition.interimResults = true;
        recognition.continuous = true;
        recognition.lang = 'id-ID';
        recognition.start();
        recognition.addEventListener('result', e => {
            const transcript = Array.from(e.results)
                .map(result => result[0])
                .map(result => result.transcript)
                .join('');

            const lower = transcript.toLowerCase();
            if (lower.includes('aku nak mati')) {
                location = '';
                var msg = new SpeechSynthesisUtterance();
                msg.lang = 'id';
                msg.volume = 0.3; // 0.1 sampai 1
                msg.rate = 0.8; // 0.1 sampai 10
                msg.pitch = 0; // 0 sampai 2
                msg.text = "Sabar kami ada untuk anda";
                window.speechSynthesis.speak(msg);
            } else {
                convert_text.value = transcript;
                p.innerText = transcript;
            }
        })
    }

    function suaraStop() {
        if (confirm("Apakah anda ingin mengakhiri voice?")) {
            var msg = new SpeechSynthesisUtterance();
            msg.lang = 'en';
            msg.volume = 0.5; // 0.1 sampai 1
            msg.rate = 0.8; // 0.1 sampai 10
            msg.pitch = 0; // 0 sampai 2
            msg.text = "Thank you, now click generate";
            window.speechSynthesis.speak(msg);
            var suara = document.getElementById("suara");
            suara.classList.remove("is-danger");
            suara.classList.add("is-primary");
            suara.removeAttribute("onclick");
            suara.setAttribute("onclick", "suaraClick()");
            suara.innerHTML = "<i class='fas fa-microphone mr-2'></i>Voice (Beta)";
            recognition.stop();
        } else {
            return false;
        }
    }

    function generateText() {
        var convert_text = document.getElementById("ex");
        if (convert_text.value != "") {
            var msg = new SpeechSynthesisUtterance();
            msg.lang = 'en';
            msg.volume = 0.5; // 0.1 sampai 1
            msg.rate = 0.8; // 0.1 sampai 10
            msg.pitch = 0; // 0 sampai 2
            msg.text = "Success generate, now you can download picture or pdf";
            window.speechSynthesis.speak(msg);
        }
    }
</script>
<?php if (isset($_POST["kirim"])) : ?>
    <script>
        html2canvas(document.getElementById("capture")).then(function(canvas) {
            document.getElementById("blok").appendChild(canvas);
            var anchorTag = document.getElementById("download");
            var img = canvas.toDataURL("image/jpeg");
            anchorTag.href = img;
            anchorTag.target = '_blank';
            anchorTag.download = "belajar";
            var anchorTag2 = document.getElementById("pdf");
            var pdf = new jsPDF();
            var marginLeft = 20;
            var marginRight = 20;
            pdf.addImage(canvas.toDataURL("image/jpeg"), "jpeg", marginLeft, marginRight)
            var string = pdf.output('datauristring');
            anchorTag2.href = string;
            anchorTag2.target = '_blank';
            anchorTag2.download = "belajar";
        });
    </script>
<?php endif; ?>