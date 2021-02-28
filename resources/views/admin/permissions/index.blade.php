@extends('layouts.master')
@section('title','Permission List')
@section('content')
<div class="container-fluid p-0">
  <div class="row mb-2 mb-xl-3">
    <div class="col-auto d-none d-sm-block">
      <h3>{{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}</h3>
    </div>

    <div class="col-auto ml-auto text-right mt-n1">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
          <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="row mb-2 mb-xl-3">
        <div class="col-auto ml-auto text-right mt-n1">
         <a href="{{route('admin.permissions.create')}}" class="btn btn-success float-right"><i data-feather="plus"></i> {{ trans('global.create') }} {{ trans('cruds.permission.title_singular') }}</a>
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
                {{ trans('cruds.permission.fields.id') }}
              </th>
              <th>
                {{ trans('cruds.permission.fields.title') }}
              </th>
              <th>
                &nbsp;
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($permissions as $key => $permission)
            <tr data-entry-id="{{ $permission->id }}">
              <td>

              </td>
              <td>
                {{ $permission->id ?? '' }}
              </td>
              <td>
                {{ $permission->name ?? '' }}
              </td>
              <td>
                <a class="btn btn-xs btn-primary" href="{{ route('admin.permissions.show', $permission->id) }}">
                  {{ trans('global.view') }}
                </a>

                <a class="btn btn-xs btn-info" href="{{ route('admin.permissions.edit', $permission->id) }}">
                  {{ trans('global.edit') }}
                </a>

                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
  $(function () {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
    let deleteButton = {
      text: deleteButtonTrans,
      url: "{{ route('admin.permissions.mass_destroy') }}",
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

    $.extend(true, $.fn.dataTable.defaults, {
      order: [[ 1, 'desc' ]],
      pageLength: 100,
    });
    $('.datatable-Permission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
      .columns.adjust();
    });
  })

</script>
@endsection