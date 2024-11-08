<div class="navbar bg-base-100">
    <div class="flex-1">
        <a href="/contatos" class="btn btn-ghost text-xl">Guard</a>
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