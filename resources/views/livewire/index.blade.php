<div id="content">
    <div class="container">
        <div class="jumbotron jumbotron-fluid mb-3 pt-0 pb-0 bg-lightblue position-relative">
            <div class="pl-4 pr-0 h-100 tofront">
                <div class="row justify-content-between">
                    <div class="col-md-6 pt-6 pb-6 align-self-center">
                        <h1 class="secondfont mb-3 font-weight-bold">{{ $posts->first()->title }}</h1>
                        <p class="mb-3">
                            {{ $posts->first()->intro }}
                        </p>
                        <a href="{{ route('post.detail', $posts->first()->id) }}" wire:navigate class="btn btn-dark">Read
                            More</a>
                    </div>
                    <div class="col-md-6 d-none d-md-block pr-0"
                        style="background-size:cover;background-image:url({{ asset('storage/' . $posts->first()->thumb) }});">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->


    <!--------------------------------------
    MAIN
    --------------------------------------->

    <div class="container pt-4 pb-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="card border-0 mb-4 box-shadow h-xl-300">
                    <div
                        style="background-image: url({{ asset('storage/' . $bot->thumb) }}); height: 150px;    background-size: cover;    background-repeat: no-repeat;">
                    </div>
                    <div class="card-body px-0 pb-0 d-flex flex-column align-items-start">
                        <h2 class="h4 font-weight-bold">
                            <a class="text-dark" href="{{ route('post.detail', $bot->id) }}"
                                wire:navigate>{{ $bot->title }}</a>
                        </h2>
                        <p class="card-text">
                            {{ $bot->intro }}
                        </p>
                        <div>
                            <small class="d-block"><a class="text-muted"
                                    href="./author.html">{{ $bot->user->name }}</a></small>
                            <small class="text-muted">{{ $bot->created_at }}</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="flex-md-row mb-4 box-shadow h-xl-300">
                    @foreach ($right as $post)
                        <div class="mb-3 d-flex align-items-center">
                            <img height="80" src="{{ asset('storage/' . $post->thumb) }}">
                            <div class="pl-3">
                                <h2 class="mb-2 h6 font-weight-bold">
                                    <a class="text-dark" href="{{ route('post.detail', $post->id) }}"
                                        wire:navigate>{{ $post->title }}</a>
                                </h2>
                                <div class="card-text text-muted small">
                                    {{ $post->user->name }}
                                </div>
                                <small class="text-muted">{{ $post->created_at }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <h5 class="font-weight-bold spanborder"><span>Random</span></h5>
                @foreach ($random as $post)
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="pr-3">
                            <h2 class="mb-1 h4 font-weight-bold">
                                <a class="text-dark" href="{{ route('post.detail', $post->id) }}"
                                    wire:navigate>{{ $post->title }}</a>
                            </h2>
                            <p>
                                {{ $post->intro }}
                            </p>
                            <div class="card-text text-muted small">
                                {{ $post->user->name }}
                            </div>
                            <small class="text-muted">{{ $post->created_at }}</small>
                        </div>
                        <img height="120" src="{{ asset('storage/' . $post->thumb) }}">
                    </div>
                @endforeach

            </div>
            <div class="col-md-4 pl-4">
                <h5 class="font-weight-bold spanborder"><span>Popular</span></h5>
                <ol class="list-featured">
                    @foreach ($popular as $post)
                        <li>
                            <span>
                                <h6 class="font-weight-bold">
                                    <a href="{{route('post.detail',$post->id)}}" wire:navigate class="text-dark">{{$post->title}}</a>
                                </h6>
                                <p class="text-muted">
                                    {{$post->user->name}}
                                </p>
                            </span>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>


</div>
