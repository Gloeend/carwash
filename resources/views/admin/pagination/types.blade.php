<table class="table mt-5">
    <thead>
    <tr>
        <th>Название</th>
        <th>Создан</th>
        <th>Изменен</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody id="types-table-data">
    @foreach ($obTypes as $obType)
    <tr>
        <td scope="row" data-index="title">{{$obType->title}}</td>
        <td>{{$obType->created_at}}</td>
        <td>{{ $obType->updated_at }}</td>
        <td>
            <button class="btn open-update-form" data-index="{{$obType->id}}">Изменить</button>
            <button class="btn type-delete-form-submit" value="{{$obType->title}}">Удалить</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $obTypes->links() }}
