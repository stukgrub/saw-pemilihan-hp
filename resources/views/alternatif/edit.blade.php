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
                <form action="/alternatif/update" method="post">
                    @csrf
                    @foreach($alternatif as $dt)
                    <div class="form-group d-none">
                        <div class="form-line">
                            <input name="id" type="text" class="form-control" placeholder="Nama Data" value="{{ $dt->idhp }}">
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="form-line">
                            <input name="merek" type="text" class="form-control" placeholder="Merek HP" value="{{ $dt->merk_hp }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="tahun" type="number" min='1' class="form-control" placeholder="Tahun HP" value="{{ $dt->thn_hp }}">
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
