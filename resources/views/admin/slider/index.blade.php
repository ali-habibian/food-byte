@extends('admin.layouts.master')

@section('title', 'Slider management')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider Management</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Slides</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.slider.create')}}" class="btn btn-primary">
                        Create New
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
