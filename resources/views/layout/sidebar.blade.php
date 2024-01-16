<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin' || auth()->user()->role == 'adminppob')
                    <a class="nav-link" href="/home">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Home
                    </a>
                @endif
                @if (auth()->user()->role == 'superadmin')
                    <a class="nav-link" href="/kota">
                        <div class="sb-nav-link-icon"><i class="fas fa-location-arrow"></i></div>
                        Daerah
                    </a>
                @endif
                @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#customer"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Customer dan Toko
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="customer" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/customer">Customer</a>
                            <a class="nav-link" href="/toko">Toko </a>
                        </nav>
                    </div>
                @endif
                @if (auth()->user()->role == 'superadmin')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#challenge"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-brain"></i></i></div>
                        Challenges
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="challenge" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/challenge">Challenge</a>
                            <a class="nav-link" href="/user-challenges">User yang Mengikuti</a>
                            <a class="nav-link" href="/challenge-image">Gambar </a>
                        </nav>
                    </div>
                @endif
                @if (auth()->user()->role == 'superadmin')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#artikel"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></i></div>
                        Artikel
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="artikel" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/artikel">Artikel</a>
                            <a class="nav-link" href="/artikel-image">Gambar </a>
                        </nav>
                    </div>
                @endif
                @if (auth()->user()->role == 'superadmin')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#bantuan"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-question"></i></i></div>
                        Bantuan
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="bantuan" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/wa">Whatsapp</a>
                            <a class="nav-link" href="/te">Telegram </a>
                            <a class="nav-link" href="/faq">FAQ </a>
                        </nav>
                    </div>
                @endif
                @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin' || auth()->user()->role == 'adminppob')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#log"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-exchange-alt"></i></div>
                        Log Transaksi
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                @endif
                @if (auth()->user()->role == 'superadmin')
                    <div class="collapse" id="log" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/logtransfer">Log Transfer</a>
                            <a class="nav-link" href="/logtopup">Log Top up </a>
                            <a class="nav-link" href="/logtransaksijs">Log Jual Sampah </a>
                            <a class="nav-link" href="/logppob">Log PPOB</a>
                        </nav>
                    </div>
                @endif
                @if (auth()->user()->role == 'admin')
                    <div class="collapse" id="log" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/logtransfer">Log Transfer / Bayar Toko</a>
                            <a class="nav-link" href="/logtopup">Log Top up </a>
                            <a class="nav-link" href="/logtransaksijs">Log Jual Sampah </a>

                        </nav>
                    </div>
                @endif
                @if (auth()->user()->role == 'adminppob')
                    <div class="collapse" id="log" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/logppob">Log PPOB</a>
                        </nav>
                    </div>
                @endif

                @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
                    <a class="nav-link" href="/lj">
                        <div class="sb-nav-link-icon"><i class="fas fa-taxi"></i></i></div>
                        Layanan Sedekah Sampah
                        <div class="sb-sidenav-collapse-arrow"></div>
                        <span class="badge badge-danger right total_layanan"></span>
                        &nbsp;
                        <span class="badge badge-warning right total_layanan_diproses"></span>
                    </a>
                @endif
                @if (auth()->user()->role == 'superadmin')
                    <a class="nav-link" href="/qurban">
                        <div class="sb-nav-link-icon"><i class="fas fa-city"></i></div>
                        Qurban Sampah
                    </a>
                @endif
                {{-- @if (auth()->user()->role == 'superadmin')
                <a class="nav-link" href="/info">
                    <div class="sb-nav-link-icon"><i class="fas fa-hands-helping"></i></div>
                    Info Kamu
                </a>
                @endif --}}
                {{-- @if (auth()->user()->role == 'superadmin')
                <a class="nav-link" href="/share">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    share
                </a>
                @endif --}}
                @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'adminppob')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#ppob"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-blog"></i></div>
                        PPOB

                        <div class="sb-sidenav-collapse-arrow"></div>
                        <span class="badge badge-danger right total_ppob"></span>
                        &nbsp;
                        <span class="badge badge-warning right total_ppob_diproses"></span>

                    </a>

                    <div class="collapse" id="ppob" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/ppob">PPOB</a>
                            <a class="nav-link" href="/detailppob">Detail PPOB </a>
                            <a class="nav-link" href="/tpp">Transaksi PPOB <div class="sb-sidenav-collapse-arrow">
                                </div> <span class="badge badge-danger right total_ppob"></span>
                                &nbsp;
                                <span class="badge badge-warning right total_ppob_diproses"></span></a>
                        </nav>
                    </div>
                @endif
                {{-- <a class="nav-link" href="/customer">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Customer
                </a> --}}
                {{-- <a class="nav-link" href="/umkm">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    UMKM Kita
                </a> --}}
                @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#umkm"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                        UMKM Kita
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="umkm" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/umkm">UMKM</a>
                            <a class="nav-link" href="/produkumkm">Produk UMKM</a>
                        </nav>
                    </div>
                @endif
                @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pr"
                        aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fab fa-sellcast"></i></div>
                        Jual Sampah
                        <div class="sb-sidenav-collapse-arrow"></div>
                        <span class="badge badge-danger total_jualsampah"></span>
                        &nbsp;
                        <span class="badge badge-warning total_jualsampah_diproses"></span>
                        {{-- <i class="fas fa-angle-down"></i> --}}
                    </a>
                    <div class="collapse" id="pr" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/produkjs">Produk Jual Sampah</a>
                            <a class="nav-link" href="/transaksijs">Transaksi Jual Sampah <div
                                    class="sb-sidenav-collapse-arrow"></div> <span
                                    class="badge badge-danger total_jualsampah"></span>
                                &nbsp;
                                <span class="badge badge-warning total_jualsampah_diproses"></span></a>
                        </nav>
                    </div>
                @endif
                {{-- @if (auth()->user()->role == 'superadmin')
                <a class="nav-link" href="/share">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Share
                </a>
                
                @endif --}}
                @if (auth()->user()->role == 'superadmin')
                    <a class="nav-link" href="/banner">
                        <div class="sb-nav-link-icon"><i class="fas fa-copy"></i></div>
                        Info Kamu
                    </a>
                @endif
                @if (auth()->user()->role == 'superadmin')
                    <a class="nav-link" href="/user">
                        <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>
                        Admin Backoffice
                    </a>
                @endif
                {{-- <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Layouts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="layout-static.html">Static Navigation</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> --}}
            </div>
        </div>

    </nav>
</div>
<script>
    totalppob();

    function totalppob() {
        $.ajax({
            type: 'GET',
            url: 'total',
            success: function(response) {
                console.log("qwe");
                console.log("test");
                console.log(response.tjs);
                $('.total_ppob').text(response.ppobbelum);
                $('.total_ppob_diproses').text(response.ppobsedang);
                $('.total_layanan').text(response.lj);
                $('.total_layanan_diproses').text(response.ljsedang);
                $('.total_jualsampah').text(response.tjs);
                $('.total_jualsampah_diproses').text(response.tjssedang);


            }
        });
    }
</script>
