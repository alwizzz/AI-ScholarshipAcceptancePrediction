@extends('layouts.main')

@section('content')

    <h1>Scholarship Diagnostic</h1>

    @if(isset($result))
        <h5>Result: </h5>
        <div autofocus class="alert alert-info mt-3 mS-4 p-4 text-center" role="alert" style="font-size:200%">
            {{ ($result)? 'You are diagnosed to get a scholarship' : 'You are not diagnosed to get a scholarship' }}
        </div>
    @endif


    <h5 class="mb-3">Fill the form below to get diagnosed</h5>

    <div class="card rounded-3 p-4 border-2 mb-3" style="width:75%">
        
        <form action="/" method="post">
            @csrf

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="sks" class="form-label">SKS</label>
                    <div class="mb-3">
                        <input type="number" class="form-control @error('sks') is-invalid @enderror" id="sks" 
                        name="sks" value="{{ old('sks', $post['sks']) }}" >
                    </div>
                    @error('sks')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="ipk" class="form-label">IPK</label>
                    <div class="mb-3">
                        <input type="number" step="any" class="form-control @error('ipk') is-invalid @enderror" id="ipk" 
                        name="ipk" value="{{ old('ipk', $post['ipk']) }}" >
                    </div>
                    @error('ipk')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <div class="mb-3">
                        <select class="form-select  @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                            <option @if(!old('jenis_kelamin')) selected @endif value="">Choose Jenis Kelamin</option>
                            <option @if(old('jenis_kelamin', $post['jenis_kelamin']) == "L") selected @endif value="L">Laki-laki</option>
                            <option @if(old('jenis_kelamin', $post['jenis_kelamin']) == "P") selected @endif value="P">Perempuan</option>
                        </select>
                    </div>
                    @error('jenis_kelamin')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="jarak_tempat_tinggal_ke_kampus" class="form-label">Jarak Tempat Tinggal ke Kampus</label>
                    <div class="mb-3">
                        <select class="form-select  @error('jarak_tempat_tinggal_ke_kampus') is-invalid @enderror" name="jarak_tempat_tinggal_ke_kampus">
                            <option @if(!old('jarak_tempat_tinggal_ke_kampus')) selected @endif value="">Choose Jarak Tempat Tinggal ke Kampus</option>
                            <option @if(old('jarak_tempat_tinggal_ke_kampus', $post['jarak_tempat_tinggal_ke_kampus']) == "Dekat") selected @endif value="Dekat">Dekat</option>
                            <option @if(old('jarak_tempat_tinggal_ke_kampus', $post['jarak_tempat_tinggal_ke_kampus']) == "Jauh") selected @endif value="Jauh">Jauh</option>
                        </select>
                    </div>
                    @error('jarak_tempat_tinggal_ke_kampus')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="ikut_organisasi" class="form-label">Ikut Organisasi</label>
                    <div class="mb-3">
                        <select class="form-select  @error('ikut_organisasi') is-invalid @enderror" name="ikut_organisasi">
                            <option @if(!old('ikut_organisasi')) selected @endif value="">Choose Ikut Organisasi</option>
                            <option @if(old('ikut_organisasi', $post['ikut_organisasi']) == "Ya") selected @endif value="Ya">Ya</option>
                            <option @if(old('ikut_organisasi', $post['ikut_organisasi']) == "Tidak") selected @endif value="Tidak">Tidak</option>
                        </select>
                    </div>
                    @error('ikut_organisasi')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="ikut_ukm" class="form-label">Ikut UKM</label>
                    <div class="mb-3">
                        <select class="form-select  @error('ikut_ukm') is-invalid @enderror" name="ikut_ukm">
                            <option @if(!old('ikut_ukm')) selected @endif value="">Choose Ikut UKM</option>
                            <option @if(old('ikut_ukm', $post['ikut_ukm']) == "Ya") selected @endif value="Ya">Ya</option>
                            <option @if(old('ikut_ukm', $post['ikut_ukm']) == "Tidak") selected @endif value="Tidak">Tidak</option>
                        </select>
                    </div>
                    @error('ikut_ukm')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>



            {{-- <div class="form-group col-md-5">
                <label for="xx" class="form-label">xxx</label>
                <div class="mb-3">
                    <select class="form-select  @error('xx') is-invalid @enderror" name="xx">
                        <option @if(!old('xx')) selected @endif value="">Choose xxx</option>
                        <option @if(old('xx', $post['xx']) == "Ya") selected @endif value="Ya">Ya</option>
                        <option @if(old('xx', $post['xx']) == "Tidak") selected @endif value="Tidak">Tidak</option>
                    </select>
                </div>
                @error('xx')
                    <div style="margin-top:-15px"></div>
                    <div class="text-danger mb-2">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}



            <div class="row">
                <div class="form-group col-md-5">
                    <label for="pekerjaan_orang_tua" class="form-label">Pekerjaan Orang Tua</label>
                    <div class="mb-3">
                        <select class="form-select  @error('pekerjaan_orang_tua') is-invalid @enderror" name="pekerjaan_orang_tua">
                            <option @if(!old('pekerjaan_orang_tua')) selected @endif value="">Choose Pekerjaan Orang Tua</option>
                            <option @if(old('pekerjaan_orang_tua', $post['pekerjaan_orang_tua']) == "Wiraswasta") selected @endif value="Wiraswasta">Wiraswasta</option>
                            <option @if(old('pekerjaan_orang_tua', $post['pekerjaan_orang_tua']) == "Buruh") selected @endif value="Buruh">Buruh</option>
                            <option @if(old('pekerjaan_orang_tua', $post['pekerjaan_orang_tua']) == "Petani") selected @endif value="Petani">Petani</option>
                            <option @if(old('pekerjaan_orang_tua', $post['pekerjaan_orang_tua']) == "Pedagang") selected @endif value="Pedagang">Pedagang</option>
                            <option @if(old('pekerjaan_orang_tua', $post['pekerjaan_orang_tua']) == "Karyawan Swasta") selected @endif value="Karyawan Swasta">Karyawan Swasta</option>
                            <option @if(old('pekerjaan_orang_tua', $post['pekerjaan_orang_tua']) == "PNS") selected @endif value="PNS">PNS</option>
                            <option @if(old('pekerjaan_orang_tua', $post['pekerjaan_orang_tua']) == "Nelayan") selected @endif value="Nelayan">Nelayan</option>
                            <option @if(old('pekerjaan_orang_tua', $post['pekerjaan_orang_tua']) == "Pensiunan") selected @endif value="Pensiunan">Pensiunan</option>
                            <option @if(old('pekerjaan_orang_tua', $post['pekerjaan_orang_tua']) == "Wirausaha") selected @endif value="Wirausaha">Wirausaha</option>
                            <option @if(old('pekerjaan_orang_tua', $post['pekerjaan_orang_tua']) == "Sudah Meninggal") selected @endif value="Sudah Meninggal">Sudah Meninggal</option>
                        </select>
                    </div>
                    @error('pekerjaan_orang_tua')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="penghasilan_orang_tua" class="form-label">Penghasilan Orang Tua</label>
                    <div class="mb-3">
                        <select class="form-select  @error('penghasilan_orang_tua') is-invalid @enderror" name="penghasilan_orang_tua">
                            <option @if(!old('penghasilan_orang_tua')) selected @endif value="">Choose Penghasilan Orang Tua</option>
                            <option @if(old('penghasilan_orang_tua', $post['penghasilan_orang_tua']) == "Rendah") selected @endif value="Rendah">Rendah</option>
                            <option @if(old('penghasilan_orang_tua', $post['penghasilan_orang_tua']) == "Sedang") selected @endif value="Sedang">Sedang</option>
                            <option @if(old('penghasilan_orang_tua', $post['penghasilan_orang_tua']) == "Tinggi") selected @endif value="Tinggi">Tinggi</option>
                        </select>
                    </div>
                    @error('penghasilan_orang_tua')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group col-md-5">
                <label for="tanggungan" class="form-label">Tanggungan</label>
                <div class="mb-3">
                    <input type="number" class="form-control @error('tanggungan') is-invalid @enderror" id="tanggungan" 
                    name="tanggungan" value="{{ old('tanggungan', $post['tanggungan']) }}" >
                </div>
                @error('tanggungan')
                    <div style="margin-top:-15px"></div>
                    <div class="text-danger mb-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row mt-3">
                <div class="col">
                    <button type="submit" name="aksi" class="btn btn-primary">
                        Diagnose
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection
