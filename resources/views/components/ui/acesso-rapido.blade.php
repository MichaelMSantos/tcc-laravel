<div class="acesso-rapido">
    <p class="title">
        Acesso rápido - Estoque
    </p>
    <div class="cards">
        @foreach ($links as $link)
            <a href="{{ $link['url'] }}">
                <div class="card-content shadow">
                    <img src="{{ $link['img'] }}" alt="{{ $link['label'] }}">
                    <span>{{ $link['label'] }}</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
