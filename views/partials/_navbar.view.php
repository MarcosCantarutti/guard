<div class="navbar bg-zinc-900">
    <div class="flex-1">
        <a href="/contatos" class="btn btn-ghost text-xl"><img src="./images/logo.svg" alt="LOGO"></a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">

            <li>
                <details>
                    <summary><?= auth()->nome; ?></summary>
                    <ul class="bg-base-100 rounded-t-none p-2">
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </details>
            </li>
        </ul>
    </div>
</div>