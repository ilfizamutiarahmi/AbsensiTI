
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Register</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

<link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css?v=3.2.0') }}">
<script nonce="a7320418-7b98-4727-acc4-03668d968644">try{(function(w,d){!function(bb,bc,bd,be){bb[bd]=bb[bd]||{};bb[bd].executed=[];bb.zaraz={deferred:[],listeners:[]};bb.zaraz.q=[];bb.zaraz._f=function(bf){return async function(){var bg=Array.prototype.slice.call(arguments);bb.zaraz.q.push({m:bf,a:bg})}};for(const bh of["track","set","debug"])bb.zaraz[bh]=bb.zaraz._f(bh);bb.zaraz.init=()=>{var bi=bc.getElementsByTagName(be)[0],bj=bc.createElement(be),bk=bc.getElementsByTagName("title")[0];bk&&(bb[bd].t=bc.getElementsByTagName("title")[0].text);bb[bd].x=Math.random();bb[bd].w=bb.screen.width;bb[bd].h=bb.screen.height;bb[bd].j=bb.innerHeight;bb[bd].e=bb.innerWidth;bb[bd].l=bb.location.href;bb[bd].r=bc.referrer;bb[bd].k=bb.screen.colorDepth;bb[bd].n=bc.characterSet;bb[bd].o=(new Date).getTimezoneOffset();if(bb.dataLayer)for(const bo of Object.entries(Object.entries(dataLayer).reduce(((bp,bq)=>({...bp[1],...bq[1]})),{})))zaraz.set(bo[0],bo[1],{scope:"page"});bb[bd].q=[];for(;bb.zaraz.q.length;){const br=bb.zaraz.q.shift();bb[bd].q.push(br)}bj.defer=!0;for(const bs of[localStorage,sessionStorage])Object.keys(bs||{}).filter((bu=>bu.startsWith("_zaraz_"))).forEach((bt=>{try{bb[bd]["z_"+bt.slice(7)]=JSON.parse(bs.getItem(bt))}catch{bb[bd]["z_"+bt.slice(7)]=bs.getItem(bt)}}));bj.referrerPolicy="origin";bj.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bb[bd])));bi.parentNode.insertBefore(bj,bi)};["complete","interactive"].includes(bc.readyState)?zaraz.init():bb.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
<body class="hold-transition login-page">
<div class="login-box">

<div class="card card-outline card-primary">
<div class="card-header text-center">
<a href="{{ route('login.index') }}" class="h1"><b>Admin</b>LTE</a>
</div>
<div class="card-body">
<p class="login-box-msg">Halaman Register</p>
<form action="{{ route('register-proses') }}" method="post">
@csrf

<div class="input-group mb-3">
    <input type="name" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>

@error('email')
    <small>{{ $message }}</small>
@enderror

<div class="input-group mb-3">
    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>

@error('email')
    <small>{{ $message }}</small>
@enderror

<div class="input-group mb-3">
<input type="password" name="password" class="form-control" placeholder="Password">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
@error('password')
    <small>{{ $message }}</small>
@enderror

<div class="input-group mb-3">
    <input type="hidden" name="role" class="form-control" placeholder="role" value="admin">
</div>

<div class="col-15">
<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
</div>
</div>
</form>

</div>

</div>

</div>


<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('adminlte/dist/js/adminlte.min.js?v=3.2.0') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(@$message = Session::get('failed'))
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ $message }}",
            footer: '<a href="#">Why do I have this issue?</a>'
        });
    </script>
@endif
</body>
</html>
