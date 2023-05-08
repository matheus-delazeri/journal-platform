@extends('admin.layouts.default')

@section('content')
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-md-12 col-lg-12">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">

                        <div class="col-md-9 col-lg-8 mx-auto">

                            <h3 class="login-heading my-4">Journal</h3>
                            <form action="{{url('admin/user/login')}}" method="POST" id="logForm">
                                {{ csrf_field() }}
                                <div class="form-label-group">
                                    <label for="inputUser">User</label>
                                    <input type="text" name="user" id="inputUser" class="form-control" placeholder="Username" >
                                </div>
                                <br>
                                <div class="form-label-group">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                                </div>
                                <br>
                                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
