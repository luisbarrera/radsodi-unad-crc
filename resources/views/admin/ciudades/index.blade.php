@extends('layouts.admin')
@section('title', 'Lista Ciudades')
@section('style')
    <!-- SweetAlert2 -->
    {!! Html::style('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') !!}
    <!-- DataTables -->
    {!! Html::style('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}
    {!! Html::style('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}
    {!! Html::style('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}
@endsection
@section('content')
    <div class="content-wrapper bg-black">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{--  <h1 class="m-0">Lista Series Documentales del sistema</h1>  --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Lista Ciudades</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista Ciudades</h3>
                        <div class="card-tools">

                            <a href="{{ route('admin.ciudades.create') }}" class="btn btn-primary">
                                Agregar Ciudad
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE DE LA CIUDAD</th>
                                    <th>ACCIONES</th>
                                </tr>
                                {{--  <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                      </tr>  --}}
                            </thead>
                            <tbody>
                                @foreach ($ciudades as $ciudad)
                                    <tr>
                                        <td>{{ $ciudad->id }}</td>
                                        <td>{{ $ciudad->detciudad }}</td>
                                        <td>
                                            <form action="{{ route('admin.ciudades.destroy', $ciudad) }}" method="POST">
                                                @csrf
                                                @method('delete')

                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('admin.ciudades.edit', $ciudad) }}">Editar</a>


                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
            {{-- </div> --}}
            <!-- /.content -->
        </div>
    @endsection
    @section('script')
        <!-- SweetAlert2 -->
        {!! Html::script('adminlte/plugins/sweetalert2/sweetalert2.min.js') !!}
        @if (session('flash') == 'actualizado')
            <script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'La Ciudad se Actualizo con Exito.'
                    })
                });
            </script>
        @endif
        @if (session('flash') == 'registrado')
            <script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'La Ciudad se Creó con Exito.'
                    })
                });
            </script>
        @endif
        @if (session('flash') == 'eliminado')
            <script>
                Swal.fire(
                    '¡Eliminado!',
                    'La Ciudad se Eliminó con Exito.',
                    'success'
                )
            </script>
        @endif
        <script>
            function enviar_formulario() {
                Swal.fire({
                    title: '¿Estas seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, estoy seguro!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.delete_form.submit();
                    }
                })
            }
        </script>
        <!-- DataTables  & Plugins -->
        {!! Html::script('adminlte/plugins/datatables/jquery.dataTables.min.js') !!}
        {!! Html::script('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}
        {!! Html::script('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}
        {!! Html::script('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}
        {!! Html::script('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}
        {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}
        {!! Html::script('adminlte/plugins/jszip/jszip.min.js') !!}
        {!! Html::script('adminlte/plugins/pdfmake/pdfmake.min.js') !!}
        {!! Html::script('adminlte/plugins/pdfmake/vfs_fonts.js') !!}
        {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') !!}
        {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') !!}
        {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') !!}
        @include('includes._datatable_language')
    @endsection