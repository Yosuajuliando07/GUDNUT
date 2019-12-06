@extends('layouts.Frontend.master')

@section('judul','Order')

@push('tambah_css')
@endpush

@section('isi')

@include('modal-login')
<main class="mt-5 pt-5">
    <div class="container">
            <div class="row ">
                <div class="col-lg-4 col-md-6 mb-4">
                 <form action="{{route('buktipembayan.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @foreach ($order_details as $item)
                    <dl class="row">
                        <dt class="col-sm-5">Produk</dt>
                        <dd class="col-sm-7"> {{$item->produk->nama_produk}}</dd>
                        <dt class="col-sm-5">Dikirim Oleh</dt>
                        <dd class="col-sm-7"> {{$item->produk->user->nama}}</dd>
                        <dt class="col-sm-5">Tanggal Order</dt>
                        <dd class="col-sm-7"> {{$item->created_at}}</dd>
                    </dl>
                    <input name="order_detail_id" value="{{$item->id}}" type="hidden">
                    @endforeach
                    <img src="{{asset('img/norekening.png')}}" class="img-fluid rounded">
                   </div>

                   <div class="col-lg-8 col-md-6 mb-4">
                      <div class="avatar mx-auto white mt-4">
                            <img id="preview" src="{{url ('/upload/buktipembayaran/default.png')}}"  alt="Bukti Pembayaran" class="rounded mx-auto d-block" height="350" width="350">
                            <input type="file" name="gambar" id="image" style="display: none;"/><br>
                            <div class="text-center">
                                <a href="javascript:ambilGambar()" class="btn-floating btn-lg text-default"><i class="fas fa-arrow-alt-circle-up"></i></a>
                            </div><br>
                        </div>
                        <div class="text-center mb-5">
                                <button type="submit" class="btn btn-default btn-sm">Upload</button>
                            </div>
                      </div>

                    </form>

        </div>
    </div>
</div>
</main>
@endsection
@push('tambah_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
