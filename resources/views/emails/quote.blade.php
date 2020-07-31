<!doctype html>
<html>
<head>

<style>

    body {
        color: #636b6f;
        font-weight: 100;
        height: 100vh;
        font-family: Raleway,sans-serif;
        font-size: 14px;
        line-height: 1.6;
        background-color: #f5f8fa;
    }

</style>
</head>
<body>
    <div class="account-container"></div>
    <div class="container" style="padding: 20px 10px; ">
        <div>
            <span class="fa-3x">Qoute: {{ $quote['premium'] }}</span>
        </div>
        <div class="table-responsive">
            {{-- <table class="table table-bordered" style="width: 100%;">
                <tr >
                    <th >Qty</th>
                    <th >Products/Service</th>
                    <th >Item Name</th>
                    <th >Unit Price</th>
                    <th >Total</th>
                </li>
                @if(Session::has('mail-cart') && $items =  Session::get('mail-cart')['products'])
                    @foreach($items as $key => $value)
                        @if( $key != 'totalProducts')
                        <tr >
                            <td >{{ $value['qty'] }}</td>
                            <td >Product</td>
                            <td >{{ $value['product']['name'] }}</td>
                            <td >{{ $value['price']/$value['qty'] }}</td>
                            <td >{{ $value['price']}}</td>
                        </tr>
                        @endif
                    @endforeach
                @endif

                @if(Session::has('mail-cart') && $items =  Session::get('mail-cart')['services'])
                    @foreach($items as $key => $value)
                        @if( $key != 'totalServices')
                        <tr>
                            <td >{{ $value['qty'] }}</td>
                            <td >Service</td>
                            <td >{{ $value['service']['name'] }}</td>
                            <td >{{ $value['price'] }}</td>
                            <td >{{ $value['price']}}</td>
                        </tr>
                        @endif
                    @endforeach
                @endif
                <tr >
                    <td colspan="3"></td>
                    <th > VAT &nbsp; 16% :</th>
                    <th >Ksh: &nbsp;{{ Session::has('mail-cart') ? Session::get('mail-cart')['totalPrice'] * 0.16 : '' }}</th>
                </tr>
                <tr >
                    <td colspan="3"></th>
                    <th >Sub-total :</th>
                    <th >Ksh: &nbsp;{{ Session::has('mail-cart') ? Session::get('mail-cart')['totalPrice'] - Session::get('mail-cart')['totalPrice'] * 0.16  : '' }}</th>
                </tr>
                <tr >
                    <th colspan="3"></th>
                    <th >Total: </th>
                    <th >Ksh: &nbsp;{{ Session::has('mail-cart') ? Session::get('mail-cart')['totalPrice'] : '' }}</th>
                </tr>
            </table> --}}
        </div>
    </div>
    <footer>
        <div class="text-center">
            <p class="app-footer">&copy; 2020 - All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
