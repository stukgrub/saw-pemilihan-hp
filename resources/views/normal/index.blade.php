@extends('layout.mainlayout')
@section('title', 'Data Normal')
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
                    <div class="col-xs-4 col-sm-2 col-md-2">
                        <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal"
                            data-target="#defaultModal">+ Tambah Data</button>
                    </div>
                </div>
                <div class="row">
                    <a href="/hasil" class="btn btn-info">Hasil</a>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos" id="mytable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Merk HP</th>
                                <th>Harga</th>
                                <th>RAM</th>
                                <th>Memory</th>
                                <th>Processor</th>
                                <th>Camera</th>
                                <th>Perangkingan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($normal as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @foreach($alternatif as $alt)
                                @if($data->idhp == $alt->idhp)
                                <td>{{ $alt->merk_hp }}</td>
                                @endif
                                @endforeach
                                <td>Rp.{{ $data->harga }}</td>
                                <td>{{ $data->ram }}GB</td>
                                <td>{{ $data->memory }}GB</td>
                                @if($data->processor == 5)
                                <td>Octacore</td>
                                @elseif($data->processor == 3)
                                <td>Quadcore</td>
                                @else
                                <td>Dualcore</td>
                                @endif
                                <td>{{ $data->camera }}MP</td>
                                
                        
                                <td>
                                    <div class="buttons">
                                        <a href="/normal/edit/{{ $data->id_normal }}"
                                            class="btn btn-warning waves-effect"><i
                                                class="material-icons left">edit</i>Edit</a>
                                        <a href="/normal/delete/{{ $data->id_normal }}"
                                            class="btn btn-danger waves-effect"><i
                                                class="material-icons left">delete</i>Delete</a>
                                    </div>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- endtask -->
</div>

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Input Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/normal" method="post">
                    @csrf
                                        
                    <div class="form-group">
                        <div class="form-line">
                        <select name="idhp" id="nama" class="form-control">
                            <option value="">Pilih Merk HP ...</option>
                            <optgroup>
                            @foreach($alternatif as $data)
                                <option value="{{ $data->idhp }}">{{ $data->merk_hp }}</option>
                            @endforeach
                            </optgroup>
                        </select>
                        </div>
                    </div>
               
                    <div class="form-group">
                        <div class="form-line">
                            <input name="harga" type="text" class="form-control" placeholder="Harga" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                            <input name="ram" type="number" min='1' class="form-control" placeholder="RAM"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                            <input name="memory" type="number" min='1' class="form-control" placeholder="Memory" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                        <select name="processor" id="procie" class="form-control">
                            <option value="">Pilih Merk HP ...</option>
                            <optgroup>
                                @foreach($processors as $processor)
                                @if($processor == 'octacore')
                                <option value="5">{{ $processor }}</option>
                                @elseif($processor == 'quadcore')
                                <option value="3">{{ $processor }}</option>
                                @else
                                <option value="1">{{ $processor }}</option>
                                @endif
                                @endforeach
                            </optgroup>
                        </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                            <input name="camera" type="number" min='1' class="form-control" placeholder="Camera" />
                        </div>
                    </div>

               
                   
                    <input class="btn btn-primary" type="submit" value="Simpan Data">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

@endsection
