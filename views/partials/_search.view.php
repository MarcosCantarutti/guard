<div class="flex space-x-4 justify-between  px-12">

    <div>
        <h2>Lista de contatos</h2>
    </div>
    <div>


        <form action="/contatos" class="flex space-x-4 justify-between">
            <label class="input input-bordered flex items-center justify-center btn bg-zinc-700">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 16 16"
                    fill="currentColor"
                    class="h-4 w-4 opacity-70">
                    <path
                        fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>
                <input type="text" name="pesquisar" class="grow" placeholder="Pesquisar"
                    value="<?= request()->get('pesquisar', '') ?>" />


            </label>
            <div>
                <a href="/contatos/criar" class="btn bg-zinc-700"> + Adicionar contato</a>
            </div>

            <div>
                <?php if (session()->get('mostrar')): ?>
                    <a href="/esconder">🤫</a>
                <?php else: ?>
                    <a href="/confirmar">😀</a>
                <?php endif; ?>
            </div>
        </form>
    </div>

</div>