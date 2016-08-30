<?php
/**
 * Template Name: Towers of Hanoi
 *
 */

get_header(); ?>


    <style>
        h1{
            text-align:center;
        }

        #content .container{
            border-style: solid;
            border-color: black;
            margin-bottom:25px;
        }

        .towers-container{
            border-style: solid;
            border-color: blue;
            text-align:center;
            position:initial;
        }

        #tower-one{
            width:200px;
            height:400px;
            background-color:green;
            display:inline-block;
            margin-left:20px;
            position:relative;
        }

        #tower-two{
            width:200px;
            height:400px;
            background-color:red;
            display:inline-block;
            margin-left:20px;
            margin-right:20px;
            position:relative;
        }

        #tower-three{
            width:200px;
            height:400px;
            background-color:blue;
            display:inline-block;
            margin-right:20px;
            position:relative;
        }

        .disk-one{
            height:20px;
            width:200px;
            background-color:lightslategray;
            left:0px;
            bottom:0px;
            position:absolute;
        }

        .disk-two{
            height:20px;
            width:180px;
            background-color:lightslategray;
            left:10px;
            bottom:25px;
            position:absolute;
        }

        .disk-three{
            height:20px;
            width:160px;
            background-color:lightslategray;
            left:20px;
            bottom:50px;
            position:absolute;
        }

        .disk-four{
            height:20px;
            width:140px;
            background-color:lightslategray;
            left:30px;
            bottom:75px;
            position:absolute;
        }

        .disk-five{
            height:20px;
            width:120px;
            background-color:lightslategray;
            left:40px;
            bottom:100px;
            position:absolute;
        }

        .disk-six{
            height:20px;
            width:100px;
            background-color:lightslategray;
            left:50px;
            bottom:125px;
            position:absolute;
        }

        .disk-seven{
            height:20px;
            width:80px;
            background-color:lightslategray;
            left:60px;
            bottom:150px;
            position:absolute;
        }

        .disk-eight{
            height:20px;
            width:60px;
            background-color:lightslategray;
            left:70px;
            bottom:175px;
            position:absolute;
        }

        .disk-nine{
            height:20px;
            width:40px;
            background-color:lightslategray;
            left:80px;
            bottom:200px;
            position:absolute;
        }

        .disk-ten{
            height:20px;
            width:20px;
            background-color:lightslategray;
            left:90px;
            bottom:225px;
            position:absolute;
        }

        .disk-eleven{
            height:20px;
            width:10px;
            background-color:lightslategray;
            left:95px;
            bottom:250px;
            position:absolute;
        }

        .disk-twelve{
            height:20px;
            width:5px;
            background-color:lightslategray;
            left:100px;
            bottom:275px;
            position:absolute;
        }

        .disk-thirteen{
            height:20px;
            width:4px;
            background-color:lightslategray;
            left:101px;
            bottom:300px;
            position:absolute;
        }

        .disk-fourteen{
            height:20px;
            width:3px;
            background-color:lightslategray;
            left:102px;
            bottom:325px;
            position:absolute;
        }

        .disk-fifteen{
            height:20px;
            width:2px;
            background-color:lightslategray;
            left:103px;
            bottom:350px;
            position:absolute;
        }

        .disk-sixteen{
            height:20px;
            width:1px;
            background-color:lightslategray;
            left:104px;
            bottom:375px;
            position:absolute;
        }

        .selected{
            border: solid black;
        }

        #optimal-count{
            float:right;
        }

        #time-elapsed{
            color:red;
            font-weight:900;
        }
    </style>

<div id="content">
    <h1>Towers of Hanoi</h1>

    <div class="container">

        <p id="rules">The objective of the puzzle is to move the entire stack to another rod, obeying the following simple rules:
        <ol>
            <li>Only one disk can be moved at a time.</li>
            <li>Each move consists of taking the upper disk from one of the stacks and placing it on top of another stack i.e. a disk can only be moved if it is the uppermost disk on a stack.</li>
            <li>No disk may be placed on top of a smaller disk.</li>
        </ol>
        </p>

        <div class="towers-container">
            <div id="tower-one" class="tower">
                <!--<div class="disk disk-eleven">11</div>-->
                <!--<div class="disk disk-ten">10</div>-->
                <!--<div class="disk disk-nine">9</div>-->
                <!--<div class="disk disk-eight">8</div>-->
                <!--<div class="disk disk-seven">7</div>-->
                <div class="disk disk-six">6</div>
                <div class="disk disk-five">5</div>
                <div class="disk disk-four">4</div>
                <div class="disk disk-three">3</div>
                <div class="disk disk-two">2</div>
                <div class="disk disk-one">1</div>
            </div>

            <div id="tower-two" class="tower">
            </div>

            <div id="tower-three" class="tower">
            </div>
        </div>

        <button id="auto-solve" class="btn btn-danger">Auto Solve</button>
        <span id="move-count">Move Count: 0</span>
        <span id="optimal-count"></span>
        <buttton id="reset" class="btn btn-info">Reset</buttton>
        <select id="thedropdown">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option selected="selected" value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
        </select>
        <span id="time-elapsed"></span>

        <h2>Explanation</h2>
        <p id="explanation">After you understand the rules, it is clear that to move the disk at the bottom of the stack
            to the destination tower, you must first move n-1 disks from the first tower to the extra tower.</p>

        <p>Thus, the steps to move n disks from the first tower to the destination tower are as follows:</p>

        <ol>
            <li>Move n-1 disks from tower 1 to the extra tower using the destination tower.</li>
            <li>Move the disk from tower 1 to the destination</li>
            <li>Move n-1 disks from the extra tower to the destination using tower 1.</li>
        </ol>

        <p>Using these steps, we can translate that into a recursive algorithm. Here it is in JavaScript:</p>

        <pre>
        <code>
            function hanoi(nDisks, source, to, using){
                if( nDisks > 0 ){
                    hanoi(nDisks - 1, source, using, to); // step 1
                    console.log('move disk from ' + source + ' to ' + to); // step 2
                    hanoi(nDisks - 1, using, to, source); // step 3
                }
            }
        </code>
    </pre>

        <p>hanoi(3,'A', 'C', 'B');</p>

        <pre>
        <code>
            move disk from A to C
            move disk from A to B
            move disk from C to B
            move disk from A to C
            move disk from B to A
            move disk from B to C
            move disk from A to C
        </code>
    </pre>
    </div>
</div>


    <script type="text/javascript">

        $(document).ready(function(){
            var optimalMoveCount = Math.pow(2, ($('#tower-one').children().length) ) - 1;
            $('#optimal-count').text('Optimal number of moves: ' + optimalMoveCount);

            console.log('tower three children ' + $('#tower-three').children().length);

            var moveCount = 0; // global var tracking move counts

            // add and remove the selected class on click
            $('.disk').click(function(){
                $('.disk').removeClass('selected');
                $(this).addClass('selected');
            });


            // invoke game reset, get input from dropdown box.
            $('#reset').click(function(){
                var resetDiskNumber = ($('#thedropdown').val());
                resetGame(resetDiskNumber);
            });


            // invokes move disk when you click a tower
            $('.tower').click(function(){
                var clickedTower = $(this);

                var fromTower = {};
                if ( $('.selected').length == true){
                    var hasSelected = $('.tower').has('.selected');
                    var id = hasSelected[0].id;
                    fromTower = $('#' + id);
                }

                if ( ( clickedTower.has('.selected').length == false ) && ($('.selected').length == true) ){
                    moveDisk($('.selected'), fromTower, clickedTower);
                }
            });


            // moves the selected disk to the tower clicked by the user
            function moveDisk(disk, fromTower, toTower){

                var diskNumber = disk.text();

                //todo: figure out why I can't use jQuery's first() method
                // the next three lines get the disk number of the top disk on the clicked tower
                var toTowerId = '#' + $(toTower).attr('id');
                var toTowerChildren = $(toTowerId).children();
                var toTowerDiskNumber = Number($(toTowerChildren[0]).text());

                // the next three lines get the disk number of the top disk on the from tower
                var fromTowerId = '#' + $(fromTower).attr('id');
                var fromTowerChildren = $(fromTowerId).children();
                var fromTowerDiskNumber = Number($(fromTowerChildren[0]).text());

                var bottomPixels = toTowerChildren.length * 25;

                if(diskNumber < toTowerDiskNumber || diskNumber < fromTowerDiskNumber){
                    alert('illegal move');
                } else{
                    $(toTower).prepend(disk);
                    disk.css('bottom', bottomPixels);
                    moveCount++;
                    $('#move-count').text('Move Count: ' + moveCount);
                }


            }


            //autoSolve
            // uses a recursive algorithm
            $('#auto-solve').click(function(){

                // reset the game first
                var resetDiskNumber = ($('#thedropdown').val());
                resetGame(resetDiskNumber);

                var startTime = Date.now();

                var disk = $('#tower-one').children().length;

                var one = $('#tower-one');
                var two = $('#tower-two');
                var three= $('#tower-three')

                hanoi(disk, one, two,three);

                function hanoi( disk, src, aux, dst){

                    if($('#tower-three').children().length == $('.disk').length){
                        var endTime = Date.now();
                        var seconds = Math.round((endTime - startTime) / 1000);
                        var milliseconds = endTime - startTime;
                        $('#time-elapsed').text('Auto Solve Time: ' + milliseconds +
                            ' milliseconds ' + '(~ ' + seconds + ' seconds).');
                    }

                    if(disk > 0){
                        hanoi(disk -1, src, dst, aux);
                        moveDisk( getDisk($(src)), $(src), $(dst) );
                        hanoi(disk -1, aux, src, dst);
                    }
                }

            });


            function getDisk(tower){
                var towerDisks = tower.children();
                return $(towerDisks[0]);
            }

            // reset game function.
            function resetGame(numDisks){
                $('.disk').remove();

                var numbers = ['one','two','three','four','five','six','seven','eight',
                    'nine','ten','eleven','twelve','thirteen','fourteen','fifteen','sixteen'];

                for(var i =0; i < numDisks; i ++){
                    $('#tower-one').prepend('<div class="disk disk-' + numbers[i] + '">'+ (i + 1) +'</div>');
                }

                // Need to add the click method back to new nodes
                $('.disk').click(function(){
                    $('.disk').removeClass('selected');
                    $(this).addClass('selected');
                });

                // reset optimal moves, move count, and time elapsed
                optimalMoveCount = Math.pow(2, ($('#tower-one').children().length) ) - 1;
                $('#optimal-count').text('Optimal number of moves: ' + optimalMoveCount);
                moveCount = 0;
                $('#move-count').text('Move Count: ' + moveCount);
                $('#time-elapsed').text('');
            }

        });

    </script>


<?php get_footer(); ?>