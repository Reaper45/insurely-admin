<!doctype html>
<html>
<head>

<style>
    body {
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
        align-content: center;
        justify-content: center;
    }
    .social-media > a {
        text-decoration: none;
    }
    .social-media > a > svg {
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
        justify-content: space-between;
        align-content: center;
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
        display: flex
    }
    .align-center {
        align-items: center;
    }
    .justify-bwn {
        justify-content: space-between;
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
        align-items: center;
        justify-content: space-between;
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
        align-items: center;
        justify-content: space-between;
    }
    .text-center{
        text-align: center;
    }
</style>
</head>
<body>
    <header>
        <div class="container">
           <div class="nav">
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
                    <div class="item">
                        <div class="flex align-center justify-bwn">
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
                        <div class="charge ">
                            <small>Training levy </small>
                            <small>-</small>
                        </div>
                         <div class="charge">
                            <small>IPCHF </small>
                            <small>-</small>
                        </div>
                         <div class="charge">
                            <small>Stapm duty </small>
                            <small>KES. 40.00</small>
                        </div>
                        <br />
                        <div class="charge">
                            <b>Your total </b>
                            <b>KES. 27,590.00</b>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div>
                <div class="social-media">
                    <a href="">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016
                                        c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992
                                        c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056
                                        c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152
                                        c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792
                                        c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44
                                        C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568
                                        C480.224,136.96,497.728,118.496,512,97.248z"/>
                                </g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                        </svg>
                    </a>
                    <a href="">
                        <svg height="511pt" viewBox="0 0 511 511.9" width="511pt" xmlns="http://www.w3.org/2000/svg"><path d="m510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5-16.296876-6.300781-34.898438-10.699219-62.097657-11.898438-27.402343-1.300781-36.101562-1.601562-105.601562-1.601562s-78.199219.300781-105.5 1.5c-27.199219 1.199219-45.898438 5.601562-62.097657 11.898438-17.203124 6.5-32.601562 16.5-45.402343 29.601562-13 12.800781-23.097657 28.300781-29.5 45.300781-6.300781 16.300781-10.699219 34.898438-11.898438 62.097657-1.300781 27.402343-1.601562 36.101562-1.601562 105.601562s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438 12.800781 13 28.300781 23.101562 45.300781 29.5 16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5c27.199219-1.199219 45.898438-5.597657 62.097657-11.898438 34.402343-13.300781 61.601562-40.5 74.902343-74.898438 6.296876-16.300781 10.699219-34.902343 11.898438-62.101562 1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876-11.097657-4.101562-21.199219-10.601562-29.398438-19.101562-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5 4.101562-11.101562 10.601562-21.199219 19.203124-29.402343 8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0"/><path d="m256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.902343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781c47.101562 0 85.300781 38.199219 85.300781 85.300781s-38.199219 85.300781-85.300781 85.300781zm0 0"/><path d="m423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0"/></svg>
                    </a>
                    <a href="">
                        <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M452,0H60C26.916,0,0,26.916,0,60v392c0,33.084,26.916,60,60,60h392c33.084,0,60-26.916,60-60V60
                                    C512,26.916,485.084,0,452,0z M472,452c0,11.028-8.972,20-20,20H338V309h61.79L410,247h-72v-43c0-16.975,13.025-30,30-30h41v-62
                                    h-41c-50.923,0-91.978,41.25-91.978,92.174V247H216v62h60.022v163H60c-11.028,0-20-8.972-20-20V60c0-11.028,8.972-20,20-20h392
                                    c11.028,0,20,8.972,20,20V452z"/>
                            </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                    </svg>

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
</body>
</html>
