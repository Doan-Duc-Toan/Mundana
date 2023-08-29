<nav class="topnav navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('client.index') }}" wire:navigate><strong>Mundana</strong></a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarColor02" style="">
            <ul class="navbar-nav mr-auto d-flex align-items-center">
                @foreach ($cats as $cat)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cat.detail', $cat->id) }}"
                            wire:navigate>{{ $cat->name }}<span class="sr-only">(current)</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
