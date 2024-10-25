<?php include 'includes/header.php'; ?>

<section>
        <div class="contact-container id=contact">
            <div class="contact-form">
                <h2>Contact Us</h2>
                <form id="contact-form">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
    
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
    
                    <label for="message">Enter your message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
    
                    <button type="submit" class="btn btn-contact">
                        <span class="text text-1">Send Message</span>
                        <span class="text text-2" aria-hidden="true">Send Message</span>
                    </button>
                </form>
            </div>
            <!-- Embedded map (Google Maps iframe) goes here -->
            <div class="map">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=YOUR_MAP_URL" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <!-- Add your embedded map (e.g., Google Maps iframe) here -->
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>