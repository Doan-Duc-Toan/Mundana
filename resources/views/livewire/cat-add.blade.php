<div id="content" class="container-fluid">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Thêm danh mục
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" wire:model="name" name="name" id="name"
                                placeholder="Nhập tên danh mục">
                            <div>
                                @error('name')
                                    <span style="color:#d63031;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="" id="" class="form-control" cols="30" wire:model="content" rows="10"
                                placeholder="Nhập mô tả"></textarea>
                            <div>
                                @error('content')
                                    <span style="color:#d63031;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{-- <span wire:loading
                                class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>  --}}
                            Thêm
                            mới</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Danh mục
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Mô tả</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cats as $cat)
                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->content }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
