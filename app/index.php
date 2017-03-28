<!DOCTYPE html>
<html>
    <head>
        <title>Arduino Wrapper</title>

        <!-- style from https://codepen.io/chriscoyier/pen/DmnlJ -->
        <style type="text/css">
            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            body {
                padding: 20px 15%;
            }
            form header {
                margin: 0 0 20px 0;
            }
            form header div {
                font-size: 90%;
                color: #999;
            }
            form header h2 {
                margin: 0 0 5px 0;
            }
            form > div {
                clear: both;
                overflow: hidden;
                padding: 1px;
                margin: 0 0 10px 0;
            }
            form > div > fieldset > div > div {
                margin: 0 0 5px 0;
            }
            form > div > label,
            legend {
                width: 25%;
                float: left;
                padding-right: 10px;
            }
            form > div > div,
            form > div > fieldset > div {
                width: 75%;
                float: right;
            }
            form > div > fieldset label {
                font-size: 90%;
            }
            fieldset {
                border: 0;
                padding: 0;
            }

            input[type=text],
            input[type=email],
            input[type=url],
            input[type=password],
            textarea {
                width: 100%;
                border-top: 1px solid #ccc;
                border-left: 1px solid #ccc;
                border-right: 1px solid #eee;
                border-bottom: 1px solid #eee;
            }
            input[type=text],
            input[type=email],
            input[type=url],
            input[type=password] {
                width: 50%;
            }
            input[type=text]:focus,
            input[type=email]:focus,
            input[type=url]:focus,
            input[type=password]:focus,
            textarea:focus {
                outline: 0;
                border-color: #4697e4;
            }

            @media (max-width: 600px) {
                form > div {
                    margin: 0 0 15px 0;
                }
                form > div > label,
                legend {
                    width: 100%;
                    float: none;
                    margin: 0 0 5px 0;
                }
                form > div > div,
                form > div > fieldset > div {
                    width: 100%;
                    float: none;
                }
                input[type=text],
                input[type=email],
                input[type=url],
                input[type=password],
                textarea,
                select {
                    width: 100%;
                }
            }
            @media (min-width: 1200px) {
                form > div > label,
                legend {
                    text-align: right;
                }
            }
        </style>
    </head>
    <body>
        <?php

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                require '../vendor/autoload.php';

                $arduino = new \Arduino\Wrapper();

                $writer = new \Arduino\Writer($arduino);
                $writer->out($_POST['device'], $_POST['data']);
            }
        ?>
        <form method="post">
            <header>
                <h2>Arduino Wrapper</h2>
                <div>Send data to Arduino using PHP!</div>
            </header>

            <div>
                <label class="desc" id="title106" for="Field106">
                    Select the device
                </label>
                <div>
                    <select id="device" name="device" class="field select medium">
                        <option value="/dev/ttyACM0">ttyACM0</option>
                        <option value="/dev/ttyUSB0">ttyUSB0</option>
                        <option value="/dev/cu.usbmodem1411">cu.usbmodem1411</option>
                    </select>
                </div>
            </div>
            <div>
                <label class="desc" id="data" for="data">
                    Message
                </label>

                <div>
                    <textarea id="data" name="data" spellcheck="true" rows="10" cols="50" tabindex="4"></textarea>
                </div>
                <div>
                    <button type="submit">Send data !</button>
                </div>
            </div>
        </form>
    </body>
</html>
