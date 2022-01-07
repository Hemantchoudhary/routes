@extends('layouts.app')
@section('content')

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Login Form</h3>
            @if(Session::has('fail'))
            <div class="alert alert-danger">
             {{ Session::get('fail') }}
               </div>
                @endif
                @if(Session::has('success'))
            <div class="alert alert-danger">
             {{ Session::get('success') }}
               </div>
                @endif
            <form action=" {{route('check')}} " method="Post">
           
              @csrf
              <div class="form-outline mb-4">
                <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" value="{{old('Email')}}"/>
                <label class="form-label" for="typeEmailX-2">Email</label>
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
              </div>

              <div class="form-outline mb-4">
                <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" />
                <label class="form-label" for="typePasswordX-2">Password</label>
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>

              </div>
              <a href="{{route('Register')}}" class="form-check-label" for="form1Example3"> Do not register yet ? </a>
              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-start mb-4">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                <label class="form-check-label" for="form1Example3"> Remember password </label>
              </div>

              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

              <hr class="my-4">



          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection