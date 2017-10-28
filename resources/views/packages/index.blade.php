@extends('layouts.master')

@section('title', 'Subscription List')

@section('content')
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
        <a href="{{ url('/packages/create') }}" class="btn btn-success pull-right">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
        <table class="table table-condensed table-hover">
          <thead>
          <tr>
            <th>Name</th>
            <th>Label</th>
            <th>Status</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          {{-- comment here --}}
          @forelse($packages as $package)
            <tr>
              <td>{{ $package->name }}</td>
              <td>{{ $package->label }}</td>
              <td>{{ config('package.enum.status')[$package->status] }}</td>
              <td>{{ config('package.currency') }} {{ $package->price }}</td>
              <td>
                <a href="{{ url('/packages/'.$package->id) }}" class="btn btn-primary btn-sm">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </a>

                <a href="{{ url('/packages/'.$package->id.'/edit') }}" class="btn btn-warning btn-sm">
                  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>

                <a href="{{ url('/packages/'.$package->id) }}" class="btn btn-danger btn-sm"
                   data-method="delete"
                   data-token="{{csrf_token()}}"
                   data-confirm="Are you sure?">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="2">No packages available</td>
            </tr>
          @endforelse
          </tbody>
        </table>
        <div class="pull-right">
          {{ $packages->links() }}
        </div>
      </div>
    </div>
  </div>

@endsection


@section('scripts')
  <script type="text/javascript" src="{{ url('/js/delete.js') }}"></script>
@endsection
