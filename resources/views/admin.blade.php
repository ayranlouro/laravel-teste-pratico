@extends('layouts.app')

@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body alert alert-success text-center" style="margin-bottom: 0px;">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{ 'Voce está logado, ' . $usuario . '!' }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">ID</th>
                            <th scope="col">Usuário</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Data criada</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody table-list="tablelist">
                        <tr>
                            @foreach ($users as $user)
                                {{-- {{ dd($user) }} --}}
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td><?php
                                    $name = explode('.', $user->name);
                                    echo $name[0];
                                    ?></td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <button type="submit" id="editar" data-editar="{{ $user->name }}" name="editar"
                                        type="button" class="btn btn-primary">Editar</button>
                                    <button id="remover" name="remover" data-remover="{{ $user->name }}" type="button"
                                        class="btn btn-danger">Remover</button>
                                </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

@section('jscript')
    <script>
        $(document).ready(function() {
            $('body').on('click', '[data-editar], [data-remover]', function(e) {
                //e.preventDefault();
                var editar = $(this).data();
                var remover = $(this).data();
                console.log(editar);
                console.log(remover);
                $.ajax({
                    url: '{{ route('admin') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        editar: editar.editar,
                        remover: remover.remover
                    },
                    dataType: "JSON",
                    success: function(data) {
                        alert(data);
                    }
                });
                // $('#remover').click(function(j) {
                //     var remover = $('#remover').val();
                //     console.log('Remover ' + remover);
                // });
            });
        });

    </script>
@endsection
