<?php include_once('../components/header.php')?>

<!-- menu Section -->
<section id="projects">
    <div class="projects container">
        <div class="projects-header">
            <h1 class="section-title">Me<span>n</span>u</h1>
        </div>
        
        <!-- Category Selector -->
        <select style="text-align:center;" id="menu-category" class="menu-category">
            <option value="all">ALL ITEMS</option>
            <option value="sri-lankan">SRI LANKAN</option>
            <option value="italian">ITALIAN</option>
            <option value="chinese">CHINESE</option>
        </select>
        
        <!-- All Items (default view) -->
        <div class="all msg">
        <div class="mainDish">
                <h1 style="text-align:center;">SRI LANKAN</h1>
                <?php foreach ($sriLankanDishes as $item): ?>
                    <div class="menu-item" data-item-id="<?php echo $item['item_id']; ?>">
                        <p>
                            <span class="item-name"><strong><?php echo $item['item_name']; ?></strong></span>
                            <span class="item-price">Rs.<?php echo $item['item_price']; ?></span><br>
                            <span class="item_type"><i><?php echo $item['item_type']; ?></i></span>
                        </p>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn" onclick="addToCart(<?php echo $item['item_id']; ?>)">Add to Cart</button>
                        </div>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>


            <div class="sideDish">
                <h1 style="text-align:center">CHINESE</h1>
                <?php foreach ($chineseDishes as $item): ?>
                    <div class="menu-item" data-item-id="<?php echo $item['item_id']; ?>">
                        <p>
                            <span class="item-name"><strong><?php echo $item['item_name']; ?></strong></span>
                            <span class="item-price">Rs.<?php echo $item['item_price']; ?></span><br>
                            <span class="item_type"><i><?php echo $item['item_type']; ?></i></span>
                        </p>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn" onclick="addToCart(<?php echo $item['item_id']; ?>)">Add to Cart</button>
                        </div>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="drinks">
                <h1 style="text-align:center">ITALIAN</h1>
                <?php foreach ($italianDishes as $item): ?>
                    <div class="menu-item" data-item-id="<?php echo $item['item_id']; ?>">
                        <p>
                            <span class="item-name"><strong><?php echo $item['item_name']; ?></strong></span>
                            <span class="item-price">Rs.<?php echo $item['item_price']; ?></span><br>
                            <span class="item_type"><i><?php echo $item['item_type']; ?></i></span>
                        </p>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn" onclick="addToCart(<?php echo $item['item_id']; ?>)">Add to Cart</button>
                        </div>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Category Sections -->
        <div class="sri-lankan msg" style="display: none;">
            <div class="mainDish">
                <h1 style="text-align:center;">SRI LANKAN</h1>
                <?php foreach ($sriLankanDishes as $item): ?>
                    <div class="menu-item" data-item-id="<?php echo $item['item_id']; ?>">
                        <p>
                            <span class="item-name"><strong><?php echo $item['item_name']; ?></strong></span>
                            <span class="item-price">Rs.<?php echo $item['item_price']; ?></span><br>
                            <span class="item_type"><i><?php echo $item['item_type']; ?></i></span>
                        </p>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn" onclick="addToCart(<?php echo $item['item_id']; ?>)">Add to Cart</button>
                        </div>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="italian msg" style="display: none;">
            <div class="drinks">
                <h1 style="text-align:center">ITALIAN</h1>
                <?php foreach ($italianDishes as $item): ?>
                    <div class="menu-item" data-item-id="<?php echo $item['item_id']; ?>">
                        <p>
                            <span class="item-name"><strong><?php echo $item['item_name']; ?></strong></span>
                            <span class="item-price">Rs.<?php echo $item['item_price']; ?></span><br>
                            <span class="item_type"><i><?php echo $item['item_type']; ?></i></span>
                        </p>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn" onclick="addToCart(<?php echo $item['item_id']; ?>)">Add to Cart</button>
                        </div>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="chinese msg" style="display: none;">
            <div class="sideDish">
                <h1 style="text-align:center">CHINESE</h1>
                <?php foreach ($chineseDishes as $item): ?>
                    <div class="menu-item" data-item-id="<?php echo $item['item_id']; ?>">
                        <p>
                            <span class="item-name"><strong><?php echo $item['item_name']; ?></strong></span>
                            <span class="item-price">Rs.<?php echo $item['item_price']; ?></span><br>
                            <span class="item_type"><i><?php echo $item['item_type']; ?></i></span>
                        </p>
                        <div class="add-to-cart">
                            <button class="add-to-cart-btn" onclick="addToCart(<?php echo $item['item_id']; ?>)">Add to Cart</button>
                        </div>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="order-now">
        <a href="cart.php" class="btn btn-primary">Order Now</a>
    </div>
</section>
<!-- End menu Section -->

<?php 
include_once('../components/footer.php');
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to add item to cart
    function addToCart(itemId) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_to_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert('Item added to cart!');
            }
        };
        xhr.send('item_id=' + itemId);
    }
});
</script>
