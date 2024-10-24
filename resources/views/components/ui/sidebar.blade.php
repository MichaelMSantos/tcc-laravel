<aside id="sidebar" class="">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            {{-- <i class="">
                <img src="/images/sidebar/menu.svg" alt="" class="menu">
            </i> --}}
            <i class="bi bi-arrow-left"></i>
        </button>
        <div class="sidebar-logo" style="position: absolute">
            <a href="#">StampControl</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="/dashboard" class="sidebar-link home">
                <img src="/images/sidebar/home.svg" alt="">
                <span>Início</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown estoque" data-bs-toggle="collapse"
                data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                <img class="loge" src="/images/sidebar/system-uicons_box.svg" alt="false">
                <span>Estoque</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="/dashboard/camisetas" class="sidebar-link camisetas">Camisetas</a>
                </li>
                <li class="sidebar-item">
                    <a href="/dashboard/tintas" class="sidebar-link tintas">Tintas</a>
                </li>
                <li class="sidebar-item">
                    <a href="/dashboard/tecidos" class="sidebar-link tecidos">Tecidos</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="/dashboard/monitoramento" class="sidebar-link financeiro">
                <img src="/images/sidebar/material-symbols_finance-mode-rounded.svg" alt="">
                <span>Monitoramento</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="/dashboard/pouco-estoque" class="sidebar-link pouco-estoque">
                <img src="/images/sidebar/healthicons_stock-out-outline.svg" alt="">
                <span>Pouco esotque</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="/dashboard/funcionarios" class="sidebar-link administradores">
                <img src="/images/sidebar/clarity_administrator-line.svg" alt="">
                <span>Administradores</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="/dashboard/fornecedores" class="sidebar-link fornecedores">
                <img src="/images/sidebar/fornecedores.svg" alt="">
                <span>Forncedores</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="/dashboard/envios" class="sidebar-link envio">
                <img src="/images/sidebar/envelope.svg" alt="">
                <span>Envio</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="/dashboard/consultar" class="sidebar-link consultar">
                <img src="/images/sidebar/search-box.svg" alt="">
                <span>Consultar</span>
            </a>
        </li>
    </ul>
    </li>
    <li class="sidebar-item">
        <a href="{{ route('profile.show') }}" class="sidebar-link">
            <img src="/images/sidebar/person.svg" alt="" class="person-img truncate">
            <span>
                {{ Auth::user()->name }}
            </span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="#" class="sidebar-link">
            <img src="/images/sidebar/backup.svg" alt="" class="backup-img">
            <span>Backup</span>
        </a>
    </li>
    <div class="divisor">
        <hr>
    </div>
    </ul>
    <div class="sidebar-footer">
        <a href="/logout" class="sidebar-link">
            <img src="/images/sidebar/logout.svg" alt="" class="logout-img">
            <span>log out</span>
        </a>
    </div>
</aside>
