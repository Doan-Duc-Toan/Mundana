<div id="content">
    <div class="container">
        <div class="jumbotron jumbotron-fluid mb-3 pl-0 pt-0 pb-0 bg-white position-relative">
            <div class="h-100 tofront">
                <div class="row justify-content-between">
                    <div class="col-md-6 pt-6 pb-6 pr-6 align-self-center">
                        <p class="text-uppercase font-weight-bold">
                            <a class="text-danger" href="{{ route('cat.detail', $post->cats->first()->id) }}"
                                wire:navigate>{{ $post->cats->first()->name }}</a>
                        </p>
                        <h1 class="display-4 secondfont mb-3 font-weight-bold">{{ $post->title }}</h1>
                        <p class="mb-3">
                            {{ $post->intro }}
                        </p>
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle"
                                src="{{ asset('client/img/wallpapersden.com_sung-jin-woo-anime-art_2932x2932.jpg') }}"
                                width="70">
                            <small class="ml-2">{{ $post->user->name }} <span
                                    class="text-muted d-block">{{ $post->created_at }}</span>
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6 pr-0">
                        <img src="{{ asset('storage/' . $post->thumb) }}">
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
        <div class="row justify-content-center">
            <div class="col-lg-2 pr-4 mb-4 col-md-12">
                <div class="sticky-top text-center">
                    <div class="text-muted">
                        Share this
                    </div>
                    <div class="share d-inline-block">
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                {{-- <article class="article-post"> --}}
                <div>
                    {!! $post->content !!}
                </div>
                {{-- </article> --}}
                <div class="border p-5 bg-lightblue">
                    <div class="row justify-content-between">
                        <div class="col-md-12 mb-2 mb-md-0">
                            <h5 class="font-weight-bold secondfont">Nhập bình luận của bạn</h5>
                        </div>
                        <div class="col-md-12" wire:submit.prevent="store">
                            <form class="row">
                                <div class="col-md-6">
                                    <input type="text" wire:model='email' class="form-control"
                                        placeholder="Nhập email của bạn">
                                    <div>
                                        @error('email')
                                            <span style="color:#d63031;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" wire:model='name' class="form-control"
                                        placeholder="Nhập tên của bạn">
                                    <div>
                                        @error('name')
                                            <span style="color:#d63031;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <!-- <input type="text" class="form-control" placeholder="Enter your e-mail address"> -->
                                    <textarea name="" id="" wire:model='content' class="form-control" cols="3" rows="5"
                                        placeholder="Nhập nội dung bình luận"></textarea>
                                    <div>
                                        @error('content')
                                            <span style="color:#d63031;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2">
                                    <button type="submit" class="btn btn-success btn-block">Gửi</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12 mt-5">
                            <h4 class="font-weight-bold secondfont">Tất cả bình luận</h4>
                            <div class="col-md-12 list-comment">
                                @foreach ($comments as $comment)
                                    <div class="comment mb-3" style="border-bottom:1px solid #9ca0a4; ">
                                        <span class="name-user"
                                            style="font-size: 15px;"><b>{{ $comment->name }}</b></span><small>         {{$comment->created_at}}</small><br>
                                        <span class="comment-content">{{ $comment->comment }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-4 pb-4">
        <h5 class="font-weight-bold spanborder"><span>Read next</span></h5>
        <div class="row">
            <div class="col-lg-6">
                <div class="card border-0 mb-4 box-shadow h-xl-300">
                    <div
                        style="background-image: url({{ asset('storage/' . $bot->thumb) }}); height: 150px; background-size: cover; background-repeat: no-repeat;">
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
</div>
