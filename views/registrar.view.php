<div class="grid grid-cols-2">
    <div class="hero min-h-screen flex ml-40">
        <div class="hero-content -mt-20">
            <div>
                <p class="py-2 text-xl">
                    Bem vindo ao
                </p>
                <h1 class="text-6xl font-bold">LockBox</h1>
                <p class="pt-2 pb-4 text-xl">
                    onde você guarda <span class="italic">tudo</span> com segurança
                </p>

            </div>
        </div>
    </div>

    <div class="hero mr-40 bg-white min-h-screen text-black">
        <div class="hero-content -mt-20">
            <form action="/registrar" method="post">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $validacoes = flash()->get('validacoes');
                        ?>
                        <div class="card-title">Crie sua conta</div>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Nome</span>
                            </div>
                            <input type="text" placeholder="Nome" class="input input-bordered w-full max-w-xs bg-white" name="name" />
                            <?php if (isset($validacoes['name'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['name'][0]; ?></div>
                            <?php endif; ?>
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Email</span>
                            </div>
                            <input type="email" placeholder="email" class="input input-bordered w-full max-w-xs bg-white" name="email" />
                            <?php if (isset($validacoes['email'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['email'][0]; ?></div>
                            <?php endif; ?>
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Confirme seu email</span>
                            </div>
                            <input type="email" placeholder="email" class="input input-bordered w-full max-w-xs bg-white" name="email_confirm" />
                            <?php if (isset($validacoes['email'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['email'][1]; ?></div>
                            <?php endif; ?>
                        </label>
                        <label class="form-control">
                            <div class="label">
                                <span class="label-text text-black">Senha</span>
                            </div>
                            <input type="password" placeholder="password" class="input input-bordered w-full max-w-xs bg-white" name="password" />
                            <?php if (isset($validacoes['password'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['password'][0]; ?></div>
                            <?php endif; ?>
                        </label>

                        <div class="card-actions justify-end">
                            <button class="btn btn-primary btn-block">Registrar</button>
                            <a href="/login" class="btn btn-link">Já tenho uma conta</a>
                        </div>
                    </div>

                </div>

            </form>
        </div>

    </div>
</div>