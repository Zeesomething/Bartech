@extends('layouts.admin')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Dashboard</h4>
                        <div class="app-academy">
                            <div class="card p-0 mb-4">
                                <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                                    <div
                                        class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                                        <h3 class="card-title mb-4 lh-sm px-md-5 text-center">
                                            Selamat datang, admin yang terhormat
                                            <div class="">
                                            </div>
                                        </h3>
                                        <p class="mb-4">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat nesciunt aut
                                            commodi laborum quasi beatae iste accusamus eligendi ipsa veritatis consectetur
                                            dolores officiis reiciendis ex, mollitia enim iure perferendis ea!
                                        </p>
                                    </div>
                                    <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Logika </span> Sederhana</h4>
                        <div class="app-academy">
                            <div class="card p-0 mb-4">
                                <div class="card-body d-flex flex-column flex-md-row justify-content-between p-0 pt-4">
                                    <div
                                        class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                                        <h3 class="card-title mb-4 lh-sm px-md-5 text-center">
                                            Masukan Nilai
                                            <div class="">
                                                <form action="{{ route('home') }}" method="GET">
                                                    <input type="text" inputmode="numeric" name="nilai" placeholder="{{ request('nilai') }}">
                                                    <button type="submit">Kirim</button>
                                                </form>
                                                @if ($nilai = request('nilai'))
                                                    @if ($nilai >= 500) 
                                                        <h4 class="mt-3">SANGAT TINGGI</h4>
                                                    @elseif($nilai >= 400) 
                                                        <h4 class="mt-3">TINGGI</h4>
                                                    @elseif($nilai >= 300) 
                                                        <h4 class="mt-3">MENENGAH</h4>
                                                    @elseif($nilai >= 200) 
                                                        <h4 class="mt-3">RENDAH</h4>
                                                    @else 
                                                        <h4 class="mt-3">SANGAT RENDAH</h4>
                                                    @endif
                                                @endif
                                            </div>
                                        </h3>
                                    </div>
                                    <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
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
