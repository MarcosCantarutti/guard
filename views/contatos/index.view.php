<?php
$validacoes = flash()->get('validacoes');
?>
<div class="bg-base-300 rounded-l-box w-56 flex flex-col divide-y divide-base-100">
    <?php foreach ($contatos as $key => $contato): ?>
        <a href="/contatos?id=<?= $contato->id; ?><?= request()->get('pesquisar', '', '&pesquisar=') ?>"
            class="w-full p-2  cursor-pointer hover:bg-base-200 
            <?php if ($key == 0): ?> rounded-tl-box <?php endif; ?> 
            <?php if ($contato->id == $contatoSelecionado->id): ?> bg-base-200  <?php endif; ?> ">
            <?= $contato->nome ?>
        </a>
    <?php endforeach; ?>
</div>

<div class="bg-base-200 rounded-r-bow w-full p-10 flex flex-col space-y-6">

    <form action="/contato" method="POST" id="form-atualizacao">
        <input type="hidden" name="__method" value="PUT" />
        <input type="hidden" name="id" value="<?= $contatoSelecionado->id; ?>" />
        <label class="form-control w-full">
            <div class="label">
                <span class="label-text">Título</span>
            </div>
            <?php if (isset($validacoes['titulo'])): ?>
                <div class="label text-xs text-error"><?= $validacoes['titulo'][0]; ?></div>
            <?php endif; ?>
            <input name="titulo" type="text" placeholder="Digite aqui" class="input input-bordered w-full" value="<?= $contatoSelecionado->nome ?>" />
        </label>
        <label class="form-control">
            <div class="label">
                <span class="label-text">Sua nota</span>
            </div>
            <?php if (isset($validacoes['nota'])): ?>
                <div class="label text-xs text-error"><?= $validacoes['nota'][0]; ?></div>
            <?php endif; ?>
            <textarea
                <?= !session()->get('mostrar') ? 'disabled' : '' ?>
                class="textarea textarea-bordered h-24" placeholder="Escreva aqui..." name="contato"><?= $contatoSelecionado->contato(); ?></textarea>

        </label>
    </form>
    <div class="flex justify-between items-center">
        <form action="/contato" method="POST">
            <input type="hidden" name="__method" value="DELETE" />
            <input type="hidden" name="id" value="<?= $contatoSelecionado->id; ?>" />
            <button class="btn btn-error" type="submit">Deletar</button>
        </form>
        <button class="btn btn-primary" type="submit" form="form-atualizacao">Atualizar</button>
    </div>
</div>