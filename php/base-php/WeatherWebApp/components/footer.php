<footer class="footer">
    <div class="footer__left">

        <h3>Weather<span>App</span></h3>

        <p class="footer__links">
            <a href="./index.php">Home</a>
            ·
            <a href="./daysForcast.php">Daily Frocast</a>
            ·
            <a href="./hoursForcast.php">Hourly Frocast</a>
            ·
            <a href="./plan.php">Plan Your Day</a>
            ·
            <a href="./about.php">About</a>
        </p>

        <p class="footer__company__name">WeatherApp &copy; 2023</p>

        <div class="footer__icons">
            <a href="#"><img src="./assets/icons/facebook.png" alt="facebook"></a>
            <a href="#"><img src="./assets/icons/twitter.png" alt="twitter"></a>
            <a href="#"><img src="./assets/icons/linkedin.png" alt="linkedin"></a>
            <a href="#"><img src="./assets/icons/github.png" alt="github"></a>

        </div>

    </div>

    <div class="footer__right">

        <form action="./php/upload.php" method="post" enctype="multipart/form-data">

            <legend class="footer__legend">Read/Write/Delete your file</legend>
            <fieldset>
                <input type="text" name="filename" placeholder="File name">
                <textarea name="message" placeholder="Message"></textarea>
                <div>
                    <button type="submit" name="read">read</button>
                    <button type="submit" name="add">Write</button>
                    <button type="submit" name="delete">delete</button>
                </div>
            </fieldset>
            <fieldset>
                <div class="upload__file">
                    choose file
                    <input type="file" name="file" id="file-upload" />
                </div>
                <button type="submit" name="upload">upload</button>
            </fieldset>
        </form>
    </div>

</footer>