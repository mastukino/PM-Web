<table id="tb-projects" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Customer</th>
            <th>Desc.</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $key => $project)
        <tr>
            <td>{{++$key}}</td>
            <td>{{$project->name}}</td>
            <td>{{$project->customer->name}}</td>
            <td>{{$project->description}}</td>
            <td>
                @can('admin')
                <a href="{{route('projects.edit',['id' => $project->id])}}" class="btn btn-sm btn-primary">Edit</a>
                @endcan
                <a href="{{route('projects.workload',['id' => $project->id])}}" class="btn btn-sm btn-warning">Workload</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
