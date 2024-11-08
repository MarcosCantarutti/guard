<?php
$validacoes = flash()->get('validacoes');
?>
<div class="grid grid-cols-2">
    <div class="bg-[url('./images/bg.png')] bg-cover bg-no-repeat min-h-screen w-full">
        <div class="mt-20 ml-20">
            <img src="./images/logo.svg" alt="LOGO">
        </div>
    </div>

    <div class="hero mr-40 bg-zinc-900 min-h-screen text-white flex flex-col gap-20 items-center justify-start">
        <div class="mt-10 mb-40 mr-20 self-end">Não tem uma conta? <a href="/registrar" class="text-lime-500 btn-link">Criar Conta</a></div>

        <div class="hero-content -mt-20">



            <form action="/login" method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Acessar Conta</div>

                        <?php require base_path('views/partials/_mensagem.view.php'); ?>

                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-white">Email</span>
                            </div>
                            <input type="email" placeholder="email" class="input input-bordered w-full max-w-xs bg-zinc-900" name="email" value="<?= old('email'); ?>" />
                        </label>
                        <?php if (isset($validacoes['email'])): ?>
                            <div class="label text-xs text-error"><?= $validacoes['email'][0]; ?></div>
                        <?php endif; ?>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-white">Senha</span>
                            </div>
                            <input type="password" placeholder="password" class="input input-bordered w-full max-w-xs bg-zinc-900" name="password" />
                        </label>
                        <?php if (isset($validacoes['password'])): ?>
                            <div class="label text-xs text-error"><?= $validacoes['password'][0]; ?></div>
                        <?php endif; ?>

                        <div class="card-actions justify-end">
                            <button class="bg-lime-500 btn btn-block">Login</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>

    </div>
</div>