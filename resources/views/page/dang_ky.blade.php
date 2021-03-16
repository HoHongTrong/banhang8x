@extends('master')
@section('content')
    <div class="container">
        <div id="content">

            <form action="dang-ky" method="post" class="beta-form-checkout">
                @csrf
                {{--<input type="hidden" name="_token" value="{{csrf_token()}}"/>--}}
                <div class="row">
                    <div class="col-sm-3"></div>
                    @if(count($errors) >0)
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}
                        @endforeach
                        </div>
                    @endif
                    @if (session('thanhcong'))
                        <div class="alert alert-success">
                            {{ session('thanhcong') }}
                        </div>
                    @endif
                    <div class="col-sm-6">
                        <h4>Đăng kí</h4>
                        <div class="space20">&nbsp;</div>

                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input type="email" name="email" required>
                        </div>

                        <div class="form-block">
                            <label for="your_last_name">Fullname*</label>
                            <input type="text" name="fullname" required>
                        </div>

                        <div class="form-block">
                            <label for="adress">Address*</label>
                            <input type="text" name="address" value="Street Address" required>
                        </div>


                        <div class="form-block">
                            <label for="phone">Phone*</label>
                            <input type="text" name="phone" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Password*</label>
                            <input type="password" name="password" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Re password*</label>
                            <input type="password" name="re_password" required>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
    @endsection