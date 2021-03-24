<table class="table mt-5">
    <thead>
    <tr>
        <th>Автомобиль</th>
        <th>Имя</th>
        <th>Класс</th>
        <th>Услуги</th>
        <th>Сумма</th>
        <th>Время</th>
        <th>Номер</th>
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
        <td data-index="model">{{$obMmc->model()->first()->title }} {{$obMmc->mark()->first()->title}}</td>
        <td data-index="model">{{$obOrder->fio}}</td>
        <td data-index="class">{{$obMmc->class()->first()->title}}</td>
        <td data-index="service">
            @foreach ($arServices as $arService)
                @php
                    $sum += $arService['price'];
                @endphp
                <li>{{$arService['title']}} - {{$arService['price']}}₽</li>
            @endforeach
            </ul>
        </td>
        <td data-index="sum">{{$sum}}₽</td>
        <td data-index="coming_at">{{$obOrder->coming_at === null ? 'Нету' : $obOrder->coming_at}}</td>
        <td data-index="phone">{{$obOrder->phone}}</td>
        <td>{{$obOrder->created_at}}</td>
        <td>{{ $obOrder->updated_at }}</td>
        <td class="d-flex flex-row">
            <button class="btn open-update-form" data-index="{{$obOrder->id}}">Изменить</button>
            <button class="btn order-delete-form-submit ml-2" value="{{$obOrder->id}}">Удалить</button>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{{ $obOrders->links() }}
