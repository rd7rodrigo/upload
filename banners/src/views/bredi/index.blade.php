@extends("layouts.controle")
@section('conteudo')
    <section class="content-header">
      <h1>Banners <small>Gerenciamento dos usuários da área administrativa</small></h1>

      <ol class="breadcrumb">
        <li><a href="{{ route('controle.index.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Banners</li>
      </ol>
    </section>

    <section class="content container-fluid">

      <div class="row">
        <div class="col-xs-18 col-sm-18 col-md-18 col-lg-12">
          <div class="box">
            <div class="box-body">
              {{--   @include('includes.controle.mensagem') --}}
              @if (isset($banners) and count($banners))
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th></th>
                      <th><strong>Nome</strong></th>
                      <th><strong>Data de cadastro</strong></th>
                      <th style="width:150px;" class="text-center"><strong>Opções</strong></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($banners as $banner)
                    <tr>
                      <td>{{ $banner->imagem }}</td>
                      <td>{{ $banner->nome }}</td>
                      <td>{{ $banner->created_at->format('d/m/Y H:i:s') }}</td>
                      <td class="text-center" nowrap="nowrap">
                        @can ('controle.usuario.alterar')
                        <a class="btn btn-default btn-xs" href="{{ route('controle.usuario.form-alterar', $banner->id) }}" data-toggle="tooltip" data-original-title="Editar" name="Editar"><i class="fa fa-edit"></i></a>
                        @endcan
                        @can ('controle.usuario.excluir')
                        <a class="btn btn-danger btn-xs atencao" data-url="{{ route('controle.usuario.excluir', $banner->id) }}" data-toggle="tooltip" title="Excluir" data-target="#mod-warning"><i class="fa fa-trash"></i></a>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              {{--  @include('includes.controle.modal-atencao') --}}
              @else
              <p>Não há usuários cadastrados.</p>
              @endif
            </div>
            <div class="box-footer">
              @can('controle.usuario.cadastrar')
              <a class="btn btn-primary bold pull-right" href="{{ route('controle.usuario.form-cadastrar') }}" >
                <i class="mdi mdi-plus"></i>
                Cadastrar
              </a>
              @endcan
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
