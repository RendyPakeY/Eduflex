<?php
if (isset($_REQUEST['pages'])) {
    if ($_REQUEST['pages'] === "Form keuangan") {
        if ($_SESSION['akses'] = "1" || $_SESSION['akses'] = "5") {
?>
            <div class="form-keuangan">
                <div class="form-keuangan-value">
                    <div class="left box">
                        <img src="assets/img/uang-kiri.PNG" alt="foto">
                        <h1>Tambah Saldo Kartu</h1>
                        <div class="value">
                            <p>Jumlah Penambahan</p>
                            <div class="jumlah">
                                <input type="text" id="tambah">
                            </div>
                        </div>
                        <div class="konfirmasi">
                            <button class="blue-btn" onclick="rfin('rfid'), rfin('wait'), ver(1), pub('tambah')">Konfirmasi</button>
                        </div>
                    </div>
                    <div class="right box">
                        <img src="assets/img/uang-kanan.PNG" alt="foto">
                        <h1>Pengembalian Saldo Kartu</h1>
                        <div class="value">
                            <p>Jumlah Pengembalian</p>
                            <div class="jumlah">
                                <input type="text" id="kembali">
                            </div>
                        </div>
                        <div class="konfirmasi">
                            <button class="blue-btn" onclick="rfin('rfid'), rfin('wait'), ver(2), pub('tukar')">Konfirmasi</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rfid" id="rfid">
                <div class="rfid-value box" id="wait">
                    <h1>Silahkan tempelkan kartu anda<br>pada RFID Reader</h1>
                    <img src="assets/img/rfid.gif" alt="">
                    <div class="batalkan" onclick="rfin('rfid'), rfin('wait'), clear()">
                        <button class="blue-btn">batalkan</button>
                    </div>
                </div>
                <div class="rfid-value box" id="suc">
                    <h1>Transaksi Berhasil !</h1>
                    <img src="assets/img/check.gif" alt="">
                    <div class="batalkan" onclick="rfin('rfid'), rfin('suc'), clear()">
                        <button class="blue-btn">Selesai</button>
                    </div>
                </div>
                <div class="rfid-value box" id="fail">
                    <h1>Maaf, Saldo tidak cukup !</h1>
                    <img src="assets/img/cross.gif" alt="" style="width: 100px; padding: 20px;">
                    <div class="batalkan" onclick="rfin('rfid'), rfin('fail'), clear()">
                        <button class="blue-btn">Selesai</button>
                    </div>
                </div>
                <div class="rfid-value box" id="fail2">
                    <h1>Maaf, pilihan tidak ada di daftar !</h1>
                    <img src="assets/img/cross.gif" alt="" style="width: 100px; padding: 20px;">
                    <div class="batalkan" onclick="rfin('rfid'), rfin('fail'), clear()">
                        <button class="blue-btn">Selesai</button>
                    </div>
                </div>
            </div>
            <script>
                function pub(pilih) {
                    const clientId = "mqttjs_" + Math.random().toString(16).substr(2, 8);
                    const host = "ws://broker.emqx.io:8083/mqtt";
                    const options = {
                        keepalive: 60,
                        clientId: clientId,
                        protocolId: "MQTT",
                        protocolVersion: 4,
                        clean: true,
                        reconnectPeriod: 1000,
                        connectTimeout: 30 * 1000,
                        will: {
                            topic: "WillMsg",
                            payload: "Connection Closed abnormally..!",
                            qos: 0,
                            retain: false,
                        },
                    };

                    client = mqtt.connect(host, options);

                    client.on("connect", function() {
                        console.log("Connected to MQTT broker");
                        client.subscribe("eduflex/kantin/" + pilih);
                        console.log(data);
                        client.publish("eduflex/kantin", JSON.stringify(data))
                    });
                    client.on("message", function(topic, message) {
                        var messageObj = message.toString();
                        var feedBack = JSON.parse(messageObj);
                        if (feedBack.key == data.key) {
                            let very = null;
                            xml.open('GET', feedBack.send);
                            xml.send();
                            xml.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    if (this.responseText === "gagal daftar") {
                                        rfin('fail2');
                                        rfin('wait');
                                    } else if(this.responseText === "gagal saldo"){
                                        rfin('fail');
                                        rfin('wait');
                                    } else {
                                        rfin('wait');
                                        rfin('suc');
                                    }
                                };
                            };
                        }
                    });
                    let very = Math.floor(Math.random() * 1000);
                    var data = {
                        "api": publishSend,
                        "key": very,
                        "send": "eduflex/kantin/"+pilih
                    };
                }

                function clear() {
                    data = null
                }

                function ver(pilih) {
                    if (pilih === 1) {
                        var bukuuu = "saldo=" + document.getElementById('tambah').value.replace(/[Rp .]/g, "") + "&";
                        publishSend = "assets/api/tambahSaldo.php?" + bukuuu + "rfid=";
                        console.log(publishSend);
                    } else if (pilih === 2) {
                        var bukuuu = "saldo=" + document.getElementById('kembali').value.replace(/[Rp .]/g, "") + "&";
                        publishSend = "assets/api/tukarSaldo.php?" + bukuuu + "rfid=";
                        console.log(publishSend);
                    }
                }


                var kirim = [];
                var xml = new XMLHttpRequest();
                var xhr = new XMLHttpRequest();
                const bob = document.getElementById('pop-up');
                var no = 1;
                var uang = 0;

                function rfin(target) {
                    var contoh = document.getElementById(target);
                    contoh.classList.toggle('rfin');
                }

                var rupiah = document.getElementById("kembali");
                rupiah.addEventListener("keyup", function(e) {
                    // tambahkan 'Rp.' pada saat form di ketik
                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                    rupiah.value = formatRupiah(this.value, "Rp. ");
                });
                var beda = document.getElementById("tambah");
                beda.addEventListener("keyup", function(e) {
                    // tambahkan 'Rp.' pada saat form di ketik
                    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                    beda.value = formatRupiah(this.value, "Rp. ");
                });

                /* Fungsi formatRupiah */
                function formatRupiah(angka, prefix) {
                    var number_string = angka.replace(/[^,\d]/g, "").toString(),
                        split = number_string.split(","),
                        sisa = split[0].length % 3,
                        rupiah = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                    if (ribuan) {
                        separator = sisa ? "." : "";
                        rupiah += separator + ribuan.join(".");
                    }

                    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                    return prefix == undefined ? rupiah : rupiah ? "Rp " + rupiah : "";
                }
            </script>
<?php
        } else {
            header("Location: ?");
        }
    }
};
?>