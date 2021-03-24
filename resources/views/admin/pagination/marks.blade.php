<table class="table mt-5">
    <thead>
    <tr>
        <th>Название</th>
        <th>Создан</th>
        <th>Изменен</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody id="marks-table-data">
    @foreach ($obMarks as $obMark)
    <tr>
        <td scope="row" data-index="title">{{$obMark->title}}</td>
        <td>{{$obMark->created_at}}</td>
        <td>{{ $obMark->updated_at }}</td>
        <td class="d-flex flex-row no-wrap">
            <button class="btn open-update-form" data-index="{{$obMark->id}}">Изменить</button>
            <button class="btn mark-delete-form-submit ml-2" value="{{$obMark->title}}">Удалить</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $obMarks->links() }}
