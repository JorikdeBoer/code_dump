<!DOCTYPE html>

<html>
    <head>
        <!-- The overview page of the Codedump site -->
        <title>	Codedump </title>

        <!-- Link to css style file -->
        <link type="text/css" rel="stylesheet" href="codedump.css" />
	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            *{
                box-sizing: border-box;
            }
        </style>
     </head>

    <script>
    function savecode() {
        var name = document.code_input.name.value;
        var code= document.code_input.text.value;

        // Replace & and + symbols (in different forms) with text to save them in database
        var namesymbolchangeone = name.replace(/&/g, "andsymbol");
        var codesymbolchangeone = code.replace(/&/g, "andsymbol");
        var namesymbolchangetwo = namesymbolchangeone.replace(/&&/g, "doublesymbol");
        var codesymbolchangetwo = codesymbolchangeone.replace(/&&/g, "doublesymbol");
        var namesymbolchangethree = namesymbolchangetwo.replace(/ && /g, "thirdsymbol");
        var codesymbolchangethree = codesymbolchangetwo.replace(/ && /g, "thirdsymbol");
        var namesymbolchangefour = namesymbolchangethree.replace(/\+/g, "fourthsymbol");
        var codesymbolchangefour = codesymbolchangethree.replace(/\+/g, "fourthsymbol");
        var namesymbolchangefive = namesymbolchangefour.replace(/\++/g, "fifthsymbol");
        var codesymbolchangefive = secondpostcode.replace(/\++/g, "fifthsymbol");
        var postname = namesymbolchangefive.replace(" ++ ", "plussymbol");
        var postcode = codesymbolchangefive.replace(" ++ ", "plussymbol");
        if(name.length === 0||code.length === 0){
           alert("Voer beide velden in!");
        }
        else{
            var xhr = new XMLHttpRequest();
            var value = "name=" + postname + "&code=" + postcode;
            xhr.open('POST', "http://localhost/code_dump/Codedump_API.php", true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            console.log(value);
            xhr.send(value);
            alert("Je code is opgeslagen!");
            window.location.replace("Codedump.html");
        }
    }
    </script>

    <!-- Insert background with clouds -->
    <body background="background.jpg">
        <!--Build-up of home page -->
        <div id="Total">
            <div id="Menu">
                <div id="Welcome">
                    <h1 class="welcome"> <b> Codedump 2.0 Jorik </h1>
                        <div style="clear:both"></div>
                            <!-- Navigation bar links -->
                            <div class="topnav">
                                <a href="Codedump.html">Dump je code</a>
                                <a href="Codesearch.html">Zoek je code terug</a>
                                <div style="clear:both"></div>
                            </div>
                            <!-- Inputbox: copy paste the code in the textarea with your name -->
                            <div id="inputbox">
                                <form name="code_input" action="" method="post">
                                Je naam: <input type="text" name="name"><br><br>
                                <div class="column">
                                    Code: <textarea id="text" name="text" rows="20" cols="90" placeholder="Plak je code en druk op opslaan" required></textarea>
                                    <!-- Button to save code in database -->
                                    <input type="button" name="save" onClick="savecode();" value="Opslaan" required />
                                </div>
                                </form>
                            </div>
                </div>
            </div>
        </div>
    </body>
</html>