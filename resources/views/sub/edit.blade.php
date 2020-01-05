@extends('layout.mainlayout')
@section('title', 'Edit Data')
@section('content')

<div class="block-header">
    <h2>DASHBOARD</h2>
</div>
@if (session('status'))
<div class="alert bg-green alert-dismissible">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">×</span></button>
</div>
@endif
<div class="row clearfix">
    <!-- Task Info -->
    <div class="col-xs-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-xs-8 col-sm-10 col-md-10">
                        <h2>List Data</h2>
                        <br>
                    </div>
                </div>

            </div>
            <div class="body">
                <form action="/sub/update" method="post">
                    @csrf
                    @foreach($sub as $dt)
                    <div class="form-group d-none">
                        <div class="form-line">
                            <input name="id" type="text" class="form-control" placeholder="Nama Data" value="{{ $dt->id_sub }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                        <select name="id_kriteria" class="form-control">
                        <option value="">Pilih Kriteria ...</option>
                        <optgroup>
                        @foreach($kriteria as $krit)
                        @if($krit->id_kriteria == $dt->id_kriteria)
                            <option value="{{ $krit->id_kriteria }}" selected>{{ $krit->nama_kriteria }}</option>
                        @else
                            <option value="{{ $krit->id_kriteria }}" >{{ $krit->nama_kriteria }}</option>
                        @endif
                        @endforeach
                        </optgroup>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                            <input name="nama_sub" type="text" class="form-control" placeholder="Nama Subkriteria" value="{{ $dt->nama_sub }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                            <input name="nilai" type="text" class="form-control" placeholder="Nilai" value="{{ $dt->nilai }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                        <select name="keterangan" class="form-control">
                        <option value="">Pilih Keterangan ...</option>
                        <optgroup>
                        @foreach($keterangan as $ket)
                        @if($dt->keterangan == $ket)
                            <option value="{{ $ket }}" selected>{{ $ket }}</option>
                        @else
                            <option value="{{ $ket }}" >{{ $ket }}</option>
                        @endif
                        @endforeach
                        </optgroup>
                        </select>
                        </div>
                    </div>
                    @endforeach
                    <input class="btn btn-primary" type="submit" value="Ubah Data">
                </form>
            </div>
        </div>
    </div>
    <!-- endtask -->
</div>

@endsection
