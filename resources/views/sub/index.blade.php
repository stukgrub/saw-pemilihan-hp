@extends('layout.mainlayout')

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

            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos" id="mytable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kriteria</th>
                                <th>Nama Subkriteria</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sub as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_kriteria }}</td>
                                <td>{{ $data->nama_sub }}</td>
                                <td>{{ $data->nilai }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>
                                    <div class="buttons">
                                        <a href="/sub/edit/{{ $data->id_sub }}"
                                            class="btn btn-warning waves-effect"><i
                                                class="material-icons left">edit</i>Edit</a>
                                        <a href="/sub/delete/{{ $data->id_sub }}"
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
                <form action="/sub" method="post">
                    @csrf
                                        
                    <div class="form-group">
                        <div class="form-line">
                        <select name="id_kriteria" id="nama" class="form-control">
                            <option value="">Pilih Kriteria ...</option>
                            <optgroup>
                            @foreach($kriteria as $data)
                                <option value="{{ $data->id_kriteria }}">{{ $data->nama_kriteria }}</option>
                            @endforeach
                            </optgroup>
                        </select>
                        </div>
                    </div>
               
                    <div class="form-group">
                        <div class="form-line">
                            <input name="nama_sub" type="text" class="form-control" placeholder="Nama Subkriteria" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="nilai" type="text" class="form-control" placeholder="Nilai" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-line">
                        <select name="keterangan" id="nama" class="form-control">
                            <option value="">Keterangan ...</option>
                            <optgroup>
                            @foreach($keterangan as $ket)
                                <option value="{{ $ket }}">{{ $ket }}</option>
                            @endforeach
                            </optgroup>
                        </select>
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
