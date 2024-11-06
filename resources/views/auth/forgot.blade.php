@extends('layouts.app')

@section('content')




    

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Password Reset</h5>
                  <p class="text-center small">Enter Your Email to reset password</p>
                </div>

                <form class="row g-3 needs-validation" novalidate>
                  <div class="col-12">
                    <label for="yourEmail" class="form-label">Your Email</label>
                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                    <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                  </div>
                
                </form>

              </div>
            </div>

          

@endsection