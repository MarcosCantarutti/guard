<div class="grid grid-cols-2 ">
    <div class="bg-[url('./images/bg.png')] bg-cover bg-no-repeat min-h-screen w-full">
        <div class="mt-20 ml-20">
            <img src="./images/logo.svg" alt="LOGO">
        </div>
    </div>

    <div class="hero bg-zinc-900 min-h-screen text-white">

        <div class="hero-content -mt-20">

            <form action="/registrar" method="post">
                <div class="text-right">Já tem uma conta?<a href="/login" class="btn btn-link">Acessar conta</a></div>
                <div class="card">
                    <div class="card-body">
                        <?php
                        $validacoes = flash()->get('validacoes');
                        ?>
                        <div class="card-title">Criar Conta</div>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-white">Nome</span>
                            </div>
                            <input type="text" placeholder="Nome" class="input input-bordered w-full max-w-xs bg-zinc-900" name="name" />
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-white">Email</span>
                            </div>
                            <input type="email" placeholder="email" class="input input-bordered w-full max-w-xs bg-zinc-900" name="email" />

                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-white">Confirme seu email</span>
                            </div>
                            <input type="email" placeholder="email" class="input input-bordered w-full max-w-xs bg-zinc-900" name="email_confirm" />

                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-white">Senha</span>
                            </div>
                            <input type="password" placeholder="password" class="input input-bordered w-full max-w-xs bg-zinc-900" name="password" />

                        </label>

                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-block">Registrar</button>

                        </div>
                        <?php if (isset($validacoes['name'])): ?>
                            <div class="label text-xs text-error"><?= $validacoes['name'][0]; ?></div>
                        <?php endif; ?>
                        <?php if (isset($validacoes['email'])): ?>
                            <div class="label text-xs text-error"><?= $validacoes['email'][0]; ?></div>
                        <?php endif; ?>
                        <?php if (isset($validacoes['email'])): ?>
                            <div class="label text-xs text-error"><?= $validacoes['email'][1]; ?></div>
                        <?php endif; ?>
                        <?php if (isset($validacoes['password'])): ?>
                            <div class="label text-xs text-error"><?= $validacoes['password'][0]; ?></div>
                        <?php endif; ?>


                    </div>

                </div>

            </form>
        </div>

    </div>
</div>