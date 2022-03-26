@extends('layout.admin')


@section('main-admin')
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0"> Thêm ảnh mới</h3>
                    </div>
                </div>
            </div>

            <!-- Add Tickit-->
            <div class="modal-body">
                <div class="deadline-form">
                    <form action="{{  route('galleries.update',['id'=>$galleries->id]) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="col-md-6">
                            <label for="menu" class="form-label"> Ảnh</label>
                            <img id="preview-image" src="{{$galleries->g_path}}" class="img-thumbnail" style="width: 220px;height:200px" alt="">
                            <br>
                            <input type="file" name="g_name" id="image" class="js-upload">
                            <br>
                            @if ($errors->first('g_path'))
                                <span class="text-danger">{{ $errors->first('g_path') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kích hoạt</label>
                            <div>
                                <input type="radio" id="active" value="1" name="g_active" {{ ($galleries->g_active == 1) ? 'checked' : '' }}>
                                <label for="active" >Có</label>
                            </div>
                            <div>
                                <input type="radio" id="active" value="0" name="g_active" {{ ($galleries->g_active == 0) ? 'checked' : '' }}>
                                <label for="no_active" >Không</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="{{route('galleries.index')}}"><button type="button" class="btn btn-secondary">Hủy</button></a>
                            <button type="submit" class="btn btn-primary" >Thêm ảnh</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script type="text/javascript">
        $('#image').change(function(){

            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endsection

