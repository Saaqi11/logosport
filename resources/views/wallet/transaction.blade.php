@extends('layouts.main')
@section('content')
    <div class="wallet-title">
        <h1>
            Account wallet
        </h1>
        <button id="openWithdraw">
            <p>
                Withdraw
            </p>
        </button>
        <button id="requestList">
            <p>
                Request List
            </p>
        </button>
    </div>
    <div class="wallet-table">
        <h3>
            Transaction
        </h3>
        <table>
            <tbody>
                <tr>
                    <th>
                        <p>
                            Order Id
                        </p>
                    </th>
                    <th>
                        <p>
                            Payment Id
                        </p>
                    </th>
                    <th id="one-bill">
                        <p>
                            Order Status
                        </p>
                    </th>
                    <th>
                        <p>
                            Ammount
                        </p>
                    </th>
                    <th>
                        <p>
                            Currency
                        </p>
                    </th>
                    <th>
                        <p>
                            Commission Rate %
                        </p>
                    </th>
                </tr>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>
                            <p>
                                {{$transaction->order_id}}
                            </p>
                        </td>
                        <td>
                            <p>
                                {{$transaction->payment_id}}
                            </p>
                        </td>
                        <td>
                            <p>
                                {{$transaction->order_status}}
                            </p>
                        </td>
                        <td>
                            <p>
                                {{$transaction->ammount}}
                            </p>
                        </td>
                        <td>
                            <p>
                                {{$transaction->currency}}
                            </p>
                        </td>
                        <td>
                            <p>
                                {{$transaction->commission_rate}}
                            </p>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

    <div id="myModal" class="modal-withdraw">
        <div class="modal-content">
            <span class="close-withdraw" id="closeWithdrawModalBtn">&times;</span>

            <p class="text-center" style="font-weight: 900; font-size: 20px">Withdraw Request</p>
            <form action="{{ route("withdraw.request") }}" method="post">
                @csrf
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Account No</label>
                            <input type="text" name="account" class="form-control">
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Withdraw Ammount</label>
                            <input type="number" name="ammount" class="form-control">
                        </div>
                    </div>
    
    
                    <div class="col-md-6">
                        <div class="form-group">
    
                            <label for="">Commision Rate %</label>
                            <input type="text" name="commission" class="form-control" value="10" readonly>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit">
                            <p>
                                Confirm
                            </p>
                        </button>
                    </div>
    
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script>
        document.getElementById('openWithdraw').addEventListener('click', function() {
            document.getElementById('myModal').style.display = 'block';
        });

        document.getElementById('requestList').addEventListener('click', function() {
            window.location.href = "{{ route('withdraw-list.request') }}";
        });

        document.getElementById('closeWithdrawModalBtn').addEventListener('click', function() {
            document.getElementById('myModal').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            var modal = document.getElementById('myModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>
@endpush
