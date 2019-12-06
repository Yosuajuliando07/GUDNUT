@extends('layouts.backend.master')

@section('judul','Detail Blog')

@push('tambah_css')

@endpush
@section('isi')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="{{route('blog.index')}}" class="btn bg-teal waves-effect">
                        <i class="material-icons">keyboard_backspace</i>
                        <span class="icon-name">Kembali</span>
                    </a>
                    <h2 class="align-center">
                        <div class="header">
                            <h2>
                                {{ $blogs->judul }}
                                <small>Diposting oleh <strong> <a href="">{{ $blogs->user->nama }}</a></strong> Pada
                                    {{ $blogs->created_at->toFormattedDateString() }}</small>
                                <small> <p>Kategori : <span class="font-bold col-teal"> {{$blogs->kategoriblog->nama}}</span></p></small>
                            </h2>
                        </div>
                    </h2>
                </div>
                <div class="body">
                    <div>
                         <img id="preview" class="img-responsive thumbnail" width="950px" height="330px" src="{{url ('/upload/blog/'.$blogs->gambar)}}"/><br/>
                         <div class="body">
                             {!! $blogs->artikel !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
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
@endpush
