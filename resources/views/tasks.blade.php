@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Tasques!!
@endsection


@section('main-content')
	<div>
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Tasques</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-bordered">
					<thead>
					<tr class="info">
						<th style="width: 20px">ID</th>
						<th>Tasca</th>
						<th>Prioritat</th>
						<th>Estat</th>
						<th>Progres</th>
						<th style="width: 40px">Label_Into</th>
					</tr>
					</thead>
					<tbody>

					@foreach ($tasks as $key => $task)
						<tr>
							<td class="active">{{ $key +1 }}</td>
							<td class="warning">{{$task->name}}</td>
							<td class="danger">{{$task->priority}}</td>
							<td class="success">{{$task->done}}</td>
							<td>
								<div class="progress progress-xs">
									<div class="progress-bar progress-bar-danger" style="width: 85%"></div>
								</div>
							</td>
							<td><span class="badge bg-blue">85%</span></td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<div class="box-footer clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<li><a href="#">&laquo;</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
			</div>
		</div>
	</div>

@endsection
