@extends('layouts.main')
@section('content')
    <div class="wallet-title">
        <h1>
            Withdraw Request
        </h1>

    </div>
    <div class="wallet-table">
        <h3>
            List
        </h3>
        <table>
            <tbody>
                <tr>
                    <th>
                        <p>
                            Account No
                        </p>
                    </th>
                    <th>
                        <p>
                            Ammount
                        </p>
                    </th>
                    <th id="one-bill">
                        <p>
                            Commission
                        </p>
                    </th>
                    <th>
                        <p>
                            Payment Status
                        </p>
                    </th>
                </tr>

                @foreach ($withdraws as $withdraw)
                    <tr>
                        <td>
                            <p>
                                {{ $withdraw->account_no }}
                            </p>
                        </td>
                        <td>
                            <p>
                                {{ $withdraw->ammount }}
                            </p>
                        </td>
                        <td>
                            <p>
                                {{ $withdraw->commission }}
                            </p>
                        </td>
                        <td>
                            @if ($withdraw->payment_status == 'pending')
                                <p style="color: blue">
                                    {{ $withdraw->payment_status }}
                                </p>
                            @elseif ($withdraw->payment_status == 'failed')
                                <p style="color: red">
                                    {{ $withdraw->payment_status }}
                                </p>
                            @else
                                <p style="color: green">
                                    {{ $withdraw->payment_status }}
                                </p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
