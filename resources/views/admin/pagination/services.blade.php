<table class="table mt-5">
    <thead>
    <tr>
        <th>Название</th>
        <th>Тип услуги</th>
        <th>Цена</th>
        <th>Создан</th>
        <th>Изменен</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody id="services-table-data">
    @foreach ($obServices as $obService)
    <tr>
        <td scope="row" data-index="title">{{$obService->title}}</td>
        <td data-index="type">{{$obService->typeService()->first()->title}}</td>
        <td data-index="price">{{$obService->price}}₽</td>
        <td>{{$obService->created_at}}</td>
        <td>{{ $obService->updated_at }}</td>
        <td>
            <button class="btn open-update-form" data-index="{{$obService->id}}">Изменить</button>
            <button class="btn service-delete-form-submit" value="{{$obService->title}}">Удалить</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $obServices->links() }}
