<table class="table mt-5">
    <thead>
    <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Создан</th>
        <th>Изменен</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody id="marks-table-data">
    @foreach ($obClasses as $obClass)
    <tr>
        <td scope="row" data-index="title">{{$obClass->title}}</td>
        <td data-index="price">{{$obClass->price}}</td>
        <td>{{$obClass->created_at}}</td>
        <td>{{ $obClass->updated_at }}</td>
        <td class="d-flex flex-row no-wrap">
            <button class="btn open-update-form" data-index="{{$obClass->id}}">Изменить</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $obClasses->links() }}
