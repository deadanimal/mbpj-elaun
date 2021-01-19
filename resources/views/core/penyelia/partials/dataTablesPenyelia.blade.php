<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h2 class="mb-2" id="titleTable"></h2>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="table-responsive py-4">
                    <table class="table" id="datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Status</th>
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
                                {{-- <td id="statusPermohonan">Before</td> --}}
                                <td id="statusPermohonan">After</td>
                                <td>
                                    <i data-toggle="modal" id="buttonEdit" onclick="changeDataTarget({{$user->id}})" data-target="" class="btn btn-primary btn-sm ni ni-align-center"></i>
                                    <i data-toggle="modal" data-target="#modal-notification" class="btn btn-success btn-sm ni ni-check-bold"></i>
                                    <i data-toggle="modal" data-target="#modal-reject" class="btn btn-danger btn-sm ni ni-fat-remove"></i>
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