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
                <form action="/kriteria/update" method="post">
                    @csrf
                    @foreach($kriteria as $dt)
                    <div class="form-group d-none">
                        <div class="form-line">
                            <input name="id" type="text" class="form-control" placeholder="Nama Data" value="{{ $dt->id_kriteria }}">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="form-line">
                            <input name="nama" type="text" class="form-control" placeholder="Nama Data" value="{{ $dt->nama_kriteria }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                        <select name="attribut">
                        <option value="">Pilih Jenis ...</option>
                        <optgroup>
                        @if($dt->attribut == 'Cost')
                            <option value="Cost" selected>Cost</option>
                            <option value="Benefit">Benefit</option>
                        @else
                            <option value="Cost">Cost</option>
                            <option value="Benefit" selected>Benefit</option>
                        @endif
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
