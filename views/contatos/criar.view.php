<?php
$validacoes = flash()->get('validacoes');
?>

<div class="bg-base-300 rounded-l-box w-56">
    <div class="bg-base-200 p-4 rounded-tl-box">
        + Novo contato
    </div>
</div>

<div class="bg-base-200 rounded-r-bow w-full p-10 ">
    <form action="/contatos/criar" method="post" class="flex flex-col space-y-6" enctype="multipart/form-data">
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">Avatar</span>
            </div>
            <input type="file" class="input input-bordered w-full p-2" name='imagem'>
            <?php if (isset($validacoes['nome'])): ?>
                <div class="label text-xs text-error"><?= $validacoes['nome'][0]; ?></div>
            <?php endif; ?>
        </label>

        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">Nome</span>
            </div>
            <input type="text" name="nome" placeholder="Digite aqui" class="input input-bordered w-full" />
            <?php if (isset($validacoes['nome'])): ?>
                <div class="label text-xs text-error"><?= $validacoes['nome'][0]; ?></div>
            <?php endif; ?>
        </label>
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">Observacao</span>
            </div>
            <input type="text" name="observacao" placeholder="Digite aqui" class="input input-bordered w-full" />
            <?php if (isset($validacoes['observacao'])): ?>
                <div class="label text-xs text-error"><?= $validacoes['observacao'][0]; ?></div>
            <?php endif; ?>
        </label>
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">Telefone</span>
            </div>
            <input type="tel" name="telefone" placeholder="Digite aqui" class="input input-bordered w-full" />
            <?php if (isset($validacoes['telefone'])): ?>
                <div class="label text-xs text-error"><?= $validacoes['telefone'][0]; ?></div>
            <?php endif; ?>
        </label>

        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">E-mail</span>
            </div>
            <input type="text" name="email" placeholder="Digite aqui" class="input input-bordered w-full" />
            <?php if (isset($validacoes['email'])): ?>
                <div class="label text-xs text-error"><?= $validacoes['email'][0]; ?></div>
            <?php endif; ?>
        </label>




        <div class="flex justify-end items-center">
            <button class="btn btn-primary">salvar</button>
        </div>
    </form>
</div>