@extends('layout.mainlayout')
@section('title', 'Hasil Perangkingan')
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
                    <div class="col-xs-4 col-sm-2 col-md-2">
                        <h2>List Data</h2>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-2 col-md-2">
            <a href="/normal"><i class="material-icons">
chevron_left
</i>Kembali</a>
                    </div>
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
                        @foreach($bobot as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @foreach($alternatif as $alt)
                                @if($data->idhp == $alt->idhp)
                                <td>{{ $alt->merk_hp }}</td>
                                @endif
                                @endforeach
                                <td>{{ $data->bobot_harga }}</td>
                                <td>{{ $data->bobot_ram }}</td>
                                <td>{{ $data->bobot_memory }}</td>
                                <td>{{ $data->bobot_processor }}</td>
                                <td>{{ $data->bobot_camera }}</td>
                                @foreach($carimax as $max)
                                @foreach($carimin as $min)
                                <td>
                                {{ 
                                    round(
                                        (($min->min1/$data->bobot_harga)*0.2)
                                        +(($data->bobot_ram/$max->max2)*0.2)
                                        +(($data->bobot_memory/$max->max3)*0.2)
                                        +(($data->bobot_processor/$max->max4)*0.2)
                                        +(($data->bobot_camera/$max->max5)*0.2)
                                    ,2)
                                        }}
                                </td>
                                @endforeach
                                @endforeach

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


@endsection
