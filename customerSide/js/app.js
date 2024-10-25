const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#29323c';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});



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

    // Add click event listeners to all "Add to Cart" buttons
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.stopPropagation();
            const itemId = this.closest('.menu-item').getAttribute('data-item-id');
            addToCart(itemId);
        });
    });

    // Handle category selection
    document.getElementById('menu-category').addEventListener('change', function() {
        const selectedCategory = this.value;
        document.querySelectorAll('.msg').forEach(section => {
            section.style.display = 'none';
        });
        if (selectedCategory === 'all') {
            document.querySelector('.all').style.display = 'block';
        } else {
            document.querySelector('.' + selectedCategory).style.display = 'block';
        }
    });
});

