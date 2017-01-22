<?php 

    include('/includes/header.php');
?>

<div id="wrapper" class ="container-fluid" >
    <div class="row">  
        <!-- Utility Bar -->    
        <?php include('/includes/utilityBar.php'); ?> 
    </div>
    <div class="WS row" id="WS">
        <br>
        <b> What species is the animal?</b>

        <input type="text" id="srch" placeholder="Search.." style="text-align:center;">
       
    </div>
    <!-- Radio Buttons -- Land See Sky River -->
    <div class="rdo row">  
        <input type="radio" name="cat" id="rdo-land" value="Land" checked/>
        <label for="rdo-land">Land</label>

        <input type="radio" name="cat" id="rdo-sea" value="sea"/>
        <label for="rdo-sea">Sea</label>

        <input type="radio" name="cat" id="rdo-sky" value="sky"/>
        <label for="rdo-sky">Sky</label>
        
        <input type="radio" name="cat" id="rdo-river" value="river"/>
        <label for="rdo-river">River </label>

    </div>
    <br>
    <!-- LLLLLLLLLLLL LAND Wildlife LLLLLLLLLLLLLLLLLLL-->
    <!-- LLLLLLLLLLLL LAND Wildlife LLLLLLLLLLLLLLLLLLL--> 
    <!-- LLLLLLLLLLLL LAND Wildlife LLLLLLLLLLLLLLLLLLL-->
    <div class="land">
        <div class="row">
            <div class="col s4 m4 l4" id="r1c1">
                <div class="img_caption_div">
                    <img class="responsive-img" id="kangaroo" src="img/wildlife/land/kangaroo.jpg" onclick="liveDead(this.id)">
                    <br>
                    <p>Kangaroo</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r1c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/kuala.jpg">
                    <br>
                    <p>Kuala</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r1c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/passum.jpg">
                    <br>
                    <p>Passum</p>
                </div>           
            </div>
        </div>


        <br>
        <div class="row">
            <div class="col s4 m4 l4" id="r2c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/wombat.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r2c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r2c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>


        <!-- hidden by default -->

        <div class="row toggleDiv">
             <br>
            <div class="col s4 m4 l4" id="r3c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/wallaby.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r3c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/blue-tongue-lizard.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r3c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/dingo.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>

        <div class="row toggleDiv">
             <br>
            <div class="col s4 m4 l4" id="r4c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/frilled-lizard.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r4c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/spotted-quall.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r4c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/bilby.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>    
        <!--End of hidden div -->
    </div>
    <!-- LLLLLLLLLLLL End of LAND LLLLLLLLLLLLLLLLLL-->  
    
    <!-- LLLLLLLLLLLL Sea WildLife LLLLLLLLLLLLLLLLLL--> 
    <!-- LLLLLLLLLLLL Sea WildLife LLLLLLLLLLLLLLLLLL--> 
    <!-- LLLLLLLLLLLL Sea WildLife LLLLLLLLLLLLLLLLLL--> 
    
    <div class = "sea">
        <div class="row">
            <div class="col s4 m4 l4" id="r1c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/bilby.jpg">
                    <br>
                    <p>Kangaroo</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r1c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/bilby.jpg">
                    <br>
                    <p>Kuala</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r1c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/bilby.jpg">
                    <br>
                    <p>Passum</p>
                </div>           
            </div>
        </div>


        <br>
        <div class="row">
            <div class="col s4 m4 l4" id="r2c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/wombat.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r2c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r2c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>


        <!-- hidden by default -->

        <div class="row toggleDiv">
             <br>
            <div class="col s4 m4 l4" id="r3c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/wombat.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r3c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r3c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>

        <div class="row toggleDiv">
             <br>
            <div class="col s4 m4 l4" id="r4c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/wombat.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r4c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r4c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>  
    </div>
    
    <!-- SSSSSSSSSSSSSSS End Sea SSSSSSSSSSSSSSS--> 
    
    <!-- KKKKKKKKKKKKKKK Sky Wildlife KKKKKKKKKKKKKK -->
    <!-- KKKKKKKKKKKKKKK Sky Wildlife KKKKKKKKKKKKKK -->
    <!-- KKKKKKKKKKKKKKK Sky Wildlife KKKKKKKKKKKKKK -->    
    
    <div class = "sky">
        <div class="row">
            <div class="col s4 m4 l4" id="r1c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Kangaroo</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r1c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Kuala</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r1c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Passum</p>
                </div>           
            </div>
        </div>


        <br>
        <div class="row">
            <div class="col s4 m4 l4" id="r2c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/wombat.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r2c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r2c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>


        <!-- hidden by default -->

        <div class="row toggleDiv">
             <br>
            <div class="col s4 m4 l4" id="r3c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/wombat.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r3c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r3c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>

        <div class="row toggleDiv">
             <br>
            <div class="col s4 m4 l4" id="r4c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/wombat.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r4c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r4c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>  
    </div>
    
    <!-- KKKKKKKKKKKkk End of Sky KKKKKKKKKKKKKKKK -->
    
    <!-- RRRRRRRRRRRRR River Wildlife RRRRRRRRRRRRRRR -->
    <!-- RRRRRRRRRRRRR River Wildlife RRRRRRRRRRRRRRR -->
    <!-- RRRRRRRRRRRRR River Wildlife RRRRRRRRRRRRRRR -->
    <div class = "river">
        <div class="row">
            <div class="col s4 m4 l4" id="r1c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Kangaroo</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r1c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Kuala</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r1c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Passum</p>
                </div>           
            </div>
        </div>


        <br>
        <div class="row">
            <div class="col s4 m4 l4" id="r2c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/wombat.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r2c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r2c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>


        <!-- hidden by default -->

        <div class="row toggleDiv">
             <br>
            <div class="col s4 m4 l4" id="r3c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/wombat.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r3c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r3c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>

        <div class="row toggleDiv">
             <br>
            <div class="col s4 m4 l4" id="r4c1">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/wombat.jpg">
                    <br>
                    <p>Wombat</p>
                </div>
            </div>
            <div class="col s4 m4 l4" id="r4c2">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/snake.jpg">
                    <br>
                    <p>Snake</p>
                </div>        
            </div>
            <div class="col s4 m4 l4" id="r4c3">
                <div class="img_caption_div">
                    <img class="responsive-img" src="img/wildlife/land/echinda.jpg">
                    <br>
                    <p>Echinda</p>
                </div>           
            </div>       

        </div>  
    </div>
    
<!-- RRRRRRRRRRRRRRRRR End of River RRRRRRRRRRRRRRRRRR -->    
    
    <br>
    <div class="WS" id="ML">
        <p><b><span id="MoreLess">More</span></b></p>
        <img class="responsive-img" src="img/arrow-down.png" id="arrow-down" >
        <img class="responsive-img" src="img/arrow-up.png" id="arrow-up" >
    </div>
    <!--div class="row">
        <button id="btn"> List TAXONs</button>
        <button id="btn1"> List Wildlifes</button>
        <input type="text" id="taxonID" style="text-align:center;">
        <h5><strong>Common Name:</strong></h5><br>
    </div-->
  
    <!-- here the liveDead page is included -->
    <?php include('includes/liveDead.php'); ?>
    
</div>

<?php
    include('/includes/footer.php');
?>


