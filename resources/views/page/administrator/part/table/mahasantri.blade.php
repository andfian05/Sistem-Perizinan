@foreach ($mahasantri as $users)
<div class="nv-op table-responsive mt-4" data-nama="{{ $users->nama }}" style="box-shadow: 0px 8px 10px rgba(0, 0, 0, 0.466);">
    <table class="table table-striped">
        <tbody>
            <tr>
                <td style="font-weight: bold;">No</td>
                <td>{{ $loop->iteration }}</td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Nama</td>
                <td>{{ $users->nama }}</td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Username</td>
                <td>{{ $users->username }}</td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Password</td>
                <td>Privacy Secure<i class="HAM">*</i></td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Level</td>
                <td>{{ $users->level }}</td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Kelas</td>
                <td>{{ $users->kelas }}</td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Angkatan</td>
                <td>{{ $users->angkatan }}</td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Kamar</td>
                <td>{{ $users->kamar }}</td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Foto</td>
                <td><img class="w-25" src="{{ url('storage/' . $users->image) }}" alt="{{ $users->nama }}"></td>
                <td></td>
            </tr>
            <tr>
                <td style="font-weight: bold;">Action</td>
                <td>
                    <form action="/page-mahasantri/{{ $users->id }}" class="d-inline" method="post">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0 show-alert-delete-box" style="border: none;" data-toggle="tooltip" title='Delete'>Delete</button>
                    </form>
                    <button href="#" class="nav-nv text-white badge bg-primary open-modal" style="border: none;" data-bs-toggle="modal" data-bs-target="#ModalEdit-{{ $users->id }}">Edit</button>
                </td>
                <td>
            </tr>
        </tbody>
    </table>
</div>
@endforeach
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
    });
</script>
@include('page.administrator.edit.FormMahasantri')
