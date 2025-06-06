<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
        <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app" />
        <meta name="author" content="pixelstrap" />
        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
        <title>viho - Premium Admin Template</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}" />
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <style type="text/css">
            body {
                text-align: center;
                margin: 0 auto;
                width: 650px;
                font-family: work-Sans, sans-serif;
                background-color: #f6f7fb;
                display: block;
            }
            ul {
                margin: 0;
                padding: 0;
            }
            li {
                display: inline-block;
                text-decoration: unset;
            }
            a {
                text-decoration: none;
            }
            p {
                margin: 15px 0;
            }
            h5 {
                color: #444;
                text-align: left;
                font-weight: 400;
            }
            .text-center {
                text-align: center;
            }
            .main-bg-light {
                background-color: #fafafa;
                //- box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);
            }
            .title {
                color: #444444;
                font-size: 22px;
                font-weight: bold;
                margin-top: 10px;
                margin-bottom: 10px;
                padding-bottom: 0;
                text-transform: uppercase;
                display: inline-block;
                line-height: 1;
            }
            table {
                margin-top: 30px;
            }
            table.top-0 {
                margin-top: 0;
            }
            table.order-detail {
                border: 1px solid #ddd;
                border-collapse: collapse;
            }
            table.order-detail tr:nth-child(even) {
                border-top: 1px solid #ddd;
                border-bottom: 1px solid #ddd;
            }
            table.order-detail tr:nth-child(odd) {
                border-bottom: 1px solid #ddd;
            }
            .pad-left-right-space {
                border: unset !important;
            }
            .pad-left-right-space td {
                padding: 5px 15px;
            }
            .pad-left-right-space td p {
                margin: 0;
            }
            .pad-left-right-space td b {
                font-size: 15px;
                font-family: "Roboto", sans-serif;
            }
            .order-detail th {
                font-size: 16px;
                padding: 15px;
                text-align: center;
                background: #fafafa;
            }
            .footer-social-icon tr td img {
                margin-left: 5px;
                margin-right: 5px;
            }
            .temp-social td {
                display: inline-block;
            }
            .temp-social td i {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                color: #2B6ED4;
                //- padding:10px;
                background-color: #24695c3d;
                transition: all 0.5s ease;
            }
            .temp-social td:nth-child(n + 2) {
                margin-left: 15px;
            }
        </style>
    </head>
    <body style="margin: 20px auto;">
        <table
            align="center"
            border="0"
            cellpadding="0"
            cellspacing="0"
            style="padding: 30px; background-color: #fff; -webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353); box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353); width: 100%;"
        >
            <tbody>
                <tr>
                    <td>
                        <table align="left" border="0" cellpadding="0" cellspacing="0" style="text-align: left;" width="100%">
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">
                                        <svg style="width: 170px;" enable-background="new 0 0 512 512" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="m30.178 196.133 220.157-139.968c3.457-2.198 7.873-2.198 11.33 0l220.157 139.967c3.048 1.938 4.894 5.299 4.894 8.911v193.765c0 5.832-4.727 10.559-10.559 10.559h-440.314c-5.832 0-10.559-4.727-10.559-10.559v-193.765c0-3.611 1.847-6.972 4.894-8.91z"
                                                fill="#fb8627"
                                            ></path>
                                            <path d="m289.419 165.138v268.156c0 5.697-4.625 10.312-10.322 10.312h-179.88c-5.697 0-10.312-4.615-10.312-10.312v-268.156z" fill="#1c96f9"></path>
                                            <path
                                                d="m289.413 10.316v422.974c0 5.694-4.622 10.316-10.316 10.316h-32.454c5.694 0 10.316-4.622 10.316-10.316v-422.974c0-5.694-4.621-10.316-10.316-10.316h32.454c5.695 0 10.316 4.622 10.316 10.316z"
                                                fill="#1c96f9"
                                            ></path>
                                            <path d="m289.414 10.316v165.129h-200.512v-165.129c0-5.697 4.619-10.316 10.316-10.316h179.88c5.698 0 10.316 4.619 10.316 10.316z" fill="#eaf6ff"></path>
                                            <path d="m289.413 10.316v165.127h-32.454v-165.127c0-5.694-4.621-10.316-10.316-10.316h32.454c5.695 0 10.316 4.622 10.316 10.316z" fill="#deecf0"></path>
                                            <g>
                                                <path d="m118.533 175.44c0 4.275-3.461 7.726-7.726 7.726h-21.902v-15.453h21.902c4.264.001 7.726 3.462 7.726 7.727z" fill="#0a8ae2"></path>
                                            </g>
                                            <g>
                                                <path d="m171.372 183.171h-24.995c-4.267 0-7.726-3.459-7.726-7.726s3.459-7.726 7.726-7.726h24.995c4.267 0 7.726 3.459 7.726 7.726s-3.459 7.726-7.726 7.726z" fill="#0a8ae2"></path>
                                            </g>
                                            <g>
                                                <path d="m231.94 183.171h-24.995c-4.267 0-7.726-3.459-7.726-7.726s3.459-7.726 7.726-7.726h24.995c4.267 0 7.726 3.459 7.726 7.726s-3.459 7.726-7.726 7.726z" fill="#0a8ae2"></path>
                                            </g>
                                            <path
                                                d="m176.701 228.511v160.368c0 5.697-4.619 10.316-10.316 10.316h-30.526c-5.697 0-10.316-4.619-10.316-10.316v-160.368c0-5.697 4.619-10.316 10.316-10.316h30.526c5.698 0 10.316 4.619 10.316 10.316z"
                                                fill="#fee265"
                                            ></path>
                                            <g>
                                                <g>
                                                    <path
                                                        d="m127.246 142.878c-4.267 0-7.726-3.459-7.726-7.726v-91.296c0-4.268 3.459-7.726 7.726-7.726s7.726 3.459 7.726 7.726v91.296c.001 4.268-3.458 7.726-7.726 7.726z"
                                                        fill="#a9d3d8"
                                                    ></path>
                                                </g>
                                                <g>
                                                    <path d="m158.762 88.719c-4.267 0-7.726-3.459-7.726-7.726v-37.137c0-4.268 3.459-7.726 7.726-7.726s7.726 3.459 7.726 7.726v37.137c0 4.268-3.459 7.726-7.726 7.726z" fill="#a9d3d8"></path>
                                                </g>
                                                <g>
                                                    <path d="m190.277 88.719c-4.267 0-7.726-3.459-7.726-7.726v-37.137c0-4.268 3.459-7.726 7.726-7.726s7.726 3.459 7.726 7.726v37.137c0 4.268-3.459 7.726-7.726 7.726z" fill="#a9d3d8"></path>
                                                </g>
                                                <g>
                                                    <path d="m221.792 88.719c-4.267 0-7.726-3.459-7.726-7.726v-37.137c0-4.268 3.459-7.726 7.726-7.726s7.726 3.459 7.726 7.726v37.137c0 4.268-3.459 7.726-7.726 7.726z" fill="#a9d3d8"></path>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m245.396 132.046h-86.634c-4.267 0-7.726-3.459-7.726-7.726 0-4.268 3.459-7.726 7.726-7.726h86.634c4.267 0 7.726 3.459 7.726 7.726 0 4.268-3.459 7.726-7.726 7.726z"
                                                        fill="#a9d3d8"
                                                    ></path>
                                                </g>
                                                <g id="XMLID_62_">
                                                    <path
                                                        d="m251.07 51.636c-.013 0-.025 0-.037 0-4.267-.02-7.71-3.496-7.69-7.763l.001-.107c.02-4.255 3.476-7.69 7.725-7.69h.037c4.267.02 7.71 3.496 7.69 7.763v.107c-.02 4.254-3.476 7.69-7.726 7.69z"
                                                        fill="#31a7fb"
                                                    ></path>
                                                </g>
                                                <g id="XMLID_486_">
                                                    <path
                                                        d="m251.07 74.384c-.013 0-.025 0-.037 0-4.267-.02-7.71-3.496-7.69-7.763l.001-.107c.02-4.255 3.476-7.69 7.725-7.69h.037c4.267.02 7.71 3.496 7.69 7.763v.107c-.02 4.255-3.476 7.69-7.726 7.69z"
                                                        fill="#31a7fb"
                                                    ></path>
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path d="m412.68 247.542-123.92 242.814c-2.586 5.079-8.798 7.098-13.876 4.502l-160.224-81.765c-5.068-2.586-7.088-8.798-4.502-13.877l123.931-242.824z" fill="#31a7fb"></path>
                                                    <path d="m412.68 247.542-123.92 242.814c-2.586 5.079-8.808 7.088-13.876 4.502l-28.907-14.752c5.068 2.586 11.291.577 13.877-4.502l123.919-242.814z" fill="#1c96f9"></path>
                                                    <path d="m481.029 113.611-75.062 147.082-178.599-91.146 75.062-147.082c2.59-5.075 8.803-7.089 13.878-4.499l160.222 81.768c5.075 2.589 7.089 8.803 4.499 13.877z" fill="#eaf6ff"></path>
                                                    <path d="m481.029 113.611-75.061 147.081-28.907-14.752 75.061-147.081c2.588-5.072.573-11.289-4.499-13.878l28.907 14.752c5.072 2.588 7.087 8.806 4.499 13.878z" fill="#deecf0"></path>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="m253.754 183.012c-1.36 2.679-4.069 4.224-6.882 4.224-1.185 0-2.38-.278-3.513-.855l-19.501-9.951 7.026-13.763 19.501 9.952c3.802 1.945 5.316 6.591 3.369 10.393z"
                                                                fill="#1c96f9"
                                                            ></path>
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="m300.82 214.765c-1.182 0-2.381-.273-3.506-.846l-22.264-11.362c-3.801-1.94-5.309-6.594-3.37-10.394 1.94-3.802 6.594-5.309 10.394-3.37l22.264 11.362c3.801 1.94 5.309 6.594 3.37 10.394-1.365 2.675-4.077 4.216-6.888 4.216z"
                                                                fill="#1c96f9"
                                                            ></path>
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="m354.769 242.297c-1.182 0-2.381-.273-3.506-.846l-22.264-11.362c-3.801-1.94-5.309-6.594-3.37-10.394 1.939-3.802 6.594-5.308 10.394-3.37l22.264 11.362c3.801 1.94 5.309 6.594 3.37 10.394-1.365 2.676-4.077 4.216-6.888 4.216z"
                                                                fill="#1c96f9"
                                                            ></path>
                                                        </g>
                                                        <g>
                                                            <path d="m409.476 253.816-7.016 13.763h-.01l-19.501-9.962c-3.801-1.937-5.305-6.593-3.369-10.395 1.937-3.801 6.593-5.305 10.395-3.369z" fill="#0a8ae2"></path>
                                                        </g>
                                                    </g>
                                                    <path
                                                        d="m281.451 256.725-72.897 142.842c-2.59 5.075-8.803 7.089-13.878 4.499l-27.19-13.876c-5.075-2.59-7.089-8.803-4.499-13.878l72.897-142.842c2.59-5.075 8.803-7.089 13.878-4.499l27.19 13.876c5.074 2.59 7.089 8.803 4.499 13.878z"
                                                        fill="#fee265"
                                                    ></path>
                                                    <g>
                                                        <g>
                                                            <path
                                                                d="m279.833 158.817c-1.182 0-2.381-.273-3.506-.846-3.801-1.94-5.309-6.594-3.37-10.394l41.499-81.319c1.939-3.802 6.593-5.309 10.394-3.37 3.801 1.94 5.309 6.594 3.37 10.394l-41.5 81.319c-1.364 2.676-4.076 4.216-6.887 4.216z"
                                                                fill="#a9d3d8"
                                                            ></path>
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="m332.522 124.902c-1.182 0-2.381-.273-3.506-.846-3.801-1.94-5.309-6.594-3.37-10.394l16.881-33.078c1.94-3.802 6.594-5.309 10.394-3.37 3.801 1.94 5.309 6.594 3.37 10.394l-16.881 33.078c-1.366 2.676-4.077 4.216-6.888 4.216z"
                                                                fill="#a9d3d8"
                                                            ></path>
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="m360.593 139.228c-1.182 0-2.381-.273-3.506-.846-3.801-1.94-5.309-6.594-3.37-10.394l16.881-33.078c1.939-3.802 6.593-5.308 10.394-3.37 3.801 1.94 5.309 6.594 3.37 10.394l-16.881 33.078c-1.366 2.676-4.077 4.216-6.888 4.216z"
                                                                fill="#a9d3d8"
                                                            ></path>
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="m388.663 153.554c-1.182 0-2.381-.273-3.506-.846-3.801-1.94-5.309-6.594-3.37-10.394l16.882-33.079c1.94-3.802 6.593-5.309 10.394-3.37 3.801 1.94 5.309 6.594 3.37 10.394l-16.882 33.079c-1.365 2.676-4.076 4.216-6.888 4.216z"
                                                                fill="#a9d3d8"
                                                            ></path>
                                                        </g>
                                                        <g>
                                                            <path
                                                                d="m389.993 202.875c-1.182 0-2.381-.273-3.506-.846l-77.166-39.38c-3.801-1.94-5.309-6.594-3.37-10.394 1.939-3.802 6.593-5.309 10.394-3.37l77.166 39.38c3.801 1.94 5.309 6.594 3.37 10.394-1.365 2.676-4.076 4.216-6.888 4.216z"
                                                                fill="#a9d3d8"
                                                            ></path>
                                                        </g>
                                                        <g id="XMLID_490_">
                                                            <path
                                                                d="m431.599 133.832c-1.183 0-2.382-.273-3.507-.847-3.801-1.94-5.309-6.594-3.368-10.394l.049-.096c1.94-3.801 6.594-5.31 10.394-3.368 3.801 1.94 5.309 6.594 3.368 10.394l-.049.096c-1.365 2.675-4.076 4.215-6.887 4.215z"
                                                                fill="#31a7fb"
                                                            ></path>
                                                        </g>
                                                        <g id="XMLID_488_">
                                                            <path
                                                                d="m421.258 154.094c-1.193 0-2.403-.278-3.536-.862-3.792-1.957-5.28-6.617-3.323-10.408l.049-.095c1.956-3.792 6.616-5.281 10.409-3.324 3.792 1.957 5.28 6.617 3.323 10.408l-.049.095c-1.372 2.658-4.074 4.186-6.873 4.186z"
                                                                fill="#31a7fb"
                                                            ></path>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m314.84 335.514c-1.182 0-2.381-.273-3.506-.846-3.801-1.94-5.309-6.594-3.37-10.394l25.946-50.84c1.94-3.802 6.594-5.309 10.394-3.37 3.801 1.94 5.309 6.594 3.37 10.394l-25.946 50.84c-1.366 2.676-4.077 4.216-6.888 4.216z"
                                                        fill="#1c96f9"
                                                    ></path>
                                                </g>
                                            </g>
                                            <path d="m486.713 233.783v267.659c0 5.839-4.72 10.559-10.559 10.559h-440.308c-5.839 0-10.559-4.72-10.559-10.559v-267.659l230.713 146.674z" fill="#fcca9f"></path>
                                            <path d="m486.713 233.782v267.658c0 5.839-4.72 10.559-10.559 10.559h-34.158c5.839 0 10.559-4.72 10.559-10.559v-245.939z" fill="#fcb982"></path>
                                            <path
                                                d="m395.621 364.132c0 15.089-.644 34.475-5.723 50.715-3.305 10.559-8.268 19.091-14.74 25.373-8.426 8.173-19.333 12.491-31.529 12.491-18.626 0-42.521-9.978-61.474-20.864-3.094 1.098-6.43 1.689-9.904 1.689h-32.5c-3.474 0-6.811-.591-9.904-1.689-18.953 10.886-42.848 20.864-61.474 20.864-12.196 0-23.103-4.319-31.529-12.491-6.473-6.283-11.435-14.814-14.74-25.373-5.079-16.24-5.723-35.626-5.723-50.715 0-15.078.644-34.464 5.723-50.704 1.647-5.248 3.685-9.989 6.124-14.202l127.772 81.23 127.774-81.23c2.439 4.213 4.477 8.954 6.124 14.202 5.079 16.239 5.723 35.626 5.723 50.704z"
                                                fill="#fcb982"
                                            ></path>
                                            <g>
                                                <g>
                                                    <path d="m246.596 364.136c0 28.465 68.564 67.456 97.028 67.456s30.882-38.991 30.882-67.456-2.417-67.456-30.882-67.456-97.028 38.991-97.028 67.456z" fill="#fb4a59"></path>
                                                    <path
                                                        d="m374.503 364.132c0 28.467-2.418 67.461-30.874 67.461-5.332 0-12.069-1.373-19.502-3.78 15.87-10.474 17.464-40.557 17.464-63.681s-1.594-53.196-17.464-63.67c7.433-2.407 14.17-3.78 19.502-3.78 28.456-.001 30.874 38.993 30.874 67.45z"
                                                        fill="#f82f40"
                                                    ></path>
                                                    <path d="m265.404 364.136c0 28.465-68.564 67.456-97.028 67.456s-30.882-38.991-30.882-67.456 2.417-67.456 30.882-67.456 97.028 38.991 97.028 67.456z" fill="#fb4a59"></path>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m235.401 365.967c-.265 0-.532-.014-.801-.041l-37.205-3.83c-4.244-.438-7.331-4.232-6.894-8.477s4.229-7.332 8.477-6.895l37.205 3.83c4.244.438 7.331 4.232 6.894 8.477-.408 3.975-3.764 6.936-7.676 6.936z"
                                                        fill="#f82f40"
                                                    ></path>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m215.422 390.433c-3.587 0-6.803-2.512-7.558-6.163-.865-4.179 1.822-8.267 6.001-9.132l19.962-4.13c4.181-.862 8.267 1.822 9.131 6.001.865 4.179-1.822 8.267-6.001 9.132l-19.962 4.13c-.528.108-1.055.162-1.573.162z"
                                                        fill="#f82f40"
                                                    ></path>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m307.397 394.853c-.288 0-.578-.016-.871-.049l-28.924-3.245c-4.24-.476-7.292-4.299-6.816-8.539.475-4.241 4.295-7.304 8.54-6.817l28.924 3.245c4.24.476 7.292 4.299 6.816 8.539-.443 3.949-3.787 6.866-7.669 6.866z"
                                                        fill="#f82f40"
                                                    ></path>
                                                </g>
                                                <g>
                                                    <path
                                                        d="m278.454 369.181c-3.74 0-7.027-2.721-7.624-6.532-.66-4.216 2.222-8.169 6.438-8.829l35.114-5.497c4.216-.658 8.169 2.223 8.828 6.439.66 4.216-2.222 8.169-6.438 8.829l-35.114 5.497c-.404.063-.806.093-1.204.093z"
                                                        fill="#f82f40"
                                                    ></path>
                                                </g>
                                                <path
                                                    d="m239.745 315.85h32.509c4.883 0 8.842 3.959 8.842 8.842v78.888c0 4.883-3.959 8.842-8.842 8.842h-32.509c-4.883 0-8.842-3.959-8.842-8.842v-78.888c0-4.883 3.959-8.842 8.842-8.842z"
                                                    fill="#fc9aa1"
                                                ></path>
                                            </g>
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p style="font-size: 18px;"><b>Hi John Doe,</b></p>
                                        <p style="font-size: 14px; color: #aba8a8;">Order Is Successfully Processsed And Your Order Is On The Way,</p>
                                        <p style="font-size: 14px; color: #aba8a8;">Transaction ID : 267676GHERT105467,</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" border="0" align="left" style="width: 100%; margin-top: 10px; margin-bottom: 10px;">
                            <tbody>
                                <tr>
                                    <td style="background-color: #fafafa; padding: 15px; letter-spacing: 0.3px; width: 50%;">
                                        <h5 style="font-size: 16px; font-weight: 600; color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top: 0; margin-bottom: 13px;">
                                            Your Shipping Address
                                        </h5>
                                        <p style="text-align: left; font-weight: normal; font-size: 14px; color: #aba8a8; line-height: 21px; margin-top: 0;">
                                            268 Cambridge Lane New Albany,<br />
                                            IN 47150268 Cambridge Lane <br />
                                            New Albany, IN 47150
                                        </p>
                                    </td>
                                    <td><img src="{{ asset('assets/images/email-template/space.jpg') }}" alt=" " height="25" width="30" /></td>
                                    <td style="background-color: #fafafa; padding: 15px; letter-spacing: 0.3px; width: 50%;">
                                        <h5 style="font-size: 16px; font-weight: 600; color: #000; line-height: 16px; padding-bottom: 13px; border-bottom: 1px solid #e6e8eb; letter-spacing: -0.65px; margin-top: 0; margin-bottom: 13px;">
                                            Your Billing Address:
                                        </h5>
                                        <p style="text-align: left; font-weight: normal; font-size: 14px; color: #aba8a8; line-height: 21px; margin-top: 0;">
                                            268 Cambridge Lane New Albany,<br />
                                            IN 47150268 Cambridge Lane <br />
                                            New Albany, IN 47150
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="order-detail" border="0" cellpadding="0" cellspacing="0" align="left" style="width: 100%; margin-bottom: 50px;">
                            <tbody>
                                <tr align="left">
                                    <th>PRODUCT</th>
                                    <th style="padding-left: 15px;">DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                    <th>PRICE</th>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/images/email-template/4.png') }}" alt="" width="80" /></td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="margin-top: 15px;">Three seater Wood Style sofa for Leavingroom</h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color: #444; margin-top: 15px; margin-bottom: 0px;">Size : <span> L</span></h5>
                                        <h5 style="font-size: 14px; color: #444; margin-top: 10px;">QTY : <span>1</span></h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color: #444; margin-top: 15px;"><b>$500</b></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/images/email-template/1.png') }}" alt="" width="80" /></td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="margin-top: 15px;">Three seater Wood Style sofa for Leavingroom</h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color: #444; margin-top: 15px; margin-bottom: 0px;">Size : <span> L</span></h5>
                                        <h5 style="font-size: 14px; color: #444; margin-top: 10px;">QTY : <span>1</span></h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color: #444; margin-top: 15px;"><b>$500</b></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/images/email-template/4.png') }}" alt="" width="80" /></td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="margin-top: 15px;">Three seater Wood Style sofa for Leavingroom</h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color: #444; margin-top: 15px; margin-bottom: 0px;">Size : <span> L</span></h5>
                                        <h5 style="font-size: 14px; color: #444; margin-top: 10px;">QTY : <span>1</span></h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color: #444; margin-top: 15px;"><b>$500</b></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/images/email-template/1.png') }}" alt="" width="80" /></td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="margin-top: 15px;">Three seater Wood Style sofa for Leavingroom</h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color: #444; margin-top: 15px; margin-bottom: 0px;">Size : <span> L</span></h5>
                                        <h5 style="font-size: 14px; color: #444; margin-top: 10px;">QTY : <span>1</span></h5>
                                    </td>
                                    <td valign="top" style="padding-left: 15px;">
                                        <h5 style="font-size: 14px; color: #444; margin-top: 15px;"><b>$500</b></h5>
                                    </td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td class="m-t-5" colspan="2" align="left">
                                        <p style="font-size: 14px;">Subtotal :</p>
                                    </td>
                                    <td class="m-t-5" colspan="2" align="right"><b>$2000</b></td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td colspan="2" align="left">
                                        <p style="font-size: 14px;">TAX :</p>
                                    </td>
                                    <td colspan="2" align="right"><b>$5</b></td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td colspan="2" align="left">
                                        <p style="font-size: 14px;">VAT :</p>
                                    </td>
                                    <td colspan="2" align="right"><b>$5</b></td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td colspan="2" align="left">
                                        <p style="font-size: 14px;">SHIPPING Charge :</p>
                                    </td>
                                    <td colspan="2" align="right"><b>$2</b></td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td colspan="2" align="left">
                                        <p style="font-size: 14px;">Discount :</p>
                                    </td>
                                    <td colspan="2" align="right"><b> $1000</b></td>
                                </tr>
                                <tr class="pad-left-right-space">
                                    <td class="m-b-5" colspan="2" align="left">
                                        <p style="font-size: 14px;">Total :</p>
                                    </td>
                                    <td class="m-b-5" colspan="2" align="right"><b>$2600</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="main-bg-light text-center top-0" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td style="padding: 30px;">
                                        <div>
                                            <h4 class="title" style="margin: 0; text-align: center;">Follow us</h4>
                                        </div>
                                        <table border="0" cellpadding="0" cellspacing="0" align="center" style="margin-top: 20px;">
                                            <tbody>
                                                <tr class="temp-social">
                                                    <td>
                                                        <a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)"><i class="fa fa-youtube-play"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)"><i class="fa fa-linkedin"> </i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div style="border-top: 1px solid #ddd; margin: 20px auto 0;"></div>
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 20px auto 0;">
                                            <tbody>
                                                <tr>
                                                    <td><a href="javascript:void(0)" style="color: #2B6ED4; font-size: 14px; text-transform: capitalize; font-weight: 600;">Want to change how you receive these emails?</a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p style="font-size: 14px; margin: 8px 0; color: #aba8a8;">2021 - 22 Copy Right by Themeforest powerd by Pixel Strap</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0)" style="color: #2B6ED4; font-size: 14px; text-transform: capitalize; font-weight: 600; margin: 0; text-decoration: underline;">Unsubscribe</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
