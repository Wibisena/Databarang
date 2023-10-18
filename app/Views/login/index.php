<!-- app/Views/auth/login.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <!-- Tambahkan form login di sini -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Log in (v2)</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">

        <link rel="stylesheet" href="<?= base_url() ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

        <link rel="stylesheet" href="<?= base_url() ?>/dist/css/adminlte.min.css?v=3.2.0">
        <script nonce="6acccb3d-df31-4094-b900-1dfad23aa227">
            (function(w, d) {
                ! function(a, b, c, d) {
                    a[c] = a[c] || {};
                    a[c].executed = [];
                    a.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    a.zaraz.q = [];
                    a.zaraz.f = function(e) {
                        return async function() {
                            var f = Array.prototype.slice.call(arguments);
                            a.zaraz.q.push({
                                m: e,
                                a: f
                            })
                        }
                    };
                    for (const g of ["track", "set", "debug"]) a.zaraz[g] = a.zaraz._f(g);
                    a.zaraz.init = () => {
                        var h = b.getElementsByTagName(d)[0],
                            i = b.createElement(d),
                            j = b.getElementsByTagName("title")[0];
                        j && (a[c].t = b.getElementsByTagName("title")[0].text);
                        a[c].x = Math.random();
                        a[c].w = a.screen.width;
                        a[c].h = a.screen.height;
                        a[c].j = a.innerHeight;
                        a[c].e = a.innerWidth;
                        a[c].l = a.location.href;
                        a[c].r = b.referrer;
                        a[c].k = a.screen.colorDepth;
                        a[c].n = b.characterSet;
                        a[c].o = (new Date).getTimezoneOffset();
                        if (a.dataLayer)
                            for (const n of Object.entries(Object.entries(dataLayer).reduce(((o, p) => ({
                                    ...o[1],
                                    ...p[1]
                                })), {}))) zaraz.set(n[0], n[1], {
                                scope: "page"
                            });
                        a[c].q = [];
                        for (; a.zaraz.q.length;) {
                            const q = a.zaraz.q.shift();
                            a[c].q.push(q)
                        }
                        i.defer = !0;
                        for (const r of [localStorage, sessionStorage]) Object.keys(r || {}).filter((t => t.startsWith("_zaraz"))).forEach((s => {
                            try {
                                a[c]["z_" + s.slice(7)] = JSON.parse(r.getItem(s))
                            } catch {
                                a[c]["z_" + s.slice(7)] = r.getItem(s)
                            }
                        }));
                        i.referrerPolicy = "origin";
                        i.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a[c])));
                        h.parentNode.insertBefore(i, h)
                    };
                    ["complete", "interactive"].includes(b.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document);
        </script>
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">

            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a class="h1">
                        <img src="data:image/png;base64,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" />
                </div>
                <div class="card-body">
                    <p class="login-box-msg" style="font-size: 30px; font-weight: bold; color: blue;">SELAMAT DATANG</p>
                    <?= form_open('login/cekUser') ?>
                    <?= csrf_field(); ?>
                    <div class="input-group mb-3">
                        <input type="text" name="iduser" class="form-control" placeholder="Username" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <?= form_close(); ?>

                </div>

            </div>

        </div>


        <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>

        <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="<?= base_url() ?>/dist/js/adminlte.min.js?v=3.2.0"></script>
    </body>

    </html>

    </form>
</body>

</html>