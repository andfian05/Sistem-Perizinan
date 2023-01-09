@extends('partials.main')

@section('content')
  <div class="container">
    @if (session()->has('success'))
    <script>
    swal({
        title: 'Berhasil !',
        text: '{{ session('success') }}',
        icon: 'success',
        buttons : {
            confirm: {
                className : 'btn btn-success'
            }
        }
    });
    </script>
    @elseif(session()->has('failed'))
    <script>
        swal({
            title: 'Failed !',
            text: '{{ session('failed') }}',
            icon: 'error',
            buttons : {
                confirm: {
                    className : 'btn btn-danger'
                }
            }
        });
        </script>
    @endif
      <div class="row mt-3">
          <div class="col-6 col-4 col-lg-4 mb-2">
              <button class="btn btn-primary" onclick="window.location.href='/page-outing/create'" style="border-radius:8px;"><i class="fa fa-plus"></i>Tambah Data</button>
            </div>
        </div>
        @foreach ($outing as $out)
        <div class="table-responsive mt-4" style="box-shadow: 0px 8px 10px rgba(0, 0, 0, 0.466);">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td style="font-weight: bold;">No</td>
                        <td>{{ $loop->iteration }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Tanggal Masuk</td>
                        <td>{{ $out->tanggal_masuk }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Tanggal Keluar</td>
                        <td>{{ $out->tanggal_keluar }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Jam Masuk</td>
                        <td>{{ $out->jam_masuk }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Jam Keluar</td>
                        <td>{{ $out->jam_keluar }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Status</td>
                        <td>{{ $out->status }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Action</td>
                        <td>
                            <button class="text-white badge bg-primary" style="border:none;" onclick="window.location.href = '/page-outing/{{ $out->id }}/edit'">Edit</button>
                            <form action="/page-outing/{{ $out->id }}" class="d-inline" method="post">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0 show-alert-delete-box" style="border: none;" data-toggle="tooltip" title='Delete'>Delete</button>
                            </form>
                        </td>
                        <td>
                    </tr>
                        <tr>
                            <td>
                                <form name="theForm" class="theForm{{ $out->id }}" method="POST" action="/change-status/{{ $out->id }}">
                                    @csrf
                                    @method('patch')
                                    <div class="d-flex justify-content-end">
                                        <div class="form-check m-2 form-check-inline">
                                            <input class="form-check-input" type="radio" id="on" name="status" onchange="autoSubmit({{ $out->id }});" value="on" {{ ($out->status == 'on') ? 'checked' : ''   }}>
                                            <label class="form-check-label" for="on">ON</label>
                                        </div>
                                        <div class="form-check m-2 form-check-inline">
                                            <input class="form-check-input" type="radio" id="off" name="status" onchange="autoSubmit({{ $out->id }});" value="off" {{ ($out->status == 'off') ? 'checked' : ''   }}>
                                            <label class="form-check-label" for="off">OFF</label>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tr>
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
    <script>
    $('.show-alert-delete-box').click(function(event){
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: "Yakin Mau Dihapus?",
          text: "Data Tidak Dapat Dikembalikan!",
          icon: "warning",
          type: "warning",
          buttons: ["Cancel","Yes!"],
      }).then((willDelete) => {
          if (willDelete) {
              form.submit();
          }
      });
  });
    function autoSubmit(id)
    {
        if(id){
            $('.theForm'+id).submit();
        }
    }

    </script>
@endsection
