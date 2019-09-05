
	<h3 class="text-center">Form Pendaftaran</h3>
	<form action="<?= base_url() ?>daftar" method="POST">

	<div class="form-row mt-3" j>
		<label class="col-md-2 col-sm-3 col-form-label text-sm-left"
			   for="normal-input-1">Username </label>

		<div class="col-md-10 col-sm-9">
			<input type="text" class="form-control" id="normal-input-1"
				   placeholder="Masukkan Username" name="username" required autocomplete="off">
		</div>

	</div>
	<div class="form-row mt-3" j>
		<label class="col-md-2 col-sm-3 col-form-label text-sm-left"
			   for="normal-input-1">Nama Lengkap </label>

		<div class="col-md-10 col-sm-9">
			<input type="text" class="form-control" id="normal-input-1"
				   placeholder="Nama Lengkap" name="nama" required autocomplete="off">
		</div>
		
	</div>
	<div class="form-row mt-3" j>
		<label class="col-md-2 col-sm-3 col-form-label text-sm-left"
			   for="normal-input-1">Password </label>

		<div class="col-md-10 col-sm-9">
			<input type="password" class="form-control" id="normal-input-1"
				   placeholder="Password" name="password" required autocomplete="off">
		</div>
		
	</div>
	<div class="form-row mt-3" j>
		<label class="col-md-2 col-sm-3 col-form-label text-sm-left"
			   for="normal-input-1">Email </label>

		<div class="col-md-10 col-sm-9">
			<input type="email" class="form-control" id="normal-input-1"
				   placeholder="Email" name="email" required autocomplete="off">
		</div>
		
	</div>
	<div class="form-row mt-3" j>
		<label class="col-md-2 col-sm-3 col-form-label text-sm-left"
			   for="normal-input-1">Nomor HP </label>

		<div class="col-md-10 col-sm-9">
			<input type="text" class="form-control" id="normal-input-1"
				   placeholder="Nomor HP" name="nope" required autocomplete="off">
		</div>
		
	</div>
	<div class="form-row mt-3" j>
		<label class="col-md-2 col-sm-3 col-form-label text-sm-left"
			   for="normal-input-1">Alamat </label>

		<div class="col-md-10 col-sm-9">
			<textarea name="alamat" class="form-control"></textarea>
		</div>
		
	</div>
	<div class="form-row mt-3 " j>
		<label class="col-md-2 col-sm-3 col-form-label text-sm-left"
			   for="normal-input-1">Nomor HP </label>

		<div class="col-md-10 col-sm-9">
			<select name="jk" class="form-control">
				<option >- Pilih Jenis Kelamin -</option>
				<option >Pria</option>
				<option >Wanita</option>
			</select>
		</div>
		
	</div>
	<div class="row mb-3 mt-3">
		<div class="col-md-12">
			<button type="submit" name="daftar" class=" btn btn-primary float-right">Daftar</button>
		</div>
	</div>
	
	</form>

