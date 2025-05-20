<style>
  
.popup-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
}

.popup-content {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  width: 400px;
  position: relative;
  text-align: center;
}

.close-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 24px;
  cursor: pointer;
}

.form-control {
  margin-bottom: 15px;
  width: 100%;
}


</style>

<div id="popupForm" class="popup-container" style="display: none;">
  <div class="popup-content">
    <span class="close-btn" onclick="closePopup()">&times;</span>
    <div class="form-box-style__form-wrapper bg-light-2">
      <form class="form-box-style" action="submit_form.php" method="POST">
        <div class="form-box-style__form-inner">
          <div class="form-box-style__form-input">
            <h3 class="form-box-style-title">Your name</h3>
            <input class="form-control bg-white" type="text" name="name" placeholder="Enter your full name" required>
          </div>
          <div class="form-box-style__form-input">
            <h3 class="form-box-style-title">Email address</h3>
            <input class="form-control bg-white" type="email" name="email" placeholder="Enter your email" required>
          </div>
          <div class="form-box-style__form-input">
            <h3 class="form-box-style-title">Write your message</h3>
            <textarea class="form-control bg-white textarea" name="message" placeholder="Write us your question here..." required></textarea>
          </div>
        </div>
        <div class="form-box-style__form-input-button">
          <button type="submit" class="btn-masco rounded-pill w-100">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>