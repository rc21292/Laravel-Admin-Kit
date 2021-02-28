@extends('layouts.master')
@section('title','Users List')
@section('content')
@can('users_manage')
<div class="container-fluid p-0">
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</h3>
        </div>

        <div class="col-auto ml-auto text-right mt-n1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</li>
                </ol>
            </nav>
        </div>
    </div>
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <form class="row row-cols-md-auto align-items-center">
                                <div class="col-12">
                                    <label class="sr-only" for="inlineFormInputGroupUsername2">User</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-text">
                                            <i class="align-middle mr-2" data-feather="user"></i>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="sr-only" for="inlineFormInputGroupUsername2">Email</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-text">
                                            <i class="align-middle mr-2" data-feather="mail"></i>
                                        </div>
                                        <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mb-2"><i class="align-middle mr-2" data-feather="filter"></i>Filter</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-auto ml-auto text-right mt-n1">
                           <a href="{{route('admin.users.create')}}" class="btn btn-success float-right"><i data-feather="user-plus"></i> {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}</a>
                       </div>
                   </div>


               </div>
               <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-stripe">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>

                                <th>
                                    {{ trans('cruds.user.fields.id') }}
                                </th>

                                <th>
                                    {{ trans('cruds.user.fields.name') }}
                                </th>

                                <th>
                                    {{ trans('cruds.user.fields.email') }}
                                </th>

                                <th>
                                    {{ trans('cruds.user.fields.roles') }}
                                </th>

                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td>

                                </td>

                                <td>
                                    {{ $user->id ?? '' }}
                                </td>

                                <td>
                                    {{ $user->name ?? '' }}
                                </td>

                                <td>
                                    {{ $user->email ?? '' }}
                                </td>
                                <td>
                                    @foreach($user->roles()->pluck('name') as $role)
                                    <span class="btn btn-secondary btn-sm">{{ $role }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-xs btn-warning" href="{{ route('admin.users.show', $user->id) }}">
                                        {{ trans('global.view') }}
                                    </a>

                                    <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>

                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">

                                        <input type="hidden" name="_method" value="DELETE">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
@endcan
@endsection
@section('scripts')
@parent
<script>
    $(function () {
      let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
      @can('users_manage')
      let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
      let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.users.mass_destroy') }}",
        className: 'btn-danger',
        action: function (e, dt, node, config) {
          var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
              return $(entry).data('entry-id')
          });

          if (ids.length === 0) {
            alert('{{ trans('global.datatables.zero_selected') }}')

            return
        }

        if (confirm('{{ trans('global.areYouSure') }}')) {
            $.ajax({
              headers: {'x-csrf-token': _token},
              method: 'POST',
              url: config.url,
              data: { ids: ids, _method: 'DELETE' }})
            .done(function () { location.reload() })
        }
    }
}
dtButtons.push(deleteButton)
@endcan

$.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
});
$('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
    $($.fn.dataTable.tables(true)).DataTable()
    .columns.adjust();
});
})

</script>
@endsection