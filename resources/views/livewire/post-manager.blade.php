<div id="content" class="container-fluid">
    <div class="card">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="card-header font-weight-bold">
            Thêm bài viết
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" wire:model="title" class="form-control" name="" id="title"
                        aria-describedby="helpId" placeholder="">
                    <div>
                        @error('title')
                            <span style="color:#d63031;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="intro">Intro</label>
                    <input type="text" wire:model="intro" class="form-control" name="" id="intro"
                        aria-describedby="helpId" placeholder="">
                    <div>
                        @error('intro')
                            <span style="color:#d63031;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <div wire:ignore>
                        <textarea class="form-control" wire:model="content" name="post-content" id="post-content" rows="25"></textarea>
                    </div>
                    <div>
                        @error('content')
                            <span style="color:#d63031;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" multiple wire:model="select_cats" name="" id="">
                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <div>
                        @error('select_cats')
                            <span style="color:#d63031;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01" wire:model="photo">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                <div class="mb-3">
                    @error('photo')
                        <span style="color:#d63031;">{{ $message }}</span>
                    @enderror
                </div>
                @if ($photo)
                    <div style="width:100vw;height:200px;margin:20px 0px;">
                        <img style="height: 100%; width:auto;" src="{{ $photo->temporaryUrl() }}"
                            alt="Hình ảnh trước khi tải lên">
                        
                    </div>
                @endif
                <button class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    {{-- <script>
        tinymce.init({
            selector: '#post-content', 
            forced_root_block: false,
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.set('content', editor.getContent());
                });
            }
        });
    </script> --}}
    <script>
        var editor_config = {
            path_absolute: "http://localhost/Mundana/",
            selector: '#post-content',

            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
                editor.on('change', function(e) {
                    @this.set('content', editor.getContent());
                });
            },
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            },

        };
        tinymce.init(editor_config);
        // tinymce.init({
        //     selector: '#post-content', 
        //     forced_root_block: false,
        //     setup: function(editor) {
        //         editor.on('init change', function() {
        //             editor.save();
        //         });
        //         editor.on('change', function(e) {
        //             @this.set('content', editor.getContent());
        //         });
        //     },
        // })
    </script>
@endpush
