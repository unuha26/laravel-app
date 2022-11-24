@extends('dashboard.main')
@section('content')
<div class="card col-sm-6" style="margin: 0 auto;">
    <div class="card-body">
        <div class="m-sm-4">
        @if(session('success'))
        <p class="alert alert-success">{{alert('success')}}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{$err}}</p>
        @endforeach
        @endif
            <form action="{{ url('LogIn/proses') }}" method="post">
            @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input autofocus class="form-control form-control-lg" type="text" name="username" placeholder="Enter your Username">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input autofocus class="form-control form-control-lg" type="password" name="password" placeholder="Enter your Password">
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
