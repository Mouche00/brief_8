<?php

    // require(__DIR__ ."/../../controllers/account.php");
    require("components/check.php");

?>

<!DOCTYPE html>
<html lang="en">

<!--  HEAD  -->
<head>
    <?php include("components/head.html") ?>
    <title>Banks</title>
</head>
<!--  HEAD  -->

<body class="h-[100vh] w-full flex">

    <!--  SIDEBAR  -->
    <?php include("components/sidebar.html") ?>
    <!--  SIDEBAR  -->

    <?php foreach($_SESSION["roles"] as $role): ?>
            
    <?php if (in_array("admin", $role)) { ?>

    <!-- OVERLAY -->
    <div id="overlay" class="bg-black w-full h-[100vh] opacity-0 z-[-1] absolute transition ease-in-out delay-15"></div>
    <!-- OVERLAY -->

    <!-- FORM -->
    <section id="form-wrapper" class="h-[20vh] w-[30%] m-auto bg-white rounded flex justify-center items-center absolute top-2/4 left-2/4 translate-x-[-50%] translate-y-[-50%] z-20 scale-0 transition ease-in-out delay-15">
        <form id="add-form" action="" method="post" class="w-[80%] h-[90%] flex flex-col justify-evenly" autocomplete="off" enctype="multipart/form-data">
            <div class="flex justify-between">
                <div class="w-[45%] flex flex-col justify-evenly">
                    <label>rib:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="rib" id="rib">
                </div>
                <div class="w-[45%] flex flex-col">
                    <label>currency:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="currency" id="currency">
                </div>
                <div class="w-[45%] flex flex-col justify-evenly">
                    <label>balance:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="balance" id="balance">
                </div>
                <div class="w-[45%] flex flex-col">
                    <label>user_id:</label>
                    <select class="bg-gray-300 rounded p-1" name="user_id" id="user_id"></select>
                </div>
            </div>
            <div class="flex flex-col">
                <!-- <button id="edit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button>
                <button id="submit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button> -->
                <input id="submit" type="submit" value="SUBMIT">
            </div>
        </form>
        
        <form id="edit-form" action="" method="post" class="w-[80%] h-[90%] flex flex-col justify-evenly" autocomplete="off" enctype="multipart/form-data">
            <div class="flex justify-between">
                <input class="bg-gray-300 rounded p-1" type="hidden" name="id" id="edit-id">
                <div class="w-[45%] flex flex-col justify-evenly">
                    <label>rib:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="rib" id="edit-rib">
                </div>
                <div class="w-[45%] flex flex-col">
                    <label>currency:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="currency" id="edit-currency">
                </div>
                <div class="w-[45%] flex flex-col justify-evenly">
                    <label>balance:</label>
                    <input class="bg-gray-300 rounded p-1" type="text" name="balance" id="edit-balance">
                </div>
                <div class="w-[45%] flex flex-col">
                    <label>user_id:</label>
                    <select class="bg-gray-300 rounded p-1" name="user_id" id="edit-user_id"></select>
                </div>
            </div>
            <div class="flex flex-col">
                <!-- <button id="edit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button>
                <button id="submit" class="w-[30%] rounded m-auto bg-green-500 text-white p-1" type="button">SUBMIT</button> -->
                <input id="submit" type="submit" value="EDIT">
            </div>
        </form>
    </section>
    <!-- FORM -->

    <?php } ?>
    <?php endforeach; ?>

    <main class="w-[85%]">

        <!--  HEADER  -->
            <?php include("components/header.html") ?>
        <!--  HEADER  -->
        <section class="w-full h-[90%] bg-gray-200 flex justify-center items-center">
            <button id="add" type="button" class="w-14 h-[80%] bg-black text-white text-center rounded-l-lg">
                <i class="fa-solid fa-plus"></i>
            </button>
            <div class="w-[80%] h-[80%] bg-white rounded-r-lg p-8">
                <table id="table" class="w-[90%] mx-auto text-center py-4 cell-border">
                    <thead class="bg-black text-white">
                        <tr>
                            <th class="border-2 border-black">ID</th>
                            <th class="border-2 border-black">rib</th>
                            <th class="border-2 border-black">currency</th>
                            <th class="border-2 border-black">balance</th>
                            <th class="border-2 border-black">user_id</th>
                            <th class="border-2 border-black">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>
    </main>
</body>
<script src="../public/assets/javascript/main.js"></script>
<script src="../public/assets/javascript/account.js"></script>
</html>