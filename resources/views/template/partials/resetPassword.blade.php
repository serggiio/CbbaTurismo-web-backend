
<!-- Modal -->
<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header loginHeader">
          <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-key"></i> {{ __('Reinicio de contraseña') }}</h5>
          </button>
        </div>
      <div class="modal-body loginBody">
        
          <div class="container">
            <div class="row justify-content-center">
                <div class="">
                    <div class="">
        
                        <div class="">
                            <form method="POST" action="{{ route('welcome.resetPassword') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label style="color: white" for="email" class="col-md-4 col-form-label text-md-right"><i class="fas fa-at"></i> {{ __('Correo electronico') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-secondary" style="color: white">
                                          <i class="fas fa-shoe-prints"></i> {{ __('Enviar instrucciones') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

    </div>
  </div>
</div>