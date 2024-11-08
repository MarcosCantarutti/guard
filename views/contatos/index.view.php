<?php
$validacoes = flash()->get('validacoes');
$contatoSelecionadoId = $_GET['id'] ?? null;

?>
<div>
    <?php require base_path('views/partials/_search.view.php'); ?>
</div>

<!-- nova implementação , como exibir apenas um item ao clicar? -->
<div class="bg-zinc-700 rounded w-full p-10 flex flex-col space-y-6">
    <table class="min-w-full table-auto border-none">
        <?php if (!$contatoSelecionadoId): ?>
            <thead>
                <tr class="">
                    <th class="px-4 py-2 text-left"></th>
                    <th class="px-4 py-2 text-left">Nome</th>
                    <th class="px-4 py-2 text-left">Telefone</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left"></th>
                </tr>
            </thead>
        <?php endif; ?>
        <tbody>
            <?php foreach ($contatos as $key => $contato): ?>
                <?php if ($contato->id == $contatoSelecionadoId): ?>
                    <form action="/contatos" method="POST" id="form-atualizacao">
                        <input type="hidden" name="__method" value="PUT" />
                        <input type="hidden" name="id" value="<?= $contato->id; ?>" />
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Avatar</span>
                            </div>
                            <input type="file" class="input input-bordered w-full p-2 bg-zinc-700" name='imagem'>
                            <?php if (isset($validacoes['nome'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['nome'][0]; ?></div>
                            <?php endif; ?>
                        </label>

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Nome</span>
                            </div>
                            <input type="text" name="nome" placeholder="Digite aqui" class="input input-bordered w-full bg-zinc-700" value="<?= $contato->nome ?>" />
                            <?php if (isset($validacoes['nome'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['nome'][0]; ?></div>
                            <?php endif; ?>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Observacao</span>
                            </div>
                            <input type="text" name="observacao" placeholder="Digite aqui" class="input input-bordered w-full bg-zinc-700" value="<?= $contato->observacao ?>" />
                            <?php if (isset($validacoes['observacao'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['observacao'][0]; ?></div>
                            <?php endif; ?>
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Telefone</span>
                            </div>
                            <input type="tel" name="telefone" placeholder="Digite aqui" class="input input-bordered w-full bg-zinc-700" value="<?= formatarTelefone($contato->telefone) ?>" />
                            <?php if (isset($validacoes['telefone'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['telefone'][0]; ?></div>
                            <?php endif; ?>
                        </label>

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">E-mail</span>
                            </div>
                            <input type="text" name="email" placeholder="Digite aqui" class="input input-bordered w-full bg-zinc-700" value="<?= $contato->email ?>" />
                            <?php if (isset($validacoes['email'])): ?>
                                <div class="label text-xs text-error"><?= $validacoes['email'][0]; ?></div>
                            <?php endif; ?>
                        </label>
                    </form>
                    <div class="px-4 py-2 flex space-x-2 justify-end">

                        <form action="/contatos" method="POST" id="form-delete">
                            <input type="hidden" name="__method" value="DELETE" />
                            <input type="hidden" name="id" value="<?= $contatoSelecionadoId; ?>" />
                        </form>
                        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" form="form-delete">Excluir</button>
                        <button class="bg-lime-500 text-white px-4 py-2 rounded" form="form-atualizacao">Salvar</button>
                    </div>


                <?php endif; ?>
                <?php if (!$contatoSelecionadoId): ?>
                    <tr class="border-b cursor-pointer" onclick="window.location.href='/contatos?id=<?= $contato->id; ?><?= request()->get('pesquisar', '', '&pesquisar=') ?>'">
                        <td class="px-4 py-2">avatar</td>
                        <td class="px-4 py-2"><?= $contato->nome; ?><br><?= $contato->nome; ?></td>
                        <td class="px-4 py-2"><?= formatarTelefone($contato->telefone); ?></td>
                        <td class="px-4 py-2"><?= $contato->email; ?></td>
                        <td class="px-4 py-2 flex space-x-2">
                            <button class="bg-lime-500 text-white px-4 py-2 rounded">Editar</button>

                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>