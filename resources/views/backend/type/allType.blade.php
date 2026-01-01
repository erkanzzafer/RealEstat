@extends('admin.dashboard')
@section('admin')
	<div class="page-content">

				<nav class="page-breadcrumb">
					<a href="{{ route('add.type') }}" class="btn btn-inverse-info">Add Property Type</a>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Property Type All</h6>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Type Name</th>
                        <th>Type Icon</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($types as $key =>$type )
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $type->type_name }}</td>
                        <td>{{ $type->type_icon }}</td>
                        <td>
                            <a href="{{ route('edit.type',$type->id) }}" class="btn btn-inverse-warning">Edit</a>
                            <a href="{{ route('delete.type',$type->id) }}" id="delete" class="btn btn-inverse-danger">Delete</a>
                        </td>
                      </tr>
                       @empty
                       <tr>
                        <td colspan="4" style="text-align: center">
                            Veri Bulunamadı
                        </td>
                       </tr>
                        @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
					</div>
				</div>

			</div>
@endsection