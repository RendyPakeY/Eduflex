<?php
if (isset($_REQUEST['pages'])) {
    if ($_REQUEST['pages'] === "Form pengembalian") {
        if ($_SESSION['akses'] = 1 || $_SESSION['akses'] = 3) {
            $query = "SELECT * FROM `buku` order by judul";
            $buku = $koneksi->query($query);
?>

            <div class="form-pengembalian">
                <div class="form-pengembalian-value">
                    <div class="table">
                        <h1>Form Pengembalian Buku</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama buku</th>
                                    <th>Pencipta</th>
                                    <th>Kode buku</th>
                                </tr>
                            </thead>
                            <tbody id="tbd">
                            </tbody>
                        </table>
                        <div class="full-width">
                            <button class="blue-btn" onclick="popUp()">Tambah Pengembalian</button>
                        </div>
                    </div>
                    <div class="submit">
                        <div class="submit-value">
                            <button class="blue-btn" onclick="rfin('rfid'), rfin('wait'), ver(), pub()">Konfirmasi</button>
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
                    <h1>Buku berhasil dipinjam !</h1>
                    <img src="assets/img/check.gif" alt="">
                    <div class="batalkan" onclick="rfin('rfid'), rfin('suc'), clear()">
                        <button class="blue-btn">Selesai</button>
                    </div>
                </div>
                <div class="rfid-value box" id="fail">
                    <h1>Maaf, pengguna tidak meminjam buku !</h1>
                    <img src="assets/img/cross.gif" alt="" style="width: 100px; padding: 20px;">
                    <div class="batalkan" onclick="rfin('rfid'), rfin('fail'), clear()">
                        <button class="blue-btn">Selesai</button>
                    </div>
                </div>
            </div>
            <div class="pop-up" id="pop-up">
                <div class="pop-up-value box">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama buku</th>
                                <th>Pencipta</th>
                                <th>Kode buku</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($full = $buku->fetch_assoc()) {
                                echo '<tr onclick="depan(' . $full['buku_id'] . ')"><td>' . $no . '</td><td>' . $full['judul'] . "</td><td>" . $full['pengarang'] . "</td><td>B.K." . $full['buku_id'] . "</td></tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <button class="blue-btn" onclick="popUp()">batalkan penambahan</button>
                </div>
            </div>
            <script>
                function pub() {
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
                        client.subscribe("eduflex/perpus/kembali");
                        console.log(data);
                        client.publish("eduflex/perpus", JSON.stringify(data))
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
                                    if (this.responseText === "gagal") {
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
                        "send": "eduflex/perpus/kembali"
                    };

                }

                function clear() {
                    data = null
                }

                function ver() {
                    var bukuuu = "";
                    kirim.forEach(myFunction);

                    function myFunction(item) {
                        bukuuu += "id_buku[]=" + item + "&";
                        publishSend = "assets/api/kembali.php?" + bukuuu + "rfid=";
                        console.log(publishSend);
                    }
                }

                var kirim = [];
                var xml = new XMLHttpRequest();
                var xhr = new XMLHttpRequest();
                const bob = document.getElementById('pop-up');
                var no = 1;

                function depan(x) {
                    var dataToSend = "assets/api/getBuku.php?id_buku=";
                    console.log(dataToSend);
                    xhr.open('GET', dataToSend + x);
                    xhr.send();
                    xhr.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            kirim.push(x);
                            console.log(x);
                            console.log(this.responseText);
                            document.getElementById("tbd").insertAdjacentHTML("beforeEnd", '<tr><td>' + no + this.responseText);
                            no++;
                        }
                    };
                    bob.classList.toggle('pop-down');
                }

                function rfin(target) {
                    var contoh = document.getElementById(target);
                    contoh.classList.toggle('rfin');
                }
            </script>

<?php
        } else {
            header("Location: ?");
        }
    }
};
?>