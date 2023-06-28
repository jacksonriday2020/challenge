<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Yadir Martinez Vergara">
    <title>Booking</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }
        .bd-mode-toggle {
            z-index: 1500;
        }

        .container {
            max-width: 960px;
        }
    </style>
</head>
<body class="bg-body-tertiary">

<div class="container" id="challengeapp">
    <main>
        <div class="py-5 text-center">
            <h2>Where are you flying?</h2>
        </div>

        <div class="row">
            <form class="" novalidate>
                <div class="row">
                    <div class="col-sm-7 d-flex justify-content-between align-items-center">
                        <span style="transform:translate3d(0,0,0);vertical-align:middle;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:24px;height:24px"><svg viewBox="0 0 200 200" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" class="Tn7z-icon" role="img" style="width:inherit;height:inherit;line-height:inherit;color:inherit"><path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path></svg></span>
                        <select class="form-select" v-model="origenFly">
                            <option value="">From?</option>
                            <option v-for="airport in fromAirFlyings" v-bind:key="airport.code" v-bind:value="airport.code">{{ airport.name }}</option>
                        </select>
                        <button class="btn btn-link">
                            <svg viewBox="0 0 200 200" width="2.25em" height="2.25em" xmlns="http://www.w3.org/2000/svg" class="c-P_--icon c-P_--mod-responsive" role="img"><path d="M56.238 154.801c-25.271-30.326-30.335-33.201-25-39.603l25-30l11.523 9.603L53.013 112.5H120v15H53.013l14.749 17.699l-11.524 9.602zm86.524-40l-11.523-9.603L145.987 87.5H80v-15h65.987l-14.749-17.699l11.523-9.603l25 30c5.335 6.403.272 9.278-24.999 39.603z"></path></svg>
                        </button>
                        <span style="transform:translate3d(0,0,0);vertical-align:middle;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;width:24px;height:24px"><svg viewBox="0 0 200 200" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" class="Tn7z-icon" role="img" style="width:inherit;height:inherit;line-height:inherit;color:inherit"><path d="M178.081 41.973c-2.681 2.663-16.065 17.416-28.956 30.221c0 107.916 3.558 99.815-14.555 117.807l-14.358-60.402l-14.67-14.572c-38.873 38.606-33.015 8.711-33.015 45.669c.037 8.071-3.373 13.38-8.263 18.237L50.66 148.39l-30.751-13.513c10.094-10.017 15.609-8.207 39.488-8.207c8.127-16.666 18.173-23.81 26.033-31.62L70.79 80.509L10 66.269c17.153-17.039 6.638-13.895 118.396-13.895c12.96-12.873 26.882-27.703 29.574-30.377c7.745-7.692 28.017-14.357 31.205-11.191c3.187 3.166-3.349 23.474-11.094 31.167zm-13.674 42.469l-8.099 8.027v23.58c17.508-17.55 21.963-17.767 8.099-31.607zm-48.125-47.923c-13.678-13.652-12.642-10.828-32.152 8.57h23.625l8.527-8.57z"></path></svg></span>
                        <select class="form-select" v-model="destinyFly">
                            <option value="">To?</option>
                            <option v-for="airport in toAirFlyings" v-bind:key="airport.code"  v-bind:value="airport.code">{{ airport.name }}</option>
                        </select>
                    </div>

                    <div class="col-sm-4 d-flex justify-content-between align-items-center">
                        <input type="date" class="form-control" placeholder="Begin" v-model="beginDate">
                        <input type="date" class="form-control" placeholder="End" v-model="endDate">
                    </div>

                    <div class="col-sm-1">
                        <button type="button" class="btn" v-on:click.prevent="getFromToFlyings">
                            <svg viewBox="0 0 200 200" width="24" height="24" xmlns="http://www.w3.org/2000/svg" class="c8LPF-icon" role="img"><path d="M174.973 150.594l-29.406-29.406c5.794-9.945 9.171-21.482 9.171-33.819C154.737 50.164 124.573 20 87.368 20S20 50.164 20 87.368s30.164 67.368 67.368 67.368c12.345 0 23.874-3.377 33.827-9.171l29.406 29.406c6.703 6.703 17.667 6.703 24.371 0c6.704-6.702 6.704-17.674.001-24.377zM36.842 87.36c0-27.857 22.669-50.526 50.526-50.526s50.526 22.669 50.526 50.526s-22.669 50.526-50.526 50.526s-50.526-22.669-50.526-50.526z"></path></svg>
                        </button>
                    </div>
                </div>

                <hr class="my-4">
            </form>
        </div>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col" v-for="fly in flyings">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">{{ fly.airline }}</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">${{ fly.fly_cost }}</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Cabin class: {{ fly.cabin_class }}</li>
                            <li>Begin: {{ fly.begin_at }}</li>
                            <li>End: {{ fly.end_at }}</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-outline-primary">Book</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="my-5 pt-5 text-body-secondary text-center text-small">
        <p class="mb-1">&copy; 2023 Front10-Challenge</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="js/vue-v2.5.16.js"></script>
<script src="js/app.js"></script>
</body>
</html>
