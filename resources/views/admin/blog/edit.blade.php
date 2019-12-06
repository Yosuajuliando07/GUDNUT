@extends('layouts.backend.master')

@section('judul','Form Edit Blog')

@push('tambah_css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('Adminbsb/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
@endpush

@section('isi')
<div class="container-fluid">
    <form action="{{ route('blog.update', ['id' => $blogs->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <a href="{{route('blog.index')}}" class="btn bg-teal waves-effect">
                            <i class="material-icons">keyboard_backspace</i>
                            <span class="icon-name">Kembali</span>
                        </a>
                        <h2 class="align-center">
                            EDIT
                        </h2>
                    </div>
                    <div class="body">
                        <div class="form-group form-float">
                            <div class="form-line">
                            <input type="text" id="judul" class="form-control" name="judul" value="{{$blogs->judul}}">
                                @if($errors->has('judul'))
                                <div class="text-danger">
                                    {{ $errors->first('judul') }}
                                 </div>
                                 @endif
                                 <label class="form-label">Judul</label>
                                </div>
                            </div>
                            <div class="form-group">
                               <img id="preview" src="{{url ('/upload/blog/'.$blogs->gambar)}}" width="610px" height="230px"/><br/>
                                <input type="file" name="gambar" id="gambar" style="display: none;"/><br>
                                @if($errors->has('gambar'))
                                <div class="text-danger">
                                    {{ $errors->first('gambar') }}
                                </div>
                                @endif
                            <div class="text-center">
                                <a href="javascript:ambilGambar()" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float font-bold col-teal">
                                    <i class="material-icons">publish</i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header align-center">
                                <h2>Kategori</h2>
                            </div>
                            <div class="body">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <label for="select">Kategori</label>
                                        <select name="kategori" id="select" class="form-control show-tick" data-live-search="true">
                                            @foreach($kategoriblogs as $kategoriblog)
                                            <option value="{{ $kategoriblog->id }}"
                                             @if ($kategoriblog->id == $blogs->kategoriblog_id)
                                                   selected
                                            @endif
                                            >{{ $kategoriblog->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="align-center">
                                    <button type="submit" class="btn bg-teal btn-block  m-t-15 waves-effect">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                            @if($errors->has('artikel'))
                            <div class="text-danger">
                            {{ $errors->first('artikel') }}
                            </div>
                            @endif
                           <textarea id="tinymce" name="artikel">{{$blogs->artikel}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('tambah_js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('Adminbsb/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('Adminbsb/plugins/tinymce/tinymce.js') }}"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('Adminbsb/plugins/tinymce') }}';
        });
    </script>

{{-- gambar --}}
<script>
    function ambilGambar() {
        $('#gambar').click();
    }
    $('#gambar').change(function () {
        var imgPath = this.value;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            readURL(this);
        else
            alert("Silakan pilih file gambar(jpg, jpeg, png).")
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.readAsDataURL(input.files[0]);
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            };
        }
    }
</script>
@endpush
