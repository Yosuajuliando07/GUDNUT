@extends('layouts.backend.master')

@section('judul','Detail Admin')

@push('tambah_css')

@endpush

@section('isi')

<div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-4">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">

                            <img src="{{url ('/upload/profil/'.$users->gambar)}}" alt="AdminBSB - Profile Image" width="200" height="200"/>

                        </div>
                        <div class="content-area">
                         <h3>{{$users->nama}}</h3>
                            @if ($users->role_id == 1)
                            <p>Administrator</p>
                            @elseif($users->role_id == 2)
                            <p>Penjual</p>
                            @else
                            <p>Pelanggan</p>
                            @endif

                        </div>
                    </div>
                    <div class="profile-footer">
                        <ul>
                            <li>
                                <span>ID</span>
                                <span>{{$users->id}}</span>
                            </li>
                            <li>
                                <span>Nama</span>
                               <span>{{$users->nama}}</span>
                            </li>
                            <li>
                                <span>Bergabung</span>
                                <span>{{$users->created_at->toFormattedDateString()}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"  class="active font-bold"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" >DETAILS</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="card-about-me tab-pane fade in active" id="home">
                                        <div class="body">
                                                <ul>
                                                    <li>
                                                        <div class="title">
                                                            {{-- <i class="material-icons">library_books</i> --}}
                                                            Nama
                                                        </div>
                                                        <div class="content">
                                                           {{$users->nama}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            {{-- <i class="material-icons">location_on</i> --}}
                                                            Username
                                                        </div>
                                                        <div class="content">
                                                            {{$users->username}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            E-Mail
                                                        </div>
                                                        <div class="content">
                                                            {{$users->email}}
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="title">
                                                            No Telepon
                                                        </div>
                                                        <div class="content">
                                                            {{$users->no_hp}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            Tanggal Lahir
                                                        </div>
                                                        <div class="content">
                                                            {{$users->tgl_lahir}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            Jenis Kelamin
                                                        </div>
                                                        <div class="content">
                                                            {{$users->jenis_kelamin}}
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">
                                                            Alamat
                                                        </div>
                                                        <div class="content">
                                                            {{$users->alamat}}
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('tambah_js')
@endpush
