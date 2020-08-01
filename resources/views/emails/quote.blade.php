<!doctype html>
<html>
<head>

<style>
    .body {
        padding: 0;
        margin: 0;
        font-weight: 100;
        height: 100vh;
        font-family: Helvetica, sans-serif;
        font-size: 14px;
        line-height: 1.6;
        border-top: 8px solid #114AAF;
        background: RGB(240, 245, 248);
    }
    main {
        width: 100%;
        height: 100%;
        margin: 0 auto;
        padding: 2rem;
        box-sizing: border-box;
    }
    .container {
        margin: 0 auto;
        width: 90%;
        max-width: 700px;
        padding: 0 1rem;
    }
    .main-container {
        background: #fff;
        margin: 0 auto;
        width: 90%;
        max-width: 700px;
        box-sizing: border-box;
        border-radius: 4px;
    }
    footer {
        padding: 2rem;
        background: #f9fafc;
        color: #2A4365;
    }
    .social-media {
        padding: 1rem 0;
        display:flex;
    }
    .social-media > a {
        text-decoration: none;
    }
    .icon {
        height: 20px;
        width: 20px;
        margin: 0 .5rem;
        fill: #2A4365;
        opacity: .66;
        
    }
    header {
        width: 100%;
    }
    .nav {
        padding: 1.5rem 0;
        display:flex;
    }
    .logo {
        height: 40px;
    }
    .visit-home{
        color: #114AAF;
        text-decoration: none;
        font-weight: 500;
        display: flex;
        align-items: center;
    }
    .visit-home > svg {
        margin-left: 1rem;
        fill: #114AAF;
        vertical-align: middle;
    }
    .flex {
        display: flex;
    }
    .card-header {
        border-bottom: solid 1px #e2e8f0;
        padding: 1rem 1.5rem;
    }
    .card-header > .title {
        color: #2A4365;
        margin-bottom: .25rem;
        font-weight: 700;
        font-size: large;
    }
    .date-time {
        color: #2A4365;
        opacity: .66;
        font-weight: 500;
    }
    .date-time svg {
        height: 18px;
        margin-right: .35rem;
    }
    .card {
        border: solid 1px #e2e8f0;
        border-radius: 8px;
        
    }
    .item {
        background: #f9fafc;
        padding: 1rem 1.5rem;
        display: flex;
    }
    .label {
        padding: 6px 10px;
        background: #e1f6e9;
        color: #3bbd65;
        border-radius: 1rem;
        font-weight: 500;
    }
    .details {
        margin-left: 2rem;
        color: #2A4365;
    }
    .details > small {
        opacity: .66;
    }
    .flex-1 {
        flex-grow: 1;
    }
     .total {
        border-top: solid 1px #e2e8f0;
        padding: 1rem 1.5rem;
        color: #2A4365;
    }
    .charge {
        color: #2A4365;
        display: flex;
    }
    .text-center{
        text-align: center;
    }

</style>
</head>
<body>
   <div class="body">
        <header>
        <div class="container">
           <div class="nav" style="justify-content: space-between; align-content: center;">
                <a href="http://insurely.cc" >
                    <img class="logo" src="{{ asset('img/logo.png') }}" alt="Workflow logo" />
                </a>
                <a href="http://insurely.cc" class="visit-home">
                    Visit website 
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M9.3 8.7a1 1 0 0 1 1.4-1.4l4 4a1 1 0 0 1 0 1.4l-4 4a1 1 0 0 1-1.4-1.4l3.29-3.3-3.3-3.3z"/></svg>
                </a>
           </div>
        </div>
    </header>
    <div class="main-container">
         <main>
            <div class="card">
                <div class="card-header">
                    <div class="title">Payment Confirmation</div>
                    <div class="date-time flex align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-8.41l2.54 2.53a1 1 0 0 1-1.42 1.42L11.3 12.7A1 1 0 0 1 11 12V8a1 1 0 0 1 2 0v3.59z"/></svg>
                        Aug 1st, 2020. 1:45PM
                    </div>
                </div>
                <div class="content">
                    <div class="item" style="align-items: center; justify-content: space-between;">
                        <div class="flex" style="align-items: center; justify-content: space-between;">
                            <img class="logo" src="{{ asset("img/aig_logo.png")}}" alt="Logo" />
                            <div class="details flex-1">
                                <b>Motor private comprehensive cover</b>
                                <br />
                                <small>Sanlaam Insurance ltd.</small>
                            </div>
                        </div>
                        <div>
                            <span class="label">
                                KES. 24,500.00
                            </span>
                        </div>
                    </div>
                    <div class="total">
                        <div class="charge" style="align-items: center; justify-content: space-between;">
                            <small>Training levy </small>
                            <small>-</small>
                        </div>
                         <div class="charge" style="align-items: center; justify-content: space-between;">
                            <small>IPCHF </small>
                            <small>-</small>
                        </div>
                         <div class="charge" style="align-items: center; justify-content: space-between;">
                            <small>Stapm duty </small>
                            <small>KES. 40.00</small>
                        </div>
                        <br />
                        <div class="charge" style="align-items: center; justify-content: space-between;">
                            <b>Your total </b>
                            <b>KES. 27,590.00</b>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div>
                <div class="social-media" style="align-items: center; justify-content: center;">
                    <a href="">
                        <img class="icon" src="{{ asset("icons/twitter.svg")}}" alt="Twitter" />
                    </a>
                    <a href="">
                        <img class="icon" src="{{ asset("icons/insta.svg")}}" alt="Instagram" />
                    </a>
                    <a href="">
                        <img class="icon" src="{{ asset("icons/facebook.svg")}}" alt="Facebook" />
                    </a>
                </div>
                <div class="text-center">
                   <small>
                        &copy; 2020 - All Rights Reserved.
                   </small>
                </div>
            </div>
        </footer>
    </div>
   </div>
</body>
</html>
