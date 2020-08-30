
    <div style="padding: 0; margin: 0; font-weight: 100; padding: 0 2rem 4rem; font-family: Helvetica, sans-serif; font-size: 14px; background-color: #f0f5f8; background: #f0f5f8;">
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
                        <div style="color: #2A4365; margin-bottom: .5rem; font-weight: 700; font-size: large;">Vehicle Insurance Quotaion</div>
                        <div style="color: #2A4365; opacity: .66; font-weight: 500; align-items: center;">
                            <img style="height: 14px; margin-right: .5rem; vertical-align: middle;" src="{{ asset('icons/clock.png') }}" />
                            {{ Carbon\Carbon::now()->format('l jS F Y, h:i:s A')}}
                        </div>
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
                                <td  style="background: #f9fafc; padding: 1rem 1.5rem 1rem 0; text-align: right;">
                                    <span style="padding: 6px 10px; background: #e1f6e9; color: #3bbd65; border-radius: 1rem; font-size: 14px; font-weight: 500;">
                                        KES. {{ $quote["premium"] }}
                                    </span>
                                </td>
                            </tr>
                            @foreach ($quote["charges"] as $charge)
                                <tr>
                                    <td style="color: #2A4365; padding: 6px 0 6px 1.5rem;" colSpan="2">
                                        <small>{{ $charge["name"] }}</small>
                                    </td>
                                    <td style="color: #2A4365; text-align: right; padding: 6px 1.5rem 6px 0;">
                                        <small>{{ $charge["value"] }}</small>
                                    </td>
                                </tr>
                            @endforeach
                            <tr style="font-size: smaller;">
                                <td style="color: #2A4365; padding: 1rem 0 1rem 1.5rem;" colSpan="2">
                                    <b>Your total </b>
                                </td>
                                <td style="color: #2A4365; text-align: right; padding: 1rem 1.5rem 1rem 0;">
                                    <b>KES. {{ $quote["premium"] }}</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                        <small> 254721276411 &bull; 254738727774</small>
                        <br />
                        <small><a style="color: #114AAF; text-decoration: underline;" href="mailto:hello@insurely.cc">hello@insurely.cc</a></small>
                        <br />
                        <small>
                            &copy; 2020 - All Rights Reserved.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>