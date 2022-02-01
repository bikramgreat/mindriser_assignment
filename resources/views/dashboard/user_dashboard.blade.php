@extends("dashboard_layout.dashboard")
@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->user_type_id==2)
{{--        fsadfasdf dfasdfasd dfsaf{{count($user_kyc)}}--}}
        @if(count($user_kyc)==0)
            <div class="col-lg-4">

            </div>

            <div class="col-lg-4">
                <p style="text-align: center">
                    dear {{\Illuminate\Support\Facades\Auth::user()->name}}, you have not filled the KYC form please fill first
                </p>
                <a href="{{route('kyc.create')}}" type="button" class="btn btn-block btn-primary btn-flat">fill Kyc</a>
            </div>

            <div class="col-lg-4"></div>
        @else
            <a href="{{route('kyc.profile')}}" type="button" class="btn btn-block btn-primary btn-flat">view profile</a>
        @endif
    @endif

    @if(\Illuminate\Support\Facades\Auth::user()->user_type_id==1)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">KYC list</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">full name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">user photo</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">address</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">phone</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">education</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">citizenship</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($kycs as $kyc)

                                        <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">{{$kyc->full_name}}</td>
                                            <td>
                                                <div class="text-center">
                                                    <img class="profile-user-img img-fluid img-circle" src="{{url($kyc->photo)}}" alt="User profile picture">
                                                </div>
                                            </td>
                                            <td>{{$kyc->address}}</td>
                                            <td>{{$kyc->phone}}</td>
                                            <td>{{$kyc->education}}({{$kyc->education_per}})</td>
                                            <td>


                                                <button type="button" class="btn btn-default btn-info" data-toggle="modal" data-target="#modal-xl{{$kyc->id}}">
                                                    view citizenship document
                                                </button>


                                                <div class="modal fade" id="modal-xl{{$kyc->id}}">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Citizenship </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe src="{{url($kyc->citizenship)}}" style="width:1000px; height:1000px;" frameborder="0">

                                                                </iframe>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                            <td>{{$kyc->status}}</td>
                                            <td>
                                                @if($kyc->status==0)
                                                    <a href="{{url('kyc/edit/'.$kyc->id)}}" type="button" class="btn btn-block btn-primary btn-xs">activate</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
            </div>
            <!-- /.card-body -->
        </div>
    @endif

@endsection