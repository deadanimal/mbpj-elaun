@extends('layouts.app', [
    'title' => __('User Profile'),
    'navClass' => 'bg-default',
    'parentSection' => 'laravel',
    'elementName' => 'profile'
])
 
@section('content')
@component('layouts.headers.auth') 
@endcomponent

<div class="container-fluid mt--8">
    <div class="row mt-6">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-12">
                        <h3 class="pt-2">SENARAI KAKITANGAN {{ auth()->user()->jabatan->GE_KETERANGAN_JABATAN }}</h3>
                    </div>
                </div>
                <div class="table-responsive py-3">
                    <table class="table align-items-center" id="senaraiOnCallDT">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Bilangan</th>
                                <th scope="col">No. Pekerja</th>
                                <th scope="col">No. Kad Pengenalan</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Peranan</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
    <script src="{{ asset('argon') }}/js/penyelia/senaraiOnCall.js"></script>
    <script src="{{ asset('argon') }}/js/penyelia/tambahOncall.js"></script>
    <script src="{{ asset('argon') }}/js/penyelia/batalOnCall.js"></script>
@endpush