<div class="sidebar">
    <div class="image">
        <a href="" alt=""><img src="/images/darisini.png"></a>
    </div>
    <h3>Cafe Dari Sini</h3>
    <br>
    <ul>
        <li>
            <br>
            <a href="meja-backend">
                <img src="/images/Icon-table.png" alt="">
                <span class="sidemenu">Meja</span>
            </a>
            <br>
        </li>
        <li>
            <br>
            <a href="menu-backend">
                <img src="/images/Icon-Menu.png" alt="">
                <span class="sidemenu">Menu</span> 
            </a>
            <br>
        </li>
        <li>
            <br>
            <a href="reserve-backend">
                <img src="/images/Icon-Reservasi.png" alt="">
                <span class="sidemenu">Reservasi</span>
            </a>
            <br>
        </li>
        <li>
            <br>
            <a href="order-backend">
                <img src="/images/Icon-keranjang.png" alt="">
                <span class="sidemenu">Pesanan</span>
            </a>
            <br>
        </li>
        <li>
            <br>
            <a href="bayar-backend">
                <img src="/images/Icon-bayar.png" alt="">
                <span class="sidemenu">Pembayaran</span>
            </a>
            <br>
        </li>
    </ul>
    <form action="/logout" method="post">
        @csrf
        <button type="submit" class="span-logout"><span>Logout</span></button>
    </form>
</div>