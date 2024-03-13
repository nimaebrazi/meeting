<html lang="en">
<head>

    <style>

        * {
            margin: 0;
            border: 0;
        }

        body {
            flex-direction: column;
            display: flex;
            align-items: center;
            align-content: center;
            justify-content: center;
            font-family: "DINPro", "Helvetica Neue", sans-serif;
            padding: 3rem;
            margin: 0;
            background: #fafafa;
            box-sizing: border-box;
            /*height: 100vh;*/

        }

        .offset {

        }

        .outer {
            position: relative;
        }

        .calendar {
            margin: 0 auto;
            max-width: 1280px;
            min-width: 500px;
            max-height: 100px;

            box-shadow: 0px 30px 50px rgba(0, 0, 0, 0.2), 0px 3px 7px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .wrap {

            overflow-x: hidden;
            overflow-y: scroll;
            max-width: 1280px;
            height: 500px;
            border-radius: 8px;
        }

        thead {
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.2);
        }

        thead th {

            text-align: center;
            width: 100%;

        }

        header {
            background: #fff;
            padding: 1rem;
            color: rgba(0, 0, 0, 0.7);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px 8px 0px 0px;
        }

        header h1 {
            font-size: 1.25rem;
            text-align: center;
            font-weight: normal;

        }

        tbody {
            position: relative;
            top: 100px;
        }

        table {
            background: #fff;
            width: 100%;
            height: 100%;
            border-collapse: collapse;
            table-layout: fixed;

        }


        .headcol {
            width: 60px;
            font-size: 0.875rem;
            font-weight: 500;
            color: rgba(0, 0, 0, 0.5);
            padding: 0.25rem 0;
            text-align: center;
            border: 0;
            position: relative;
            top: -12px;
            border-bottom: 1px solid transparent;
        }

        thead th {
            font-size: 1rem;
            font-weight: bold;
            color: rgba(0, 0, 0, 0.9);
            padding: 1rem;
        }

        thead {
            z-index: 2;
            background: white;
            border-bottom: 2px solid #ddd;

        }

        tr, tr td {
            height: 20px;
        }

        td {
            text-align: center;
        }

        tr:nth-child(odd) td:not(.headcol) {
            border-bottom: 1px solid #e8e8e8;
        }

        tr:nth-child(even) td:not(.headcol) {
            border-bottom: 1px solid #eee;
        }

        tr td {
            border-right: 1px solid #eee;
            padding: 0;
            white-space: nowrap;
            word-wrap: normal;
        }

        tbody tr td {
            position: relative;
            vertical-align: top;
            height: 40px;
            padding: 0.25rem 0.25rem 0 0.25rem;
            width: auto;

        }

        .secondary {
            color: rgba(0, 0, 0, 0.4);
        }


        .checkbox {
            display: none;
        }

        .checkbox + label {
            border: 0;
            outline: 0;
            width: 100px;
            heigth: 100px;
            background: white;
            color: transparent;
            display: block;
            display: none;
        }

        .checkbox:checked + label {
            border: 0;
            outline: 0;
            width: 100%;
            heigth: 100%;
            background: red;
            color: transparent;
            display: inline-block;
        }

        .event {
            background: #00B4FC;
            color: white;
            border-radius: 2px;
            text-align: left;
            font-size: 0.875rem;
            z-index: 2;
            padding: 0.5rem;
            overflow-x: hidden;
            transition: all 0.2s;
            cursor: pointer;
        }

        .event:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background: #00B4FC;
        }

        .event.double {
            height: 200%;
        }

        /**
        thead {
            tr {
              display: block;
              position: relative;
            }
          }
        tbody {
            display: block;
            overflow: auto;
            width: 800px;
            height: 100%;
          }
        */


        td:hover:after {
            content: "+";
            vertical-align: middle;
            font-size: 1.875rem;
            font-weight: 100;
            color: rgba(0, 0, 0, 0.5);
            position: absolute;
        }

        button.secondary {
            border: 1px solid rgba(0, 0, 0, 0.1);
            background: white;
            padding: 0.5rem 0.75rem;
            font-size: 14px;
            border-radius: 2px;
            color: rgba(0, 0, 0, 0.5);
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            font-weight: 500;
        }

        button.secondary:hover {
            background: #fafafa;
        }

        button.secondary:active {
            box-shadow: none;
        }

        button.secondary:focus {
            outline: 0;
        }


        tr td:nth-child(2), tr td:nth-child(3), .past {
            background: #fafafa;
        }

        .today {
            color: red;
        }

        .now {
            box-shadow: 0 -1px 0 0 red;
        }

        .icon {
            font-size: 1.5rem;
            margin: 0 1rem;
            text-align: center;
            cursor: pointer;
            vertical-align: middle;
            position: relative;
            top: -2px;
        }

        .icon:hover {
            color: red;
        }


        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <title></title>

</head>

<body>

<div class="calendar">

    <header>
        <button id="new-event" class="secondary" style="align-self: flex-start; flex: 0 0 1">New Event</button>
        <!-- The Modal -->
        <div id="new-event-modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <form name="save-event" action="/meeting" method="post">

                    <label>
                        <span>Start Time:</span>
                        <select name="start">
                            <?php
                            foreach ($attributes['timing'] as $time) {
                                echo "<option value=\"$time\">" . $time . "</option>";
                            }

                            ?>
                        </select>
                    </label><br><br>

                    <label>
                        <span>End Time:</span>
                        <select name="end">
                            <?php
                            foreach ($attributes['timing'] as $time) {
                                echo "<option value=\"$time\">" . $time . "</option>";
                            }

                            ?>
                        </select>
                    </label><br><br>
                    <label for="date">Date:</label><br>
                    <input type="text" id="date" name="date" value="" placeholder="2024-12-31" required><br><br>
                    <input type="submit" value="Submit">

                </form>
            </div>

        </div>


        <div class="calendar__title" style="display: flex; justify-content: center; align-items: center">
            <div class="icon secondary chevron_left">‹</div>
            <h1 class="" style="flex: 1;">
                <span></span><strong><?php echo sprintf('%s - %s', str_replace(',', ' ', $attributes['weekDays'][0]), str_replace(',', ' ', $attributes['weekDays'][6])); ?></strong>
                2016</h1>
            <div class="icon secondary chevron_left">›</div>
        </div>
        <div style="align-self: flex-start; flex: 0 0 1"></div>
    </header>

    <div class="outer">


        <form action="">
            <table>
                <thead>
                <tr>
                    <th class="headcol"></th>

                    <?php
                    foreach ($attributes['weekDays'] as $index => $weekDay) {
                        if ($index == 0) {
                            echo "<th class=\"today\">$weekDay</th>";
                        } else if (str_contains($weekDay, 'Thu') || str_contains($weekDay, 'Fri')) {
                            echo "<th class=\"secondary\">$weekDay</th>";
                        } else {
                            echo "<th>$weekDay</th>";
                        }
                    }
                    ?>

                </tr>
                </thead>
            </table>

            <div class="wrap">
                <table class="offset">

                    <tbody>


                    <?php

                    foreach ($attributes['timing'] as $item) {
                        ?>

                        <tr>
                            <td class="headcol"><?php echo $item; ?></td>
                            <td></td>
                            <td></td>

                            <?php
                            if ($item > date('H:i')) {
                                echo '<td class="past"></td>';
                            } else {
                                echo '<td></td>';
                            } ?>

                            <td>
                                <div class="event double"><input id="check" type="checkbox" class="checkbox"/><label
                                            for="check"></label>8:30–9:30 Yoga
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td class="headcol"></td>
                            <td></td>
                            <td></td>

                            <?php
                            if ($item > date('H:i')) {
                                echo '<td class="past"></td>';
                            } elseif ($item == date('H:i')) {
                                echo '<td class="now"></td>';
                            } else {
                                echo '<td></td>';
                            } ?>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>


                        <?php
                    }

                    ?>

                    </tbody>
                </table>
            </div>

        </form>

    </div>
</div>


<script type="text/javascript">
    // Get the modal
    var modal = document.getElementById("new-event-modal");

    // Get the button that opens the modal
    var btn = document.getElementById("new-event");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // var form = document.getElementById("save-event");

    // When the user clicks on the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<script type="text/javascript">

    // $(function() {
    //
    //     var $newEvent = $('#new-event');
    //
    //     $newEvent.on("click", function () {
    //         console.log("clicked");
    //     })
    //
    //
    // });

</script>

</body>

</html>