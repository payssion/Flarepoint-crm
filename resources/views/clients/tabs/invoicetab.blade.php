<div id="invoice" class="tab-pane fade">
    <div class="boxspace">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>@lang('client.tabs.headers.id')</th>
                <th>@lang('client.tabs.headers.hours')</th>
                <th>@lang('client.tabs.headers.total_amount')</th>
                <th>@lang('client.tabs.headers.invoice_sent')</th>
                <th>@lang('client.tabs.headers.payment_received')</th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0; ?>
            @foreach($invoices as $invoice)
                <tr>
                    <td>
                        <a href="{{route('invoices.show', $invoice->id)}}">
                            {{$invoice->id}}
                        </a>
                    </td>
                    <td>
                        <?php $total = 0; ?>
                        @foreach($invoice->tasktime as $tasktime)
                            <?php $total += $tasktime->time; ?>

                        @endforeach
                        {{$total}}
                    </td>
                    <td>
                        <?php $totalAmount = 0; ?>
                        @foreach($invoice->tasktime as $payment)
                            <?php $totalAmount += $payment->value; ?>
                        @endforeach
                        {{$totalAmount}},-
                    </td>
                    <td>
                        @if($invoice->sent == 0)
                            <?php $color = "red"; ?>
                        @else
                            <?php $color = "green"; ?>
                        @endif
                        <p style=" color:{{$color}}">{{$invoice->sent ? 'yes' : 'no'}}</p>
                    </td>
                    <td>
                        @if($invoice->received == 0)
                            <?php $color = "red"; ?>
                        @else
                            <?php $color = "green"; ?>
                        @endif
                        <p style=" color:{{$color}}">{{$invoice->received ? 'yes' : 'no'}}</p>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>