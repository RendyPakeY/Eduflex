<?php
if (isset($_REQUEST['pages'])) {
    if ($_REQUEST['pages'] === "Kontrol kelas") {
        if ($_SESSION['akses'] = 1 || $_SESSION['akses'] = 6) {

            $query = "SELECT kl.* FROM kelas kl JOIN user us on kl.kelas = us.kelas where us.user_id = $id";
            $kontrol = $koneksi->query($query);
            $namaKelas = $koneksi->query($query);
?>

            <div class="kontrol">
                <div class="kontrol-value">
                    <div class="top">
                        <div class="left box">
                            <h1>Anda mengontrol <br>kelas <?php while ($x = $namaKelas->fetch_assoc()) {
                                                                $kelas = $x['kelas'];
                                                                echo $kelas;
                                                            } ?></h1>
                            <img src="assets/img/settings.png" alt="">
                        </div>
                        <div class="right box">
                            <img src="assets/img/suhu.png" alt="panas">
                            <h1>Suhu ruangan <br><span id="suhu"></span></h1>
                        </div>
                    </div>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Alat</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($x = $kontrol->fetch_assoc()) {
                                    for ($i = 0; $i <= 7; $i++) {
                                        if ($x['elk' . $no] != "") {
                                            echo '<tr><td>' . $no . '</td><td>' . $x['elk' . $no] . "</td><td>" . '<div class="check"><div class="off" id="tombol' . $no . '" onclick="onOff' . "('tombol" . $no . "'), baka('tombol" . $no . "')" . '"></div></div></td></tr>';
                                            $no++;
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>
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

                const client = mqtt.connect(host, options);

                client.on("connect", function() {
                    console.log("Connected to MQTT broker");
                    client.subscribe("smart/class/424");
                });

                const temp = document.getElementById('suhu');
                client.on("message", function(topic, message) {
                    switch (topic) {
                        case "smart/class/424":
                            console.log(message.toString());
                            temp.innerHTML = message.toString() + "°C";
                            break;
                    }
                });

                var xml = new XMLHttpRequest();
                window.addEventListener("load", function(){
                var kelas = "<?php echo $kelas ?>";
                console.log(kelas);
                xml.open("GET", "assets/api/getKontrol.php?kelas=" + kelas.replace(" ", "%20"));
                xml.send();
                xml.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var hasil = JSON.parse(this.responseText);
                        <?php
                        for($i = 1; $i <= 8; $i++){
                            echo 'var baten = document.getElementById("tombol'.$i.'");
                            if(hasil.relay'.$i.' == 1){
                            baten.classList.toggle("on");
                            }';
                        }
                        ?>
                            
                        
                    }
                }
            });

            function baka(id) {
                    var yo = document.getElementById(id);
                    if (id == "tombol1") {
                        if (yo.className == "off on") {
                            var publishSend = "ON";
                            console.log(publishSend)
                            client.publish("smart/web/relay1", publishSend)
                        }
                        else{
                            var publishSend = "OFF";
                            console.log(publishSend)
                            client.publish("smart/web/relay1", publishSend)
                        }
                        }
                    if (id == "tombol2") {
                        if (yo.className == "off on") {
                            var publishSend = "ON";
                            console.log(publishSend)
                            client.publish("smart/web/relay2", publishSend)
                        }
                        else{
                            var publishSend = "OFF";
                            console.log(publishSend)
                            client.publish("smart/web/relay2", publishSend)
                        }
                        }
                    if (id == "tombol3") {
                        if (yo.className == "off on") {
                            var publishSend = "ON";
                            console.log(publishSend)
                            client.publish("smart/web/relay3", publishSend)
                        }
                        else{
                            var publishSend = "OFF";
                            console.log(publishSend)
                            client.publish("smart/web/relay3", publishSend)
                        }
                        }
                    if (id == "tombol4") {
                        if (yo.className == "off on") {
                            var publishSend = "ON";
                            console.log(publishSend)
                            client.publish("smart/web/relay4", publishSend)
                        }
                        else{
                            var publishSend = "OFF";
                            console.log(publishSend)
                            client.publish("smart/web/relay4", publishSend)
                        }
                        }
                    if (id == "tombol5") {
                        if (yo.className == "off on") {
                            var publishSend = "ON";
                            console.log(publishSend)
                            client.publish("smart/web/relay5", publishSend)
                        }
                        else{
                            var publishSend = "OFF";
                            console.log(publishSend)
                            client.publish("smart/web/relay5", publishSend)
                        }
                        }
                    if (id == "tombol6") {
                        if (yo.className == "off on") {
                            var publishSend = "ON";
                            console.log(publishSend)
                            client.publish("smart/web/relay6", publishSend)
                        }
                        else{
                            var publishSend = "OFF";
                            console.log(publishSend)
                            client.publish("smart/web/relay6", publishSend)
                        }
                        }
                    if (id == "tombol7") {
                        if (yo.className == "off on") {
                            var publishSend = "ON";
                            console.log(publishSend)
                            client.publish("smart/web/relay7", publishSend)
                        }
                        else{
                            var publishSend = "OFF";
                            console.log(publishSend)
                            client.publish("smart/web/relay7", publishSend)
                        }
                        }
                    if (id == "tombol8") {
                        if (yo.className == "off on") {
                            var publishSend = "ON";
                            console.log(publishSend)
                            client.publish("smart/web/relay8", publishSend)
                        }
                        else{
                            var publishSend = "OFF";
                            console.log(publishSend)
                            client.publish("smart/web/relay8", publishSend)
                        }
                        }
                        }

            </script>

<?php
        } else {
            header("Location: ?");
        }
    }
};
?>