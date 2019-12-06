@extends('layouts.backend.master')

@section('judul','Form Tambah Slide')

@push('tambah_css')

@endpush

@section('isi')
<div class="container-fluid">
    <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <a href="{{route('slider.index')}}" class="btn bg-teal waves-effect">
                            <i class="material-icons">keyboard_backspace</i>
                            <span class="icon-name">Kembali</span>
                        </a>
                    </div>
                    <div class="body">

                    <div class="form-group">
                        <img id="preview" src="{{url ('/upload/slider/default.png')}}" class="uploadslide"/><br/>
                        <input type="file" name="gambar" id="image" style="display: none;"/><br>
                            @if($errors->has('gambar'))
                            <div class="text-danger">
                                {{ $errors->first('gambar') }}
                            </div>
                            @endif
                            <div class="text-center">
                                <a href="javascript:ambilGambar()" type="button" class="btn btn-default btn-circle waves-effect waves-circle waves-float font-bold col-teal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ambil Gambar">
                                    <i class="material-icons">file_upload</i></a>
                            </div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="keterangan" rows="2" class="form-control" placeholder="Keterangan"></textarea>
                                    @if($errors->has('keterangan'))
                                    <div class="text-danger">
                                        {{ $errors->first('keterangan') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header align-center">
                                <h2>STATUS</h2>
                            </div>
                            <div class="body">

                                <div class="form-group">
                                    <div class="demo-radio-button">
                                        <input name="status" type="radio" class="with-gap" id="radio_3" value="1">
                                        <label for="radio_3"><p class="font-bold col-teal">Aktif</p></label>
                                        <input name="status" type="radio" id="radio_4" class="with-gap radio-col-blue-grey" value="0">
                                        <label for="radio_4"><p class="font-bold col-blue-grey">Tidak Aktif</p></label>
                                        @if($errors->has('status'))
                                        <div class="text-danger">
                                          {{ $errors->first('status') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="align-center">
                                    <button type="submit" class="btn bg-teal btn-block  m-t-15 waves-effect">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </form>
    </div>
@endsection

@push('tambah_js')
<script src="{{('Adminbsb/js/pages/ui/tooltips-popovers.js')}}"></script>
<!-- Select Plugin Js -->
<script src="{{ asset('Adminbsb/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

{{-- gambar --}}
<script>
    function ambilGambar() {
        $('#image').click();
    }
    $('#image').change(function () {
        var imgPath = this.value;
        var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
            readURL(this);
        else
            alert("Silakan pilih file gambar format(jpg, jpeg, png).")
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
