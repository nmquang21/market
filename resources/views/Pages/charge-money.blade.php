@extends('Pages.layouts.main')
@section('content')
<style>
    ul.bank li{
        float: left;
    }
    ul.bank li img{
        padding: 5px;
        height: 75px;
        width: auto;
    }

    .bank li{
        border: solid 1px #fff;
        border-radius: 15%;
    }

    .bank li:hover{
        border: solid 1px #18ce0f;
        border-radius: 15%;
    }

    .bank li:active{
        border: solid 1px #18ce0f;
        border-radius: 15%;
    }

    input.btn-border {
        margin : 20px 7px;
    }

</style>
<section class="p-5">
    <div class="container">
        <div class="row" style="background: #fff">
            @if(session('message-success'))
            <div id="msg" class="alert alert-success">{{session('message-success')}}</div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger" style="background-color: coral">{{$errors->first()}}</div>
            @endif
            <div class="card-header" style="background: #fff;">
                <h2 class="card-title text-primary" >Chọn ngân hàng</h2>
            </div>
            <div class="form-group row js-payment-sub" style="display: block;">
                <div class="col-xs-12">
                    <div class="panel panel-default payment-sub is-small js-atm-list">
                        <div class="panel-body">
                            <input type="hidden" name="atm-id" value="53">
                            <ul class="bank">
                                <li><a title="Vietinbank" href="javascript:void(0)" class="li-bank" data-atm-id="48"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/VTB.jpg?v=1" alt="Vietinbank"></a></li>
                                <li><a title="Vietcombank" href="javascript:void(0)" class="li-bank" data-atm-id="49"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/VCB.jpg?v=1" alt="Vietcombank"></a></li>
                                <li><a title="Sacombank" href="javascript:void(0)" class="li-bank" data-atm-id="50"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/SCB.jpg?v=1" alt="Sacombank"></a></li>
                                <li><a title="SCB" href="javascript:void(0)" class="li-bank" data-atm-id="51"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/SGCB.jpg?v=1" alt="SCB"></a></li>
                                <li><a title="Eximbank" href="javascript:void(0)" class="li-bank" data-atm-id="52"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/EIB.jpg?v=1" alt="Eximbank"></a></li>
                                <li><a title="BIDV" href="javascript:void(0)" class="li-bank" data-atm-id="53"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/BIDV.jpg?v=1" alt="BIDV" class=""></a></li>
                                <li><a title="DongA Bank" href="javascript:void(0)" class="li-bank" data-atm-id="54"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/DAB.jpg?v=1" alt="DongA Bank"></a></li>
                                <li><a title="ACB" href="javascript:void(0)" class="li-bank" data-atm-id="55"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/ACB.jpg?v=1" alt="ACB"></a></li>
                                <li><a title="MBBank" href="javascript:void(0)" class="li-bank" data-atm-id="56"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/MB.jpg?v=1" alt="MBBank"></a></li>
                                <li><a title="Techcombank" href="javascript:void(0)" class="li-bank" data-atm-id="57"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/TCB.jpg?v=1" alt="Techcombank"></a></li>
                                <li><a title="VPBank" href="javascript:void(0)" class="li-bank" data-atm-id="58"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/VPB.jpg?v=1" alt="VPBank"></a></li>
                                <li><a title="VIB" href="javascript:void(0)" class="li-bank" data-atm-id="59"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/VIB.jpg?v=1" alt="VIB"></a></li>
                                <li><a title="HDBank" href="javascript:void(0)" class="li-bank" data-atm-id="60"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/HDB.jpg?v=1" alt="HDBank"></a></li>
                                <li><a title="Oceanbank" href="javascript:void(0)" class="li-bank" data-atm-id="61"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/OJB.jpg?v=1" alt="Oceanbank"></a></li>
                                <li><a title="SHB " href="javascript:void(0)" class="li-bank" data-atm-id="62"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/SHB.jpg?v=1" alt="SHB "></a></li>
                                <li><a title="SeABank" href="javascript:void(0)" class="li-bank" data-atm-id="63"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/SEAB.jpg?v=1" alt="SeABank"></a></li>
                                <li><a title="ABBank" href="javascript:void(0)" class="li-bank" data-atm-id="64"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/ABB.jpg?v=1" alt="ABBank"></a></li>
                                <li><a title="TPBank" href="javascript:void(0)" class="li-bank" data-atm-id="65"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/TPB.jpg?v=1" alt="TPBank"></a></li>
                                <li><a title="LienVietPostBank" href="javascript:void(0)" class="li-bank" data-atm-id="66"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/LPB.jpg?v=1" alt="LienVietPostBank"></a></li>
                                <li><a title="SAIGONBANK" href="javascript:void(0)" class="li-bank" data-atm-id="67"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/SGB.jpg?v=1" alt="SAIGONBANK"></a></li>
                                <li><a title="Nam A Bank" href="javascript:void(0)" class="li-bank" data-atm-id="69"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/NAB.jpg?v=1" alt="Nam A Bank"></a></li>
                                <li><a title="VietABank" href="javascript:void(0)" class="li-bank" data-atm-id="70"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/VAB.jpg?v=1" alt="VietABank"></a></li>
                                <li><a title="NCB" href="javascript:void(0)" class="li-bank" data-atm-id="71"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/NCB.jpg?v=1" alt="NCB"></a></li>
                                <li><a title="BaoVietBank" href="javascript:void(0)" class="li-bank" data-atm-id="72"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/BVB.jpg?v=1" alt="BaoVietBank"></a></li>
                                <li><a title="GPBank" href="javascript:void(0)" class="li-bank" data-atm-id="73"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/GPB.jpg?v=1" alt="GPBank"></a></li>
                                <li><a title="BAC A BANK" href="javascript:void(0)" class="li-bank" data-atm-id="74"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/NASB.jpg?v=1" alt="BAC A BANK"></a></li>
                                <li><a title="Maritime Bank	" href="javascript:void(0)" class="li-bank" data-atm-id="76"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/MSB.jpg?v=1" alt="Maritime Bank	"></a></li>
                                <li><a title="PG Bank" href="javascript:void(0)" class="li-bank" data-atm-id="77"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/PGB.jpg?v=1" alt="PG Bank"></a></li>
                                <li><a title="Bản Việt" href="javascript:void(0)" class="li-bank" data-atm-id="78"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/VCCB.jpg?v=1" alt="Bản Việt"></a></li>
                                <li><a title="KienLongBank" href="javascript:void(0)" class="li-bank" data-atm-id="79"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/KLB.jpg?v=1" alt="KienLongBank"></a></li>
                                <li><a title="PVComBank" href="javascript:void(0)" class="li-bank" data-atm-id="80"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/PVCB.jpg?v=1" alt="PVComBank"></a></li>
                                <li><a title="PublicBankVietNam" href="javascript:void(0)" class="li-bank" data-atm-id="81"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/PBVN.jpg?v=1" alt="PublicBankVietNam"></a></li>
                                <li><a title="VRB" href="javascript:void(0)" class="li-bank" data-atm-id="82"><img src="https://salt.tikicdn.com/assets/img/zalopaygw/VRB.jpg?v=1" alt="VRB"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="form" class="card-body col-md-12 ">
                <form action="{{route('charge')}}" method="post">
                    @csrf
                <div class="form-group form-inline" style="text-align: center;vertical-align: middle;">
                    <label class="col-md-2 col-form-label">Tài khoản</label>
                    <div class="col-md-2 p-0">
                        <input type="text" required class="form-control input-full" placeholder="Enter account number">
                    </div>
                    <label class="col-md-2 col-form-label">Mật khẩu</label>
                    <div class="col-md-2 p-0">
                        <input type="password" required class="form-control input-full" placeholder="Enter password">
                    </div>
                    <label class="col-md-2 col-form-label">Số tiền</label>
                    <div class="col-md-2 p-0">
                        <input name="amout" required type="number" class="form-control input-full">
                    </div>
                </div>
                <div class="input-group pull-right">
                    <div class="input-group-prepend">
                        <input type="submit" class="btn btn-default btn-border" value="Nạp tiền">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
    <script>
        jQuery(document).ready(function () {
            $("#form").hide();

            $(".li-bank").click(function(){
                $("#form").show();
            });

            $("#msg").show(0).delay(3000).hide(0);

        })

    </script>
    @endsection
