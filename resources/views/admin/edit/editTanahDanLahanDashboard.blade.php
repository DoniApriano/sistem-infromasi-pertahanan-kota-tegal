@extends('admin.layouts.main')
@section('page')
    <div class="row">
        <div class="col-lg-12">
            <div class="card h-100 p-4">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="text-sm-left">
                                <a href="{{ route('page.tanah-lahan') }}" class="btn btn-outline-secondary w-md"><i
                                        class="mdi mdi-arrow-left ml-1"></i> Kembali</a>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <form id="form-input" method="POST" action="" onsubmit="return false;">
                                <div class="form-group">
                                    <label for="kode_kec">Kecamatan *</label>
                                    <select id="kode_kec" name="kode_kec" class="form-control" required="">
                                        <option value="" selected="" disabled="">Pilih Kecamatan</option>
                                        <option value="337601">Tegal Barat</option>
                                        <option value="337602">Tegal Timur</option>
                                        <option value="337603">Tegal Selatan</option>
                                        <option value="337604">Margadana</option>
                                    </select>
                                    <input type="hidden" name="kecamatan" id="kecamatan">
                                </div>

                                <div class="form-group">
                                    <label for="kode_kel">Kelurahan *</label>
                                    <select id="kode_kel" name="kode_kel" class="form-control" required="">
                                        <option value=""></option>
                                        <option value="">Kejambon</option>
                                        <option value="">Slerok</option>
                                        <option value="">Panggung</option>
                                        <option value="">Mangkukusuman</option>
                                        <option value="">Mintaragen</option>
                                    </select>
                                    <input type="hidden" name="kelurahan" id="kelurahan">
                                </div>

                                <div class="form-group">
                                    <label for="nomor">Nomor *</label>
                                    <input type="text" id="nomor" name="nomor" class="form-control" value=""
                                        required="">
                                </div>

                                <div class="form-group">
                                    <label for="noreg">Nomor Register *</label>
                                    <input type="text" id="noreg" name="noreg" class="form-control" value=""
                                        required="">
                                </div>

                                <div class="form-group">
                                    <label for="input-status">Status *</label>
                                    <input type="text" id="input-status" name="status" class="form-control"
                                        value="" required="">
                                </div>

                                <div class="form-group">
                                    <label for="kode">Kode *</label>
                                    <input type="text" id="kode" name="kode" class="form-control" value=""
                                        required="">
                                </div>

                                <div class="form-group">
                                    <label for="papan_nama">Papan Nama Pemkot</label>
                                    <select id="papan_nama" name="papan_nama" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Sudah">Sudah</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="penggunaan">Penggunaan Lahan *</label>
                                    <input type="text" id="penggunaan" name="penggunaan" class="form-control"
                                        value="" required="">
                                </div>

                                <div class="form-group">
                                    <label for="rencana_pola">Rencana Pola Ruang *</label>
                                    <input type="text" id="rencana_pola" name="rencana_pola" class="form-control"
                                        value="" required="">
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat *</label>
                                    <textarea id="alamat" name="alamat" class="form-control" required=""></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="luas">Luas Sertifikat (meter persegi) *</label>
                                    <input type="text" id="luas" name="luas" class="form-control decimal"
                                        value="" required="">
                                </div>

                                <div class="form-group">
                                    <label for="pemegang_hak">Pemegang Hak *</label>
                                    <input type="text" id="pemegang_hak" name="pemegang_hak" class="form-control"
                                        value="" required="">
                                </div>

                                <div class="form-group">
                                    <label for="pengguna_barang">Pengguna Barang *</label>
                                    <input type="text" id="pengguna_barang" name="pengguna_barang"
                                        class="form-control" value="" required="">
                                </div>

                                <div class="form-group">
                                    <label for="lahan_terbangun">Lahan Terbangun</label>
                                    <select id="lahan_terbangun" name="lahan_terbangun" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Terbangun">Terbangun</option>
                                        <option value="Non Terbangun">Non Terbangun</option>
                                        <option value="Terbangun Sebagian">Terbangun Sebagian</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="patok">Patok Batas Tanah</label>
                                    <select id="patok" name="patok" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="Sudah">Sudah</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="zona_nilai">Zona Nilai Tanah *</label>
                                    <input type="text" id="zona_nilai" name="zona_nilai" class="form-control"
                                        value="" required="">
                                </div>

                                <!-- map -->
                                {{-- <div class="form-group">
                                    <label for="">Silakan menggambar pada peta untuk mendapatkan koordinat</label>
                                    <div style="width: 100%; height: 500px; position: relative;" id="draw-map"
                                        class="leaflet-container leaflet-touch leaflet-retina leaflet-fade-anim leaflet-grab leaflet-touch-drag leaflet-touch-zoom"
                                        tabindex="0">
                                        <div class="leaflet-pane leaflet-map-pane"
                                            style="transform: translate3d(-212px, 0px, 0px);">
                                            <div class="leaflet-pane leaflet-tile-pane">
                                                <div class="leaflet-layer " style="z-index: 1; opacity: 1;">
                                                    <div class="leaflet-tile-container leaflet-zoom-animated"
                                                        style="z-index: 19; transform: translate3d(0px, 0px, 0px) scale(1);">
                                                        <img alt=""
                                                            src="https://c.tile.openstreetmap.org/19/421114/272143.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(281px, 24px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://b.tile.openstreetmap.org/19/421114/272142.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(281px, -232px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://b.tile.openstreetmap.org/19/421113/272143.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(25px, 24px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://a.tile.openstreetmap.org/19/421115/272143.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(537px, 24px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://a.tile.openstreetmap.org/19/421114/272144.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(281px, 280px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://a.tile.openstreetmap.org/19/421113/272142.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(25px, -232px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://c.tile.openstreetmap.org/19/421115/272142.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(537px, -232px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://c.tile.openstreetmap.org/19/421113/272144.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(25px, 280px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://b.tile.openstreetmap.org/19/421115/272144.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(537px, 280px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://a.tile.openstreetmap.org/19/421112/272143.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(-231px, 24px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://b.tile.openstreetmap.org/19/421116/272143.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(793px, 24px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://c.tile.openstreetmap.org/19/421112/272142.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(-231px, -232px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://a.tile.openstreetmap.org/19/421116/272142.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(793px, -232px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://b.tile.openstreetmap.org/19/421112/272144.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(-231px, 280px, 0px); opacity: 1;"><img
                                                            alt=""
                                                            src="https://c.tile.openstreetmap.org/19/421116/272144.png"
                                                            class="leaflet-tile leaflet-tile-loaded"
                                                            style="width: 256px; height: 256px; transform: translate3d(793px, 280px, 0px); opacity: 1;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="leaflet-pane leaflet-overlay-pane"><svg pointer-events="none"
                                                    class="leaflet-zoom-animated" width="595" height="600"
                                                    viewBox="162 -50 595 600"
                                                    style="transform: translate3d(162px, -50px, 0px);">
                                                    <g>
                                                        <path class="leaflet-interactive" stroke="#3388ff"
                                                            stroke-opacity="1" stroke-width="3" stroke-linecap="round"
                                                            stroke-linejoin="round" fill="#3388ff" fill-opacity="0.2"
                                                            fill-rule="evenodd"
                                                            d="M647 101L507 408L273 397L314 229L496 249L556 92z"></path>
                                                    </g>
                                                </svg></div>
                                            <div class="leaflet-pane leaflet-shadow-pane"></div>
                                            <div class="leaflet-pane leaflet-marker-pane"></div>
                                            <div class="leaflet-pane leaflet-tooltip-pane"></div>
                                            <div class="leaflet-pane leaflet-popup-pane"></div>
                                            <div class="leaflet-proxy leaflet-zoom-animated"
                                                style="transform: translate3d(1.07805e+08px, 6.96688e+07px, 0px) scale(262144);">
                                            </div>
                                        </div>
                                        <div class="leaflet-control-container">
                                            <div class="leaflet-top leaflet-left">
                                                <div class="leaflet-control-zoom leaflet-bar leaflet-control"><a
                                                        class="leaflet-control-zoom-in leaflet-disabled" href="#"
                                                        title="Zoom in" role="button" aria-label="Zoom in"
                                                        aria-disabled="true"><span aria-hidden="true">+</span></a><a
                                                        class="leaflet-control-zoom-out" href="#" title="Zoom out"
                                                        role="button" aria-label="Zoom out" aria-disabled="false"><span
                                                            aria-hidden="true">−</span></a></div>
                                                <div class="leaflet-draw leaflet-control">
                                                    <div class="leaflet-draw-section">
                                                        <div
                                                            class="leaflet-draw-toolbar leaflet-bar leaflet-draw-toolbar-top">
                                                            <a class="leaflet-draw-draw-polyline" href="#"
                                                                title="Draw a polyline"><span class="sr-only">Draw a
                                                                    polyline</span></a><a class="leaflet-draw-draw-polygon"
                                                                href="#" title="Draw a polygon"><span
                                                                    class="sr-only">Draw a polygon</span></a><a
                                                                class="leaflet-draw-draw-rectangle" href="#"
                                                                title="Draw a rectangle"><span class="sr-only">Draw a
                                                                    rectangle</span></a><a class="leaflet-draw-draw-circle"
                                                                href="#" title="Draw a circle"><span
                                                                    class="sr-only">Draw a circle</span></a><a
                                                                class="leaflet-draw-draw-marker" href="#"
                                                                title="Draw a marker"><span class="sr-only">Draw a
                                                                    marker</span></a><a
                                                                class="leaflet-draw-draw-circlemarker" href="#"
                                                                title="Draw a circlemarker"><span class="sr-only">Draw a
                                                                    circlemarker</span></a></div>
                                                        <ul class="leaflet-draw-actions"></ul>
                                                    </div>
                                                </div>
                                                <div class="leaflet-draw leaflet-control">
                                                    <div class="leaflet-draw-section">
                                                        <div
                                                            class="leaflet-draw-toolbar leaflet-bar leaflet-draw-toolbar-top">
                                                            <a class="leaflet-draw-draw-polygon" href="#"
                                                                title="Draw a polygon"><span class="sr-only">Draw a
                                                                    polygon</span></a></div>
                                                        <ul class="leaflet-draw-actions"></ul>
                                                    </div>
                                                    <div class="leaflet-draw-section">
                                                        <div class="leaflet-draw-toolbar leaflet-bar"><a
                                                                class="leaflet-draw-edit-remove leaflet-disabled"
                                                                href="#" title="No layers to delete"><span
                                                                    class="sr-only">Delete layers</span></a></div>
                                                        <ul class="leaflet-draw-actions"></ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="leaflet-top leaflet-right"></div>
                                            <div class="leaflet-bottom leaflet-left"></div>
                                            <div class="leaflet-bottom leaflet-right">
                                                <div class="leaflet-control-attribution leaflet-control"><a
                                                        href="https://leafletjs.com"
                                                        title="A JavaScript library for interactive maps"><svg
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="12" height="8" viewBox="0 0 12 8"
                                                            class="leaflet-attribution-flag">
                                                            <path fill="#4C7BE1" d="M0 0h12v4H0z"></path>
                                                            <path fill="#FFD500" d="M0 4h12v3H0z"></path>
                                                            <path fill="#E0BC00" d="M0 7h12v1H0z"></path>
                                                        </svg> Leaflet</a> <span aria-hidden="true">|</span> ©
                                                    OpenStreetMap contributors</div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div>
                                    <a href="{{ route('page.tanah-lahan') }}" class="btn btn-default w-md">Cancel</a>
                                    <button type="submit" class="btn btn-primary w-md">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection