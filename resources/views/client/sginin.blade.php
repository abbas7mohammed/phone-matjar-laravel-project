@extends('layout.navbar')
@section('front-contain')
            <div class="container-xxl">
                <div class="authentication-wrapper authentication-basic container-p-y">
                  <div>
                    <!-- Register -->
                    <div class="card">
                      <div class="card-body">
                        <div style="display: flex; flex-direction: column; justify-content:cemter; text-align:center">
                            <h4 class="mb-2">Signin</h4>
                            <p class="mb-4">Please sign-in to your account and start purchasing</p>
                        </div>

                        <form id="formAuthentication" class="mb-3" action={{ route('signin.login')}} method="POST">
                          @csrf
                            <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                              type="email"
                              class="form-control"
                              id="email"
                              name="email"
                              placeholder="Enter your email"
                              autofocus
                            />
                          </div>
                          <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                              type="password"
                              class="form-control"
                              id="password"
                              name="password"
                              placeholder="Enter your password"
                              autofocus
                            />
                          </div>
                          <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                          </div>
                        </form>

                        <p class="text-center">
                          <span>Don't have account? please </span>
                          <a href={{ route('register.index') }}>
                            <span>register</span>
                          </a>
                        </p>
                      </div>
                    </div>
                    <!-- /Register -->
                  </div>
                </div>
              </div>

              <!-- / Content -->



@endsection
