<body>
    <?php include __DIR__ . '/layout/cabecalho.php' ?>

    <section class="container p-5">
        <form action="/acoes/entrar" method="POST">
            <h1 class="mb-3">Olá, bem-vindo de volta! :)</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Seu e-mail</label>
                <input type="email" class="form-control form-control-sm" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Sua senha</label>
                <input type="password" class="form-control form-control-sm" name="senha" id="senha">
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </section>
</body>