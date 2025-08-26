<?php
if(isset($_REQUEST['pages'])){
    if($_REQUEST['pages'] === "Tentang kami"){
?>

<div class="tentang">
    <div class="tentang-value">
        <div class="header box three">
            <div class="header-value one">
                <p>Tentang Kami,</p>
                <h1>NAWASENA TEAM</h1>
            </div>
        </div>
        <div class="main two">
            <div class="person-1 person-box box">
                <div class="value-container" id="person1">
                    <div class="value">
                        <h1>Irawan Anugrah</h1>
                        <p>Halo, Saya Irawan bertanggung jawab sebagai Perakit perangkat keras elektronika</p>
                    </div>
                </div>
            </div>
            <div class="person-2 person-box box">
                <div class="value-container" id="person2">
                    <div class="value">
                        <h1>M Aditya Ramdany</h1>
                        <p>Halo, Saya Aditya bertanggung jawab sebagai Mekanika design dan layout PCB 3D</p>
                    </div>
                </div>
            </div>
            <div class="person-3 person-box box">
                <div class="value-container" id="person3">
                    <div class="value">
                        <h1>Rendy Khaerul Rizal</h1>
                        <p>Halo, Saya Rendy bertanggung jawab sebagai Desainer Website dan Pemograman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}};
?>