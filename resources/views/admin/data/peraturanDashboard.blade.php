@extends('admin.layouts.main')
@section('page')
    <div class="row">
        <div class="col-lg-12">
            <div class="card h-100 p-4">
                <div class="row">
                    <div class="form-group col-md-2 col-12">
                        <label for="filter-jenis">Filter Jenis</label>
                        <select class="form-control" name="id_jenis" id="filter-jenis" style="width: 100%;"
                            fdprocessedid="fm6n6c">
                            <option value="">-- Semua --</option>
                            @foreach ($jenisPeraturan as $item)
                                <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label for="filter-nomor">Filter Nomor</label>
                        <input type="number" id="filter-nomor" name="nomor" class="form-control" fdprocessedid="wnc5r5">
                    </div>
                    <div class="form-group col-md-2 col-12">
                        <label for="filter-tahun">Filter Tahun</label>
                        <input type="number" id="filter-tahun" name="tahun" class="form-control" fdprocessedid="vgkxg6">
                    </div>
                    <div class="form-group col-md-4 col-12 text-right">
                        <label>&nbsp;</label>
                        <a href="{{ route('create.peraturan') }}"
                            class="btn btn-primary waves-effect waves-light w-md mt-4">Tambah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card h-100 p-4">
                <input type="hidden" name="" value="">
                <input type="hidden" name="jenis" value="back">
                <div class="table-responsive">
                    <table id="myTable" class="table align-items-center mb-0 table-hover">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder">No.</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Judul</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">
                                    Download</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Aksi
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(() => {
            const appUrl = "{{ env('APP_URL') }}" + ':8000'

            $(document).on('click', '.btn-remove', function() {
                let id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `${appUrl}/api/peraturan/${id}`,
                            method: "DELETE",
                            success: (res) => {
                                Swal.fire({
                                    title: "Woke",
                                    text: "successfuly deleted drainase",
                                    icon: "success"
                                });

                                $('#myTable').load("/peraturan-dashboard #myTable");
                            },
                            error: (err) => {
                                Swal.fire({
                                    title: "Failed!",
                                    text: err.responseJSON.message,
                                    icon: "error"
                                })
                            }
                        });
                    }
                });
            })
        })
    </script>

    <script>
        new DataTable('#myTable', {
            ajax: {
                url: "{{ route('peraturan.all') }}",
                dataSrc: (res) => {
                    const data = []
                    res.map((item, i) => {
                        const newdata = {
                            no: i + 1,
                            ...item
                        }
                        data.push(newdata)
                    })
                    return data
                }
            },
            columns: [{
                    data: 'no',
                }, {
                    render: (data, type, row) => {
                        return `<span>${row.jenis} Nomor ${row.nomor} Tahun ${row.tahun} Tentang ${row.tentang.trim()}<span/>
                                        <hr><span class="badge bg-success text-white">Dilihat: ${ row.dilihat ?? 0 }
                                            kali</span> <span class="badge bg-primary text-white">Diunduh:
                                            ${ row.didownload ?? 0 } kali</span>`
                    },
                },
                {
                    render: (data, type, row) => {
                        return `<a target="_blank" href="#"
                                            class="lihat btn bg-gradient-success btn-sm col-12 mb-1">Lihat File</a><br>
                                        <a target="_blank" href="#"
                                            class="download btn bg-gradient-primary btn-sm col-12">Download File</a>`
                    }
                },
                {
                    render: (data, type, row) => {
                        const option = $('<div></div>', {
                            class: 'btn-group',
                            html: [
                                $('<a/>', {
                                    href: `/detail-peraturan/${row.id}`,
                                    class: 'btn btn-outline-dark btn-tooltip',
                                    "data-bs-toggle": "tooltip",
                                    "data-bs-placement": "top",
                                    title: "Detail",
                                    "data-container": "body",
                                    "data-animation": "true",
                                    html: [
                                        $('<i/>', {
                                            class: 'bx bx-detail'
                                        })
                                    ]
                                }),
                                $('<a/>', {
                                    href: `/edit-peraturan/${row.id}`,
                                    class: 'btn btn-outline-warning btn-tooltip',
                                    "data-bs-toggle": "tooltip",
                                    "data-bs-placement": "top",
                                    title: "Ubah",
                                    "data-container": "body",
                                    "data-animation": "true",
                                    html: [
                                        $('<i/>', {
                                            class: 'bx bx-detail'
                                        })
                                    ]
                                }),
                                $('<button></button>', {
                                    class: 'btn btn-outline-danger btn-remove btn-tooltip',
                                    type: 'button',
                                    "data-id": row.id,
                                    "data-bs-toggle": "tooltip",
                                    "data-bs-placement": "top",
                                    title: "Hapus",
                                    "data-container": "body",
                                    "data-animation": "true",
                                    html: [
                                        $('<i/>', {
                                            class: 'bx bx-trash'
                                        })
                                    ]
                                })
                            ]
                        })
                        return option.prop('outerHTML')
                    },
                },
            ]


        })
    </script>
@endsection
