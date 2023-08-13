<body>
    <?php include __DIR__ . '/layout/cabecalho.php' ?>

    <section class="container p-5">
        <form action="/acoes/cadastrar" method="POST">
            <h1 class="mb-3">Olá, faça seu cadastro! :)</h1>
            <div class="mb-3">
                <label for="nome" class="form-label">Seu nome</label>
                <input type="text" class="form-control form-control-sm" name="nome" id="nome" required min="3" max="255">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Seu e-mail</label>
                <input type="email" class="form-control form-control-sm" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Sua senha</label>
                <input type="password" class="form-control form-control-sm" name="senha" id="senha" required min="6" max="255">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </section>
</body>