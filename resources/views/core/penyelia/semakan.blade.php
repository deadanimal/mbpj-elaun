@extends('layouts.app', [
    'title' => __('User Profile'),
    'navClass' => 'bg-default',
    'parentSection' => 'laravel',
    'elementName' => 'profile'
])

@section('content')
    @include('forms.header', [
        'title' => __('Semakan Permohonan') . ' ',
        'description' => __(''),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8">
                <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" 
                                href="#formPermohonanKerjaLebihMasa" role="tab" aria-controls="tabs-icons-text-1" 
                                aria-selected="true">
                                <i class="ni ni-time-alarm"></i>
                                Permohonan Kerja Lebih Masa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" 
                                href="#formTuntuanElaunLebihMasa" role="tab" aria-controls="tabs-icons-text-2" 
                                aria-selected="false">
                                <i class="ni ni-money-coins"></i>
                                Tuntuan Elaun Lebih Masa
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="formPermohonanKerjaLebihMasa" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                @include('core.penyelia.partials.formPermohonanKerjaLebihMasa')
                            </div>

                            <div class="tab-pane fade" id="formTuntuanElaunLebihMasa" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                @include('core.penyelia.partials.formTuntuanElaunLebihMasa')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 d-flex">
                <div class="card flex-fill">
                <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">{{ __('Nota Permohanan Kerja Lebih Masa') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        
                                        <span>Task completed</span>
                                        
                                        <div class="progress-percentage">
                                        <span>60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-default" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        
                                        <span>Task completed</span>
                                        
                                        <div class="progress-percentage">
                                        <span>60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-default" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        
                                        <span>Task completed</span>
                                        
                                        <div class="progress-percentage">
                                        <span>60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-default" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="progress-wrapper">
                                    <div class="progress-info">
                                        
                                        <span>Task completed</span>
                                        
                                        <div class="progress-percentage">
                                        <span>60%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-default" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h2 class="mb-2">{{ __('Permohonan Baru Kerja Lebih Masa') }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="table-responsive py-4">
                                <table class="table" id="datatable-basic">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($Users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>
                                                <a onclick="event.preventDefault();editPermohonanForm({{$user->id}});" href="#" class="edit open-modal" data-toggle="modal" value="{{$user->id}}"><button class="btn btn-primary" data-toggle="tooltip" title="Kemaskini"><font color="white">Kemaskini</font></a>
                                                <a onclick="event.preventDefault();lulusPermohonanForm({{$user->id}});" href="#" class="delete" data-toggle="modal"><button class="btn btn-success" data-toggle="tooltip" title="Lulus"><font color="white">Lulus</font></a>
                                                <a onclick="event.preventDefault();tolakPermohonanForm({{$user->id}});" href="#" class="delete" data-toggle="modal"><button class="btn btn-danger" data-toggle="tooltip" title="Tolak"><font color="white">Tolak</font></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
    
                            </div>

                                <div class="col-12 my-4">
                                    <form class="form-inline" style="display: flex; justify-content: flex-end">
                                        <label for="jam">Jumlah Persamaan Jam:</label>
                                        <input type="text" class="form-control mx-sm-3" id="jam" placeholder="">

                                        <label for="masa">Jumlah Tuntutan Lebih Masa:</label>
                                        <input type="text" class="form-control mx-sm-3" id="masa" placeholder="">   
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

@include('core.penyelia.partials.modalSemakan')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('argon') }}/js/penyelia/revealButtonPenyelia.js"></script>

    <script src="{{ asset('argon') }}/js/penyelia/jenisPermohonan.js"></script>


@endpush