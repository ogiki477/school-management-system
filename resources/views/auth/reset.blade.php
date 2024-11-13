@extends('layouts.app')

@section('content')

            <div class="card mb-3">
              <div class="card-body">

                @include('message')

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
                  
                </div>

                <form action=""  method="post" class="row g-3 needs-validation" novalidate>
                    {{ csrf_field() }}
                  <div class="col-12">
                    
                    <input type="password" name="cpassword" class="form-control" placeholder="password" required>
                    <div class="invalid-feedback">Please enter a Password</div>
                  </div>

                  <div class="col-12">
                    
                    <input type="password" name="password" class="form-control" placeholder="confirm password" required>
                    <div class="invalid-feedback">Please enter the same password</div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Reset</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0"><a href="{{ url('')}}">Log in</a></p>
                  </div>
                </form>

              </div>
            </div>

          

@endsection