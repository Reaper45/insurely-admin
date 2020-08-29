
    <div style="padding: 0; margin: 0; font-weight: 100; height: 100vh; font-family: Helvetica, sans-serif; font-size: 14px; background-color: #f0f5f8; background: #f0f5f8;">
        <div style="width: 100%;">
            <div style="margin: 0 auto; width: 90%; max-width: 700px; padding: 0 1rem;">
            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="padding: 1.5rem 0;">
                            <a href="http://insurely.cc" >
                                <img style=" height: 40px;" src="{{ asset('img/logo.png') }}" alt="Insurely Logo" />
                            </a>
                        </td>
                        <td style="padding: 1.5rem 0; text-align: right;">
                            <a href="http://insurely.cc" style="color: #114AAF; text-decoration: none; font-weight: 500;">
                                Visit website 
                                <img style="margin-left: 1rem; vertical-align: middle; height: 10px;" src="{{ asset('icons/next.png') }}" />
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        
        <div style="background: #fff; margin: 0 auto; width: 90%; max-width: 700px; box-sizing: border-box; border-radius: 8px;">

            <div style="width: 100%; margin: 0 auto; padding: 2rem; box-sizing: border-box;">
                <div style="border: solid 1px #e2e8f0; border-radius: 8px;">
                    <div style="border-bottom: solid 1px #e2e8f0; padding: 1rem 1.5rem;">
                        <div style="color: #2A4365; margin-bottom: .5rem; font-weight: 700; font-size: large;"><b style=" text-transform: uppercase;">{{ $payment->mpesa_code }} Confirmed</b></div>
                        <div style="color: #2A4365; opacity: .66; font-weight: 500; align-items: center;">
                            <img style="height: 14px; margin-right: .5rem; vertical-align: middle;" src="{{ asset('icons/clock.png') }}" />
                            {{ Carbon\Carbon::now()->format('l jS F Y, h:i:s A')}}
                        </div>
                    </div>
                    <div style="line-height: 1.6; color: #2A4365; padding: 1rem 1.5rem; border-bottom: solid 1px #e2e8f0;">
                        Hi {{ $name }},
                        <br />
                        <br />
                        Just to let you know — you just said yes to a perfect cover!
                        We are processing your order and we will give you an update as soon as possible.
                        <br />
                    </div>
                
                    <table style="width: 100%; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="background: #f9fafc; padding: 1rem 0 1rem 1.5rem;">
                                    <img style="height: 40px;"" src="{{ route('api.avatar', ['id' => $quote["insurer"]["id"]]) }}" alt="Logo" />
                                </td>
                                <td style="background: #f9fafc; margin-left: 2rem; color: #2A4365; padding: 1rem 1.5rem;">
                                    <b>{{ $quote["name"] }}</b>
                                    <br />
                                    <small style="opacity: .66; display: block; margin-top: 5px;">{{$quote["insurer"]["name"] }}</small>
                                </td>
                                <td style="background: #f9fafc; padding: 1rem 0 1rem 1.5rem;">1</td>
                                <td  style="background: #f9fafc; padding: 1rem 1.5rem 1rem 0; text-align: right;">
                                    <span style="padding: 6px 10px; background: #e1f6e9; color: #3bbd65; border-radius: 1rem; font-size: 14px; font-weight: 500;">
                                        KES. {{ number_format($payment->amount) }}
                                    </span>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <div style="border-top: solid 1px #e2e8f0; color: #2A4365; padding: 1.5rem; ">
                        Thank you for choosing Insurely!
                    </div>
                </div>
            </div>
            <div style="padding: 2rem; background: #f9fafc; color: #2A4365;">
                <div>
                    <div style="padding: 1rem 0; text-align: center;">
                        <a href="" style=" text-decoration: none;">
                            <img style="height: 20px; width: 20px; margin: 0 .5rem; opacity: .66;" src="{{ asset("icons/twitter.png")}}" alt="Twitter" />
                        </a>
                        <a href="" style=" text-decoration: none;">
                            <img style="height: 20px; width: 20px; margin: 0 .5rem; opacity: .66;" src="{{ asset("icons/instagram.png")}}" alt="Instagram" />
                        </a>
                        <a href="" style=" text-decoration: none;">
                            <img style="height: 20px; width: 20px; margin: 0 .5rem; opacity: .66;" src="{{ asset("icons/facebook.png")}}" alt="Facebook" />
                        </a>
                    </div>
                    <div style="text-align: center;">
                        <small>
                                &copy; 2020 - All Rights Reserved.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>