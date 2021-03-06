@extends('master')
@section('content')
<div class="container">
    <div id="content">

        <form action="dang-nhap" method="post" class="beta-form-checkout">
            @csrf
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            <div class="row">

                <div class="col-sm-3"></div>
                @if(session('flag'))
                    <div class="alert alert-{{session('flag')}}">{{session('message')}}</div>
                @endif
                <div class="col-sm-6">
                    <h4>Đăng nhập</h4>
                    <div class="space20">&nbsp;</div>


                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password" name="password" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container
    @endsection