@extends("dashboard_layout.dashboard")


@section("content")
    <div class="col-md-10">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add KYC</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('kyc.store')}}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorder">full name</label>
                                <input name="full_name" type="text" class="form-control" id="exampleInputBorder" placeholder="full name">
                            </div>
                            <div class="form_error_p" id="form_error_phone_no">
                                @if ($errors->has('full_name'))
                                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorder">address</label>
                                <input name="address" type="text" class="form-control" id="exampleInputBorder" placeholder="address">
                            </div>
                            <div class="form_error_p" id="form_error_phone_no">
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>



                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label>phone number:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number " name="phone" value="{{old('phoneNumber')}}" oninput="phone_validation('phoneNumber','form_error_phone_no')" required  name="phoneNumber" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']">

                                </div>
                                <div class="form_error_p" id="form_error_phone_no">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>



                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Academic qualification<span class="input-group-addon"><i class="fa fa-text-width"></i></span></label>
                                <div class="input-group">
                                    <select id="" class="select-icon form-control select2" name="education">
                                        <option></option>
                                        <option>SEE</option>
                                        <option>+2</option>
                                        <option>Bachelor</option>
                                    </select>
                                </div>
                                <div class="form_error_p" id="form_error_phone_no">
                                    @if ($errors->has('education'))
                                        <span class="text-danger">{{ $errors->first('education') }}</span>
                                    @endif
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputBorder">Percentage (in %)</label>
                                <input name="education_per" type="text" class="form-control" id="exampleInputBorder" placeholder="Percentage">
                            </div>
                            <div class="form_error_p" id="form_error_phone_no">
                                @if ($errors->has('education_per'))
                                    <span class="text-danger">{{ $errors->first('education_per') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="customFile">Your Photo</label>

                                <div class="custom-file">
                                    <input name="photo" type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                            </div>

                            <div class="form_error_p" id="form_error_phone_no">
                                @if ($errors->has('photo'))
                                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="customFile">Your Citizenship</label>

                                <div class="custom-file">
                                    <input name="citizenship_doc" type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile"></label>
                                </div>
                            </div>
                            <div class="form_error_p" id="form_error_phone_no">
                                @if ($errors->has('citizenship_doc'))
                                    <span class="text-danger">{{ $errors->first('citizenship_docs') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info btn-block btn-flat">Save <i class="fa fa-bell"></i></button>

                        </div>
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection




@section('page_js')
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection