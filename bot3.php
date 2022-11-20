<main class="is-flex-shrink-0">
    <section class="mt-6 mb-6">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="container mx-auto">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Translate
                                </p>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <div class="wrapper">
                                        <div class="text-input">
                                            <textarea spellcheck="false" class="from-text" placeholder="Enter text"></textarea>
                                            <textarea spellcheck="false" readonly disabled class="to-text" placeholder="Translation"></textarea>
                                        </div>
                                        <ul class="controls">
                                            <li class="row from">
                                                <div class="icons">
                                                    <i id="from" class="fas fa-copy"></i>
                                                    <i id="from" class="fas fa-volume-up"></i>
                                                </div>
                                                <select></select>
                                            </li>
                                            <li class="exchange"><i class="fas fa-exchange-alt"></i></li>
                                            <li class="row to">
                                                <select></select>
                                                <div class="icons">
                                                    <i id="to" class="fas fa-volume-up"></i>
                                                    <i id="to" class="fas fa-copy"></i>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <button id="button">Translate Text</button>
                                </div>
                                <article class="message is-link">
                                    <div class="message-body">
                                        *Note : Jika ingin menggunakan <i class="fas fa-volume-up"></i> dan <i class="fas fa-copy"></i>, klik tombol translate terlebih dahulu.
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="asset/js/countries.js"></script>
<script src="asset/js/script.js"></script>