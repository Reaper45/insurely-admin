
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
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
        
        <div style="background: #fff; margin: 0 auto; width: 90%; max-width: 700px; box-sizing: border-box; border-radius: 8px; ">

            <div style="width: 100%; margin: 0 auto; padding: 2rem; box-sizing: border-box;">
                <div style="border: solid 1px #e2e8f0; border-radius: 8px;">
                    <div style="border-bottom: solid 1px #e2e8f0; padding: 1rem 1.5rem;">
                        <div style="color: #2A4365; margin-bottom: .5rem; font-weight: 700; font-size: large;"><b style=" text-transform: uppercase;">New order</b></div>
                        <div style="color: #2A4365; opacity: .66; font-weight: 500; align-items: center;">
                            <img style="height: 14px; margin-right: .5rem; vertical-align: middle;" src="{{ asset('icons/clock.png') }}" />
                            {{ Carbon\Carbon::now()->format('l jS F Y, h:i:s A')}}
                        </div>
                    </div>
                    <div style="line-height: 1.6; color: #2A4365; padding: 1rem 1.5rem; border-bottom: solid 1px #e2e8f0;">
                        New order from {{ $customer_name }}
                    </div>
                </div>
            </div>
        </div>
    </div>