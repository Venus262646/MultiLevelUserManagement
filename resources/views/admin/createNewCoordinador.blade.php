{{-- Extends layout --}}
@extends('layout.custom')



{{-- Content --}}
@section('content')

<div class="container-fluid">
  <div class="row">
	<div class="col-xl-12 col-xxl-12">
	  <div class="card">
		<div class="card-header">
		  <h4 class="card-title">{{ $page_title }}</h4>
		</div>
		<div class="card-body">

		  <div id="smartwizard" class="form-wizard order-create">
			<ul class="nav nav-wizard">
			  <li><a class="nav-link" href="#wizard_section_1">
				<span>1</span>
			  </a></li>
			  <li><a class="nav-link" href="#wizard_section_2">
				<span>2</span>
			  </a></li>
			  <li><a class="nav-link" href="#wizard_section_3">
				<span>3</span>
			  </a></li>
			  <li><a class="nav-link" href="#wizard_section_4">
				<span>4</span>
			  </a></li>
			</ul>
			<form class="wizard_form form-create-new-coordinador" action="{{ !isset($u_user->id) ? url('/coordinador/create') : url('/coordinador/edit/' . $u_user->id) }}" method="post"  enctype="multipart/form-data">
			  @csrf <!-- {{ csrf_field() }} -->
			  <div class="tab-content">
				<input type="hidden" id="current_wizard" name="current_wizard" value="{{ old('current_wizard')? old('current_wizard') : 1 }}">
				<div id="wizard_section_1" class="tab-pane" role="tabpanel">
				  <div class="row">
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">User *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-user-circle-o"></i> </span>
						  </div>
							<input type="text" class="form-control" value="{{ isset($u_user->username)? $u_user->username : old('username') }}" name="username" placeholder="Enter a nick name to be used instead of full name.." {{ isset($u_user->id) ? "readonly" : ""}}>
						  <input type="hidden" name="level" value="{{ $level }}">
						  <input type="hidden" name="parent_id" value="<?php echo $parent_id ? $parent_id : Illuminate\Support\Facades\Auth::user()->id; ?>">
						  <input type="hidden" name="user_id" value="{{ isset($u_user->id)? $u_user->id : old('user_id') }}">
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Password *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						  </div>
						  <input type="text" class="form-control" <?php if(isset($u_user)) echo 'disabled'; ?> name="password" value="{{ (old('password') == '')? $auto_password : old('password') }}" placeholder="Enter a password.." required>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Nombre *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-user"></i> </span>
						  </div>
						  <input type="text" class="form-control" name="first_name" value="{{ isset($u_user->first_name)? $u_user->first_name : old('first_name') }}" placeholder="Enter a nombre.." required>
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
						  <input type="text" class="form-control" name="second_name" value="{{ isset($u_user->second_name)? $u_user->second_name : old('second_name') }}" placeholder="Enter a segundo nombre.." required>
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
						  <input type="text" class="form-control" name="father_name" value="{{ isset($u_user->father_name)? $u_user->father_name : old('father_name') }}" placeholder="Enter a apellido paterno.." required>
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
						  <input type="text" class="form-control" name="mother_name" value="{{ isset($u_user->mother_name)? $u_user->mother_name : old('mother_name') }}" placeholder="Enter a apellido materno.." required>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Celular *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
						  </div>
						  <input type="text" class="form-control" id="phone_number" name="phone_number" onkeyup="smsVerify()" value="{{ isset($u_user->phone_number)? $u_user->phone_number : old('phone_number') }}" placeholder="Enter a Teléfono.." {{ isset($u_user->id) ? "readonly" : ""}}>
						</div>
					  </div>
					</div>
                    <div class="col-lg-6 mb-2">
                        <div class="form-group">
                          <label class="text-label">Confirmar Celular *</label>
                          @if (!isset($u_user->phone_number))
                              <div class="row">
                                <div class="col-lg-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" id="phone_number_confirm" name="phone_number_confirm" onkeyup="smsVerify()" value="{{ isset($u_user->phone_number)? $u_user->phone_number : old('phone_number_confirm') }}" placeholder="Please confirm the phone number.." {{ isset($u_user->id) ? "readonly" : ""}}>
                                </div>
                                </div>
                                <div class="col-lg-4">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary disabled" id="sms_button">SMS Verify</button>
                                </div>
                                </div>
                            </div>
                        @else
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                                </div>
                                <input type="text" class="form-control" id="phone_number_confirm" name="phone_number_confirm" onkeyup="smsVerify()" value="{{ isset($u_user->phone_number)? $u_user->phone_number : old('phone_number_confirm') }}" placeholder="Please confirm the phone number.." {{ isset($u_user->id) ? "readonly" : ""}}>
                            </div>
                        @endif
                        </div>
                      </div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Email *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
						  </div>
						  <input type="text" class="form-control" name="email" value="{{ isset($u_user->email)? $u_user->email : old('email') }}" placeholder="Enter a email.." {{ isset($u_user->id) ? "readonly" : ""}}>
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
						  <input type="text" class="form-control" name="phone_number_2" value="{{ isset($u_user->phone_number_2)? $u_user->phone_number_2 : old('phone_number_2') }}" placeholder="Enter a Teléfono 2.." >
						</div>
					  </div>
					</div>
				  </div>
				</div>
				<div id="wizard_section_2" class="tab-pane" role="tabpanel">
				  <div class="row">
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Estado *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-globe"></i> </span>
						  </div>
						  <select id="state" name="state_id" onchange="onChangeState()" class="form-control default-select ">
							<option value="0">choose</option>
							@foreach ($states as $state)
								<?php $isThis = isset($u_user->detail->state_id)? ($u_user->detail->state_id == $state->id) : (old('state_id') == $state->id) ;?>
							  <option {{ $isThis ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->name }}</option>
							@endforeach
						  </select>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Sección *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-columns"></i> </span>
						  </div>
						  <select onchange="onChangeSection()" id="section" name="section_id" class="form-control default-select">
							<option value="0">choose</option>
							  @foreach ($states as $state)
									@foreach ($state->sections as $section)
										<?php $isThis = isset($u_user->detail->section_id)? ($u_user->detail->section_id == $section->id) : (old('section_id') == $section->id) ;?>
										<option {{ $isThis ? 'selected' : '' }} style="display: none;" class="section section_part_{{$state->id}}" value="{{ $section->id }}">{{ $section->code }}</option>
									@endforeach
							  @endforeach
						  </select>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Ciudad *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-car"></i> </span>
						  </div>
						  <select id="town" name="town_id" class="form-control default-select ">
							<option value="0">Choose</option>
							  @foreach ($states as $state)
									@foreach ($state->sections as $section)
										@foreach ($section->towns as $town)
											<?php $isThis = isset($u_user->detail->town_id)? ($u_user->detail->town_id == $town->id) : (old('town_id') == $town->id) ;?>
											<option {{ $isThis ? 'selected' : '' }} class="town town_part_{{$section->id}}" style="display: none;" value="{{$town->id}}">{{$town->name}}</option>
										@endforeach
									@endforeach
							  @endforeach
						  </select>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Alcaldía o Municipio *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-bus"></i> </span>
						  </div>
						  <select id="townhall" name="townhall_id" class="form-control default-select ">
							<option value="0">Choose</option>
							  @foreach ($states as $state)
									@foreach ($state->sections as $section)
										@foreach ($section->townhalls as $townhall)
											<?php $isThis = isset($u_user->detail->townhall_id)? ($u_user->detail->townhall_id == $townhall->id) : (old('townhall_id') == $townhall->id) ;?>
											<option {{ $isThis ? 'selected' : '' }} class="townhall townhall_part_{{$section->id}}" style="display: none;" value="{{$townhall->id}}">{{$townhall->name}}</option>
										@endforeach
									@endforeach
							  @endforeach
						  </select>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Colonia *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-object-group"></i> </span>
						  </div>
						  <input type="text" id="colonia_name" name="colonia_name" class="form-control" value="{{ isset($u_user->detail->colonia->name)? $u_user->detail->colonia->name : old('colonia_name') }}" required>
						  <input type="hidden" id="colonia_id" name="colonia_id" value="0">
						  <div class="input-group-append">
							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Choose</button>
							<div class="dropdown-menu">
							  @foreach ($states as $state)
									@foreach ($state->sections as $section)
										@foreach ($section->colonias as $colonia)
											<a class="dropdown-item colonia colonia_part_{{$section->id}}" style="display: none;" href="javascript:onChooseColonia({{$colonia->id}}, '{{$colonia->name}}')">{{$colonia->name}}</a>
										@endforeach
									@endforeach
							  @endforeach
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Código Postal *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-code"></i> </span>
						  </div>
						  <input type="text" id="postal_code_code" name="postal_code_code" class="form-control" value="{{ isset($u_user->detail->postal->code)? $u_user->detail->postal->code : old('postal_code_code') }}" required>
						  <input type="hidden" id="postal_code_id" name="postal_code_id" value="0">
						  <div class="input-group-append">
							<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Choose</button>
							<div class="dropdown-menu">
							  @foreach ($states as $state)
								@foreach ($state->sections as $section)
								  @foreach ($section->postal_codes as $postal_code)
									<a style="display: none;" class="dropdown-item postal_code postal_code_part_{{$section->id}}" href="javascript:onChoosepostal_code({{$postal_code->id}}, {{$postal_code->code}})">{{$postal_code->code}}</a>
								  @endforeach
								@endforeach
							  @endforeach
							</div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Calle *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-road"></i> </span>
						  </div>
						  <input type="text" id="street" value="{{ isset($u_user->detail->street)? $u_user->detail->street : old('street') }}" class="form-control" name="street" required>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">No. Exterior *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-id-card"></i> </span>
						  </div>
						  <input type="text" class="form-control" id="exterior_no" name="exterior_no" value="{{ isset($u_user->detail->exterior_no)? $u_user->detail->exterior_no : old('exterior_no') }}" required>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">No. Interior *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-id-card-o"></i> </span>
						  </div>
						  <input type="text" class="form-control" name="interior_no" value="{{ isset($u_user->detail->interior_no)? $u_user->detail->interior_no : old('interior_no') }}" required>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Escolaridad *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-money"></i> </span>
						  </div>
						  <select id="scholarship" name="scholarship" class="form-control default-select ">
                              <?php  ?>
							<option {{ isset($u_user->detail->scholarship) && $u_user->detail->scholarship == "Ninguna" ? "selected" : "" }} value="Ninguna">Ninguna</option>
							<option {{ isset($u_user->detail->scholarship) && $u_user->detail->scholarship == "Primaria" ? "selected" : "" }} value="Primaria">Primaria</option>
							<option {{ isset($u_user->detail->scholarship) && $u_user->detail->scholarship == "Secundaria" ? "selected" : "" }} value="Secundaria">Secundaria</option>
							<option {{ isset($u_user->detail->scholarship) && $u_user->detail->scholarship == "Preparatoria" ? "selected" : "" }} value="Preparatoria">Preparatoria</option>
							<option {{ isset($u_user->detail->scholarship) && $u_user->detail->scholarship == "Licenciatura" ? "selected" : "" }} value="Licenciatura">Licenciatura</option>
							<option {{ isset($u_user->detail->scholarship) && $u_user->detail->scholarship == "Pos-Grado" ? "selected" : "" }} value="Pos-Grado">Pos-Grado</option>
						  </select>
						</div>
					  </div>
					</div>
				  </div>
				</div>
				<div id="wizard_section_3" class="tab-pane" role="tabpanel">
				  <div class="row">
					{{-- <div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Estado Asignado *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-globe"></i> </span>
						  </div>
						  <select id="assigned_state" name="assigned_state_id" class="form-control default-select ">
							<option id="assigned_state_0" value="0">choose</option>
							@foreach ($states as $state)
							  <option id="assigned_state_{{$state->id}}" value="{{ $state->id }}">{{ $state->name }}</option>
							@endforeach
						  </select>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Tipo *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-columns"></i> </span>
						  </div>
						  <select id="tipo" name="tipo" class="form-control default-select ">
							<option value="Alcaldía">Alcaldía</option>
							<option value="Distrito Federal">Distrito Federal</option>
							<option value="Distrito Local">Distrito Local</option>
						  </select>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Zona Asignada *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-paragraph"></i> </span>
						  </div>
						  <select id="assigned_zone" name="assigned_zone" class="form-control default-select ">
							@for ($i = 0 ; $i < 100 ; $i++)
							  <option value="{{$i}}">{{ ($i<10)? "0".$i : $i }}</option>
							@endfor
						  </select>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Seccionales Asignados *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-paragraph"></i> </span>
						  </div>
						  <select id="assigned_sectional" name="assigned_sectional" class="form-control default-select ">
							@for ($i = 0 ; $i < 100 ; $i++)
							  <option value="{{$i}}">{{ ($i<10)? "0".$i : $i }}</option>
							@endfor
						  </select>
						</div>
					  </div>
					</div>
					<div class="col-lg-6 mb-2">
					  <div class="form-group">
						<label class="text-label">Secciones Electorales Asignadas *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-paragraph"></i> </span>
						  </div>
						  <input type="text" class="form-control" name="assigned_electoral_sections" required>
						</div>
					  </div>
					</div> --}}
                    {{-- Added Code --}}
                    {{-- <div class="col-lg-6 mb-2">
                        <div class="form-group">
                          <label class="text-label">Geo Data *</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"> <i class="fa fa-road"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="geo_data" value="{{ isset($u_user->detail->geo_data)? $u_user->detail->geo_data : old('geo_data') }}" required>
                          </div>
                        </div>
                    </div> --}}
					<div class="col-lg-12 mb-2">
					  <div class="form-group">
						<label class="text-label">Distrito *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-road"></i> </span>
						  </div>
						  <input type="text" class="form-control" name="district" value="{{ isset($u_user->detail->district)? $u_user->detail->district : old('district') }}" required>
						</div>
					  </div>
					</div>
					<div class="col-lg-12 mb-2">
					  <div class="form-group">
						<label class="text-label">Género *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-transgender-alt"></i> </span>
						  </div>
						  <select id="gender" name="gender" class="form-control default-select ">
							<option {{ isset($u_user->detail->gender) && $u_user->detail->gender == "Mujer" ? "selected" : "" }} value="Mujer">Mujer</option>
							<option {{ isset($u_user->detail->gender) && $u_user->detail->gender == "Hombre" ? "selected" : "" }} value="Hombre">Hombre</option>
							<option {{ isset($u_user->detail->gender) && $u_user->detail->gender == "Otro" ? "selected" : "" }} value="Otro">Otro</option>
						  </select>
						</div>
					  </div>
					</div>
					<div class="col-lg-12 mb-2">
					  <div class="form-group">
						<label class="text-label">Clave de Elector *</label>
						<div class="input-group">
						  <div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-id-card-o"></i> </span>
						  </div>
						  <input type="text" class="form-control" name="elector_key" value="{{ isset($u_user->detail->elector_key)? $u_user->detail->elector_key : old('elector_key') }}" required>
						</div>
					  </div>
					</div>
				  </div>
				</div>
				<div id="wizard_section_4" class="tab-pane" role="tabpanel">
				  <div class="row">
						<div class="col-lg-6 mb-2">
							<div class="form-group">
                                <label class="text-label">Avatar *</label>

                                <div class="input-group mb-3">
                                    <div class="camera">
			                            <video id="video" width="180" height="135">Video stream not available.</video>
			                            <button type="button" id="startbutton">Take photo</button>
			                        </div>
			                        <canvas id="canvas"></canvas>
			                        <input type="hidden" name="photo_data" id="photo_data"/>
                                    <img id="previewImg" width="100%" height="auto" src="{{ isset($u_user->avatar_url) ? asset('images/avatar/' . $u_user->avatar_url) : asset('images/avatar/default-avatar.png') }}" alt="Placeholder">
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
                            <div class="col-lg-6 mb-2">
                                <div class="form-group">
                                <label class="text-label">Usuario de Facebook *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-facebook"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" name="facebook_link" value="{{ isset($u_user->detail->facebook_link)? $u_user->detail->facebook_link : old('facebook_link') }}" required>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="form-group">
                                <label class="text-label">Usuario de Twitter *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-twitter"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" name="twitter_link" value="{{ isset($u_user->detail->twitter_link)? $u_user->detail->twitter_link : old('twitter_link') }}" required>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="form-group">
                                <label class="text-label">Usuario de Instagram *</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-instagram"></i> </span>
                                    </div>
                                    <input type="text" class="form-control" name="instagram_link" value="{{ isset($u_user->detail->instagram_link)? $u_user->detail->instagram_link : old('instagram_link') }}" required>
                                </div>
                                </div>
                            </div>
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
<script src="{{ asset('js/custom/capture.js') }}"></script>
@endsection
