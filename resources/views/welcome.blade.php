@extends('layout.mainlayout')
@section('title', 'Menu Utama')
@section('content')
    
<div class="block-header">
                <h2>Selamat Datang</h2>
</div>

<div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            Simple Additive Weighting
                                <small>Pemilihan Handphone</small>
                            </h2>
                       <p>Metode SAW adalah Salah satu metode yang digunakan untuk menyelesaikan masalah dari Fuzzy Multiple Attribute Decision Making ( FMADM ) adalah metode Simple Additive Weighting (SAW) yaitu suatu metode yang digunakan untuk mencari alternatif optimal dari sejumlah alternatif dengan kriteria tertentu.

Definisi Metode Simple Additive Weighting (SAW) sering juga dikenal istilah metode penjumlahan terbobot. Konsep dasar metode SAW adalah mencari penjumlahan terbobot dari rating kinerja pada setiap alternatif pada semua atribut (Pahlevy. 2010). Metode ini membutuhkan proses normalisasi matriks keputusan X ke suatu skala yang dapat diperbandingkan dengan semua rating alternatif yang ada. 
</p>

<h5>Langkah- langkah Metode SAW</h5> 
<p>
<ol>
<li>Menentukan kriteria-kriteria yang akan dijadikan acuan dalam pengambilan keputusan.</li>
<li>Menentukan rating kecocokan setiap alternatif pada setiap kriteria.</li>
<li>Membuat matriks keputusan berdasarkan kriteria, kemudian melakukan normalisasi matriks berdasarkan persamaan yang disesuaikan dengan jenis atribut (atribut keuntungan ataupun atribut biaya) sehingga diperoleh  matriks ternormalisasi R.</li>
<li>Hasil akhir diperoleh dari proses perankingan yaitu penjumlahan dari perkalian matriks ternormalisasi R dengan vektor bobot sehingga diperoleh nilai terbesar yang dipilih sebagai alternatif terbaik sebagai solusi.</li>
</ol>

</p>
                        </div>
                 
                    </div>
                </div>
            </div>
       

@endsection