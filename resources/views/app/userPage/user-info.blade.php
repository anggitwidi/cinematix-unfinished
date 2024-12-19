@extends('layout.user.masterView')

@section('title-us','Profil ' . auth()->user()->name)

@section('sidebar-user-booking')
    @include('app.userPage.sidebar-userPage')
@endsection

@section('content-booking')
<section class="section">
    <div class="section-header">
        <h1>Detail Info User</h1>
    </div>

    <div class="section-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-primary shadow-lg">
                        <div class="card-body text-center">
                            <img src="../assets/img/avatar/avatar-1.png" alt="User Avatar" class="rounded-circle mb-3" width="120">
                            <h5 class="text-danger">{{ auth()->user()->name }}</h5>
                            <p class="text-muted">Username: {{ auth()->user()->username }}</p>
                            <p class="text-muted">Birthdate: {{ Carbon\Carbon::parse(auth()->user()->birthdate)->format('d M Y') }}</p>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card border-danger">
                                        <div class="card-body text-center">
                                            <h6>Jumlah Saldo</h6>
                                            <h6>Rp. {{ number_format(auth()->user()->balance, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-danger">
                                        <div class="card-body text-center">
                                            <h6>Pengeluaran Terakhir</h6>
                                            <h6>Rp. {{ number_format(90000, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-danger">
                                        <div class="card-body text-center">
                                            <h6>Top Up</h6>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">+ Tambah Saldo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Saldo -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Saldo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.topup') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="third-party">Pilih Pihak Ketiga</label>
                        <select class="form-control" id="third-party" name="third_party">
                            <option value="linkaja">Link Aja</option>
                            <option value="bri">BRI</option>
                            <option value="bca">BCA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nominal">Nominal</label>
                        <input type="number" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal" placeholder="Masukkan nominal">
                        @error('nominal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
