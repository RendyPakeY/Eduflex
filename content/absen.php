<?php
if (isset($_REQUEST['pages'])) {
    if ($_REQUEST['pages'] === "Absen kelas") {
        $year = date("Y");
        $month = date("m");

        if ($mount >= 1 && $mount <= 6) {
            $tampung = array();
            while ($x = $jan->fetch_assoc()) {
                array_push($tampung, $x['kehadiran_id']);
            }
        }

        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-1-1' AND '$year-1-30' order by tanggal";
        $jan = $koneksi->query($query);
        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-2-1' AND '$year-2-30' order by tanggal";
        $feb = $koneksi->query($query);
        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-3-1' AND '$year-3-30' order by tanggal";
        $mar = $koneksi->query($query);
        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-4-1' AND '$year-4-30' order by tanggal";
        $apr = $koneksi->query($query);
        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-5-1' AND '$year-5-30' order by tanggal";
        $mei = $koneksi->query($query);
        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-6-1' AND '$year-6-30' order by tanggal";
        $jun = $koneksi->query($query);
        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-7-1' AND '$year-7-30' order by tanggal";
        $jul = $koneksi->query($query);
        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-8-1' AND '$year-8-30' order by tanggal";
        $agu = $koneksi->query($query);
        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-9-1' AND '$year-9-30' order by tanggal";
        $sep = $koneksi->query($query);
        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-10-1' AND '$year-10-30' order by tanggal";
        $okt = $koneksi->query($query);
        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-11-1' AND '$year-11-30' order by tanggal";
        $nov = $koneksi->query($query);
        $query = "SELECT * FROM `kehadiran` WHERE user_id = $id AND tanggal BETWEEN '$year-12-1' AND '$year-12-30' order by tanggal";
        $des = $koneksi->query($query);

?>
        <div class="absen">
            <div class="absen-value">
                <div class="header box three">
                    <div class="header-value one">
                        <div class="left">
                            <h1>Presentase<br>kehadiran Bulan ini</h1>
                        </div>
                        <div class="right">
                            <h1>95%</h1>
                        </div>
                    </div>
                </div>
                <div class="main two box">
                    <div class="left">
                        <h1>Riwayat Kehadiran Semester</h1>
                        <div class="riwayat">
                            <!-- Mainkan database disini -->
                            <!-- yang satu ini sebagai hard code -->
                            <ul class="barang">
                                <li>Januari</li>
                                <li>Februari</li>
                                <li>Maret</li>
                                <li>April</li>
                            </ul>
                            <ul class="harga">
                                <li>100%</li>
                                <li>100%</li>
                                <li>100%</li>
                                <li>100%</li>
                            </ul>
                        </div>
                    </div>
                    <div class="right">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var chart = c3.generate({
                bindto: '#chart',
                data: {
                    columns: [
                        <?php

                            // for($i = 1;$i <= 6; $i++){
                            foreach ($tampung as $x) {
                                echo "";
                            }
                            
                        
                        ?>],
                }
            });
            chart.resize({
                height: 250,
                width: 400
            })
        </script>
<?php
    }
};
?>