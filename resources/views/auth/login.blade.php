@extends('layouts.app')

@section('header')
    <link rel="stylesheet" type="text/css" href="https://auth.unomaha.edu/idp/sso.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <script language="JavaScript">
        function placeCursorOnFirstElm() {
            var frms = document.forms;
            var frmCount = frms.length;

            for (var i = 0; i < frmCount; i++) {
                var frm = frms[i];
                var sz = frm.elements.length;

                for (var j = 0; j < sz; j++) {
                    var elm = frm.elements[j];

                    if (elm.type != "hidden") {
                        elm.focus();
                        return;
                    }
                }
            }
        }
    </script>
    <style>
        #IstMain {
            width: 100%;
            height: 75px;
            border-bottom: 5px solid #D51834;
            background: url('/assets/cist.png') no-repeat scroll left center #0e0e0e;
        }
        #username, #password {
            background: none;
        }
    </style>
@endsection

@section('content')

<div>

    <div class="row">

        @include('partials._flash')
        @include('partials._errors')
        <div id="UnoForm" class="">
            <div id="form-signin-heading">
                <h4 class="UnoHidden">(do not bookmark this page)</h4>
                <h3>Sign In<span></span></h3>
            </div>
            <form class="form form-signin" role="form" method="POST" action="{{ url('/auth/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="span4 control-label">University of Nebraska ID</label>

                    <div class="span4">
                        <input type="text" class="form-control" name="nu_id" value="{{ old('nu_id') }}">

                        @if ($errors->has('nu_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nu_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="span6 control-label">Password</label>

                    <div class="span4">
                        <input type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="span4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-sign-in"></i>Login
                        </button>
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
