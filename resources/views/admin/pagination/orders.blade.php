<table class="table mt-5">
    <thead>
    <tr>
        <th>Автомобиль</th>
        <th>Имя</th>
        <th>Класс</th>
        <th>Услуги</th>
        <th>Сумма</th>
        <th>Время</th>
        <th>Телефон</th>
        <th>Статус</th>
        <th>Создан</th>
        <th>Изменен</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody id="mmcs-table-data" class="fz-14">
    @foreach ($obOrders as $obOrder)

    <tr>
        @php
            $obMmc = $obOrder->mmc()->first();
            $arServices = json_decode($obOrder->service, true);
            $sum = $obMmc->class()->first()->price;
        @endphp
        <td data-index="model" class="fz-12">{{$obMmc->model()->first()->title }} {{$obMmc->mark()->first()->title}}</td>
        <td data-index="model" class="fz-12">{{$obOrder->client()->first()->fio}}</td>
        <td data-index="class" class="fz-12">{{$obMmc->class()->first()->title}}</td>
        <td data-index="service">
            <p class="fz-12">
            @foreach ($arServices as $arService)
                @php
                    $sum += $arService['price'];
                @endphp
                {{$arService['title']}},
            @endforeach
            </p>
            </ul>
        </td>
        <td data-index="sum" class="fz-12">{{$sum}}₽</td>
        <td data-index="coming_at" class="fz-12">{{$obOrder->coming_at === null ? 'Нету' : $obOrder->coming_at}}</td>
        <td data-index="phone" class="fz-12">{{$obOrder->client()->first()->phone}}</td>
        <td data-index="status" class="fz-12">{{$obOrder->status}}</td>
        <td class="fz-12">{{$obOrder->created_at}}</td>
        <td class="fz-12">{{ $obOrder->updated_at }}</td>
        <td class="d-flex flex-row">
            <button class="btn open-update-form" data-index="{{$obOrder->id}}">Изменить</button>
            <button class="btn order-delete-form-submit ml-2" value="{{$obOrder->id}}">Удалить</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $obOrders->links() }}
