<table class="table mt-5">
    <thead>
    <tr>
        <th>Название</th>
        <th>Марка</th>
        <th>Класс</th>
        <th>Создан</th>
        <th>Изменен</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody id="mmcs-table-data">
    @foreach ($obMmcs as $obMmc)
    <tr>
        <td data-index="model">{{$obMmc->model()->first()->title}}</td>
        <td data-index="mark">{{$obMmc->mark()->first()->title}}</td>
        <td data-index="class">{{$obMmc->class()->first()->title}}</td>
        <td>{{$obMmc->created_at}}</td>
        <td>{{ $obMmc->updated_at }}</td>
        <td>
            <button class="btn open-update-form" data-index="{{$obMmc->id}}">Изменить</button>
            <button class="btn mmc-delete-form-submit" value="{{$obMmc->id}}">Удалить</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $obMmcs->links() }}
