@extends('client.layout.teamplate')
@section('pageContent')
    <div class="container" style="margin-top: 3rem">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('client.login.postResetpassword') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-primary text-light" style="font-size: 1.5rem">THAY ĐỔI MẬT KHẨU</div>
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" name="email" value="{{ $email }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Token</label>
                                <div class="col-md-6">
                                    <input type="text" id="token" name="token" value="{{ $token }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Mật khẩu mới</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" id="password_change" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu mới</label>
                                <div class="col-md-6">
                                    <input type="password" id="repassword_change" name="repassword" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="btnChangePassword" class="btn btn-primary">
                                        ĐỔI MẬT KHẨU
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
