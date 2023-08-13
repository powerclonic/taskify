<header class="navbar bg-body-tertiary">
    <nav class="container-fluid">
        <a href="/" class="navbar-brand">
            <i class="fa-solid fa-list-check"></i>
            Taskify
        </a>
        <div class="d-flex gap-3">
            <?php if (key_exists('autenticado', $_SESSION)) { ?>
                <a href="/dashboard" class="nav-link">Dashboard</a>
                <a href="/acoes/sair" class="nav-link">Sair</a>
            <?php } else { ?>
                <a href="/entrar" class="btn btn-outline-light">Entrar</a>
                <a href="/cadastrar" class="btn btn-outline-info">Cadastrar</a>
            <?php } ?>
        </div>
    </nav>
</header>
<?php if (isset($_SESSION['mensagem'])) { ?>
    <div class="container">
        <div class="m-1 alert alert-<?php echo $_SESSION['mensagem']['tipo']; ?>">
            <?php echo $_SESSION['mensagem']['texto']; ?>
            <?php unset($_SESSION['mensagem']); ?>
        </div>
    </div>
<?php } ?>