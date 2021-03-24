<table class="table mt-5">
    <thead>
    <tr>
        <th>ФИО</th>
        <th>Почта</th>
        <th>Создан</th>
        <th>Изменен</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody id="users-table-data">
    @foreach ($obUsers as $obUser)
    <tr>
        <td scope="row" data-index="name">{{$obUser->name}}</td>
        <td data-index="email">{{$obUser->email}}</td>
        <td>{{$obUser->created_at}}</td>
        <td>{{ $obUser->updated_at }}</td>
        <td class="d-flex flex-row no-wrap justify-content-between">
            <button class="btn open-update-form" data-index="{{$obUser->id}}">Изменить</button>
            <button class="btn user-delete-form-submit" value="{{$obUser->email}}">Удалить</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $obUsers->links() }}
