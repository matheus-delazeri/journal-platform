@if($model instanceof \Illuminate\Database\Eloquent\Model)
    @php $items = $model->paginate(15) @endphp
    <div class="row justify-content-between">
        <div class="col-4">
        {!! $items->links() !!}
        </div>
        <div class="col-4">
        <a href="{{ url()->current() . '/new' }}" class="btn btn-primary float-end" style="width: fit-content"><i class="fa fa-plus"></i>Novo</a>
        </div>
    </div>
    <div class="table-responsive card">
    <table class="table table-striped mb-0">
        <thead>
        <tr>
            @foreach($columns as $column)
                <th scope="col">{{ $column != "id" ? ucfirst($column) : "#" }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr>
                @foreach($columns as $column)
                    <th scope="row">{{ $item[$column] }}</th>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endif
