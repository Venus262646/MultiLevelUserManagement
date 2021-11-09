{{-- Extends layout --}}
@extends('layout.custom')



{{-- Content --}}
@section('content')

<div class="container-fluid">
  <div class="row">
	<div class="col-lg-12">
	  <div class="card">
		<div class="card-header">
		  <h4 class="card-title">{{ $page_title }}</h4>
		</div>
		<div class="card-body">
		  <div class="basic-form">
			@if ($errors->has('username'))
			  <div class="alert alert-danger solid alert-dismissible fade show">
				<svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
				<strong>Error!</strong> {{ $errors->first('username') }}
				<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
				</button>
			  </div>
			@endif
			@if ($errors->has('email'))
			  <div class="alert alert-danger solid alert-dismissible fade show">
				<svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
				<strong>Error!</strong> {{ $errors->first('email') }}
				<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
				</button>
			  </div>
			@endif
			@if ($errors->has('phone_number'))
			  <div class="alert alert-danger solid alert-dismissible fade show">
				<svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
				<strong>Error!</strong> {{ $errors->first('phone_number') }}
				<button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
				</button>
			  </div>
			@endif
			<form class="form-edit-new-admin" action="{!! url('/admin/edit/' . $user->id); !!}" method="post" enctype="multipart/form-data">
			  @csrf <!-- {{ csrf_field() }} -->
			  <div class="row">
				<div class="col-lg-6 mb-2">
                {{-- <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input type="file" name="image" class="form-control">
                </div> --}}
				  <div class="form-group">
					<label class="text-label">Avatar *</label>
                    <div class="input-group mb-3">
                        <img id="previewImg" width="100%" height="auto" src="{{ asset('images/avatar/' . $user->avatar_url) }}" alt="Placeholder">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" onchange="previewFile(this);">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
				  </div>
				</div>
                <div class="col-lg-6 mb-2">
                    <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">User *</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input type="text" class="form-control" value="{{ $user->username }}" name="username" placeholder="Enter a nick name to be used instead of full name.." readonly>
                        </div>
                    </div>
                    </div>
                    {{-- <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Password *</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input type="text" class="form-control" name="password" value="{{ $user->password }}" placeholder="Enter a password.." required>
                        </div>
                    </div>
                    </div> --}}
                    <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Nombre *</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" placeholder="Enter a nombre.." required>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Segundo Nombre *</label>
                        <div class="input-group transparent-append">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input type="text" class="form-control" name="second_name" value="{{ $user->second_name }}" placeholder="Enter a segundo nombre.." required>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Apellido Paterno *</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-male"></i> </span>
                        </div>
                        <input type="text" class="form-control" name="father_name" value="{{ $user->father_name }}" placeholder="Enter a apellido paterno.." required>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Apellido Materno *</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-female"></i> </span>
                        </div>
                        <input type="text" class="form-control" name="mother_name" value="{{ $user->mother_name }}" placeholder="Enter a apellido materno.." required>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Teléfono *</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" placeholder="Enter a Teléfono.." readonly>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Email *</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter a email.." readonly>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                    <div class="form-group">
                        <label class="text-label">Teléfono 2</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <input type="text" class="form-control" name="phone_number_2" value="{{ $user->phone_number_2 }}" placeholder="Enter a Teléfono 2..">
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                    <label class="text-label">&nbsp;</label>
                    <div class="form-group" style="margin-top: 0px;">
                            <button type="submit" id="submit_btn" class="btn mr-2 btn-primary">OK</button>
                            <button type="button" class="btn btn-light" onclick="javascript: history.go(-1)">cancel</button>
                    </div>
                    </div>
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

@endsection
