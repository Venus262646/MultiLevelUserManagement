{{-- Extends layout --}}
@extends('layout.custom')



{{-- Content --}}
@section('content')
<!-- row -->
<div class="container-fluid">
	<div class="page-titles">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
		<li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
	</ol>
	</div>
	<!-- row -->
	<div class="row">
	<div class="col-lg-12">
		<div class="profile card card-body px-3 pt-3 pb-0">
		<div class="profile-head">
			<div class="photo-content">
			<div class="cover-photo"></div>
			</div>
			<div class="profile-info">
			<div class="profile-photo">
				<img src="{{ asset('images/avatar') }}/{{ $user->avatar_url }}" class="img-fluid rounded-circle" alt="">
			</div>
			<div class="profile-details">
				<div class="profile-name px-3 pt-2">
				<h4 class="text-primary mb-0">{{ $user->first_name }} {{ $user->second_name }}</h4>
				<p>{{ $user->level }}</p>
				</div>
				<div class="profile-email px-2 pt-2">
				<h4 class="text-muted mb-0">{{ $user->email }}</h4>
				<p>Email</p>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	</div>
	<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="basic-form">
				@if ($errors->has('success'))
					<div class="alert alert-success solid alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
            <strong>Success!</strong> {{ $errors->first('success') }}
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
          </div>
				@endif
					<div class="row">
						<div class="col-lg-6 mb-2">
							<div class="form-group">
							<label class="text-label">Nombre *</label>
							<div class="input-group">
								<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" placeholder="Enter a nombre.." disabled>
							</div>
							</div>
						</div>
						<div class="col-lg-6 mb-2">
							<div class="form-group">
							<label class="text-label">Segundo Nombre *</label>
							<div class="input-group transparent-append">
								<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-user"></i> </span>
								</div>
								<input type="text" class="form-control" name="second_name" value="{{ $user->second_name }}" placeholder="Enter a segundo nombre.." disabled>
							</div>
							</div>
						</div>
						<div class="col-lg-6 mb-2">
							<div class="form-group">
							<label class="text-label">Apellido Paterno *</label>
							<div class="input-group">
								<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-male"></i> </span>
								</div>
								<input type="text" class="form-control" name="father_name" value="{{ $user->father_name }}" placeholder="Enter a apellido paterno.." disabled>
							</div>
							</div>
						</div>
						<div class="col-lg-6 mb-2">
							<div class="form-group">
							<label class="text-label">Apellido Materno *</label>
							<div class="input-group">
								<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-female"></i> </span>
								</div>
								<input type="text" class="form-control" name="mother_name" value="{{ $user->mother_name }}" placeholder="Enter a apellido materno.." disabled>
							</div>
							</div>
						</div>
						<div class="col-lg-6 mb-2">
							<div class="form-group">
							<label class="text-label">Teléfono *</label>
							<div class="input-group">
								<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
								</div>
								<input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" placeholder="Enter a Teléfono.." disabled>
							</div>
							</div>
						</div>
						<div class="col-lg-6 mb-2">
							<div class="form-group">
							<label class="text-label">Teléfono 2</label>
							<div class="input-group">
								<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
								</div>
								<input type="text" class="form-control" name="phone_number_2" value="{{ $user->phone_number_2 }}" disabled >
							</div>
							</div>
						</div>
						<?php if($user->detail) {?>
							<div class="col-lg-6 mb-2">
								<div class="form-group">
								<label class="text-label">Estado</label>
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-globe"></i> </span>
									</div>
									<input type="text" class="form-control" name="state" value="{{ isset( $user->detail->state) ? $user->detail->state->name : ""}}" disabled >
								</div>
								</div>
							</div>
							<div class="col-lg-6 mb-2">
								<div class="form-group">
								<label class="text-label">Alcadía o Municipio</label>
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-bus"></i> </span>
									</div>
									<input type="text" class="form-control" name="townhall" value="{{ isset($user->detail->townhall) ? $user->detail->townhall->name : ""}}" disabled >
								</div>
								</div>
							</div>
							<div class="col-lg-6 mb-2">
								<div class="form-group">
								<label class="text-label">Sección Electoral Asignada</label>
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-paragraph"></i> </span>
									</div>
									<input type="text" class="form-control" name="assigned_section" value="{{ isset($user->detail->assigned_electoral_sections) ? $user->detail->assigned_electoral_sections : "" }}" disabled >
								</div>
								</div>
							</div>
							<div class="col-lg-6 mb-2">
								<div class="form-group">
								<label class="text-label">Sección</label>
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-columns"></i> </span>
									</div>
									<input type="text" class="form-control" name="section" value="{{ isset($user->detail->section) ? $user->detail->section->code : ""}}" disabled >
								</div>
								</div>
							</div>
							<div class="col-lg-6 mb-2">
								<div class="form-group">
								<label class="text-label">Tipo</label>
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-paragraph"></i> </span>
									</div>
									<input type="text" class="form-control" name="tipo" value="{{ $user->detail->tipo }}" disabled >
								</div>
								</div>
							</div>
							<div class="col-lg-6 mb-2">
								<div class="form-group">
								<label class="text-label">Distrito Federal</label>
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"> <i class="fa fa-columns"></i> </span>
									</div>
									<input type="text" class="form-control" name="section" value="{{ $user->detail->assigned_zone }}" disabled>
								</div>
								</div>
							</div>
						<?php }?>
						<?php if(Illuminate\Support\Facades\Auth::user()->level == "Call Center") {?>
							<div class="col-lg-12 mb-2">
								<form name="setVerified" action="{{ url('/user/setVerified') }}" method="POST" id="set_verified">
									@csrf
									<div class="row">
										<div class="col-lg-6 mb-2">
											<div class="form-group">
												<label class="text-label">Verificado</label>
												<div class="input-group">
													<div class="input-group-prepend">
													<span class="input-group-text"> <i class="fa fa-columns"></i> </span>
													</div>
													<input type="hidden" name="user_id" value="{{ $user->id }}">
													<select id="verified" name="verified" class="form-control default-select ">
														<option <?php if($user->detail->verified == "NO") echo "selected"; ?> value="NO">NO</option>
														<option <?php if($user->detail->verified == "SI") echo "selected"; ?> value="SI">SI</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-lg-6 mb-2">
											<div class="form-group">
												<label class="text-label">&nbsp;</label>
												<div class="form-group" style="margin-top: 0px;">
													<button type="submit" id="submit_btn" class="btn mr-2 btn-primary">Verificado</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						<?php } else if(Illuminate\Support\Facades\Auth::user()->id == $user->id) {?>
							<div class="col-lg-6 mb-2">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModalCenter">Change Password</button>
								<!-- Modal -->
								<div class="modal fade" id="exampleModalCenter">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Change Password</h5>
										<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="{{ url('/password-reset') }}" method="POST" id="password-change">
											@csrf
											<div class="form-group">
												<label class="text-label">Password *</label>
												<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
												</div>
												<input class="form-control" name="password" type="password" placeholder="Enter a password.." required>
												</div>
											</div>
											<div class="form-group">
												<label class="text-label">New Password *</label>
												<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
												</div>
												<input class="form-control" id="new_password" type="password" name="new_password" placeholder="Enter a password.." required>
												</div>
											</div>
											<div class="form-group">
												<label class="text-label">Password Confirm*</label>
												<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
												</div>
												<input class="form-control" id="password_confirm" type="password" name="password_confirm" placeholder="Enter a password.." required>
												</div>
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary close-modal">Save changes</button>
									</div>
									</div>
								</div>
								</div>
							</div>
						<?php }?>

					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>

@endsection

@push('scripts')
	<script>
		$(document).ready(function() {
			$('.close-modal').click(function(e) {
				if($('#password_confirm').val() == $('#new_password').val()) {
					$('#password-change').submit();
				} else {
					toastr.error("New password is not confirmed", "Top Right", {
						positionClass: "toast-top-right",
						timeOut: 5e3,
						closeButton: !0,
						debug: !1,
						newestOnTop: !0,
						progressBar: !0,
						preventDuplicates: !0,
						onclick: null,
						showDuration: "300",
						hideDuration: "1000",
						extendedTimeOut: "1000",
						showEasing: "swing",
						hideEasing: "linear",
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						tapToDismiss: !1
					});
				}
			})
		})
	</script>
@endpush
