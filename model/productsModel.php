<?php 
//products model

function getProductDetails($shopProductId) {
    echo 'YOU MADE IT';
    $servername = '127.0.0.1';
    $username = 'bea49f1b1b2107';
    $password = 'a0175e56';
    $dbname = 'heroku_3eee6f15e6e8991';
    $connection = mysqli_connect($servername, $username, $password, $dbname);

    if ($connection->connect_errno) {
        printf(" NONE CONNEC:  %s\n", $connection->connect_error);
        exit();
    }
    if (!$connection->query('SET a=1')) {
        printf('ERRRR: %s\n', $connection->error);
    }
    $sql = 'SELECT * FROM shopproducts WHERE shopProductId = :shopProductId';
    $result = $connection->query($sql);
    
    $row = $result->fetch_array(MYSQLI_BOTH);
    return $row;
    $connection->close();

    // $stmt = $db->prepare($sql);
    
    // $stmt->bindValue(':shopProductId', $shopProductId, PDO::PARAM_INT);
    
    // $stmt->execute();
    // $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $stmt->closeCursor();
    // return $product;
}

function buildProductDetail($product) {
    $detailView = '<div class="productDetails"><h2>';
    $detailView .= $product[0]['shopProductName'];
    $detailView .= '</h2><img src="../images/';
    $detailView .= $product[0]['shopProductPhoto'];
    $detailView .= '" alt="';
    $detailView .= $product[0]['shopProductName'];
    $detailView .= '"><p>'; 
    $detailView .= $product[0]['shopProductDescription'];
    $detailView .= '</p></div>';
    $detailView .= '<a href="/seniorproject/products/index.php?action=customProduct&shopProductId=';
    $detailView .= $product[0]['shopProductId'];
    $detailView .= '">Start Customizing</a>';
    echo $detailView;
    print_r($product);
}

// function getProductName($shopProductId) {
//     $db = unraveledConnect();
//     $sql = 'SELECT shopProductName FROM shooproducts WHERE shoProductId = :shopProductId';
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':shopProductId', $shopProductId, PDO::PARAM_INT);
//     $stmt->execute();
//     $productName = $stmt->fetchALL(PDO::FETCH_ASSOC);
//     $stmt->closeCursor();
//     return $productName;
// }

function buildFishHat($productId) {
    $form = '<form class=“customProduct” method=“POST”><fieldset><legend>Fish Hat</legend><label for=“size”>Size</label><input type=“radio” id=“child” name=“size” value=“child”><label for=“child”>Child</label><input type=“radio” id=“adult” name=“size” value=“adult”><label for=“adult”>Adult</label><input type=“radio” id=adult-large” name=“size” value=“adult-large”><label for=“adult-large”>Adult Large</label><label for=“pattern”>Pattern</label>
    <input type=“radio” id=“solid” name=“pattern” value=“solid”><label for=“solid”>Solid</label><input type=“radio” id=“striped” name=“pattern” value=“striped”><label for=“body”>Body</label><input type=“radio” id=“short” name="body” value=“short”><label for=“short”>Short</label><label type=“radio” id=“long” name=“body” value=“long”><label for=“long”>Long</label><label for=“fins”>Fin Color</label><input type=“radio” id=“same” name=“fins” value=“same”><label for=“same”>Same Color</label><input type=“radio” id=“other” name=“fins” value=“other”><label for=“color1”>Color 1</label><div class="colorPicker"><input type="radio" name="color1" id="red" value="red"><label for="red"><span class="red"></span></label><input type="radio" name="color1" id="blue" value="blue"><label for="blue"><span class="blue"></span></label><input type="radio" name="color1" id="green" value="green"><label for="green"><span class="green"></span></label><input type="radio" name="color1" id="yellow" value="yellow"><label for="yellow"><span class="yellow"></span></label><input type="radio" name="color1" id="orange" value="orange"><label for="orange"><span class="orange"></span></label><input type="radio" name="color1" id="purple" value="purple"><label for="purple"><span class="purple"></span></label><input type="radio" name="color1" id="white" value="white"><label for="white"><span class="white"></span></label><input type="radio" name="color1" id="black" value="black"><label for="black"><span class="black"></span></label><input type="radio" name="color1” id="brown" value="brown"><label for="brown"><span class="brown"></span></label><input type="radio" name="color1" id="pink" value="pink"><label for="pink"><span class="pink"></span></label></div><label for=“color2”>Color 2</label><div class="colorPicker"><input type="radio" name="color2" id="red" value="red"><label for="red"><span class="red"></span></label><input type="radio" name="color2" id="blue" value="blue"><label for="blue"><span class="blue"></span></label><input type="radio" name="color2" id="green" value="green"><label for="green"><span class="green"></span></label><input type="radio" name="color2" id="yellow" value="yellow"><label for="yellow"><span class="yellow"></span></label><input type="radio" name="color2" id="orange" value="orange"><label for="orange"><span class="orange"></span></label><input type="radio" name="color2" id="purple" value="purple"><label for="purple"><span class="purple"></span></label><input type="radio" name="color2" id="white" value="white"><label for="white"><span class="white"></span></label><input type="radio" name="color2" id="black" value="black"><label for="black"><span class="black"></span></label><input type="radio" name="color2” id="brown" value="brown"><label for="brown"><span class="brown"></span></label><input type="radio" name="color2" id="pink" value="pink"><label for="pink"><span class="pink"></span></label></div><label for=“eyes”>Eyes</label><input type=“radio” name=“eyes” id=“xEyes” value=“xEyes”><label for=“xEyes”>X Eyes</label><input type=“radio” name=“eyes” id=“googly” value=“googly”><label for=“googly”>Googly Eyes</label><input type=“radio” name=“eyes” id=“button” value=“button”><label for=“button”>Button Eyes</label><input type=“submit” name="submit" class="submit" value=“Create”><input type="hidden" name="action" value="buildProduct"></fieldset></form>';
}

function buildCatEarHat($productId) {
    $form = '';
}

function buildBeardHat($productId) {
    $form = '<form class=“customProduct” method=“POST”>
    <fieldset>
    <legend>Beard Hat</legend>
    
    <label for=“size”>Size</label>
    <input type=“radio” id=“child” name=“size” value=“child”>
    <label for=“child”>Child</label>
    <input type=“radio” id=“adult” name=“size” value=“adult”>
    <label for=“adult”>Adult</label>
    <input type=“radio” id=“adult-large” name=“size” value=“adult-large”>
    <label for=“adult-large”>Adult Large</label>
    
    <label for=“pattern”>Pattern</label>
    <input type=“radio” id=“solid” name=“pattern” value=“solid”>
    <label for=“solid”>Solid</label>
    <input type=“radio” id=“striped” name=“pattern” value=“striped”>
    
    <label for=“beard”>Beard Style</label>
    <input type=“radio” id=“short” name=“beard” value=“short”>
    <label for=“short”>Short</label>
    <input type=“radio” id=“medium” name=“beard” value=“medium”>
    <label for=“medium”>Medium</label>
    <input type=“radio” id=“long” name=“beard” value=“long”>
    <label for=“long”>Long</label>
    
    <label for=“mustache”>Mustache</label>
    <input type=“radio” id=“blended” name=“mustache” value=“blended”>
    <label for=“blended”>Blended (no extra)</label>
    <input type=“radio” id=“extra” name=“mustache” value=“extra”>
    <label for=“extra”>Extra Mustache</label>
    
    <label for=“color1”>Color 1</label>
    <div class="colorPicker">
    <input type="radio" name="color1" id="red" value="red"><label for="red"><span class="red"></span></label>
    <input type="radio" name="color1" id="blue" value="blue"><label for="blue"><span class="blue"></span></label>
    <input type="radio" name="color1" id="green" value="green"><label for="green"><span class="green"></span></label>
    <input type="radio" name="color1" id="yellow" value="yellow"><label for="yellow"><span class="yellow"></span></label>
    <input type="radio" name="color1" id="orange" value="orange"><label for="orange"><span class="orange"></span></label>
    <input type="radio" name="color1" id="purple" value="purple"><label for="purple"><span class="purple"></span></label>
    <input type="radio" name="color1" id="white" value="white"><label for="white"><span class="white"></span></label>
    <input type="radio" name="color1" id="black" value="black"><label for="black"><span class="black"></span></label>
    <input type="radio" name="color1” id="brown" value="brown"><label for="brown"><span class="brown"></span></label>
    <input type="radio" name="color1" id="pink" value="pink"><label for="pink"><span class="pink"></span></label>
    </div>
    
    <label for=“color2”>Color 2</label>
    <div class="colorPicker">
    <input type="radio" name="color2" id="red" value="red"><label for="red"><span class="red"></span></label>
    <input type="radio" name="color2" id="blue" value="blue"><label for="blue"><span class="blue"></span></label>
    <input type="radio" name="color2" id="green" value="green"><label for="green"><span class="green"></span></label>
    <input type="radio" name="color2" id="yellow" value="yellow"><label for="yellow"><span class="yellow"></span></label>
    <input type="radio" name="color2" id="orange" value="orange"><label for="orange"><span class="orange"></span></label>
    <input type="radio" name="color2" id="purple" value="purple"><label for="purple"><span class="purple"></span></label>
    <input type="radio" name="color2" id="white" value="white"><label for="white"><span class="white"></span></label>
    <input type="radio" name="color2" id="black" value="black"><label for="black"><span class="black"></span></label>
    <input type="radio" name="color2” id="brown" value="brown"><label for="brown"><span class="brown"></span></label>
    <input type="radio" name="color2" id="pink" value="pink"><label for="pink"><span class="pink"></span></label>
    </div>
    
    <label for=“color3”>Color 3</label>
    <div class="colorPicker">
    <input type="radio" name="color3" id="red" value="red"><label for="red"><span class="red"></span></label>
    <input type="radio" name="color3" id="blue" value="blue"><label for="blue"><span class="blue"></span></label>
    <input type="radio" name="color3" id="green" value="green"><label for="green"><span class="green"></span></label>
    <input type="radio" name="color3" id="yellow" value="yellow"><label for="yellow"><span class="yellow"></span></label>
    <input type="radio" name="color3" id="orange" value="orange"><label for="orange"><span class="orange"></span></label>
    <input type="radio" name="color3" id="purple" value="purple"><label for="purple"><span class="purple"></span></label>
    <input type="radio" name="color3" id="white" value="white"><label for="white"><span class="white"></span></label>
    <input type="radio" name="color3" id="black" value="black"><label for="black"><span class="black"></span></label>
    <input type="radio" name="color3” id="brown" value="brown"><label for="brown"><span class="brown"></span></label>
    <input type="radio" name="color3" id="pink" value="pink"><label for="pink"><span class="pink"></span></label>
    </div>
    
    <input type=“submit” name="submit" class="submit" value=“Create”>
    <input type="hidden" name="action" value="buildProduct">
    
    </fieldset>
    </form>';
}

?>

<!-- <form class="customProduct" method="POST">
    <fieldset>
        <legend>Cat Ear Hat</legend>
        
        <label for=“size”>Size</label>
        <input type=“radio” id=“child” name=“size” value=“child”>
        <label for=“child”>Child</label>
        <input type=“radio” id=“adult” name=“size” value=“adult”>
        <label for=“adult”>Adult</label>
        <input type=“radio” id=“adult-large” name=“size” value=“adult-large”>
        <label for=“adult-large”>Adult Large</label>
        
        <label for=“body”>Body</label>
        <input type=“radio” id=“round” name=“body” value=“round”>
        <label for=“round”>Round</label>
        <label type=“radio” id=“square” name=“body” value=“square”>
        <label for=“square”>Square</label>

        <label for=“pattern”>Pattern</label>
        <input type=“radio” id=“solid” name=“pattern” value=“solid”>
        <label for=“solid”>Solid</label>
        <input type=“radio” id=“striped” name=“pattern” value=“striped”>

        <label for=“ears”>Ears</label>
        <input type=“radio” name=“ears” id=“lined” value=“lined”>
        <label for=“lined”>Lined</label>
        <input type=“radio” name=“ears” id=“unlined” value=“unlined”>
        <label for=“unlined”>Unlined</label>

        <label for=“color1”>Color 1</label>
        <div class="colorPicker">
        <input type="radio" name="color1" id="red" value="red"><label for="red"><span class="red"></span></label>
        <input type="radio" name="color1" id="blue" value="blue"><label for="blue"><span class="blue"></span></label>
        <input type="radio" name="color1" id="green" value="green"><label for="green"><span class="green"></span></label>
        <input type="radio" name="color1" id="yellow" value="yellow"><label for="yellow"><span class="yellow"></span></label>
        <input type="radio" name="color1" id="orange" value="orange"><label for="orange"><span class="orange"></span></label>
        <input type="radio" name="color1" id="purple" value="purple"><label for="purple"><span class="purple"></span></label>
        <input type="radio" name="color1" id="white" value="white"><label for="white"><span class="white"></span></label>
        <input type="radio" name="color1" id="black" value="black"><label for="black"><span class="black"></span></label>
        <input type="radio" name="color1" id="brown" value="brown"><label for="brown"><span class="brown"></span></label>
        <input type="radio" name="color1" id="pink" value="pink"><label for="pink"><span class="pink"></span></label>
        </div>

        <label for=“color2”>Color 2</label>
        <div class="colorPicker">
        <input type="radio" name="color2" id="red" value="red"><label for="red"><span class="red"></span></label>
        <input type="radio" name="color2" id="blue" value="blue"><label for="blue"><span class="blue"></span></label>
        <input type="radio" name="color2" id="green" value="green"><label for="green"><span class="green"></span></label>
        <input type="radio" name="color2" id="yellow" value="yellow"><label for="yellow"><span class="yellow"></span></label>
        <input type="radio" name="color2" id="orange" value="orange"><label for="orange"><span class="orange"></span></label>
        <input type="radio" name="color2" id="purple" value="purple"><label for="purple"><span class="purple"></span></label>
        <input type="radio" name="color2" id="white" value="white"><label for="white"><span class="white"></span></label>
        <input type="radio" name="color2" id="black" value="black"><label for="black"><span class="black"></span></label>
        <input type="radio" name="color2" id="brown" value="brown"><label for="brown"><span class="brown"></span></label>
        <input type="radio" name="color2" id="pink" value="pink"><label for="pink"><span class="pink"></span></label>
        </div>

        <label for=“color3”>Color 3</label>
        <div class="colorPicker">
        <input type="radio" name="color3" id="red" value="red"><label for="red"><span class="red"></span></label>
        <input type="radio" name="color3" id="blue" value="blue"><label for="blue"><span class="blue"></span></label>
        <input type="radio" name="color3" id="green" value="green"><label for="green"><span class="green"></span></label>
        <input type="radio" name="color3" id="yellow" value="yellow"><label for="yellow"><span class="yellow"></span></label>
        <input type="radio" name="color3" id="orange" value="orange"><label for="orange"><span class="orange"></span></label>
        <input type="radio" name="color3" id="purple" value="purple"><label for="purple"><span class="purple"></span></label>
        <input type="radio" name="color3" id="white" value="white"><label for="white"><span class="white"></span></label>
        <input type="radio" name="color3" id="black" value="black"><label for="black"><span class="black"></span></label>
        <input type="radio" name="color3" id="brown" value="brown"><label for="brown"><span class="brown"></span></label>
        <input type="radio" name="color3" id="pink" value="pink"><label for="pink"><span class="pink"></span></label>
        </div>

        
    </fieldset>
</form> -->