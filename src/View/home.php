<body>
    <?php include __DIR__ . '/layout/cabecalho.php' ?>

    <style>
        .imagem {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
    </style>

    <section class="container-fluid d-grid">
        <article class="row d-flex justify-center align-center p-5 bg-body-secondary"">
            <h1 class="text-center">Taskify, a solução completa.</h1>
        </article>
        <article>
            <img src="/images/imagem-home-1.webp" class="imagem">
        </article>
        <article class="row gap-0" >
            <div class="p-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">Fácil e prático</h3>
                        <h6 class="card-subtitle text-body-tertiary mb-2">feito para você.</h6>
                        <p class="card-text">O Taskify&trade; é a solução completa para você organizar de vez sua vida, trabalho e muito mais!</p>
                        <a href="/cadastrar" class="card-button btn btn-success">QUERO ME CADASTRAR</a>
                    </div>
                </div>
            </div>
            <div class="p-2 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title">Grátis e acessível</h3>
                        <h6 class="card-subtitle text-body-tertiary mb-2">para sempre.</h6>
                        <p class="card-text">O Taskify&trade; além de ser completo, também é de graça! E assim será para sempre.</p>
                        <a href="/cadastrar" class="card-button btn btn-success">QUERO ME CADASTRAR</a>
                    </div>
                </div>
            </div>
        </article>
        <article>
            <img src="/images/imagem-home-2.jpeg" class="imagem">
        </article>
        <article class="row d-flex justify-center align-center p-5 bg-body-secondary"">
            <h1 class="text-center">&copy;Taskify - 2023</h1>
        </article>
    </section>
</body>