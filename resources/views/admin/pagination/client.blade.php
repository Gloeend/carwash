
            @foreach ($obOrders as $obOrder)

            <tr>
                @php
                    $obMmc = $obOrder->mmc()->first();
                    $arServices = json_decode($obOrder->service, true);
                    $sum = $obMmc->class()->first()->price;
                @endphp
                <td data-index="model" class="fz-12">{{$obMmc->model()->first()->title }} {{$obMmc->mark()->first()->title}}</td>
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
                <td data-index="status" class="fz-12">{{$obOrder->status}}</td>
                <td class="fz-12">{{$obOrder->created_at}}</td>
                <td class="fz-12">{{ $obOrder->updated_at }}</td>
            </tr>
            @endforeach

        {{ $obOrders->links() }}
