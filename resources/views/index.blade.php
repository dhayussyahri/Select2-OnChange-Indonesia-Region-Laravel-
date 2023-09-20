    @extends('layouts.main')

    @push('css')

    <!-- CSS SELECT2 ON BOOTSTRAP5 THEME -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    @endpush

    @section('container')

    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
                            <h1 class="h3 mt=3 text-gray-800">{{ $title }}</h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">
                        <div class="container-xl px-11 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <!-- Account details card-->
                <div class="card mb-3">
                    <div class="card-header">Select2 Onchange Indonesia Region</div>
                    <div class="card-body">
                            <div class="row gx-3 mb-3">
                                <div class="col-md-3">
                                    <label class="small mb-2" for="province"
                                        >Provinsi</label
                                    >
                                    <select class="form-select @error('province')
                                    is-invalid
                                    @enderror col-lg" id="province" name="province" autofocus>
                                    @foreach ($province as $item)

                                    <option value="{{ $item->id }}"> {{ $item->name }}</option>

                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="small mb-2" for="kota"
                                        >Kota / Kabupaten</label
                                    >
                                    <select class="form-select @error('kota')
                                    is-invalid
                                    @enderror col-lg" id="kota" name="kota" autofocus>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="small mb-2" for="kelurahan"
                                    >Kelurahan</label
                                    >
                                    <select class="form-select @error('kelurahan')
                                    is-invalid
                                    @enderror col-lg" id="kelurahan" name="kelurahan" autofocus>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="small mb-2" for="kecamatan"
                                    >Kecamatan</label
                                    >
                                    <select class="form-select @error('kecamatan')
                                    is-invalid
                                    @enderror col-lg" id="kecamatan" name="kecamatan" autofocus>
                                    </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @push('script')
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script>
    $(document).ready(function(){

        $('#province').on('change', function() {
            const value = $(this).val();
            getDataKota(value);
        });

        function getDataKota(province) {
            $.ajax({
                type: 'GET',
                url: "/getKota/"+province,
                contentType: 'application/json;',
                dataType: 'json',
                success: function (res) {
                        let kota = res;
                        let html = ``;

                        kota.forEach(function (item) {
							html += `<option value='${item.id}' type='text'>${item.name}</option>`
                        });


						$('#kota').html(html);
                                                placeholder: 'select Regency'

                },

                error: function(xhr, textStatus, errorThrown) {
                    console.log('error');
                }

            });

        $('#kota').on('change', function() {
            const value = $(this).val();
            getDataKelurahan(value);
        });
        function getDataKelurahan(kota) {
            $.ajax({
                type: 'GET',
                url: "/getKelurahan/"+kota,
                contentType: 'application/json;',
                dataType: 'json',
                success: function (res) {
                        let kelurahan = res;
                        let html = ``;

                        kelurahan.forEach(function (item) {
							html += `<option value='${item.id}' type='text'>${item.name}</option>`
                        });


						$('#kelurahan').html(html);
                                                placeholder: 'select District'

                },

                error: function(xhr, textStatus, errorThrown) {
                    console.log('error');
                }
            });
        }

        $('#kelurahan').on('change', function() {
            const value = $(this).val();
            getDataKecamatan(value);
        });
        function getDataKecamatan(kelurahan) {
            $.ajax({
                type: 'GET',
                url: "/getKecamatan/"+kelurahan,
                contentType: 'application/json;',
                dataType: 'json',
                success: function (res) {
                        let kecamatan = res;
                        let html = ``;

                        kecamatan.forEach(function (item) {
							html += `<option value='${item.id}' type='text'>${item.name}</option>`
                        });


						$('#kecamatan').html(html);
                                                placeholder: 'select Village'
                },

                error: function(xhr, textStatus, errorThrown) {
                    console.log('error');
                }
            });
        }



        }

        $("#province").select2({
            theme: "bootstrap-5",
            dropdownParent: $("#province").parent(),
            placeholder: 'Select Province',

        });
        $("#kota").select2({
            theme: "bootstrap-5",
            dropdownParent: $("#kota").parent(),
            placeholder: 'Select Regency',

        });
        $("#kelurahan").select2({
            theme: "bootstrap-5",
            dropdownParent: $("#kelurahan").parent(),
            placeholder: 'Select District',

        });
        $("#kecamatan").select2({
            theme: "bootstrap-5",
            dropdownParent: $("#kecamatan").parent(),
            placeholder: 'Select Village',

        });

    });
</script>
@endpush