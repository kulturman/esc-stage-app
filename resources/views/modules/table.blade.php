@section('styles')
    @parent
    @include('layouts.datatables_css')
@endsection

{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}

@section('scripts')
    @parent
    @include('layouts.datatables_js')
    {!! $dataTable->scripts() !!}
@endsection