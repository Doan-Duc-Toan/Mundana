<div id="content">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8">
                <h5 class="font-weight-bold spanborder"><span>{{ $cat->name }}</span></h5>
                <div class="card border-0 mb-5 box-shadow">
                    <div
                        style="background-image: url({{ asset('storage/' . $cat->posts->first()->thumb) }}); height: 350px; background-size: cover; background-repeat: no-repeat;">
                    </div>
                    <div class="card-body px-0 pb-0 d-flex flex-column align-items-start">
                        <h2 class="h2 font-weight-bold">
                            <a class="text-dark" wire:navigate
                                href="{{ route('post.detail', $cat->posts->first()->id) }}">{{ $cat->posts->first()->title }}</a>
                        </h2>
                        <p class="card-text">
                            {{ $cat->posts->first()->intro }}
                        </p>
                        <div>
                            <small class="d-block"><a class="text-muted"
                                    href="./author.html">{{ $cat->posts->first()->user->name }}</a></small>
                            <small class="text-muted">{{ $cat->posts->first()->created_at }}</small>
                        </div>
                    </div>
                </div>
                <h5 class="font-weight-bold spanborder"><span>Latest</span></h5>
                @foreach ($last as $post)
                    <div class="mb-3 d-flex justify-content-between">
                        <div class="pr-3">
                            <h2 class="mb-1 h4 font-weight-bold">
                                <a class="text-dark" href="{{route('post.detail',$post->id)}}" wire:navigate>{{$post->title}}</a>
                            </h2>
                            <p>
                                {{$post->intro}}
                            </p>
                            <div class="card-text text-muted small">
                                {{$post->user->name}}
                            </div>
                            <small class="text-muted">{{$post->created_at}}</small>
                        </div>
                        <img height="120" src="{{ asset('storage/' . $post->thumb) }}">
                    </div>
                @endforeach
            </div>
            <div class="col-md-4 pl-4">
                <div class="sticky-top">
                    <h5 class="font-weight-bold spanborder"><span>Popular</span></h5>
                    <ol class="list-featured">
                        @foreach ($popular as $post)
                            <li>
                                <span>
                                    <h6 class="font-weight-bold">
                                        <a href="{{ route('post.detail', $post->id) }}" wire:navigate
                                            class="text-dark">{{ $post->title }}</a>
                                    </h6>
                                    <p class="text-muted">
                                        {{ $post->user->name }}
                                    </p>
                                </span>
                            </li>
                        @endforeach


                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
