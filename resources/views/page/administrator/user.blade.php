@extends('partials.main')

@section('content')
  <div class="container light-set">
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
        <button href="#" class="nav-nv text-white btn bg-primary nav-user" data-bs-toggle="modal" data-bs-target="#ModalCreate" aria-labelledby="modalcreate"><i class="fa fa-plus"></i> Tambah data</button>
            </div>
            <div class="col-6 col-4 col-lg-4 mb-2">
                <div class="dropdown">
                    <a class="btn dropdown-toggle" style="background-color: rgba(173, 169, 169, 0.658);" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter Huruf
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-index="A" href="#">A</a></li>
                        <li><a class="dropdown-item" data-index="B" href="#">B</a></li>
                        <li><a class="dropdown-item" data-index="C" href="#">C</a></li>
                        <li><a class="dropdown-item" data-index="D" href="#">D</a></li>
                        <li><a class="dropdown-item" data-index="E" href="#">E</a></li>
                        <li><a class="dropdown-item" data-index="F" href="#">F</a></li>
                        <li><a class="dropdown-item" data-index="G" href="#">G</a></li>
                        <li><a class="dropdown-item" data-index="H" href="#">H</a></li>
                        <li><a class="dropdown-item" data-index="I" href="#">I</a></li>
                        <li><a class="dropdown-item" data-index="J" href="#">J</a></li>
                        <li><a class="dropdown-item" data-index="K" href="#">K</a></li>
                        <li><a class="dropdown-item" data-index="L" href="#">L</a></li>
                        <li><a class="dropdown-item" data-index="M" href="#">M</a></li>
                        <li><a class="dropdown-item" data-index="N" href="#">N</a></li>
                        <li><a class="dropdown-item" data-index="O" href="#">O</a></li>
                        <li><a class="dropdown-item" data-index="P" href="#">P</a></li>
                        <li><a class="dropdown-item" data-index="Q" href="#">Q</a></li>
                        <li><a class="dropdown-item" data-index="R" href="#">R</a></li>
                        <li><a class="dropdown-item" data-index="S" href="#">S</a></li>
                        <li><a class="dropdown-item" data-index="T" href="#">T</a></li>
                        <li><a class="dropdown-item" data-index="U" href="#">U</a></li>
                        <li><a class="dropdown-item" data-index="V" href="#">V</a></li>
                        <li><a class="dropdown-item" data-index="W" href="#">W</a></li>
                        <li><a class="dropdown-item" data-index="X" href="#">X</a></li>
                        <li><a class="dropdown-item" data-index="Y" href="#">Y</a></li>
                        <li><a class="dropdown-item" data-index="Z" href="#">Z</a></li>
                </ul>
                </div>
            </div>
        </div>
        <div class="content">
        </div>
    </div>
        @include('page.administrator.create.FormUser')
    <script>
    $('.dropdown-item').on('click', function(e){
        e.stopImmediatePropagation()
        var index = $(this).data('index');

        $.ajax({
            url     : '/search-user/'+index,
            method  : 'GET',
            success: function(data){
                $('.content').html(data);
            }
        });

    })
    get_data();
    function get_data(){
        $.ajax({
            url     : '/search-user/all',
            method  : 'GET',
            success: function(data){
                $('.content').html(data);
            }
        });
    }
    </script>
@endsection
