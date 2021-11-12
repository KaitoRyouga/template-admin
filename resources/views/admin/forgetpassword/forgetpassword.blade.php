@extends('client.layout.teamplate')
@section('pageContent')
    <div class="container" style="margin-top: 3rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-light" style="font-size: 1.5rem">TÌM LẠI MẬT KHẨU</div>
                    <form action="{{ route('client.login.postSendmail') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Địa chỉ Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="email_pass" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="btnForgotPassword" class="btn btn-primary">GỬI MÃ XÁC
                                        NHẬN</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
