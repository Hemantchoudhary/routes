@extends('layouts.app')
@section('content')
<section class="vh-50" style="background-color: #508bfc;">
  <div class="container py-5 h-50">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Register Form</h3>
            @if(Session::has('fail'))
            <div class="alert alert-info">
             {{ Session::get('fail') }}
               </div>
                @endif
                @if(Session::has('success'))
              <div class="alert alert-info">
             {{ Session::get('success') }}
               </div>
                @endif
            <form action=" {{route('save')}} " method="Post">
             
        
              @csrf
              <div class="form-outline mb-4">
              <input type="text" id="typeEmailX-2" name='Name'class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX-2">Name</label>
            </div> 
            <div class="form-outline mb-4">
              <input type="email" id="typePasswordX-2" name='Email'class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Email</label>
              <span class="text-danger">@error('Email'){{ $message }}@enderror</span>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" name="Password" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Password</label>
              <span class="text-danger">@error('Password'){{ $message }}@enderror</span>
            </div>
            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="c_Password" />
              <label class="form-label" for="typePasswordX-2">Confirm PAssword</label>
            </div>
            <a href="{{ route('Login')}}" class="form-check-label" for="form1Example3"> Login here </a>
            <!-- Checkbox -->
            

            <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>

          
            

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection

