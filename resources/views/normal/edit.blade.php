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
                <form action="/normal/update" method="post">
                    @csrf
                    @foreach($normal as $dt)
                    <div class="form-group d-none">
                        <div class="form-line">
                            <input name="id" type="text" class="form-control" placeholder="Nama Data" value="{{ $dt->id_normal }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                        <select name="idhp" class="form-control">
                        <option value="">Pilih Merk HP ...</option>
                        <optgroup>
                        @foreach($alternatif as $alt)
                        @if($dt->idhp == $alt->idhp)
                            <option value="{{ $alt->idhp }}" selected>{{ $alt->merk_hp }}</option>
                        @else
                            <option value="{{ $alt->idhp }}" >{{ $alt->merk_hp }}</option>
                        @endif
                        @endforeach
                        </optgroup>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                            <input name="harga" type="text" class="form-control" placeholder="Harga" value="{{ $dt->harga }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                            <input name="ram" type="text" class="form-control" placeholder="RAM" value="{{ $dt->ram }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="memory" type="text" class="form-control" placeholder="Memory" value="{{ $dt->memory }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                        <select name="processor" class="form-control">
                        <option value="">Pilih Processor ...</option>
                        <optgroup>

 
                        @if($dt->processor == 5)
                            <option value="5" selected>Octacore</option>
                            <option value="3" >Quadcore</option>
                            <option value="1" >Dualcore</option>
                        @elseif($dt->processor == 3)
                        <option value="5" >Octacore</option>
                            <option value="3" selected>Quadcore</option>
                            <option value="1" >Dualcore</option>
                        @else
                        <option value="5" >Octacore</option>
                            <option value="3" >Quadcore</option>
                            <option value="1" selected>Dualcore</option>
                        @endif
    

                        </optgroup>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                            <input name="camera" type="text" class="form-control" placeholder="Camera" value="{{ $dt->camera }}">
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
