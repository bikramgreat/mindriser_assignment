@extends("dashboard_layout.dashboard")
@section("content")
    <div class="col-lg-6">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{url($kyc[0]->photo)}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$kyc[0]->full_name}}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>status</b>
                        <a class="float-right">
                            @if($kyc[0]->status==1)
                                <p style="color: green">accepted</p>
                            @else
                                <p style="color: red">Not accepted</p>
                            @endif

                        </a>
                    </li>
                    <li class="list-group-item">
                        <b>Address :</b> <p class="float-right">{{$kyc[0]->address}}</p>
                    </li>
                    <li class="list-group-item">
                        <b>Phone number</b> <a class="float-right">{{$kyc[0]->phone}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Education</b> <a class="float-right">{{$kyc[0]->education}} ({{$kyc[0]->education_per}})</a>
                    </li>

                    <li class="list-group-item">
                        <b>citizenship document</b> <a class="float-right"> ({{$kyc[0]->citizenship}})</a>
                    </li>


                    <iframe src="{{url($kyc[0]->citizenship)}}" style="width:600px; height:500px;" frameborder="0"></iframe>
                </ul>

            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection