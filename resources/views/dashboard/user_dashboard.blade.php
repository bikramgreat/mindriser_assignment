@extends("dashboard_layout.dashboard")
@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->user_type_id==2)
        @if(empty($user_kyc))
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
                                            <td>{{$kyc->citizenship}}</td>
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
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
            <!-- /.card-body -->
        </div>
    @endif

@endsection