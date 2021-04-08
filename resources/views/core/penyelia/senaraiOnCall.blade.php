@extends('layouts.app', [
    'title' => __('User Profile'),
    'navClass' => 'bg-default',
    'parentSection' => 'laravel',
    'elementName' => 'profile'
])
 
@section('content')
@component('layouts.headers.auth') 
@endcomponent

<div class="container-fluid mt--6">
    <div class="row mt-6">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-12">
                        <h3 class="pt-2">{{ __('Senarai Kakitangan Jabatan') }}</h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Bilangan</th>
                                <th scope="col">No. Pekerja</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Peranan</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="col">{{ $counter++ }}</th>
                                <th scope="col">{{ $user->USERID }}</th>
                                <th scope="col">{{ $user->NAME }}</th>
                                <th scope="col">{{ $user->role->name }}</th>
                                <th scope="col">Tambah</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection