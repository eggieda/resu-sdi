@extends('layouts.app')
@section('title', 'Dashboard')
@section('contents')
    <div class="row">
        <div class="col">
            <div class="jumbotron bg-white">
                <h3>Welcome, {{ auth()->user()->name }}</h3>
                <p>Aplikasi ini ditujukan untuk memfasilitasi proses survey pelanggan terkendala jaringan secara efisien.</p>
                <hr class="my-4">
                <p>Aplikasi ini hanya dapat digunakan oleh tim dari divisi SDI (Survey Data Inventory).</p>
                <p>
                    <a class="btn btn-fill btn-danger btn-md" href="{{ route('work-order.index') }}" role="button">Lihat Work Orders</a>
                </p>
            </div>
        </div>
    </div>

    @if(auth()->user()->isAdmin())
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Next WO</h5>
                        <p class="h1 text-right">{{ $nextWO }} <span class="h5 muted">WO(s)</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="font-weight-bold">Technicians</h5>
                        <p class="h1 text-right">{{ $technicians }} <span class="h5 muted">people(s)</span></p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
